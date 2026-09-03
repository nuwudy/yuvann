<?php

namespace App\Livewire;

use App\Models\BlogPost;
use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class BlogDetail extends Component
{
    public BlogPost $post;

    public function mount(string $slug): void
    {
        $this->post = BlogPost::published()
            ->with(['products.variants'])
            ->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Add an introduced product directly to cart from the article.
     */
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
        // Related articles: same category first, or recent
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $this->post->id)
            ->where('category', $this->post->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedPosts->count() < 3) {
            $extra = BlogPost::published()
                ->where('id', '!=', $this->post->id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($extra);
        }

        return view('livewire.blog-detail', [
            'post' => $this->post,
            'relatedPosts' => $relatedPosts,
        ])->layout('components.layouts.app', [
            'title' => ($this->post->meta_title ?: $this->post->title) . ' | Yuvann Wellness',
            'metaDescription' => $this->post->meta_description ?: $this->post->excerpt,
            'metaImage' => $this->post->featured_image_url,
        ]);
    }
}
