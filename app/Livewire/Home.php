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
        $cardColumns = [
            'id', 'name', 'slug', 'short_description', 'price', 'sale_price', 'sku',
            'stock_quantity', 'unit_size', 'badge', 'featured_image',
            'is_active', 'is_featured', 'featured_order', 'is_free_shipping',
            'created_at', 'shop_id'
        ];

        // 1. Curated "Hand-Picked" & Ticker Products (Top 10-12 priority/featured)
        $featured = Product::select($cardColumns)
            ->with([
                'categories:id,name,slug',
                'variants:id,product_id,unit_size,price,sale_price,sku,stock_quantity,is_active',
            ])
            ->where('is_active', true)
            ->where(function ($q) {
                $q->where('is_featured', true)
                  ->orWhere('featured_order', '>', 0);
            })
            ->orderByRaw('CASE WHEN featured_order IS NOT NULL AND featured_order > 0 THEN 0 ELSE 1 END')
            ->orderBy('featured_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        if ($featured->isEmpty()) {
            $featured = Product::select($cardColumns)
                ->with([
                    'categories:id,name,slug',
                    'variants:id,product_id,unit_size,price,sale_price,sku,stock_quantity,is_active',
                ])
                ->where('is_active', true)
                ->latest('id')
                ->take(12)
                ->get();
        }

        // 2. True "Latest Arrivals" — Newly created additions first!
        $latest = Product::select($cardColumns)
            ->with([
                'categories:id,name,slug',
                'variants:id,product_id,unit_size,price,sale_price,sku,stock_quantity,is_active',
            ])
            ->where('is_active', true)
            ->latest('id')
            ->take(10)
            ->get();

        // 3. Trending Products — Fast random selection
        $trending = Product::select($cardColumns)
            ->with([
                'categories:id,name,slug',
                'variants:id,product_id,unit_size,price,sale_price,sku,stock_quantity,is_active',
            ])
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(8)
            ->get();

        return view('livewire.home', [
            'featuredProducts' => $featured,
            'trendingProducts' => $trending,
            'latestProducts'   => $latest,
            'bodyParts'        => BodyPart::where('is_active', true)->orderBy('sort_order', 'asc')->get(),
            'categories'       => Category::where('is_active', true)->get(),
            'shops'            => \App\Models\Shop::where('is_active', true)->get(),
            'latestPosts'      => BlogPost::published()->with('products')->latest('published_at')->take(3)->get(),
        ])->layout('components.layouts.app');
    }
}
