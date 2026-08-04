<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@yuvann.com'],
            [
                'name' => 'Dr. Sajeev Dev',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Create Categories
        $categories = [
            'womens-care' => [
                'name' => "Women's Care",
                'description' => 'Ayurvedic formulations and supplements customized for women\'s health and hormonal balance.',
            ],
            'superfoods' => [
                'name' => 'Superfoods',
                'description' => 'Nutrient-rich natural products and soup mixes to boost your daily diet and vitality.',
            ],
            'herbal-powders' => [
                'name' => 'Herbal Powders',
                'description' => 'Pure single-herb powders processed carefully to retain their maximum therapeutic value.',
            ],
            'natural-sweeteners' => [
                'name' => 'Natural Sweeteners',
                'description' => 'Healthy, calorie-free, or low-glycemic natural substitutes for refined sugar.',
            ],
        ];

        $categoryModels = [];
        foreach ($categories as $slug => $data) {
            $categoryModels[$slug] = Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'is_active' => true,
                ]
            );
        }

        // 3. Create Products
        $products = [
            [
                'category_slug' => 'womens-care',
                'name' => 'Ruthu Santhi Oil',
                'slug' => 'ruthu-santhi-oil',
                'short_description' => 'Premium Ayurvedic pain relief oil formulated for menstrual cramps, muscle soreness, and joint aches.',
                'description' => json_encode([
                    'benefits' => "• Relieves severe abdominal cramps during menstruation.\n• Soothes muscular spasm and backaches.\n• Formulated with 100% natural herbs with zero artificial fragrances.\n• Safe for long-term topical application.",
                    'ingredients' => "• Sesame Oil base (Tila Taila)\n• Shatavari (Asparagus racemosus)\n• Ashwagandha (Withania somnifera)\n• Devadaru (Cedrus deodara)\n• camphor (for natural cooling & pain relief)",
                    'usage' => "Apply 10-15 ml of warm Ruthu Santhi Oil over the lower abdomen, lower back, and thighs. Massage gently in circular motions. Leave it for 30 minutes, then rinse with warm water. For best results, start using 2-3 days before the onset of the menstrual cycle.",
                ]),
                'price' => 350.00,
                'sale_price' => 299.00,
                'sku' => 'RS-OIL-100',
                'stock_quantity' => 50,
                'unit_size' => '100ml',
                'badge' => '100% Herbal',
                'featured_image' => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?q=80&w=600&auto=format&fit=crop',
                'gallery_images' => json_encode([
                    'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1617897903246-719242758050?q=80&w=600&auto=format&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_slug' => 'womens-care',
                'name' => 'Skin Rich Syrup',
                'slug' => 'skin-rich-syrup',
                'short_description' => 'A comprehensive blood purifier syrup that combats acne, blemishes, and promotes naturally glowing skin.',
                'description' => json_encode([
                    'benefits' => "• Purifies the blood naturally to eliminate toxins.\n• Reduces acne, pimples, and skin blemishes.\n• Promotes skin glow and improves complexion.\n• Packed with rich antioxidants.",
                    'ingredients' => "• Manjistha (Rubia cordifolia)\n• Neem (Azadirachta indica)\n• Khadir (Acacia catechu)\n• Haridra (Curcuma longa)\n• Sariva (Hemidesmus indicus)",
                    'usage' => "Adults: Take 10-15 ml (2-3 teaspoons) twice daily after meals with an equal quantity of lukewarm water, or as directed by an Ayurvedic physician.",
                ]),
                'price' => 220.00,
                'sale_price' => 199.00,
                'sku' => 'SR-SYP-200',
                'stock_quantity' => 40,
                'unit_size' => '200ml',
                'badge' => 'Blood Purifier',
                'featured_image' => 'https://images.unsplash.com/photo-1550572017-edd951b55104?q=80&w=600&auto=format&fit=crop',
                'gallery_images' => json_encode([
                    'https://images.unsplash.com/photo-1550572017-edd951b55104?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1471864190281-a93a3070b6de?q=80&w=600&auto=format&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_slug' => 'natural-sweeteners',
                'name' => 'Monk Fruit Powder',
                'slug' => 'monk-fruit-powder',
                'short_description' => '100% natural, keto-friendly sweetener with zero calories and zero glycemic impact. Ideal sugar substitute.',
                'description' => json_encode([
                    'benefits' => "• Zero Calories and Zero Glycemic Index—does not spike blood sugar levels.\n• Ideal sweetener for Keto, Diabetic, and Low-Carb diets.\n• Taste profile matches sugar closely with no bitter chemical aftertaste.\n• Heat stable—perfect for baking, tea, coffee, and cooking.",
                    'ingredients' => "• Pure Monk Fruit Extract (Mogroside V)\n• Erythritol (natural carrier for perfect sweetness-to-volume ratio)",
                    'usage' => "Use as a 1:1 replacement for refined white sugar in teas, coffees, baking, beverages, and desserts. Add according to taste preference.",
                ]),
                'price' => 490.00,
                'sale_price' => 450.00,
                'sku' => 'MF-PWD-150',
                'stock_quantity' => 30,
                'unit_size' => '150g',
                'badge' => 'Zero Calories',
                'featured_image' => 'https://images.unsplash.com/photo-1594911774802-8822a7079af1?q=80&w=600&auto=format&fit=crop',
                'gallery_images' => json_encode([
                    'https://images.unsplash.com/photo-1594911774802-8822a7079af1?q=80&w=600&auto=format&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_slug' => 'herbal-powders',
                'name' => 'Moringa Leaves Powder',
                'slug' => 'moringa-leaves-powder',
                'short_description' => 'Organic, nutrient-dense Moringa powder containing essential vitamins, minerals, and amino acids.',
                'description' => json_encode([
                    'benefits' => "• Rich source of Vitamin A, C, Calcium, Iron, and Amino acids.\n• Boosts overall immune system and daily energy levels.\n• Powerful natural anti-inflammatory agent.\n• Promotes healthy digestion and metabolism.",
                    'ingredients' => "• 100% Pure, Organic Shade-Dried Moringa Oleifera Leaves.",
                    'usage' => "Mix 1 teaspoon (approx. 3-5g) daily into warm water, smoothies, green juices, soups, or sprinkle over salads. Best taken in the morning.",
                ]),
                'price' => 180.00,
                'sale_price' => null,
                'sku' => 'ML-PWD-250',
                'stock_quantity' => 60,
                'unit_size' => '250g',
                'badge' => 'Superfood',
                'featured_image' => 'https://images.unsplash.com/photo-1515694346937-94d85e41e6f0?q=80&w=600&auto=format&fit=crop',
                'gallery_images' => json_encode([
                    'https://images.unsplash.com/photo-1515694346937-94d85e41e6f0?q=80&w=600&auto=format&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_slug' => 'superfoods',
                'name' => 'Ragi Millet Soup Mix',
                'slug' => 'ragi-millet-soup-mix',
                'short_description' => 'A nourishing, high-fiber, gluten-free savory soup mix made with Sprouted Ragi (Finger Millet) and spices.',
                'description' => json_encode([
                    'benefits' => "• High in calcium, dietary fiber, and essential minerals.\n• Gluten-free and extremely light on the digestive system.\n• Helps in weight management and cholesterol control.\n• Instant, healthy breakfast or evening snack for all ages.",
                    'ingredients' => "• Sprouted Ragi Powder\n• Roasted Cumin & Pepper\n• Dehydrated Herbs (Coriander, Curry Leaves)\n• Pink Himalayan Salt",
                    'usage' => "Add 2 tablespoons of Ragi Millet Soup Mix to 200ml of cold water. Mix well to prevent lumps. Cook on a medium flame for 3 to 5 minutes, stirring continuously, until the soup thickens. Garnish with fresh coriander and serve hot.",
                ]),
                'price' => 150.00,
                'sale_price' => 135.00,
                'sku' => 'RM-SMP-200',
                'stock_quantity' => 75,
                'unit_size' => '200g',
                'badge' => 'High Fiber',
                'featured_image' => 'https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=600&auto=format&fit=crop',
                'gallery_images' => json_encode([
                    'https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=600&auto=format&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_slug' => 'herbal-powders',
                'name' => 'Jamun Seed Powder',
                'slug' => 'jamun-seed-powder',
                'short_description' => 'Traditional Ayurvedic supplement prepared from natural Jamun seeds, recognized for supporting healthy blood sugar levels.',
                'description' => json_encode([
                    'benefits' => "• Contains Jamboline which helps in controlling the conversion of starch into sugar.\n• Promotes pancreatic health and natural insulin sensitivity.\n• Loaded with dietary fiber and essential minerals.\n• Helps detoxify the liver and kidneys.",
                    'ingredients' => "• 100% Pure Jamun (Syzygium cumini) Seed Powder.",
                    'usage' => "Take 1 teaspoon (3g) of Jamun Seed Powder twice daily, preferably 30 minutes before meals with lukewarm water, or as advised by your healthcare practitioner.",
                ]),
                'price' => 190.00,
                'sale_price' => null,
                'sku' => 'JS-PWD-150',
                'stock_quantity' => 35,
                'unit_size' => '150g',
                'badge' => 'Diabetic Friendly',
                'featured_image' => 'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?q=80&w=600&auto=format&fit=crop',
                'gallery_images' => json_encode([
                    'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?q=80&w=600&auto=format&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $p) {
            $cat = $categoryModels[$p['category_slug']];
            Product::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'category_id' => $cat->id,
                    'name' => $p['name'],
                    'short_description' => $p['short_description'],
                    'description' => $p['description'],
                    'price' => $p['price'],
                    'sale_price' => $p['sale_price'],
                    'sku' => $p['sku'],
                    'stock_quantity' => $p['stock_quantity'],
                    'unit_size' => $p['unit_size'],
                    'badge' => $p['badge'],
                    'featured_image' => $p['featured_image'],
                    'gallery_images' => json_decode($p['gallery_images']),
                    'is_active' => $p['is_active'],
                    'is_featured' => $p['is_featured'],
                ]
            );
        }
    }
}
