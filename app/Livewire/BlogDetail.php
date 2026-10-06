<?php

namespace App\Livewire;

use App\Models\BlogPost;
use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class BlogDetail extends Component
{
    public BlogPost $post;
    public string $defaultLocale = 'en';

    public function mount(string $slug): void
    {
        $this->post = BlogPost::published()
            ->with(['products.variants'])
            ->where('slug', $slug)
            ->firstOrFail();

        $available = $this->post->getAvailableLocales();
        $requested = request()->query('lang');
        if ($requested && in_array($requested, $available)) {
            $this->defaultLocale = $requested;
        } else {
            $this->defaultLocale = in_array('en', $available) ? 'en' : ($available[0] ?? 'en');
        }
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

        $availableLocales = $this->post->getAvailableLocales();
        
        // Structured translations payload with complete fallback
        $translations = $this->post->translations ?? [];
        if (empty($translations['en'])) {
            $translations['en'] = [
                'locale' => 'en',
                'title' => $this->post->title,
                'excerpt' => $this->post->excerpt,
                'content' => $this->post->content,
                'audio_url' => null,
                'meta_title' => $this->post->meta_title,
                'meta_description' => $this->post->meta_description,
            ];
        }

        return view('livewire.blog-detail', [
            'post' => $this->post,
            'relatedPosts' => $relatedPosts,
            'availableLocales' => $availableLocales,
            'defaultLocale' => $this->defaultLocale,
            'translations' => $translations,
        ])->layout('components.layouts.app', [
            'title' => ($this->post->meta_title ?: $this->post->title) . ' | Yuvann Wellness',
            'metaDescription' => $this->post->meta_description ?: $this->post->excerpt,
            'metaImage' => $this->post->featured_image_url,
        ]);
    }
}
