<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Component;

class MiniCart extends Component
{
    public bool $isOpen = false;

    protected $listeners = ['cart-updated' => '$refresh'];

    public function toggleCart(): void
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeCart(): void
    {
        $this->isOpen = false;
    }

    public function incrementQuantity(int $productId): void
    {
        $items = CartService::getItems();
        if (isset($items[$productId])) {
            CartService::update($productId, $items[$productId]['quantity'] + 1);
            $this->dispatch('cart-updated');
        }
    }

    public function decrementQuantity(int $productId): void
    {
        $items = CartService::getItems();
        if (isset($items[$productId])) {
            $newQty = $items[$productId]['quantity'] - 1;
            CartService::update($productId, $newQty);
            $this->dispatch('cart-updated');
        }
    }

    public function removeItem(int $productId): void
    {
        CartService::remove($productId);
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.mini-cart', [
            'cartItems' => CartService::getItems(),
            'totalQuantity' => CartService::getTotalQuantity(),
            'subtotal' => CartService::getSubtotal(),
        ]);
    }
}
