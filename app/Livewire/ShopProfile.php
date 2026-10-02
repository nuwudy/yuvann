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
        $this->products = $this->shop->products()->with(['categories', 'reviews', 'variants'])->where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.shop-profile')->layout('components.layouts.app', [
            'title' => $this->shop->name . ' | Yuvann - Rebalancing you',
        ]);
    }
}
