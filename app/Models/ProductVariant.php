<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'unit_size',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'stock_quantity' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the active price (sale price if available, otherwise regular price).
     */
    public function getActivePriceAttribute(): float
    {
        return (float) ($this->sale_price !== null ? $this->sale_price : $this->price);
    }

    /**
     * Check if the variant has a sale price active.
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
     * Check if variant is in stock.
     */
    public function getInStockAttribute(): bool
    {
        return $this->stock_quantity > 0;
    }
}
