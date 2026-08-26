<?php

namespace App\Livewire\Admin;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class ShopManager extends Component
{
    use WithPagination;

    public $showModal = false;
    public $shopId;
    public $name = '';
    public $slug = '';
    public $description = '';
    public $profile_pic = '';
    public $is_active = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:shops,slug',
        'description' => 'nullable|string',
        'profile_pic' => 'nullable|string',
        'is_active' => 'boolean',
    ];

    public function updatedName($value)
    {
        $this->slug = \Str::slug($value);
    }

    public function createShop()
    {
        $this->resetValidation();
        $this->reset(['shopId', 'name', 'slug', 'description', 'profile_pic', 'is_active']);
        $this->showModal = true;
    }

    public function editShop($id)
    {
        $this->resetValidation();
        $shop = Shop::findOrFail($id);
        $this->shopId = $shop->id;
        $this->name = $shop->name;
        $this->slug = $shop->slug;
        $this->description = $shop->description;
        $this->profile_pic = $shop->profile_pic;
        $this->is_active = $shop->is_active;
        $this->showModal = true;
    }

    public function saveShop()
    {
        $rules = $this->rules;
        if ($this->shopId) {
            $rules['slug'] = 'required|string|max:255|unique:shops,slug,' . $this->shopId;
        }

        $this->validate($rules);

        Shop::updateOrCreate(
            ['id' => $this->shopId],
            [
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'profile_pic' => $this->profile_pic,
                'is_active' => $this->is_active,
            ]
        );

        $this->showModal = false;
        $this->dispatch('notify', ['type' => 'success', 'message' => 'Shop saved successfully.']);
    }

    public function deleteShop($id)
    {
        Shop::findOrFail($id)->delete();
        $this->dispatch('notify', ['type' => 'success', 'message' => 'Shop deleted successfully.']);
    }

    public function render()
    {
        return view('livewire.admin.shop-manager', [
            'shops' => Shop::latest()->paginate(10)
        ])->layout('components.layouts.admin');
    }
}
