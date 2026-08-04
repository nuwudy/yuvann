<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Checkout extends Component
{
    public string $customer_name = '';
    public string $customer_phone = '';
    public string $customer_email = '';
    public string $shipping_address = '';
    public string $notes = '';

    protected array $rules = [
        'customer_name' => 'required|string|min:3|max:100',
        'customer_phone' => 'required|string|min:10|max:15',
        'customer_email' => 'nullable|email|max:100',
        'shipping_address' => 'required|string|min:10|max:500',
        'notes' => 'nullable|string|max:500',
    ];

    public function mount(): void
    {
        if (CartService::getTotalQuantity() <= 0) {
            redirect()->to('/products');
        }
    }

    public function placeOrder()
    {
        $this->validate();

        $cartItems = CartService::getItems();
        $totalAmount = CartService::getSubtotal();
        
        if ($totalAmount < 1) {
            session()->flash('error', 'Order amount must be at least ₹1.');
            return;
        }

        $orderNumber = 'YN-' . strtoupper(uniqid());

        DB::beginTransaction();
        try {
            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_name' => $this->customer_name,
                'customer_phone' => $this->customer_phone,
                'customer_email' => $this->customer_email ?: null,
                'shipping_address' => $this->shipping_address,
                'notes' => $this->notes ?: null,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'unit_size' => $item['unit_size'],
                ]);

                $product = Product::find($item['id']);
                if ($product) {
                    $product->decrement('stock_quantity', $item['quantity']);
                }
            }

            // Create Razorpay Order
            $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            $razorpayOrder = $api->order->create([
                'receipt' => $order->order_number,
                'amount' => intval($totalAmount * 100), // paise
                'currency' => 'INR',
            ]);

            $order->update([
                'razorpay_order_id' => $razorpayOrder['id']
            ]);

            DB::commit();

            $this->dispatch('initiate-razorpay', [
                'key' => config('services.razorpay.key'),
                'amount' => intval($totalAmount * 100),
                'order_id' => $razorpayOrder['id'],
                'name' => $this->customer_name,
                'email' => $this->customer_email ?: '',
                'contact' => $this->customer_phone,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function verifyPayment($razorpayPaymentId, $razorpayOrderId, $razorpaySignature)
    {
        $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        try {
            $attributes = [
                'razorpay_order_id' => $razorpayOrderId,
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_signature' => $razorpaySignature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Payment is successful
            $order = Order::where('razorpay_order_id', $razorpayOrderId)->first();
            
            if ($order) {
                $order->update([
                    'status' => 'completed', // or 'paid' based on your logic, 'completed' was standard
                    'razorpay_payment_id' => $razorpayPaymentId,
                    'razorpay_signature' => $razorpaySignature,
                ]);

                CartService::clear();
                $this->dispatch('cart-updated');
                
                // Redirect to success page
                return redirect()->to('/order-success/' . $order->order_number);
            }

        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            $order = Order::where('razorpay_order_id', $razorpayOrderId)->first();
            if ($order) {
                $order->update(['status' => 'cancelled']);
            }
            session()->flash('error', 'Payment verification failed. Please try again.');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred during payment verification.');
        }
    }

    public function render()
    {
        return view('livewire.checkout', [
            'cartItems' => CartService::getItems(),
            'totalQuantity' => CartService::getTotalQuantity(),
            'subtotal' => CartService::getSubtotal(),
        ])->layout('components.layouts.app');
    }
}
