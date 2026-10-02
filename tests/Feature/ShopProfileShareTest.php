<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopProfileShareTest extends TestCase
{
    use RefreshDatabase;

    public function test_shop_page_has_yuvann_emblem_and_rebalancing_you_tagline_in_meta_and_view(): void
    {
        $shop = Shop::create([
            'name' => 'Aaliya',
            'slug' => 'aaliya',
            'description' => 'Aaliya Ayurvedic partner store.',
            'is_active' => true,
        ]);

        $response = $this->get('/shops/aaliya');

        $response->assertStatus(200);

        // Verify page title and Open Graph tags
        $response->assertSee('Aaliya | Yuvann - Rebalancing you');
        $response->assertSee('<meta property="og:title" content="Aaliya | Yuvann - Rebalancing you">', false);
        $response->assertSee('icons/icon-512.png');
        $response->assertSee('og:image', false);
        $response->assertSee('og:image:secure_url', false);
        $response->assertSee('og:image:width', false);
        $response->assertSee('og:image:height', false);
        $response->assertSee('image_src', false);
        $response->assertSee('Rebalancing you');
    }

    public function test_default_pages_include_share_banner_and_rebalancing_you_tagline(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Rebalancing you');
        $response->assertSee('images/yuvann-share.jpg');
        $response->assertSee('icons/icon-512.png');
        $response->assertSee('<meta property="og:site_name" content="Yuvann - Rebalancing you">', false);
    }

    public function test_product_detail_page_includes_product_image_and_tagline(): void
    {
        $product = Product::create([
            'name' => 'Skin Glow Serum',
            'slug' => 'skin-glow-serum',
            'sku' => 'SGS-001',
            'unit_size' => '50ml',
            'short_description' => 'Nourishing herbal facial serum.',
            'description' => 'Detailed product description.',
            'price' => 499,
            'featured_image' => 'products/sample-test.webp',
            'is_active' => true,
        ]);

        $response = $this->get('/products/skin-glow-serum');

        $response->assertStatus(200);
        $response->assertSee('Skin Glow Serum | Yuvann - Rebalancing you');
        $response->assertSee('<meta property="og:title" content="Skin Glow Serum | Yuvann - Rebalancing you">', false);
        $response->assertSee('og:image', false);
        $response->assertSee('og:image:secure_url', false);
        $response->assertSee('og:image:width', false);
        $response->assertSee('og:image:height', false);
        $response->assertSee('image_src', false);

        // Share image endpoint returns 200 with image/jpeg
        $imgResponse = $this->get('/products/skin-glow-serum/share-image.jpg');
        $imgResponse->assertStatus(200);
        $this->assertEquals('image/jpeg', $imgResponse->headers->get('Content-Type'));
    }
}
