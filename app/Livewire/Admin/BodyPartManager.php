<?php

namespace App\Livewire\Admin;

use App\Models\BodyPart;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BodyPartManager extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public bool $isFormOpen = false;
    public ?int $bodyPartId = null;

    // Form fields
    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public int $sort_order = 0;
    public bool $is_active = true;

    // Image fields
    public $body_part_image = null;         // new upload (Livewire temp file)
    public ?string $existing_image = null;  // path/URL of current saved image

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected array $rules = [
        'name'            => 'required|string|max:100',
        'slug'            => 'required|string|max:100|unique:body_parts,slug',
        'description'     => 'nullable|string|max:500',
        'sort_order'      => 'integer|min:0',
        'is_active'       => 'boolean',
        'body_part_image' => 'nullable|image|mimes:jpeg,png,gif,webp,svg|max:5120',
    ];

    public function updatedName($value): void
    {
        if (empty($this->bodyPartId)) {
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
        $bodyPart = BodyPart::findOrFail($id);

        $this->bodyPartId     = $bodyPart->id;
        $this->name           = $bodyPart->name;
        $this->slug           = $bodyPart->slug;
        $this->description    = $bodyPart->description ?? '';
        $this->sort_order     = $bodyPart->sort_order ?? 0;
        $this->is_active      = $bodyPart->is_active;
        $this->existing_image = $bodyPart->image;

        $this->isFormOpen = true;
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'slug', 'description', 'sort_order', 'is_active', 'bodyPartId', 'body_part_image', 'existing_image']);
        $this->is_active = true;
        $this->sort_order = 0;
        $this->resetErrorBag();
    }

    public function closeForm(): void
    {
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function saveBodyPart()
    {
        $rules = $this->rules;
        if ($this->bodyPartId) {
            $rules['slug'] = 'required|string|max:100|unique:body_parts,slug,' . $this->bodyPartId;
        }

        $this->validate($rules);

        // Resolve image path
        $imagePath = $this->existing_image;
        if ($this->body_part_image) {
            $imagePath = $this->body_part_image->store('body-parts', 'public');
        }

        BodyPart::updateOrCreate(
            ['id' => $this->bodyPartId],
            [
                'name'        => $this->name,
                'slug'        => $this->slug,
                'description' => $this->description ?: null,
                'sort_order'  => $this->sort_order ?: 0,
                'is_active'   => $this->is_active,
                'image'       => $imagePath,
            ]
        );

        session()->flash('success', $this->bodyPartId ? 'Body part updated successfully!' : 'Body part created successfully!');
        $this->closeForm();
    }

    public function deleteBodyPart(int $id): void
    {
        $bodyPart = BodyPart::findOrFail($id);
        $bodyPart->delete();
        session()->flash('success', 'Body part deleted successfully!');
    }

    public function toggleStatus(int $id): void
    {
        $bodyPart = BodyPart::findOrFail($id);
        $bodyPart->is_active = !$bodyPart->is_active;
        $bodyPart->save();
    }

    public function render()
    {
        $bodyParts = BodyPart::query()
            ->when(!empty($this->search), function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->paginate(15);

        return view('livewire.admin.body-part-manager', [
            'bodyParts' => $bodyParts,
        ])->layout('components.layouts.admin', ['header' => 'Targeted Body Care']);
    }
}
