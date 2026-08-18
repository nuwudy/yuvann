<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\MediaItem;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductManager extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public string $categoryFilter = '';
    public bool $isFormOpen = false;
    public ?int $productId = null;

    // Variant Management
    public ?int $managingVariantsProductId = null;
    public string $managingVariantsProductName = '';
    public bool $isVariantFormOpen = false;
    public array $productVariants = [];

    // Form fields
    public array $category_ids = [];
    public string $name = '';
    public string $slug = '';
    public string $sku = '';
    public string $short_description = '';
    public float $price = 0.0;
    public ?float $sale_price = null;
    public int $stock_quantity = 0;
    public string $unit_size = '';
    public string $badge = '';
    public bool $is_active = true;
    public bool $is_featured = false;
    public ?int $featured_order = null;

    // Tabs content fields
    public string $benefits = '';
    public string $ingredients = '';
    public string $usage = '';

    // File Upload fields
    public $featured_image = null;
    public $new_gallery_images = [];
    public $product_video = null;

    // Existing files track
    public ?string $existing_featured_image = null;
    public array $existing_gallery_images = [];
    public ?string $existing_product_video = null;

    // ─── (picker state is now managed client-side in Alpine.js) ────────────

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryFilter' => ['except' => ''],
    ];

    public function updatedName($value): void
    {
        if (empty($this->productId)) {
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
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->category_ids = $product->categories->pluck('id')->toArray();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->sku = $product->sku;
        $this->short_description = $product->short_description ?? '';
        $this->price = (float) $product->price;
        $this->sale_price = $product->sale_price !== null ? (float) $product->sale_price : null;
        $this->stock_quantity = $product->stock_quantity;
        $this->unit_size = $product->unit_size;
        $this->badge = $product->badge ?? '';
        $this->is_active = $product->is_active;
        $this->is_featured = $product->is_featured;
        $this->featured_order = $product->featured_order;

        // Decode tab descriptions
        $desc = is_string($product->description) ? json_decode($product->description, true) : $product->description;
        $this->benefits = $desc['benefits'] ?? '';
        $this->ingredients = $desc['ingredients'] ?? '';
        $this->usage = $desc['usage'] ?? '';

        $this->existing_featured_image = $product->featured_image;
        $this->existing_gallery_images = $product->gallery_images ?? [];
        $this->existing_product_video = $product->product_video;

        $this->isFormOpen = true;
    }

    public function resetForm(): void
    {
        $this->reset([
            'productId', 'category_ids', 'name', 'slug', 'sku', 'short_description', 'price', 'sale_price',
            'stock_quantity', 'unit_size', 'badge', 'is_active', 'is_featured', 'featured_order',
            'benefits', 'ingredients', 'usage', 'featured_image', 'new_gallery_images',
            'existing_featured_image', 'existing_gallery_images',
            'product_video', 'existing_product_video',
        ]);
        $this->resetErrorBag();
    }

    public function closeForm(): void
    {
        $this->isFormOpen = false;
        $this->resetForm();
    }

    public function saveProduct()
    {
        $rules = [
            'category_ids' => 'required|array|min:1',
            'category_ids.*' => 'exists:categories,id',
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:products,slug,' . $this->productId,
            'sku' => 'required|string|max:50|unique:products,sku,' . $this->productId,
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'stock_quantity' => 'required|integer|min:0',
            'unit_size' => 'required|string|max:50',
            'badge' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'featured_order' => 'nullable|integer|min:1',
            'benefits' => 'required|string',
            'ingredients' => 'required|string',
            'usage' => 'required|string',
        ];

        // Featured image rule: required on create (unless picked from library), optional on edit
        // Accepts PNG/JPEG/GIF/WebP up to 5MB — will be converted to WebP 800x800
        if (empty($this->productId) && empty($this->existing_featured_image)) {
            $rules['featured_image'] = 'required|image|mimes:jpeg,png,gif,webp|max:5120';
        } else {
            $rules['featured_image'] = 'nullable|image|mimes:jpeg,png,gif,webp|max:5120';
        }
        $rules['new_gallery_images.*'] = 'image|mimes:jpeg,png,gif,webp|max:5120';

        // Product video: optional, max 50MB
        $rules['product_video'] = 'nullable|file|max:51200';

        $this->validate($rules);

        $imageService = new ImageService();

        // Upload featured image → convert to 800x800 WebP
        $featuredImagePath = $this->existing_featured_image;
        if ($this->featured_image) {
            $featuredImagePath = $imageService->storeAsWebP($this->featured_image, 'products');
            
            MediaItem::firstOrCreate(
                ['path' => $featuredImagePath],
                [
                    'name' => pathinfo($this->featured_image->getClientOriginalName(), PATHINFO_FILENAME),
                    'type' => 'image',
                    'mime_type' => Storage::disk('public')->mimeType($featuredImagePath) ?: 'image/webp',
                    'size' => Storage::disk('public')->size($featuredImagePath)
                ]
            );
        }

        // Upload gallery images → append new uploads to existing (additive)
        $galleryPaths = $this->existing_gallery_images;
        if (count($this->new_gallery_images) > 0) {
            foreach ($this->new_gallery_images as $gImg) {
                $gPath = $imageService->storeAsWebP($gImg, 'products');
                $galleryPaths[] = $gPath;

                MediaItem::firstOrCreate(
                    ['path' => $gPath],
                    [
                        'name' => pathinfo($gImg->getClientOriginalName(), PATHINFO_FILENAME),
                        'type' => 'image',
                        'mime_type' => Storage::disk('public')->mimeType($gPath) ?: 'image/webp',
                        'size' => Storage::disk('public')->size($gPath)
                    ]
                );
            }
        }

        // Upload product video (no conversion needed)
        $videoPath = $this->existing_product_video;
        if ($this->product_video) {
            $videoPath = $this->product_video->store('products/videos', 'public');
            
            MediaItem::firstOrCreate(
                ['path' => $videoPath],
                [
                    'name' => pathinfo($this->product_video->getClientOriginalName(), PATHINFO_FILENAME),
                    'type' => 'video',
                    'mime_type' => Storage::disk('public')->mimeType($videoPath) ?: 'video/mp4',
                    'size' => Storage::disk('public')->size($videoPath)
                ]
            );
        }

        // Compile description fields as JSON
        $descriptionData = [
            'benefits' => $this->benefits,
            'ingredients' => $this->ingredients,
            'usage' => $this->usage,
        ];

        $product = Product::updateOrCreate(
            ['id' => $this->productId],
            [
                'name' => $this->name,
                'slug' => $this->slug,
                'sku' => $this->sku,
                'short_description' => $this->short_description,
                'price' => $this->price,
                'sale_price' => $this->sale_price ?: null,
                'stock_quantity' => $this->stock_quantity,
                'unit_size' => $this->unit_size,
                'badge' => $this->badge ?: null,
                'featured_image' => $featuredImagePath,
                'gallery_images' => $galleryPaths,
                'product_video' => $videoPath,
                'description' => json_encode($descriptionData),
                'is_active' => $this->is_active,
                'is_featured' => $this->is_featured,
                'featured_order' => $this->featured_order,
            ]
        );

        $product->categories()->sync($this->category_ids);

        session()->flash('success', $this->productId ? 'Product updated successfully!' : 'Product created successfully!');
        $this->closeForm();
    }

    public function deleteProduct(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('success', 'Product deleted successfully!');
    }

    public function toggleStatus(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->is_active = !$product->is_active;
        $product->save();
    }

    public function toggleFeatured(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->is_featured = !$product->is_featured;
        $product->save();
    }

    public function updateFeaturedOrder(int $id, ?int $order): void
    {
        $product = Product::findOrFail($id);
        $product->featured_order = $order;
        $product->save();
        session()->flash('success', 'Featured order updated!');
    }

    // ─── Variant Management ──────────────────────────────────────────────────

    public function openVariantManager(int $id): void
    {
        $this->isFormOpen = false;
        
        $product = Product::with('variants')->findOrFail($id);
        $this->managingVariantsProductId = $product->id;
        $this->managingVariantsProductName = $product->name;
        
        $this->productVariants = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'sku' => $variant->sku,
                'unit_size' => $variant->unit_size,
                'price' => (float) $variant->price,
                'sale_price' => $variant->sale_price !== null ? (float) $variant->sale_price : null,
                'stock_quantity' => $variant->stock_quantity,
                'is_active' => (bool) $variant->is_active,
            ];
        })->toArray();
        
        $this->isVariantFormOpen = true;
    }

    public function closeVariantManager(): void
    {
        $this->isVariantFormOpen = false;
        $this->managingVariantsProductId = null;
        $this->productVariants = [];
    }

    public function addVariantRow(): void
    {
        $this->productVariants[] = [
            'id' => null,
            'sku' => '',
            'unit_size' => '',
            'price' => 0.0,
            'sale_price' => null,
            'stock_quantity' => 0,
            'is_active' => true,
        ];
    }

    public function removeVariantRow(int $index): void
    {
        if (isset($this->productVariants[$index]['id']) && $this->productVariants[$index]['id']) {
            \App\Models\ProductVariant::find($this->productVariants[$index]['id'])?->delete();
        }
        unset($this->productVariants[$index]);
        $this->productVariants = array_values($this->productVariants);
    }

    public function saveVariants(): void
    {
        $this->validate([
            'productVariants.*.sku' => 'required|string|max:50',
            'productVariants.*.unit_size' => 'required|string|max:50',
            'productVariants.*.price' => 'required|numeric|min:0',
            'productVariants.*.sale_price' => 'nullable|numeric|min:0',
            'productVariants.*.stock_quantity' => 'required|integer|min:0',
            'productVariants.*.is_active' => 'boolean',
        ], [
            'productVariants.*.sku.required' => 'SKU is required',
            'productVariants.*.unit_size.required' => 'Size is required',
            'productVariants.*.price.required' => 'Price is required',
        ]);

        foreach ($this->productVariants as $vData) {
            if (!empty($vData['id'])) {
                \App\Models\ProductVariant::where('id', $vData['id'])->update([
                    'sku' => $vData['sku'],
                    'unit_size' => $vData['unit_size'],
                    'price' => $vData['price'],
                    'sale_price' => $vData['sale_price'] ?: null,
                    'stock_quantity' => $vData['stock_quantity'],
                    'is_active' => $vData['is_active'],
                ]);
            } else {
                \App\Models\ProductVariant::create([
                    'product_id' => $this->managingVariantsProductId,
                    'sku' => $vData['sku'],
                    'unit_size' => $vData['unit_size'],
                    'price' => $vData['price'],
                    'sale_price' => $vData['sale_price'] ?: null,
                    'stock_quantity' => $vData['stock_quantity'],
                    'is_active' => $vData['is_active'],
                ]);
            }
        }

        session()->flash('success', 'Product variants updated successfully!');
        $this->closeVariantManager();
    }

    // ─── Media Library Picker (state only — UI is pure Alpine.js + JSON API) ────

    /**
     * Called by Alpine when the user picks a featured image from the media library.
     */
    public function setFeaturedFromLibrary(string $path): void
    {
        $this->existing_featured_image = $path;
        $this->featured_image = null;
    }

    /**
     * Called by Alpine when the user picks a video from the media library.
     */
    public function setVideoFromLibrary(string $path): void
    {
        $this->existing_product_video = $path;
        $this->product_video = null;
    }

    /**
     * Called by Alpine for each gallery image added from the media library.
     */
    public function addGalleryImageFromLibrary(string $path): void
    {
        if (!in_array($path, $this->existing_gallery_images)) {
            $this->existing_gallery_images[] = $path;
        }
    }

    /**
     * Called by Alpine for each gallery image removed.
     */
    public function removeGalleryImageByPath(string $path): void
    {
        $this->existing_gallery_images = array_values(
            array_filter($this->existing_gallery_images, fn ($p) => $p !== $path)
        );
    }

    public function removeGalleryImage(int $index): void
    {
        $images = $this->existing_gallery_images;
        array_splice($images, $index, 1);
        $this->existing_gallery_images = array_values($images);
    }

    public function render()
    {
        $products = Product::query()
            ->when(!empty($this->search), function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('sku', 'like', '%' . $this->search . '%')
                  ->orWhere('short_description', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->categoryFilter), function ($q) {
                $q->whereHas('categories', function ($query) {
                    $query->where('categories.id', $this->categoryFilter);
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.product-manager', [
            'products'   => $products,
            'categories' => Category::all(),
        ])->layout('components.layouts.admin', ['header' => 'Product Management']);
    }
}
