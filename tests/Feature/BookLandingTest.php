<?php

use App\Models\Category;
use App\Models\Product;
use App\Livewire\BookLanding;
use Livewire\Livewire;

beforeEach(function () {
    $category = Category::firstOrCreate(
        ['slug' => 'book'],
        ['name' => 'Book', 'is_active' => true]
    );

    $this->product = Product::updateOrCreate(
        ['slug' => 'you-are-money-a-secret-guide-to-financial-freedom-by-dr-sajeev-dev'],
        [
            'name' => 'You Are Money: A Secret Guide to Financial Freedom – By Dr. Sajeev Dev',
            'short_description' => 'A transformative blueprint for financial independence.',
            'description' => '30 Years of Distilled Wisdom. Break Free from the Debt Trap. Rewire Your Wealth Mindset.',
            'price' => 400.00,
            'sku' => 'YVN-BK-YAM01',
            'stock_quantity' => 50,
            'unit_size' => 'Hardcover / Paperback',
            'featured_image' => 'https://yuvann.com/storage/products/4859c2b9-6c8e-4058-ac9f-17d1b1217386.webp',
            'is_active' => true,
        ]
    );

    $this->product->categories()->sync([$category->id]);
});

test('you are money special landing page renders with all 5 core wealth pillars and price', function () {
    $response = $this->get('/you-are-money');
    $response->assertStatus(200);
    $response->assertSee('You Are Money');
    $response->assertSee('30 Years of Distilled Wisdom');
    $response->assertSee('Break Free from the Debt Trap');
    $response->assertSee('Rewire Your Wealth Mindset');
    $response->assertSee('Actionable Roadmaps Over Abstract Theory');
    $response->assertSee('Holistic Life & Wealth Mastery', false);
    $response->assertSee('400');
    $response->assertSee('https://wa.me/917736609299', false);
    $response->assertSee('Order on WhatsApp');
});

test('book redirect route functions correctly', function () {
    $response = $this->get('/book/you-are-money');
    $response->assertRedirect('/you-are-money');
});

test('interactive livewire book landing allows quantity update and add to cart', function () {
    Livewire::test(BookLanding::class)
        ->assertSet('quantity', 1)
        ->call('incrementQty')
        ->assertSet('quantity', 2)
        ->call('decrementQty')
        ->assertSet('quantity', 1)
        ->call('addToCart')
        ->assertDispatched('cart-updated')
        ->assertDispatched('open-cart');
});

test('sitemap contains you-are-money page url', function () {
    $response = $this->get('/sitemap.xml');
    $response->assertStatus(200);
    $response->assertSee('/you-are-money');
});

test('header navigation and mobile menu contain book link', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('/you-are-money');
    $response->assertSee('📖 Book');
});

test('homepage renders dedicated you are money feature section', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('You Are Money');
    $response->assertSee('A Secret Guide to Financial Freedom');
    $response->assertSee('30 Years of Wisdom');
    $response->assertSee('Escape the Debt Trap');
    $response->assertSee('Rewire Your Wealth Mindset');
    $response->assertSee('Get Your Copy (₹400)');
});

test('dr sajeev dev profile renders featured landmark publication section', function () {
    $response = $this->get('/dr-sajeev-dev');
    $response->assertStatus(200);
    $response->assertSee('Featured Landmark Publication');
    $response->assertSee('You Are Money:');
    $response->assertSee('A Secret Guide to Financial Freedom');
    $response->assertSee('Explore Dedicated Book Presentation');
    $response->assertSee('Order on WhatsApp (₹400)');
});

