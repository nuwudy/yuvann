<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
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
        'description',
        'is_active',
        'is_featured',
        'is_free_shipping',
        'featured_order',
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
            'is_free_shipping' => 'boolean',
            'featured_order' => 'integer',
        ];
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function bodyParts(): BelongsToMany
    {
        return $this->belongsToMany(BodyPart::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function blogPosts(): BelongsToMany
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_product')->withTimestamps();
    }

    public function getAverageRatingAttribute(): float
    {
        if (array_key_exists('reviews_avg_rating', $this->attributes)) {
            return (float) ($this->attributes['reviews_avg_rating'] ?? 0.0);
        }
        if ($this->relationLoaded('reviews')) {
            $approved = $this->reviews->where('is_approved', true);
            return (float) ($approved->count() > 0 ? $approved->avg('rating') : 0.0);
        }
        return (float) ($this->reviews()->where('is_approved', true)->avg('rating') ?? 0.0);
    }

    public function getReviewCountAttribute(): int
    {
        if (array_key_exists('reviews_count', $this->attributes)) {
            return (int) ($this->attributes['reviews_count'] ?? 0);
        }
        if ($this->relationLoaded('reviews')) {
            return $this->reviews->where('is_approved', true)->count();
        }
        return (int) $this->reviews()->where('is_approved', true)->count();
    }

    /**
     * Get the active price (sale price if available, otherwise regular price).
     */
    public function getActivePriceAttribute(): float
    {
        return (float) ($this->sale_price !== null ? $this->sale_price : $this->price);
    }

    /**
     * Get active variants collection (using loaded relation if present, otherwise querying).
     */
    public function getActiveVariantsAttribute()
    {
        if ($this->relationLoaded('variants')) {
            return $this->variants->filter(fn($v) => (bool) ($v->is_active ?? true))->values();
        }
        return $this->variants()->where('is_active', true)->get();
    }

    /**
     * Check if product has multiple active variants.
     */
    public function getHasMultipleVariantsAttribute(): bool
    {
        return $this->active_variants->count() > 1;
    }

    /**
     * Get the lowest active price among variants, or base product active price.
     */
    public function getMinPriceAttribute(): float
    {
        if ($this->has_multiple_variants) {
            return (float) $this->active_variants->min(fn($v) => (float) $v->active_price);
        }
        return (float) $this->active_price;
    }

    /**
     * Get the highest active price among variants, or base product active price.
     */
    public function getMaxPriceAttribute(): float
    {
        if ($this->has_multiple_variants) {
            return (float) $this->active_variants->max(fn($v) => (float) $v->active_price);
        }
        return (float) $this->active_price;
    }

    /**
     * Check if the product has varying prices across active variants.
     */
    public function getHasPriceRangeAttribute(): bool
    {
        return $this->has_multiple_variants && ($this->min_price < $this->max_price);
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

    /**
     * Get the shareable JPEG/PNG image URL for WhatsApp / Facebook / Twitter cards.
     * Social crawlers like WhatsApp do NOT render WebP images; they require JPEG or PNG.
     */
    public function getShareImageUrlAttribute(): string
    {
        if (empty($this->featured_image)) {
            return asset('images/yuvann-share.jpg');
        }

        $featured = $this->featured_image;

        // 1. If it's an Unsplash URL, ensure it returns a JPEG
        if (str_contains($featured, 'images.unsplash.com')) {
            $url = preg_replace('/(\?|&)auto=format/', '$1fm=jpg', $featured);
            if (!str_contains($url, 'fm=jpg')) {
                $url .= (str_contains($url, '?') ? '&' : '?') . 'fm=jpg';
            }
            return $url;
        }

        // 2. If it's an external third-party URL (not our domain) that is NOT webp
        if ((str_starts_with($featured, 'http://') || str_starts_with($featured, 'https://')) 
            && !str_contains($featured, 'yuvann.com') 
            && !str_ends_with(strtolower(parse_url($featured, PHP_URL_PATH) ?? ''), '.webp')) {
            return $featured;
        }

        // Extract relative storage path if it was saved with full yuvann.com domain
        $cleanPath = preg_replace('#^https?://[^/]+/storage/#', '', $featured);

        // 3. If it already ends with .jpg, .jpeg, or .png
        $ext = strtolower(pathinfo($cleanPath, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            return asset('storage/' . $cleanPath);
        }

        // 4. If companion .jpg exists in storage
        $jpgPath = preg_replace('/\.webp$/i', '.jpg', $cleanPath);
        if ($jpgPath !== $cleanPath && Storage::disk('public')->exists($jpgPath)) {
            return asset('storage/' . $jpgPath);
        }

        // 5. If converted cache exists
        $cacheRelPath = 'products/share-cache/' . $this->id . '.jpg';
        if (Storage::disk('public')->exists($cacheRelPath)) {
            return asset('storage/' . $cacheRelPath);
        }

        // 6. Fallback to dynamic share image route (which dynamically serves / converts to JPEG)
        return route('product.share-image', ['slug' => $this->slug]);
    }
}
