<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = '';
    public string $paymentMethodFilter = '';
    public bool $isDetailsOpen = false;
    public ?Order $selectedOrder = null;

    public string $orderWhatsAppNumber = '+91 94473 65545';
    public bool $isEditingWhatsApp = false;
    public string $tempWhatsAppNumber = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
        'paymentMethodFilter' => ['except' => ''],
    ];

    public function mount(): void
    {
        $this->orderWhatsAppNumber = Setting::where('key', 'order_whatsapp_number')->value('value') ?: '+91 94473 65545';
    }

    public function startEditingWhatsApp(): void
    {
        $this->tempWhatsAppNumber = $this->orderWhatsAppNumber;
        $this->isEditingWhatsApp = true;
    }

    public function cancelEditingWhatsApp(): void
    {
        $this->isEditingWhatsApp = false;
        $this->tempWhatsAppNumber = '';
    }

    public function saveOrderWhatsAppNumber(): void
    {
        $this->validate([
            'tempWhatsAppNumber' => 'required|string|min:8',
        ]);

        $this->orderWhatsAppNumber = trim($this->tempWhatsAppNumber);
        Setting::updateOrCreate(
            ['key' => 'order_whatsapp_number'],
            ['value' => $this->orderWhatsAppNumber]
        );

        $this->isEditingWhatsApp = false;
        session()->flash('success', "Order fulfillment WhatsApp number updated to {$this->orderWhatsAppNumber}!");
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatusFilter(): void
    {
        $this->resetPage();
    }

    public function updatingPaymentMethodFilter(): void
    {
        $this->resetPage();
    }

    public function viewDetails(int $orderId): void
    {
        $this->selectedOrder = Order::with('items')->findOrFail($orderId);
        $this->isDetailsOpen = true;
    }

    public function closeDetails(): void
    {
        $this->isDetailsOpen = false;
        $this->selectedOrder = null;
    }

    public function updateStatus(int $orderId, string $status): void
    {
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        $order->save();
        
        session()->flash('success', "Order {$order->order_number} status updated to " . ucfirst($status) . "!");
        
        if ($this->selectedOrder && $this->selectedOrder->id === $orderId) {
            $this->selectedOrder = Order::with('items')->findOrFail($orderId);
        }
    }

    public function getWhatsAppFulfillmentUrl(Order $order): string
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $this->orderWhatsAppNumber);
        if (strlen($cleanPhone) === 10) {
            $cleanPhone = '91' . $cleanPhone;
        }

        $msg = "📦 *NEW YUVANN ORDER FOR DISPATCH*\n";
        $msg .= "----------------------------------------\n";
        $msg .= "🆔 *Order ID:* {$order->order_number}\n";
        $msg .= "📅 *Date:* " . $order->created_at->format('d-M-Y H:i') . "\n";
        $msg .= "👤 *Customer:* {$order->customer_name}\n";
        $msg .= "📱 *Customer Phone:* {$order->customer_phone}\n";
        if ($order->customer_email) {
            $msg .= "✉️ *Email:* {$order->customer_email}\n";
        }
        $msg .= "\n📍 *Delivery Address:*\n{$order->shipping_address}\n\n";

        $paymentType = ($order->payment_method === 'whatsapp') ? 'WhatsApp Order' : 'Razorpay Online';
        $msg .= "💳 *Payment:* {$paymentType}\n";
        if ($order->razorpay_payment_id) {
            $msg .= "🔑 *Payment ID:* {$order->razorpay_payment_id}\n";
        }
        $msg .= "⚡ *Status:* " . strtoupper($order->status) . "\n\n";

        $msg .= "🛍️ *Items to Pack:*\n";
        if ($order->items && $order->items->count() > 0) {
            foreach ($order->items as $idx => $item) {
                $num = $idx + 1;
                $unit = $item->unit_size ? " ({$item->unit_size})" : "";
                $subtotal = number_format($item->price * $item->quantity, 2);
                $msg .= "{$num}. {$item->product_name}{$unit} x {$item->quantity} = ₹{$subtotal}\n";
            }
        } else {
            $msg .= "• Items recorded in admin system\n";
        }

        if ($order->shipping_amount > 0) {
            $msg .= "\n🚚 *Shipping:* ₹" . number_format($order->shipping_amount, 2);
        }
        $msg .= "\n💵 *Total Amount:* ₹" . number_format($order->total_amount, 2) . "\n";

        if ($order->notes) {
            $msg .= "\n📝 *Customer Note:*\n{$order->notes}\n";
        }
        $msg .= "----------------------------------------\n";
        $msg .= "Please pack and arrange dispatch!";

        return "https://wa.me/{$cleanPhone}?text=" . urlencode($msg);
    }

    public function render()
    {
        $orders = Order::query()
            ->with('items')
            ->when(!empty($this->search), function($q) {
                $q->where('order_number', 'like', '%' . $this->search . '%')
                  ->orWhere('customer_name', 'like', '%' . $this->search . '%')
                  ->orWhere('customer_phone', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->statusFilter), function($q) {
                $q->where('status', $this->statusFilter);
            })
            ->when(!empty($this->paymentMethodFilter), function($q) {
                $q->where('payment_method', $this->paymentMethodFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.order-list', [
            'orders' => $orders,
            'orderWhatsAppNumber' => $this->orderWhatsAppNumber,
            'isEditingWhatsApp' => $this->isEditingWhatsApp,
            'tempWhatsAppNumber' => $this->tempWhatsAppNumber,
        ])->layout('components.layouts.admin', ['header' => 'Order Management']);
    }
}
