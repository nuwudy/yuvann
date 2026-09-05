<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Product;
use Illuminate\Database\Seeder;

class BodyPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodyParts = [
            [
                'name' => 'Whole Body',
                'slug' => 'whole-body',
                'description' => 'Complete rejuvenation, immunity, and overall body vitality formulations.',
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 1,
            ],
            [
                'name' => 'Hair',
                'slug' => 'hair',
                'description' => 'Herbal solutions for hair fall, dandruff, scalp health, and nourishment.',
                'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 2,
            ],
            [
                'name' => 'Skin',
                'slug' => 'skin',
                'description' => 'Natural glow, blood purification, and deep skin tissue nourishment.',
                'image' => 'https://images.unsplash.com/photo-1512290900672-1f55b9a4c514?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 3,
            ],
            [
                'name' => 'Eye',
                'slug' => 'eye',
                'description' => 'Ayurvedic cooling, strain relief, and vision vitality care.',
                'image' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 4,
            ],
            [
                'name' => 'Head & Mind',
                'slug' => 'head',
                'description' => 'Relief from migraine, headache, stress, mental fatigue, and insomnia.',
                'image' => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 5,
            ],
            [
                'name' => 'Chest & Lungs',
                'slug' => 'chest',
                'description' => 'Respiratory wellness, soothing herbal mixes, and vital breathing strength.',
                'image' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 6,
            ],
            [
                'name' => 'Digestion & Gut',
                'slug' => 'digestion',
                'description' => 'Digestive fire (Agni), gut health, detox, and metabolic metabolism balance.',
                'image' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 7,
            ],
            [
                'name' => 'Joints & Bones',
                'slug' => 'joints',
                'description' => 'Joint lubrication, muscle stiffness relief, and orthopedic herbal support.',
                'image' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 8,
            ],
            [
                'name' => 'Back & Spine',
                'slug' => 'back',
                'description' => 'Targeted relief for backache, postural stress, and lumbar strength.',
                'image' => 'https://images.unsplash.com/photo-1507398941214-572c25f4b1dc?q=80&w=400&auto=format&fit=crop',
                'sort_order' => 9,
            ],
        ];

        $created = [];
        foreach ($bodyParts as $data) {
            $created[$data['slug']] = BodyPart::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'image' => $data['image'],
                    'sort_order' => $data['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        // Automatically associate existing products with relevant body parts if available
        $products = Product::all();
        foreach ($products as $product) {
            $slugLower = strtolower($product->slug . ' ' . $product->name . ' ' . $product->short_description);
            $attachIds = [];

            if (str_contains($slugLower, 'hair') || str_contains($slugLower, 'scalp') || str_contains($slugLower, 'shampoo')) {
                if (isset($created['hair'])) $attachIds[] = $created['hair']->id;
            }
            if (str_contains($slugLower, 'skin') || str_contains($slugLower, 'glow') || str_contains($slugLower, 'face') || str_contains($slugLower, 'syrup')) {
                if (isset($created['skin'])) $attachIds[] = $created['skin']->id;
            }
            if (str_contains($slugLower, 'migraine') || str_contains($slugLower, 'head') || str_contains($slugLower, 'ruthu') || str_contains($slugLower, 'oil')) {
                if (isset($created['head'])) $attachIds[] = $created['head']->id;
            }
            if (str_contains($slugLower, 'joint') || str_contains($slugLower, 'bone') || str_contains($slugLower, 'pain') || str_contains($slugLower, 'oil')) {
                if (isset($created['joints'])) $attachIds[] = $created['joints']->id;
            }
            if (str_contains($slugLower, 'soup') || str_contains($slugLower, 'moringa') || str_contains($slugLower, 'digestion') || str_contains($slugLower, 'gut')) {
                if (isset($created['digestion'])) $attachIds[] = $created['digestion']->id;
            }
            // By default, wellness foods / general elixirs target whole body
            if (empty($attachIds) && isset($created['whole-body'])) {
                $attachIds[] = $created['whole-body']->id;
            }

            if (!empty($attachIds)) {
                $product->bodyParts()->syncWithoutDetaching($attachIds);
            }
        }
    }
}
