<?php

namespace App\Livewire;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use App\Services\ProductSearchService;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $category = '';
    public string $body_part = '';
    public float $maxPrice = 10000;
    public string $sort = 'latest';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'body_part' => ['except' => ''],
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

    public function updatingBodyPart(): void
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
        $this->reset(['search', 'category', 'body_part', 'maxPrice', 'sort']);
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
        $query = Product::with(['categories', 'reviews', 'bodyParts', 'variants'])->where('is_active', true);

        // Smart, Typo-Tolerant Search Filter (Includes phonetic transliteration & fuzzy Levenshtein)
        if (!empty($this->search)) {
            ProductSearchService::apply($query, $this->search);
        }

        // Category Filter
        if (!empty($this->category)) {
            $query->whereHas('categories', function($q) {
                $q->where('slug', $this->category);
            });
        }

        // Targeted Body Care Filter
        if (!empty($this->body_part)) {
            $query->whereHas('bodyParts', function($q) {
                $q->where('slug', $this->body_part);
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

        // Sorting: When search query is active and sort is 'latest', retain relevance rank
        if (!empty($this->search) && $this->sort === 'latest') {
            // Already ordered by search relevance!
        } else {
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
        }

        return view('livewire.product-list', [
            'products' => $query->paginate(9),
            'categories' => Category::where('is_active', true)->get(),
            'bodyParts' => BodyPart::where('is_active', true)->orderBy('sort_order', 'asc')->get(),
        ])->layout('components.layouts.app');
    }
}
