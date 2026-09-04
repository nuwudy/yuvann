<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class BookLanding extends Component
{
    public ?Product $product = null;
    public int $quantity = 1;
    public string $activeImage = 'https://yuvann.com/storage/products/4859c2b9-6c8e-4058-ac9f-17d1b1217386.webp';

    public function mount(): void
    {
        $this->product = Product::where('slug', 'you-are-money-a-secret-guide-to-financial-freedom-by-dr-sajeev-dev')
            ->first();

        if ($this->product && $this->product->featured_image_url) {
            $this->activeImage = $this->product->featured_image_url;
        }
    }

    public function selectImage(string $imgUrl): void
    {
        $this->activeImage = $imgUrl;
    }

    public function incrementQty(): void
    {
        if ($this->quantity < 20) {
            $this->quantity++;
        }
    }

    public function decrementQty(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart(): void
    {
        if (!$this->product) {
            $this->dispatch('notify', message: 'Product is currently being updated. Please order via WhatsApp!');
            return;
        }

        $cart = app(CartService::class);
        $cart->add($this->product, $this->quantity);

        $this->dispatch('cart-updated');
        $this->dispatch('open-cart');
        $this->dispatch('notify', message: "{$this->product->name} (x{$this->quantity}) added to cart!");
    }

    public function buyNow()
    {
        if (!$this->product) {
            return redirect('https://wa.me/917736609299?text=' . urlencode('Hello Dr. Sajeev Dev, I would like to order the book *You Are Money: A Secret Guide to Financial Freedom* (₹400). Please share payment and shipping details.'));
        }

        $cart = app(CartService::class);
        $cart->add($this->product, $this->quantity);
        $this->dispatch('cart-updated');

        return redirect('/checkout');
    }

    public function render()
    {
        $price = $this->product ? $this->product->active_price : 400.00;
        $totalPrice = $price * $this->quantity;

        $waOrderText = "Hello Dr. Sajeev Dev, I would like to order {$this->quantity} x *You Are Money: A Secret Guide to Financial Freedom* (₹" . number_format($totalPrice, 2) . "). Please guide me with payment details and home delivery. Product: " . url('/you-are-money');

        return view('livewire.book-landing', [
            'price' => $price,
            'totalPrice' => $totalPrice,
            'waOrderUrl' => 'https://wa.me/917736609299?text=' . urlencode($waOrderText),
            'waOrderUrlAlt' => 'https://wa.me/919447365545?text=' . urlencode($waOrderText),
        ])->layout('components.layouts.app');
    }
}
