<?php

namespace App\Livewire;

use App\Models\BlogPost;
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
            $this->dispatch('open-cart');
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => "{$product->name} added to cart!",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.home', [
            'featuredProducts' => Product::where('is_active', true)->whereNotNull('featured_order')->orderBy('featured_order', 'asc')->get(),
            'trendingProducts' => Product::where('is_active', true)->inRandomOrder()->take(8)->get(),
            'latestProducts' => Product::where('is_active', true)->orderBy('created_at', 'desc')->take(8)->get(),
            'categories' => Category::where('is_active', true)->get(),
            'shops' => \App\Models\Shop::where('is_active', true)->get(),
            'latestPosts' => BlogPost::published()->with('products')->latest('published_at')->take(3)->get(),
        ])->layout('components.layouts.app');
    }
}
