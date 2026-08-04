<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;
    public int $quantity = 1;

    public function mount(string $slug): void
    {
        $this->product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
    }

    public function incrementQty(): void
    {
        if ($this->quantity < $this->product->stock_quantity) {
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
        if ($this->product->in_stock) {
            CartService::add($this->product, $this->quantity);
            $this->dispatch('cart-updated');
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => "{$this->quantity} x {$this->product->name} added to cart!",
            ]);
        }
    }

    public function render()
    {
        // Decode description JSON if it's stored as JSON string
        $details = is_string($this->product->description) 
            ? json_decode($this->product->description, true) 
            : $this->product->description;

        return view('livewire.product-detail', [
            'details' => $details ?? [],
        ])->layout('components.layouts.app');
    }
}
