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

    public function incrementQuantity(string $cartId): void
    {
        $items = CartService::getItems();
        if (isset($items[$cartId])) {
            CartService::update($cartId, $items[$cartId]['quantity'] + 1);
            $this->dispatch('cart-updated');
        }
    }

    public function decrementQuantity(string $cartId): void
    {
        $items = CartService::getItems();
        if (isset($items[$cartId])) {
            $newQty = $items[$cartId]['quantity'] - 1;
            CartService::update($cartId, $newQty);
            $this->dispatch('cart-updated');
        }
    }

    public function removeItem(string $cartId): void
    {
        CartService::remove($cartId);
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.mini-cart', [
            'cartItems' => CartService::getItems(),
            'totalQuantity' => CartService::getTotalQuantity(),
            'subtotal' => CartService::getSubtotal(),
            'whatsappCartUrl' => CartService::getWhatsAppOrderUrl(),
        ]);
    }
}
