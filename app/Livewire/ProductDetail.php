<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;
    public int $quantity = 1;
    public ?int $selectedVariantId = null;

    public function mount(string $slug): void
    {
        $this->product = Product::with('variants')->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        if ($this->product->variants->isNotEmpty()) {
            $this->selectedVariantId = $this->product->variants->first()->id;
        }
    }

    public function incrementQty(): void
    {
        $stock = $this->getSelectedVariant() ? $this->getSelectedVariant()->stock_quantity : $this->product->stock_quantity;
        if ($this->quantity < $stock) {
            $this->quantity++;
        }
    }

    public function decrementQty(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart(): void
    {
        $variant = $this->getSelectedVariant();
        $inStock = $variant ? $variant->in_stock : $this->product->in_stock;

        if ($inStock) {
            CartService::add($this->product, $this->quantity, $variant);
            $this->dispatch('cart-updated');
            
            $sizeStr = $variant ? " ({$variant->unit_size})" : "";
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => "{$this->quantity} x {$this->product->name}{$sizeStr} added to cart!",
            ]);
        }
    }

    public function getSelectedVariant()
    {
        if (!$this->selectedVariantId) return null;
        return $this->product->variants->firstWhere('id', $this->selectedVariantId);
    }

    public string $reviewName = '';
    public int $reviewRating = 5;
    public string $reviewComment = '';

    public function submitReview(): void
    {
        $this->validate([
            'reviewName' => 'required|string|max:255',
            'reviewRating' => 'required|integer|min:1|max:5',
            'reviewComment' => 'nullable|string|max:1000',
        ]);

        $isApproved = $this->reviewRating >= 4;

        $this->product->reviews()->create([
            'customer_name' => $this->reviewName,
            'rating' => $this->reviewRating,
            'comment' => $this->reviewComment,
            'is_approved' => $isApproved,
        ]);

        $this->reset(['reviewName', 'reviewRating', 'reviewComment']);

        $message = $isApproved 
            ? 'Thank you! Your review has been published.' 
            : 'Thank you! Your review has been submitted and is pending approval.';

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => $message,
        ]);
    }

    public function render()
    {
        // Decode description JSON if it's stored as JSON string
        $details = is_string($this->product->description) 
            ? json_decode($this->product->description, true) 
            : $this->product->description;

        return view('livewire.product-detail', [
            'details' => $details ?? [],
        ])->layout('components.layouts.app');
    }
}
