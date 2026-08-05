<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'unit_size',
        'badge',
        'featured_image',
        'gallery_images',
        'product_video',
        'is_active',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'stock_quantity' => 'integer',
            'gallery_images' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Get the active price (sale price if available, otherwise regular price).
     */
    public function getActivePriceAttribute(): float
    {
        return (float) ($this->sale_price !== null ? $this->sale_price : $this->price);
    }

    /**
     * Check if the product has a sale price active.
     */
    public function getIsOnSaleAttribute(): bool
    {
        return $this->sale_price !== null && $this->sale_price < $this->price;
    }

    /**
     * Calculate percentage savings from regular price to sale price.
     */
    public function getSavingsPercentageAttribute(): int
    {
        if (!$this->is_on_sale || $this->price <= 0) {
            return 0;
        }
        return (int) round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    /**
     * Check if product is in stock.
     */
    public function getInStockAttribute(): bool
    {
        return $this->stock_quantity > 0;
    }

    /**
     * Get the featured image URL.
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://')) {
            return $this->featured_image;
        }
        return Storage::url($this->featured_image);
    }

    /**
     * Get the product video public URL, or null if no video is set.
     */
    public function getProductVideoUrlAttribute(): ?string
    {
        if (empty($this->product_video)) {
            return null;
        }
        if (str_starts_with($this->product_video, 'http://') || str_starts_with($this->product_video, 'https://')) {
            return $this->product_video;
        }
        return Storage::url($this->product_video);
    }
}
