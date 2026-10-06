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
        $allActiveProducts = Product::with(['categories', 'reviews', 'variants'])
            ->where('is_active', true)
            ->get();

        $prioritySorted = $allActiveProducts->sort(function ($a, $b) {
            $orderA = $a->featured_order !== null ? (int) $a->featured_order : PHP_INT_MAX;
            $orderB = $b->featured_order !== null ? (int) $b->featured_order : PHP_INT_MAX;
            if ($orderA !== $orderB) {
                return $orderA <=> $orderB;
            }
            return $b->created_at <=> $a->created_at;
        })->values();

        return view('livewire.home', [
            'featuredProducts' => $prioritySorted->filter(fn($p) => $p->featured_order !== null || $p->is_featured)->values(),
            'trendingProducts' => $allActiveProducts->shuffle()->take(8)->values(),
            'latestProducts'   => $prioritySorted->take(8)->values(),
            'bodyParts'        => BodyPart::where('is_active', true)->orderBy('sort_order', 'asc')->get(),
            'categories'       => Category::where('is_active', true)->get(),
            'shops'            => \App\Models\Shop::where('is_active', true)->get(),
            'latestPosts'      => BlogPost::published()->with('products')->latest('published_at')->take(3)->get(),
        ])->layout('components.layouts.app');
    }
}
