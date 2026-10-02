<?php

namespace App\Livewire;

use App\Models\BlogPost;
use App\Models\BodyPart;
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
        $allActiveProducts = Product::with(['categories', 'reviews'])
            ->where('is_active', true)
            ->get();

        return view('livewire.home', [
            'featuredProducts' => $allActiveProducts->filter(fn($p) => $p->featured_order !== null)->sortBy('featured_order')->values(),
            'trendingProducts' => $allActiveProducts->shuffle()->take(8)->values(),
            'latestProducts'   => $allActiveProducts->sortByDesc('created_at')->take(8)->values(),
            'bodyParts'        => BodyPart::where('is_active', true)->orderBy('sort_order', 'asc')->get(),
            'categories'       => Category::where('is_active', true)->get(),
            'shops'            => \App\Models\Shop::where('is_active', true)->get(),
            'latestPosts'      => BlogPost::published()->with('products')->latest('published_at')->take(3)->get(),
        ])->layout('components.layouts.app');
    }
}
