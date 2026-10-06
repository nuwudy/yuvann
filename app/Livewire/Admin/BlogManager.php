<?php

namespace App\Livewire\Admin;

use App\Models\BlogPost;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BlogManager extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public string $categoryFilter = '';
    public string $statusFilter = '';

    public bool $isFormOpen = false;
    public ?int $postId = null;

    // Common article metadata
    public string $slug = '';
    public string $category = 'Wellness Tips';
    public string $author_name = 'Dr. Sajeev Dev';
    public string $author_title = 'Chief Ayurvedic Consultant';
    public string $read_time = '5 min read';
    public string $status = 'published'; // 'published' | 'draft' | 'archived'
    public ?string $published_at = null;

    // Active Multilingual Editor Tab
    public string $activeLocaleTab = 'en'; // 'en' | 'ml' | 'hi' | 'ta'

    // Multilingual Translations Form State
    public array $translations = [
        'en' => [
            'title' => '',
            'excerpt' => '',
            'content' => '',
            'audio_url' => '',
            'meta_title' => '',
            'meta_description' => '',
        ],
        'ml' => [
            'title' => '',
            'excerpt' => '',
            'content' => '',
            'audio_url' => '',
            'meta_title' => '',
            'meta_description' => '',
        ],
        'hi' => [
            'title' => '',
            'excerpt' => '',
            'content' => '',
            'audio_url' => '',
            'meta_title' => '',
            'meta_description' => '',
        ],
        'ta' => [
            'title' => '',
            'excerpt' => '',
            'content' => '',
            'audio_url' => '',
            'meta_title' => '',
            'meta_description' => '',
        ],
    ];

    // Image fields
    public $featured_image = null;
    public ?string $existing_featured_image = null;
    public string $image_url = '';

    // Linked Products
    public array $product_ids = [];
    public string $productSearch = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryFilter' => ['except' => ''],
    ];

    public function updatedTranslationsEnTitle($value): void
    {
        if (empty($this->postId) && empty($this->slug)) {
            $this->slug = Str::slug($value);
        }
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->published_at = now()->format('Y-m-d\TH:i');
        $this->isFormOpen = true;
    }

    public function openEditForm(int $id): void
    {
        $this->resetForm();
        $post = BlogPost::with('products')->findOrFail($id);

        $this->postId = $post->id;
        $this->slug = $post->slug;
        $this->category = $post->category;
        $this->author_name = $post->author_name;
        $this->author_title = $post->author_title ?? 'Chief Ayurvedic Consultant';
        $this->read_time = $post->read_time ?? '5 min read';
        $this->status = $post->status ?: ($post->is_published ? 'published' : 'draft');
        $this->published_at = $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : null;

        // Structured Translations Mapping
        $existingTrans = $post->translations ?? [];
        foreach (['en', 'ml', 'hi', 'ta'] as $loc) {
            if (!empty($existingTrans[$loc])) {
                $this->translations[$loc] = array_merge([
                    'title' => '',
                    'excerpt' => '',
                    'content' => '',
                    'audio_url' => '',
                    'meta_title' => '',
                    'meta_description' => '',
                ], $existingTrans[$loc]);
            } else {
                $this->translations[$loc] = [
                    'title' => $loc === 'en' ? ($post->title ?? '') : '',
                    'excerpt' => $loc === 'en' ? ($post->excerpt ?? '') : '',
                    'content' => $loc === 'en' ? ($post->content ?? '') : '',
                    'audio_url' => '',
                    'meta_title' => $loc === 'en' ? ($post->meta_title ?? '') : '',
                    'meta_description' => $loc === 'en' ? ($post->meta_description ?? '') : '',
                ];
            }
        }

        // If English is empty but legacy columns have content
        if (empty($this->translations['en']['title']) && !empty($post->title)) {
            $this->translations['en']['title'] = $post->title;
            $this->translations['en']['excerpt'] = $post->excerpt ?? '';
            $this->translations['en']['content'] = $post->content ?? '';
            $this->translations['en']['meta_title'] = $post->meta_title ?? '';
            $this->translations['en']['meta_description'] = $post->meta_description ?? '';
        }

        $this->existing_featured_image = $post->featured_image;
        if ($post->featured_image && (str_starts_with($post->featured_image, 'http://') || str_starts_with($post->featured_image, 'https://'))) {
            $this->image_url = $post->featured_image;
        }

        $this->product_ids = $post->products->pluck('id')->toArray();
        $this->activeLocaleTab = 'en';
        $this->isFormOpen = true;
    }

    public function resetForm(): void
    {
        $this->reset([
            'postId',
            'slug',
            'category',
            'author_name',
            'author_title',
            'read_time',
            'status',
            'published_at',
            'featured_image',
            'existing_featured_image',
            'image_url',
            'product_ids',
            'productSearch',
            'activeLocaleTab',
        ]);

        $this->translations = [
            'en' => ['title' => '', 'excerpt' => '', 'content' => '', 'audio_url' => '', 'meta_title' => '', 'meta_description' => ''],
            'ml' => ['title' => '', 'excerpt' => '', 'content' => '', 'audio_url' => '', 'meta_title' => '', 'meta_description' => ''],
            'hi' => ['title' => '', 'excerpt' => '', 'content' => '', 'audio_url' => '', 'meta_title' => '', 'meta_description' => ''],
            'ta' => ['title' => '', 'excerpt' => '', 'content' => '', 'audio_url' => '', 'meta_title' => '', 'meta_description' => ''],
        ];

        $this->category = 'Wellness Tips';
        $this->author_name = 'Dr. Sajeev Dev';
        $this->author_title = 'Chief Ayurvedic Consultant';
        $this->read_time = '5 min read';
        $this->status = 'published';
        $this->resetErrorBag();
    }

    public function closeForm(): void
    {
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function togglePublish(int $id): void
    {
        $post = BlogPost::findOrFail($id);
        $newStatus = $post->status === 'published' ? 'draft' : 'published';
        $post->status = $newStatus;
        $post->is_published = ($newStatus === 'published');
        if ($post->is_published && !$post->published_at) {
            $post->published_at = now();
        }
        $post->save();

        session()->flash('success', 'Article status updated to ' . ucfirst($newStatus) . '.');
    }

    public function delete(int $id): void
    {
        $post = BlogPost::findOrFail($id);
        $post->products()->detach();

        if ($post->featured_image && !str_starts_with($post->featured_image, 'http')) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        session()->flash('success', 'Article deleted successfully.');
    }

    public function toggleProduct(int $productId): void
    {
        if (in_array($productId, $this->product_ids)) {
            $this->product_ids = array_diff($this->product_ids, [$productId]);
        } else {
            $this->product_ids[] = $productId;
        }
    }

    public function setLocaleTab(string $locale): void
    {
        if (in_array($locale, ['en', 'ml', 'hi', 'ta'])) {
            $this->activeLocaleTab = $locale;
        }
    }

    public function hasLocaleContent(string $locale): bool
    {
        return !empty($this->translations[$locale]['title']) || !empty($this->translations[$locale]['content']);
    }

    public function save(): void
    {
        $this->validate([
            'translations.en.title' => 'required|string|max:255',
            'translations.en.content' => 'required|string',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . ($this->postId ?? 'NULL'),
            'category' => 'required|string|max:100',
            'author_name' => 'required|string|max:100',
            'author_title' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'status' => 'required|in:published,draft,archived',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|max:10240',
            'image_url' => 'nullable|url|max:500',
        ], [
            'translations.en.title.required' => 'English Article Title is required.',
            'translations.en.content.required' => 'English Article Content is required.',
        ]);

        $finalImagePath = $this->existing_featured_image;

        if ($this->featured_image) {
            $imageService = app(ImageService::class);
            $finalImagePath = $imageService->storeAsWebP($this->featured_image, 'blog');
        } elseif (!empty($this->image_url)) {
            $finalImagePath = $this->image_url;
        }

        // Clean translations array: preserve filled locales
        $cleanTranslations = [];
        foreach (['en', 'ml', 'hi', 'ta'] as $loc) {
            $t = $this->translations[$loc];
            if (!empty($t['title']) || !empty($t['content']) || $loc === 'en') {
                $cleanTranslations[$loc] = [
                    'locale' => $loc,
                    'title' => trim($t['title'] ?? ''),
                    'excerpt' => trim($t['excerpt'] ?? ''),
                    'content' => trim($t['content'] ?? ''),
                    'audio_url' => trim($t['audio_url'] ?? '') ?: null,
                    'meta_title' => trim($t['meta_title'] ?? '') ?: trim($t['title'] ?? ''),
                    'meta_description' => trim($t['meta_description'] ?? '') ?: Str::limit(strip_tags($t['excerpt'] ?? $t['content'] ?? ''), 160),
                ];
            }
        }

        $isPublished = ($this->status === 'published');
        $primary = $cleanTranslations['en'] ?? reset($cleanTranslations);

        $post = BlogPost::updateOrCreate(
            ['id' => $this->postId],
            [
                'title' => $primary['title'] ?? 'Untitled Article',
                'slug' => Str::slug($this->slug),
                'category' => $this->category,
                'author_name' => $this->author_name,
                'author_title' => $this->author_title,
                'read_time' => $this->read_time ?: '5 min read',
                'excerpt' => $primary['excerpt'] ?? '',
                'content' => $primary['content'] ?? '',
                'translations' => $cleanTranslations,
                'status' => $this->status,
                'is_published' => $isPublished,
                'published_at' => $this->published_at ? $this->published_at : ($isPublished ? now() : null),
                'meta_title' => $primary['meta_title'] ?? $primary['title'],
                'meta_description' => $primary['meta_description'] ?? Str::limit(strip_tags($primary['excerpt'] ?? $primary['content']), 160),
                'featured_image' => $finalImagePath,
            ]
        );

        // Sync linked products
        $post->products()->sync($this->product_ids);

        $this->closeForm();
        session()->flash('success', $this->postId ? 'Article updated with multilingual content successfully!' : 'Article published successfully!');
    }

    public function render()
    {
        $categories = BlogPost::select('category')->distinct()->pluck('category')->filter()->values();

        $query = BlogPost::with(['products'])->withCount('products');

        if (!empty($this->search)) {
            $s = '%' . $this->search . '%';
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', $s)
                  ->orWhere('excerpt', 'like', $s)
                  ->orWhere('category', 'like', $s)
                  ->orWhere('author_name', 'like', $s);
            });
        }

        if (!empty($this->categoryFilter)) {
            $query->where('category', $this->categoryFilter);
        }

        if ($this->statusFilter === 'published') {
            $query->where(function ($q) {
                $q->where('status', 'published')->orWhere('is_published', true);
            });
        } elseif ($this->statusFilter === 'draft') {
            $query->where(function ($q) {
                $q->where('status', 'draft')->orWhere('is_published', false);
            });
        } elseif ($this->statusFilter === 'archived') {
            $query->where('status', 'archived');
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(10);

        // Products for selection
        $availableProducts = Product::where('is_active', true)
            ->when(!empty($this->productSearch), function ($q) {
                $q->where('name', 'like', '%' . $this->productSearch . '%');
            })
            ->orderBy('name')
            ->get();

        return view('livewire.admin.blog-manager', [
            'posts' => $posts,
            'categories' => $categories,
            'availableProducts' => $availableProducts,
            'search' => $this->search,
            'categoryFilter' => $this->categoryFilter,
            'statusFilter' => $this->statusFilter,
        ])->layout('components.layouts.admin', ['header' => 'Blog & Multilingual Guides']);
    }
}
