<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AaliyaRealJaggeryTranslationSeeder extends Seeder
{
    /**
     * Seed Aaliya Real Jaggery (Sharkkara) details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aaliya-real-jaggery-sharkkara';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'AAL-RJ-1KG')
            ->orWhere('slug', 'like', '%jaggery%')
            ->orWhere('slug', 'like', '%sharkkara%')
            ->orWhere(function ($q) {
                $q->where('id', 16)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%jaggery%')
                          ->orWhere('slug', 'like', '%sharkkara%');
                  });
            })
            ->get();

        $enTitle = 'Aaliya Real Jaggery (Sharkkara) – 100% Pure Chemical-Free Traditional Cane Jaggery (1 Kg)';
        $enShortDesc = '100% pure, stone-free sugarcane jaggery designed for perfect tea, payasam, and healthy digestion. Free from sulfur, chemical bleaching agents, and artificial coloring.';

        $enBenefits = "• Rich Natural Iron & Anti-Anemia Superfood: Loaded with organic, bioavailable iron and folates that actively support hemoglobin synthesis and combat everyday lethargy.\n" .
                      "• Natural Lung & Respiratory Cleanser: Traditional Ayurvedic detoxifier that traps dust, micro-pollutants, and smoke particles from the lungs, trachea, and respiratory passages.\n" .
                      "• Gentle Digestion & Constipation Relief: Activates digestive enzymes in the stomach and intestines, easing bowel movements and relieving post-prandial bloating.\n" .
                      "• Chemical-Free & Sulfur-Free Purity: Meticulously clarified using natural plant extracts without toxic sodium hydrosulfite (hydros), chemical bleaches, or synthetic clarifying agents.\n" .
                      "• Wholesome Daily Sugar Replacement: Lowers glycemic stress compared to refined white sugar; packed with potassium and magnesium to sustain cellular hydration and steady energy.";

        $enIngredients = "• 100% Pure Traditional Sugarcane Juice (Saccharum officinarum / Guda): Slowly simmered and concentrated using traditional iron vessels to lock in natural minerals.\n" .
                         "• Clarified with Natural Plant Mucilage (Okra/Herbal extracts): Zero chemical whitening agents or synthetic additives.\n" .
                         "• Clean & Stone-Free: Multi-stage filtered to guarantee 100% grit-free, stone-free crystalline texture.";

        $enUsage = "• Daily Healthy Sweetener: Use as a 1:1 wholesome replacement for refined sugar in tea, coffee, porridge, and herbal infusions.\n" .
                   "• Traditional Culinary Delicacies: Ideal for authentic Kerala payasam, unniyappam, sharkkara varatti, and traditional sweets without curdling milk.\n" .
                   "• Post-Meal Digestive Habit: Enjoy a small bite (approx. 5–10g) after heavy meals to stimulate digestion and purify the palate.\n" .
                   "• Storage Instructions: Store in an airtight container in a cool, dry place. Protect from moisture.";

        $translations = [
            'en' => [
                'locale' => 'en',
                'name' => $enTitle,
                'short_description' => $enShortDesc,
                'benefits' => $enBenefits,
                'ingredients' => $enIngredients,
                'usage' => $enUsage,
                'audio_url' => null,
            ],
            'ml' => [
                'locale' => 'ml',
                'name' => 'ആലിയ റിയൽ ശർക്കര – 100% ശുദ്ധമായ പരമ്പരാഗത കരിമ്പ് ശർക്കര (1 Kg)',
                'short_description' => 'കല്ലും മണലും രാസവസ്തുക്കളുമില്ലാത്ത 100% ശുദ്ധമായ കരിമ്പ് ശർക്കര. ചായയ്ക്കും, പായസത്തിനും, ആയുർവേദ ഔഷധക്കൂട്ടുകൾക്കും, ഉദരാരോഗ്യത്തിനും ഏറ്റവും ഉത്തമം. യാതൊരുവിധ ബ്ലീച്ചിംഗ് ഏജന്റുകളും ചേർക്കാത്തത്.',
                'benefits' => "• സ്വാഭാവിക അയേൺ കലവറയും വിളർച്ച പരിഹാരവും: പ്രകൃതിദത്ത അയേൺ, മഗ്നീഷ്യം, പൊട്ടാസ്യം എന്നിവയാൽ സമ്പന്നമായതിനാൽ രക്തത്തിലെ ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാനും ക്ഷീണം അകറ്റാനും സഹായിക്കുന്നു.\n" .
                              "• ശ്വാസകോശ ശുദ്ധീകരണം: വായുവിലെ പൊടിയും പുകയും മറ്റും മൂലം ശ്വാസകോശത്തിലും ശ്വാസനാളത്തിലും അടിഞ്ഞുകൂടുന്ന മാലിന്യങ്ങളെ പുറന്തള്ളാൻ സഹായിക്കുന്ന പരമ്പരാഗത ആയുർവേദ കൂട്ട്.\n" .
                              "• സുഗമമായ ദഹനവും മലബന്ധ നിവാരണവും: ആമാശയത്തിലെ ദഹനരസങ്ങളെ ഉത്തേജിപ്പിക്കുകയും ഭക്ഷണം പെട്ടെന്ന് ദഹിപ്പിച്ച് മലബന്ധവും വയറു വീർക്കലും ഒഴിവാക്കുകയും ചെയ്യുന്നു.\n" .
                              "• രാസവസ്തുക്കളും ഹൈഡ്രോസും ഇല്ലാത്ത ശുദ്ധി: കരിമ്പ് നീര് ശുദ്ധീകരിക്കാൻ കൃത്രിമ ഹൈഡ്രോസോ രാസവസ്തുക്കളോ ഉപയോഗിക്കാതെ തികച്ചും പ്രകൃതിദത്തമായി തയ്യാറാക്കിയത്.\n" .
                              "• പഞ്ചസാരയ്ക്ക് പകരം ഉത്തമ പോഷകം: റിഫൈൻഡ് പഞ്ചസാരയുണ്ടാക്കുന്ന ദോഷങ്ങളില്ലാതെ ശരീരത്തിന് ദീർഘനേരം നിലനിൽക്കുന്ന ഊർജ്ജം പ്രദാനം ചെയ്യുന്നു.",
                'ingredients' => "• 100% ശുദ്ധമായ നാടൻ കരിമ്പ് നീര് (Saccharum officinarum): പാരമ്പര്യ രീതിയിൽ വൻ ഉരുളികളിൽ കാച്ചി കുറുക്കിയെടുത്ത ഗുണമേന്മയുള്ള ശർക്കര.\n" .
                                 "• പ്രകൃതിദത്ത രീതിയിൽ ശുദ്ധീകരിച്ചത്: രാസവസ്തുക്കളോ സിന്തറ്റിക് നിറങ്ങളോ ചേർക്കാതെ സസ്യജന്യ സത്തുകൾ ഉപയോഗിച്ച് അരിച്ചെടുത്തത്.\n" .
                                 "• കല്ലും മണ്ണും പൂർണ്ണമായി നീക്കം ചെയ്തത്: ഏറ്റവും ശുദ്ധമായ രൂപം.",
                'usage' => "• നിത്യേനയുള്ള ഉപയോഗം: പഞ്ചസാരയ്ക്ക് പകരമായി ചായ, കാപ്പി, കുറുക്കുകൾ, ഔഷധ കഷായങ്ങൾ എന്നിവയിൽ മധുരത്തിനായി ഉപയോഗിക്കുക.\n" .
                           "• പരമ്പരാഗത വിഭവങ്ങൾക്ക്: പാൽ പിരിയാതെ സ്വാദിഷ്ടമായ പായസം, ഉണ്ണിയപ്പം, ശർക്കര ഉപ്പേരി, അട എന്നിവ തയ്യാറാക്കാൻ ഏറ്റവും അനുയോജ്യം.\n" .
                           "• ദഹനത്തിന്: ഭക്ഷണത്തിന് ശേഷം ഒരു ചെറിയ കഷണം ശർക്കര കഴിക്കുന്നത് ദഹനം വേഗത്തിലാക്കാൻ നല്ലതാണ്.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: ഈർപ്പമില്ലാത്ത വായുകടക്കാത്ത പാത്രത്തിൽ അടച്ചു സൂക്ഷിക്കുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया रियल गुड़ (शर्करा) – 100% शुद्ध पारंपरिक गन्ना गुड़ (1 Kg)',
                'short_description' => 'कंकड़-पत्थर और रसायनों से पूरी तरह मुक्त 100% शुद्ध देसी गन्ना गुड़। स्वादिष्ट चाय, पारंपरिक मिठाइयों, फेफड़ों की सफाई और बेहतर पाचन के लिए सर्वश्रेष्ठ प्राकृतिक मिठास।',
                'benefits' => "• प्राकृतिक आयरन और हीमोग्लोबिन वर्धक: प्राकृतिक आयरन, मैग्नीशियम और खनिजों से भरपूर, जो शरीर में हीमोग्लोबिन स्तर बढ़ाकर एनीमिया और सुस्ती को दूर करता है।\n" .
                              "• फेफड़ों व श्वासनली की सफाई (डिटॉक्स): प्रदूषण, धूल और धुएं से फेफड़ों में जमा होने वाले विषाक्त तत्वों को बाहर निकालकर श्वास तंत्र को स्वस्थ रखता है।\n" .
                              "• पाचन में सुधार और कब्ज से राहत: भोजन के बाद पाचक एंजाइम्स को सक्रिय कर गैस, अपच और पुरानी कब्ज की समस्या को प्राकृतिक रूप से समाप्त करता है।\n" .
                              "• केमिकल और हाइड्रो रहित शुद्धता: किसी भी हानिकारक रासायनिक ब्लीच (सोडियम हाइड्रोसल्फाइट) या कृत्रिम रंगों के बिना तैयार किया गया शुद्ध गुड़।\n" .
                              "• सफेद चीनी का स्वास्थ्यवर्धक विकल्प: रिफाइंड चीनी की तुलना में रक्त शर्करा को अचानक बढ़ाए बिना शरीर को निरंतर ऊर्जा व पोषण देता है।",
                'ingredients' => "• 100% शुद्ध ताजे गन्ने का रस: पारंपरिक लोहे के कड़ाहों में धीमी आंच पर पकाया गया खनिज-युक्त देसी गुड़।\n" .
                                 "• प्राकृतिक वनस्पति विधि से शोधित: रासायनिक ब्लीचिंग एजेंटों से पूरी तरह मुक्त।\n" .
                                 "• कंकड़-मुक्त और स्वच्छ: विशेष रूप से छाना हुआ शुद्ध स्वरूप।",
                'usage' => "• दैनिक उपयोग: चाय, दूध, काढ़े और मिठाइयों में सफेद चीनी के स्थान पर निसंकोच उपयोग करें।\n" .
                           "• भोजन के बाद: भारी भोजन के बाद 1 छोटा टुकड़ा गुड़ खाने से पाचन क्रिया तीव्र और सुचारू होती है।\n" .
                           "• भंडारण: नमी से दूर एयरटाइट डिब्बे में सामान्य तापमान पर रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா ரியல் வெல்லம் (சர்க்கரை) – 100% தூய பாரம்பரிய கரும்பு வெல்லம் (1 Kg)',
                'short_description' => 'கல், மண் மற்றும் ரசாயன கலப்பற்ற 100% தூய நாட்டு கரும்பு வெல்லம். சுவையான பாயாசம், பாரம்பரிய தேநீர், நுரையீரல் சுத்தி மற்றும் சிறந்த செரிமானத்திற்கு உகந்த இயற்கையான அமிர்தம்.',
                'benefits' => "• இயற்கையான இரும்புச்சத்து மற்றும் ரத்த விருத்தி: உடலுக்கு தேவையான இயற்கை இரும்புச்சத்து மற்றும் தாதுக்கள் நிறைந்து ரத்த சோகையை நீக்கி அன்றாட சுறுசுறுப்பை கூட்டுகிறது.\n" .
                              "• நுரையீரல் மற்றும் சுவாசப்பாதை தூய்மை: காற்றில் உள்ள தூசி மற்றும் மாசுகளை நுரையீரலில் இருந்து வெளியேற்றி சுவாசப்பாதையை தூய்மையாக வைக்க உதவுகிறது.\n" .
                              "• சிறந்த செரிமானம் மற்றும் மலச்சிக்கல் தீர்வு: உணவுக்கு பின் செரிமான சுரப்பிகளை தூண்டி வயிறு உப்புசம், அஜீரணம் மற்றும் மலச்சிக்கலை இயற்கையாக போக்குகிறது.\n" .
                              "• ரசாயனங்கள் மற்றும் ஹைட்ரோஸ் இல்லாத தூய்மை: ரசாயன வெளுப்பான்கள் (Hydros), செயற்கை சாயம் எதுவுமின்றி பாரம்பரிய இயற்கை முறையில் காய்ச்சி எடுக்கப்பட்டது.\n" .
                              "• வெள்ளை சர்க்கரைக்கு ஆரோக்கியமான மாற்று: வெள்ளை சர்க்கரைக்கு மாற்றாக உடலுக்கு சோர்வில்லாத தொடர் ஆற்றலையும் ஆரோக்கியத்தையும் தருகிறது.",
                'ingredients' => "• 100% தூய இயற்கை கரும்புச் சாறு: பாரம்பரிய முறையில் பெரிய கொப்பரைகளில் சுண்டக் காய்ச்சி எடுக்கப்பட்ட தூய நாட்டு வெல்லம்.\n" .
                                 "• இயற்கை முறையில் வடிகட்டப்பட்டது: கல், மணல் இன்றி பலமுறை வடிகட்டி பதப்படுத்தப்பட்ட சுத்தமான வெல்லம்.\n" .
                                 "• செயற்கை ரசாயனங்கள் அல்லது நிறமூட்டிகள் எதுவுமற்றது.",
                'usage' => "• அன்றாட பயன்பாடு: தேநீர், காபி, கஞ்சி மற்றும் பாரம்பரிய மூலிகை பானங்களில் சர்க்கரைக்கு பதிலாக பயன்படுத்தவும்.\n" .
                           "• சமையல் பயன்பாடு: பால் திரியாமல் சுவையான பாயாசம், அதிரசம், பணியாரம் மற்றும் பாரம்பரிய பலகாரங்கள் செய்ய சிறந்தது.\n" .
                           "• செரிமானத்திற்கு: மதிய அல்லது இரவு உணவுக்குப் பின் ஒரு சிறிய துண்டு வெல்லம் சாப்பிடுவது உணவை எளிதில் செரிக்கச் செய்யும்.\n" .
                           "• சேமிப்பு முறை: ஈரப்பதம் படாத காற்றுப்புகாத பாத்திரத்தில் வைக்கவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['digestion', 'whole-body', 'chest'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'name' => $enTitle,
                    'short_description' => $enShortDesc,
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                ]);
                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                $this->command?->info("Updated Aaliya Real Jaggery (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'natural-sweeteners'],
                ['name' => 'Natural Sweeteners', 'description' => 'Pure and healthy sugar substitutes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'AAL-RJ-1KG',
                'price' => 180.00,
                'sale_price' => 180.00,
                'stock_quantity' => 100,
                'unit_size' => '1 kg',
                'badge' => '100% Pure Cane Jaggery',
                'featured_image' => 'https://yuvann.com/storage/products/878afa56-84ca-46e6-ba4f-6a7b5334ce86.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 21,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aaliya Real Jaggery (#{$product->id}) with full multilingual content.");
        }
    }
}
