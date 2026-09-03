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

    // Form fields
    public string $title = '';
    public string $slug = '';
    public string $category = 'Wellness Tips';
    public string $author_name = 'Dr. Sajeev Dev';
    public string $author_title = 'Chief Ayurvedic Consultant';
    public string $read_time = '5 min read';
    public string $excerpt = '';
    public string $content = '';
    public bool $is_published = true;
    public ?string $published_at = null;
    public string $meta_title = '';
    public string $meta_description = '';

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

    public function updatedTitle($value): void
    {
        if (empty($this->postId)) {
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
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->category = $post->category;
        $this->author_name = $post->author_name;
        $this->author_title = $post->author_title ?? 'Chief Ayurvedic Consultant';
        $this->read_time = $post->read_time ?? '5 min read';
        $this->excerpt = $post->excerpt ?? '';
        $this->content = $post->content;
        $this->is_published = (bool) $post->is_published;
        $this->published_at = $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : null;
        $this->meta_title = $post->meta_title ?? '';
        $this->meta_description = $post->meta_description ?? '';
        $this->existing_featured_image = $post->featured_image;
        if ($post->featured_image && (str_starts_with($post->featured_image, 'http://') || str_starts_with($post->featured_image, 'https://'))) {
            $this->image_url = $post->featured_image;
        }

        $this->product_ids = $post->products->pluck('id')->toArray();
        $this->isFormOpen = true;
    }

    public function resetForm(): void
    {
        $this->reset([
            'postId',
            'title',
            'slug',
            'category',
            'author_name',
            'author_title',
            'read_time',
            'excerpt',
            'content',
            'is_published',
            'published_at',
            'meta_title',
            'meta_description',
            'featured_image',
            'existing_featured_image',
            'image_url',
            'product_ids',
            'productSearch',
        ]);
        $this->category = 'Wellness Tips';
        $this->author_name = 'Dr. Sajeev Dev';
        $this->author_title = 'Chief Ayurvedic Consultant';
        $this->read_time = '5 min read';
        $this->is_published = true;
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
        $post->is_published = !$post->is_published;
        if ($post->is_published && !$post->published_at) {
            $post->published_at = now();
        }
        $post->save();

        session()->flash('success', 'Article status updated successfully.');
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

    public function save(): void
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . ($this->postId ?? 'NULL'),
            'category' => 'required|string|max:100',
            'author_name' => 'required|string|max:100',
            'author_title' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'excerpt' => 'nullable|string|max:600',
            'content' => 'required|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:10240',
            'image_url' => 'nullable|url|max:500',
        ]);

        $finalImagePath = $this->existing_featured_image;

        if ($this->featured_image) {
            $imageService = app(ImageService::class);
            $finalImagePath = $imageService->storeAsWebP($this->featured_image, 'blog');
        } elseif (!empty($this->image_url)) {
            $finalImagePath = $this->image_url;
        }

        $post = BlogPost::updateOrCreate(
            ['id' => $this->postId],
            [
                'title' => $this->title,
                'slug' => Str::slug($this->slug),
                'category' => $this->category,
                'author_name' => $this->author_name,
                'author_title' => $this->author_title,
                'read_time' => $this->read_time ?: '5 min read',
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'is_published' => $this->is_published,
                'published_at' => $this->published_at ? $this->published_at : ($this->is_published ? now() : null),
                'meta_title' => $this->meta_title ?: $this->title,
                'meta_description' => $this->meta_description ?: Str::limit(strip_tags($this->excerpt ?: $this->content), 160),
                'featured_image' => $finalImagePath,
            ]
        );

        // Sync linked products
        $post->products()->sync($this->product_ids);

        $this->closeForm();
        session()->flash('success', $this->postId ? 'Article updated successfully!' : 'Article created successfully!');
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
            $query->where('is_published', true);
        } elseif ($this->statusFilter === 'draft') {
            $query->where('is_published', false);
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
        ])->layout('components.layouts.admin', ['header' => 'Blog & Wellness Guides']);
    }
}
