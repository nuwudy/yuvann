<?php

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Livewire\Admin\ProductManager;
use App\Livewire\ProductDetail;
use Livewire\Livewire;

beforeEach(function () {
    $this->admin = User::factory()->create();

    $this->product = Product::create([
        'name' => 'Queens Agni Curcumin Capsules (Water Soluble Extract Powder)',
        'slug' => 'queens-agni-curcumin-capsules-water-soluble-extract-powder',
        'short_description' => 'Curcumin extract capsules',
        'description' => 'Curcumin description',
        'price' => 1500.00,
        'sku' => 'QA-CUR-30CAPS',
        'stock_quantity' => 100,
        'unit_size' => '30 Capsule',
        'featured_image' => 'products/curcumin.webp',
        'is_active' => true,
    ]);
});

test('opening variant manager for product without variants auto-populates default variant', function () {
    Livewire::actingAs($this->admin)
        ->test(ProductManager::class)
        ->call('openVariantManager', $this->product->id)
        ->assertSet('isVariantFormOpen', true)
        ->assertSet('managingVariantsProductId', $this->product->id)
        ->assertCount('productVariants', 1)
        ->assertSet('productVariants.0.sku', 'QA-CUR-30CAPS')
        ->assertSet('productVariants.0.unit_size', '30 Capsule')
        ->assertSet('productVariants.0.price', 1500.0)
        ->assertSet('productVariants.0.stock_quantity', 100)
        ->assertSet('productVariants.0.is_active', true);
});

test('saving variants creates new variant and updates existing without 500 error', function () {
    // 1. Create first variant (30 Capsule)
    $v1 = ProductVariant::create([
        'product_id' => $this->product->id,
        'sku' => 'QA-CUR-30CAPS',
        'unit_size' => '30 Capsule',
        'price' => 1500.00,
        'stock_quantity' => 100,
        'is_active' => true,
    ]);

    // 2. Open manager and add second variant (60 Capsule)
    Livewire::actingAs($this->admin)
        ->test(ProductManager::class)
        ->call('openVariantManager', $this->product->id)
        ->assertCount('productVariants', 1)
        ->call('addVariantRow')
        ->assertCount('productVariants', 2)
        ->set('productVariants.1.sku', 'QA-CUR-60CAPS')
        ->set('productVariants.1.unit_size', '60 Capsule')
        ->set('productVariants.1.price', 2800.00)
        ->set('productVariants.1.stock_quantity', 50)
        ->set('productVariants.1.is_active', true)
        ->call('saveVariants')
        ->assertHasNoErrors();

    // Verify both variants exist in database
    expect(ProductVariant::where('product_id', $this->product->id)->count())->toBe(2);

    $v2 = ProductVariant::where('product_id', $this->product->id)->where('sku', 'QA-CUR-60CAPS')->first();
    expect($v2)->not->toBeNull();
    expect($v2->unit_size)->toBe('60 Capsule');
    expect((float) $v2->price)->toBe(2800.00);
    expect($v2->is_active)->toBeTrue();
});

test('can restore default base product variant if it was removed', function () {
    // Only have 60 Capsule variant
    ProductVariant::create([
        'product_id' => $this->product->id,
        'sku' => 'QA-CUR-60CAPS',
        'unit_size' => '60 Capsule',
        'price' => 2800.00,
        'stock_quantity' => 50,
        'is_active' => true,
    ]);

    Livewire::actingAs($this->admin)
        ->test(ProductManager::class)
        ->call('openVariantManager', $this->product->id)
        ->assertCount('productVariants', 1)
        ->call('importBaseProductAsVariant')
        ->assertCount('productVariants', 2)
        ->assertSet('productVariants.0.unit_size', '30 Capsule')
        ->assertSet('productVariants.0.price', 1500.0)
        ->call('saveVariants');

    expect(ProductVariant::where('product_id', $this->product->id)->count())->toBe(2);
});

test('product detail page allows selecting variants and updates active variant details', function () {
    $v1 = ProductVariant::create([
        'product_id' => $this->product->id,
        'sku' => 'QA-CUR-30CAPS',
        'unit_size' => '30 Capsule',
        'price' => 1500.00,
        'stock_quantity' => 100,
        'is_active' => true,
    ]);

    $v2 = ProductVariant::create([
        'product_id' => $this->product->id,
        'sku' => 'QA-CUR-60CAPS',
        'unit_size' => '60 Capsule',
        'price' => 2800.00,
        'stock_quantity' => 50,
        'is_active' => true,
    ]);

    Livewire::test(ProductDetail::class, ['slug' => $this->product->slug])
        ->assertSee('Select Size:')
        ->assertSee('30 Capsule')
        ->assertSee('60 Capsule')
        ->assertSet('selectedVariantId', $v1->id)
        ->call('$set', 'selectedVariantId', $v2->id)
        ->assertSet('selectedVariantId', $v2->id);
});
