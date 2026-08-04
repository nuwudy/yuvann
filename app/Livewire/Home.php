<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class Home extends Component
{
    public function addToCart(int $productId): void
    {
        $product = Product::find($productId);
        if ($product && $product->in_stock) {
            CartService::add($product);
            $this->dispatch('cart-updated');
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => "{$product->name} added to cart!",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.home', [
            'featuredProducts' => Product::where('is_active', true)->where('is_featured', true)->get(),
            'categories' => Category::where('is_active', true)->get(),
        ])->layout('components.layouts.app');
    }
}
