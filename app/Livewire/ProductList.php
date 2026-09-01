<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $category = '';
    public float $maxPrice = 10000;
    public string $sort = 'latest';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'maxPrice' => ['except' => 10000],
        'sort' => ['except' => 'latest'],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategory(): void
    {
        $this->resetPage();
    }

    public function updatingMaxPrice(): void
    {
        $this->resetPage();
    }

    public function updatingSort(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset(['search', 'category', 'maxPrice', 'sort']);
        $this->resetPage();
    }

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
        $query = Product::where('is_active', true);

        // Search Filter
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('short_description', 'like', '%' . $this->search . '%')
                  ->orWhere('sku', 'like', '%' . $this->search . '%');
            });
        }

        // Category Filter
        if (!empty($this->category)) {
            $query->whereHas('categories', function($q) {
                $q->where('slug', $this->category);
            });
        }

        // Price Filter (checks active price: sale_price if set, else regular price)
        $query->where(function($q) {
            $q->where(function($sub) {
                $sub->whereNotNull('sale_price')
                    ->where('sale_price', '<=', $this->maxPrice);
            })->orWhere(function($sub) {
                $sub->whereNull('sale_price')
                    ->where('price', '<=', $this->maxPrice);
            });
        });

        // Sorting
        switch ($this->sort) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(sale_price, price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(sale_price, price) DESC');
                break;
            case 'featured':
                $query->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        return view('livewire.product-list', [
            'products' => $query->paginate(6),
            'categories' => Category::where('is_active', true)->get(),
        ])->layout('components.layouts.app');
    }
}
