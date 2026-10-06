<?php

namespace App\Livewire;

use App\Models\Shop;
use Livewire\Component;

class ShopProfile extends Component
{
    public $shop;
    public $products;

    public function mount($slug)
    {
        $this->shop = Shop::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $this->products = $this->shop->products()
            ->with(['categories', 'reviews', 'variants'])
            ->where('is_active', true)
            ->orderByRaw('CASE WHEN featured_order IS NOT NULL THEN 0 ELSE 1 END')
            ->orderBy('featured_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.shop-profile')->layout('components.layouts.app', [
            'title' => $this->shop->name . ' | Yuvann - Rebalancing you',
        ]);
    }
}
