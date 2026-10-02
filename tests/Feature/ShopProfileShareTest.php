<?php

namespace Tests\Feature;

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

    public function test_default_pages_include_rebalancing_you_tagline(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Rebalancing you');
        $response->assertSee('icons/icon-512.png');
    }
}
