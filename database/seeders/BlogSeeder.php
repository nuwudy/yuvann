<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => '5 Ayurvedic Morning Rituals for Daily Vitality & Digestion',
                'slug' => '5-ayurvedic-morning-rituals-vitality-digestion',
                'excerpt' => 'Discover ancient Dinacharya (daily routine) principles formulated to ignite your Agni (digestive fire), clear metabolic toxins, and sustain vibrant all-day vitality.',
                'category' => 'Wellness Tips',
                'featured_image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1200&auto=format&fit=crop',
                'author_name' => 'Dr. Sajeev Dev',
                'author_title' => 'Chief Ayurvedic Consultant',
                'read_time' => '5 min read',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'meta_title' => '5 Ayurvedic Morning Rituals for Vitality | Yuvann Wellness',
                'meta_description' => 'Learn doctor-guided morning Ayurvedic rituals to enhance digestion, boost natural immunity, and elevate daily vitality.',
                'content' => <<<'HTML'
<p class="lead">In classical Ayurveda, how you greet the early hours determines how efficiently your mind and body operate for the remaining sixteen hours. The ancient concept of <em>Dinacharya</em> (daily routine) is not merely self-care—it is preventative medicine.</p>

<h2>1. Wake with the Vata Energy (Brahma Muhurta)</h2>
<p>The dawn hours between 4:30 AM and 6:00 AM are dominated by <strong>Vata dosha</strong>, characterized by lightness, clarity, and subtle energy. Waking during this window naturally infuses the intellect with alertness. Sleeping past sunrise elevates <em>Kapha</em>, which induces heaviness and sluggish metabolism.</p>

<div class="ayurveda-tip-box">
    <strong>🌿 Dr. Sajeev's Clinical Tip:</strong>
    <p>Begin your morning by rinsing your eyes with cool, clean water and gently scraping your tongue from back to front with a copper or stainless steel tongue cleaner. This eliminates <em>Ama</em> (overnight bacterial and digestive residues) before you drink any liquids.</p>
</div>

<h2>2. Ushapan: The Warm Water Awakening</h2>
<p>Drinking 1 to 2 cups of lukewarm water upon waking gently stimulates peristalsis, hydrates your mucosal membranes, and signals the kidneys to begin filtration. Avoid iced water entirely in the morning—it extinguishes your delicate <strong>Agni</strong> (digestive fire).</p>

<h2>3. Supercharge with Natural Green Nutrients</h2>
<p>Modern fast-paced diets often fall short in bioavailable micronutrients. In our clinical experience at Yuvann, supplementing the morning routine with cold-processed green superfoods like <strong>Moringa leaf powder</strong> delivers concentrated vitamins A, C, calcium, and plant proteins in a format that your cells absorb without digestive strain.</p>

<h2>4. Gentle Joint Mobilization & Pranic Breathing</h2>
<p>Spend 10 minutes doing simple joint rotations (Griva Sanchalana for neck, shoulder rolls, ankle pumps) followed by 5 minutes of <em>Anulom Vilom</em> (alternate nostril breathing). This balances sympathetic and parasympathetic nerves, easing cortisol before the workday begins.</p>

<h2>5. Nourishing Breakfast Tailored to Your Constitution</h2>
<p>Swap sugary cereals or heavy pastries for wholesome, warm millet porridge or soothing nutrient-rich soups like <strong>Ragi Millet Soup</strong>. Finger millet (Ragi) provides steady slow-release complex carbohydrates, iron, and dietary fiber that keep you full without post-meal fatigue.</p>
HTML
                ,
                'product_slugs' => ['moringa-leaves-powder', 'ragi-millet-soup-mix']
            ],
            [
                'title' => 'Restoring Hormonal Harmony: An Ayurvedic Guide to Women\'s Cycle Wellness',
                'slug' => 'restoring-hormonal-harmony-womens-cycle-wellness',
                'excerpt' => 'Explore how classical herbal extractions and balancing abdominal massage soothe menstrual distress, regulate cycles, and restore feminine equilibrium.',
                'category' => 'Product Spotlights',
                'featured_image' => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=1200&auto=format&fit=crop',
                'author_name' => 'Dr. Sajeev Dev',
                'author_title' => 'Chief Ayurvedic Consultant',
                'read_time' => '6 min read',
                'is_published' => true,
                'published_at' => now()->subDays(6),
                'meta_title' => 'Ayurvedic Women\'s Cycle Wellness & Hormonal Harmony | Yuvann',
                'meta_description' => 'Dr. Sajeev Dev shares holistic Ayurvedic insights on relieving menstrual cramps, balancing Apana Vata, and restoring feminine vitality.',
                'content' => <<<'HTML'
<p class="lead">Every month, a woman's body undergoes an intricate symphony of hormonal shifts. Yet millions normalize debilitating cramps, intense mood fluctuations, and erratic cycles as inevitable. Ayurveda teaches that monthly balance is achievable when we respect the downward flow of <em>Apana Vayu</em>.</p>

<h2>Understanding the Root of Cycle Discomfort</h2>
<p>In Ayurvedic physiology, menstrual distress and spasmodic cramps are primarily driven by aggravated <strong>Vata dosha</strong> in the pelvic region. When stress, cold foods, or exhaustion disrupt this channel, smooth blood circulation and tissue relaxation are compromised.</p>

<div class="ayurveda-tip-box">
    <strong>🌸 Clinical Formulation Spotlight:</strong>
    <p>To relieve deep pelvic spasms, classical warm herbal oils applied topically have been used for over 3,000 years. Transdermal herbal absorption bypasses digestion to relax uterine muscles and ease nervous tension directly.</p>
</div>

<h2>The Power of Targeted External Application: Ruthu Santhi</h2>
<p>We specifically formulated <strong>Ruthu Santhi Oil</strong> with potent anti-spasmodic herbs including Dashamoola extracts and sesame oil base. Gently massaging 5 to 10 drops over the lower abdomen in clockwise circular motions twice daily during the week leading up to your period creates palpable relief and warmth.</p>

<h2>Complementary Nutrition for Radiant Blood Vitality</h2>
<p>Hormonal health reflects systemic blood purity (<em>Rakta Dhatu</em>). Incorporating cooling, liver-cleansing herbal syrups such as <strong>Skin Rich Syrup</strong> provides an infusion of Manjistha and Sariva, which purify the microcirculatory channels and clarify the skin when hormonal acne flares up.</p>

<h2>Practical Lifestyle Steps for Cycle Week</h2>
<ul>
    <li><strong>Prioritize Warmth:</strong> Wear warm socks, avoid cold tiled floors barefoot, and take soothing warm baths.</li>
    <li><strong>Sip Cumin-Fennel Tea:</strong> Steep 1 tsp roasted fennel seeds and 1/2 tsp cumin seeds in boiling water after meals.</li>
    <li><strong>Avoid Strenuous HIIT:</strong> Shift to yin yoga, gentle walking, and conscious breathwork during the flow days.</li>
</ul>
HTML
                ,
                'product_slugs' => ['ruthu-santhi-oil', 'skin-rich-syrup']
            ],
            [
                'title' => 'Sugar-Free Living Without Artificial Chemicals: The Monk Fruit Revolution',
                'slug' => 'sugar-free-living-monk-fruit-ayurveda',
                'excerpt' => 'How to satisfy sweet cravings without spiking blood glucose or harming gut flora using zero-calorie, natural herbal extracts.',
                'category' => 'Diet & Nutrition',
                'featured_image' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?q=80&w=1200&auto=format&fit=crop',
                'author_name' => 'Dr. Sajeev Dev',
                'author_title' => 'Chief Ayurvedic Consultant',
                'read_time' => '4 min read',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'meta_title' => 'Monk Fruit & Ayurvedic Sugar Alternatives | Yuvann Wellness',
                'meta_description' => 'Discover pure zero-calorie sweetening with Monk Fruit and Jamun seed extracts for metabolic stability and glycemic balance.',
                'content' => <<<'HTML'
<p class="lead">Refined cane sugar is one of the most inflammatory substances in modern diets. Yet artificial sweeteners—like aspartame and sucralose—frequently disrupt delicate gut microbiomes. The solution lies in pure plant-derived mogrosides.</p>

<h2>What Makes Monk Fruit Unique?</h2>
<p>Monk fruit (<em>Siraitia grosvenorii</em>), cultivated for centuries by Buddhist monks, derives its exquisite sweetness not from fructose or glucose, but from powerful antioxidants called <strong>mogrosides</strong>. Because mogrosides are not metabolized into energy, they offer zero glycemic index and zero caloric burden.</p>

<div class="ayurveda-tip-box">
    <strong>🌿 Metabolic Health Recommendation:</strong>
    <p>For individuals managing diabetes, pre-diabetes, or weight loss goals, pairing pure Monk Fruit with botanical extracts like <strong>Jamun Seed Powder</strong> supports insulin sensitivity and pancreatic enzyme activity naturally.</p>
</div>

<h2>How to Use Pure Monk Fruit Powder Daily</h2>
<p>Pure Monk Fruit powder is up to 150 times sweeter than regular table sugar. A minute pinch—less than 1/8th of a teaspoon—is sufficient to sweeten your morning herbal tea, golden turmeric milk, or breakfast smoothie without an unpleasant bitter aftertaste.</p>

<h2>3 Easy Swaps for Better Blood Sugar Balance</h2>
<ol>
    <li>Replace white sugar in your morning beverage with a dash of <strong>Yuvann Monk Fruit Powder</strong>.</li>
    <li>Consume 1/2 teaspoon of <strong>Jamun Seed Powder</strong> stirred in lukewarm water 15 minutes before lunch.</li>
    <li>Choose whole nutrient-rich grains like Ragi over refined flour and processed bread.</li>
</ol>
HTML
                ,
                'product_slugs' => ['monk-fruit-powder', 'jamun-seed-powder']
            ],
            [
                'title' => 'മൈഗ്രെയ്ൻ മാറാനുള്ള അതുല്യ അവസരം: പരമ്പരാഗത ഒറ്റമൂലി ചികിത്സ',
                'slug' => 'traditional-migraine-ottamooli-treatment-kariyad',
                'excerpt' => 'നൂറ്റാണ്ടുകളായി പരീക്ഷിച്ച പരമ്പരാഗത ഒറ്റമൂലി ചികിത്സയിലൂടെ മൈഗ്രെയ്നിൽ നിന്നും നിരന്തര തലവേദനയിൽ നിന്നും ശാശ്വത ആശ്വാസം നേടാം. ഡോ. സജീവ് ദേവിന്റെ നേതൃത്വത്തിൽ കരിയാടിൽ വെച്ച് നടക്കുന്ന പ്രഭാത ചികിത്സ.',
                'category' => 'Herbal Remedies',
                'featured_image' => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=1200&auto=format&fit=crop',
                'author_name' => 'Dr. Sajeev Dev',
                'author_title' => 'Chief Ayurvedic Consultant',
                'read_time' => '3 min read',
                'is_published' => true,
                'published_at' => now(),
                'meta_title' => 'മൈഗ്രെയ്ൻ ഒറ്റമൂലി ചികിത്സ | Dr. Sajeev Dev | Yuvann',
                'meta_description' => 'തുടർച്ചയായ തലവേദനയ്ക്കും മൈഗ്രെയ്നും സ്വാഭാവിക ശാശ്വത ആശ്വാസം നൽകുന്ന ഒറ്റമൂലി ചികിത്സ.',
                'content' => <<<'HTML'
<p class="lead">തുടർച്ചയായ തലവേദനയും മൈഗ്രെയ്നും നിങ്ങളെ ബുദ്ധിമുട്ടിക്കുന്നുണ്ടോ? ഇനി ആശങ്കപ്പെടേണ്ട! നൂറ്റാണ്ടുകളായി പരീക്ഷിച്ചും ഫലപ്രദമെന്ന് തെളിയിച്ചിട്ടുള്ള പരമ്പരാഗത ഒറ്റമൂലി ചികിത്സ ഇപ്പോൾ ലഭ്യമാണ്.</p>

<div class="ayurveda-tip-box">
    <strong>⏰ സമയം: രാവിലെ 5.15-ന് മുമ്പ് എത്തിച്ചേരണം</strong>
    <p>സൂര്യോദയത്തിന് മുമ്പ് ചികിത്സ പൂർത്തിയാക്കേണ്ടതുണ്ട്. സീറ്റുകൾ പരിമിതമായതിനാൽ മുൻകൂട്ടി ഫോൺ / വാട്സ്ആപ്പ് വഴി സമയം ബുക്ക് ചെയ്യുക.</p>
</div>

<h2>സ്ഥലവും സമ്പർക്ക വിവരങ്ങളും</h2>
<p>
    <strong>സ്ഥലം:</strong> ട്രീറ്റ്മെന്റ് സ്പോട്ട്, കൊച്ചിൻ റിഫ്രാക്ടറീസ് ആൻഡ് മിനറൽസ്, പട്ടരുമടം ഡിസ്പെൻസറിയ്ക്ക് എതിർവശത്ത്, കരിയാട്, മേക്കാട് പി.ഒ., എറണാകുളം ജില്ല.
</p>

<p>
    <strong>ഡോ. സജീവ് ദേവ്:</strong> 77366 09299 | 94473 65545
</p>

<p class="pt-4">
    <a href="/migraine-treatment" class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-700 text-white rounded-full font-bold text-sm shadow hover:bg-emerald-800">
        ⚡ വിശദവിവരങ്ങൾക്കും ഓൺലൈൻ വാട്സ്ആപ്പ് ബുക്കിംഗിനും ഇവിടെ ക്ലിക്ക് ചെയ്യുക &rarr;
    </a>
</p>
HTML
                ,
                'product_slugs' => ['ruthu-santhi-oil']
            ],
        ];

        foreach ($articles as $data) {
            $productSlugs = $data['product_slugs'] ?? [];
            unset($data['product_slugs']);

            $post = BlogPost::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            if (!empty($productSlugs)) {
                $productIds = Product::whereIn('slug', $productSlugs)->pluck('id');
                $post->products()->sync($productIds);
            }
        }
    }
}
