<?php

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\BlogList;
use App\Livewire\BlogDetail;
use App\Livewire\Admin\BlogManager;

test('blog listing page renders with published articles', function () {
    $post = BlogPost::create([
        'title' => 'Ayurvedic Wellness Morning Rituals',
        'slug' => 'ayurvedic-wellness-morning-rituals',
        'excerpt' => 'Morning tips for health.',
        'content' => '<p>Start your day with warm water and herbs.</p>',
        'category' => 'Wellness Tips',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get('/blog');
    $response->assertStatus(200);
    $response->assertSee('Ayurvedic Wellness Morning Rituals');
    $response->assertSee('Wellness Tips');
});

test('blog detail page displays article and introduced products with interactive add-to-cart', function () {
    $product = Product::create([
        'name' => 'Moringa Leaves Powder',
        'slug' => 'moringa-leaves-powder',
        'sku' => 'MOR-100',
        'price' => 299,
        'stock_quantity' => 50,
        'unit_size' => '100g',
        'featured_image' => 'products/moringa.webp',
        'is_active' => true,
        'description' => 'Pure Moringa leaf powder.',
    ]);

    $post = BlogPost::create([
        'title' => 'The Power of Moringa in Ayurveda',
        'slug' => 'power-of-moringa-ayurveda',
        'excerpt' => 'An introduction to Moringa benefits.',
        'content' => '<p>Moringa is deeply rejuvenating.</p>',
        'category' => 'Product Spotlights',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $post->products()->attach($product->id);

    $response = $this->get('/blog/power-of-moringa-ayurveda');
    $response->assertStatus(200);
    $response->assertSee('The Power of Moringa in Ayurveda');
    $response->assertSee('Moringa Leaves Powder');
    $response->assertSee('Featured in this Article');

    // Test Livewire component addToCart
    Livewire::test(BlogDetail::class, ['slug' => 'power-of-moringa-ayurveda'])
        ->call('addToCart', $product->id)
        ->assertDispatched('cart-updated')
        ->assertDispatched('open-cart');
});

test('admin blog management requires authentication and allows CRUD', function () {
    // Unauthenticated redirected to login
    $response = $this->get('/admin/blog');
    $response->assertRedirect('/admin/login');

    // Authenticate
    $user = User::factory()->create();
    $this->actingAs($user);

    $adminResponse = $this->get('/admin/blog');
    $adminResponse->assertStatus(200);

    // Test creating a blog post via Livewire Admin
    Livewire::test(BlogManager::class)
        ->set('title', 'New Doctor Wellness Post')
        ->set('slug', 'new-doctor-wellness-post')
        ->set('category', 'Wellness Tips')
        ->set('content', '<p>New advice from Dr. Sajeev Dev.</p>')
        ->set('excerpt', 'A quick overview.')
        ->call('save')
        ->assertHasNoErrors();

    expect(BlogPost::where('slug', 'new-doctor-wellness-post')->exists())->toBeTrue();
});

test('sitemap contains blog index and article urls', function () {
    BlogPost::create([
        'title' => 'Ayurvedic Herb Guide',
        'slug' => 'ayurvedic-herb-guide',
        'content' => '<p>Herbs guide.</p>',
        'category' => 'Herbal Remedies',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get('/sitemap.xml');
    $response->assertStatus(200);
    $response->assertHeader('Content-Type', 'application/xml');
    $response->assertSee('/blog');
    $response->assertSee('ayurvedic-herb-guide');
    $response->assertSee('/migraine-treatment');
});

test('migraine treatment special page renders with bilingual content, timing and whatsapp booking buttons', function () {
    $response = $this->get('/migraine-treatment');
    $response->assertStatus(200);
    $response->assertSee('മൈഗ്രെയ്ൻ മാറാനുള്ള');
    $response->assertSee('Unique Opportunity to');
    $response->assertSee('5:15 AM');
    $response->assertSee('Kariyad');
    $response->assertSee('77366 09299');
    $response->assertSee('94473 65545');
    $response->assertSee('https://wa.me/917736609299', false);
    $response->assertSee('https://wa.me/919447365545', false);
});
