<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;

    public string $selectedCategory = 'all';
    public string $search = '';

    protected $queryString = [
        'selectedCategory' => ['except' => 'all', 'as' => 'category'],
        'search' => ['except' => ''],
    ];

    public function selectCategory(string $category): void
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = BlogPost::published()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();

        $query = BlogPost::published()->with('products');

        if ($this->selectedCategory !== 'all' && !empty($this->selectedCategory)) {
            $query->where('category', $this->selectedCategory);
        }

        if (!empty($this->search)) {
            $s = '%' . $this->search . '%';
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', $s)
                  ->orWhere('excerpt', 'like', $s)
                  ->orWhere('content', 'like', $s);
            });
        }

        // Highlight latest featured post if on first page and no search
        $featuredPost = null;
        if (empty($this->search) && $this->selectedCategory === 'all' && $this->getPage() == 1) {
            $featuredPost = BlogPost::published()->with('products')->latest('published_at')->first();
            if ($featuredPost) {
                $query->where('id', '!=', $featuredPost->id);
            }
        }

        $posts = $query->latest('published_at')->paginate(9);

        return view('livewire.blog-list', [
            'posts' => $posts,
            'featuredPost' => $featuredPost,
            'categories' => $categories,
            'selectedCategory' => $this->selectedCategory,
            'totalArticles' => BlogPost::published()->count(),
        ])->layout('components.layouts.app', [
            'title' => 'Wellness Journal & Ayurvedic Guides | Yuvann',
        ]);
    }
}
