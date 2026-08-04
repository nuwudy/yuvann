<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoryManager extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public bool $isFormOpen = false;
    public ?int $categoryId = null;

    // Form fields
    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public bool $is_active = true;

    // Image fields
    public $category_image = null;          // new upload (Livewire temp file)
    public ?string $existing_image = null;  // path/URL of current saved image

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected array $rules = [
        'name'           => 'required|string|max:100',
        'slug'           => 'required|string|max:100|unique:categories,slug',
        'description'    => 'nullable|string|max:500',
        'is_active'      => 'boolean',
        'category_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
    ];

    public function updatedName($value): void
    {
        if (empty($this->categoryId)) {
            $this->slug = Str::slug($value);
        }
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->isFormOpen = true;
    }

    public function openEditForm(int $id): void
    {
        $this->resetForm();
        $category = Category::findOrFail($id);

        $this->categoryId     = $category->id;
        $this->name           = $category->name;
        $this->slug           = $category->slug;
        $this->description    = $category->description ?? '';
        $this->is_active      = $category->is_active;
        $this->existing_image = $category->image;

        $this->isFormOpen = true;
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'slug', 'description', 'is_active', 'categoryId', 'category_image', 'existing_image']);
        $this->is_active = true;
        $this->resetErrorBag();
    }

    public function closeForm(): void
    {
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function saveCategory()
    {
        $rules = $this->rules;
        if ($this->categoryId) {
            $rules['slug'] = 'required|string|max:100|unique:categories,slug,' . $this->categoryId;
        }

        $this->validate($rules);

        // Resolve image path
        $imagePath = $this->existing_image; // keep existing unless changed or cleared
        if ($this->category_image) {
            $imagePath = $this->category_image->store('categories', 'public');
        }

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name'        => $this->name,
                'slug'        => $this->slug,
                'description' => $this->description ?: null,
                'is_active'   => $this->is_active,
                'image'       => $imagePath,
            ]
        );

        session()->flash('success', $this->categoryId ? 'Category updated successfully!' : 'Category created successfully!');
        $this->closeForm();
    }

    public function deleteCategory(int $id): void
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('success', 'Category deleted successfully!');
    }

    public function toggleStatus(int $id): void
    {
        $category = Category::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();
    }

    public function render()
    {
        $categories = Category::query()
            ->when(!empty($this->search), function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('livewire.admin.category-manager', [
            'categories' => $categories,
        ])->layout('components.layouts.admin', ['header' => 'Category Management']);
    }
}
