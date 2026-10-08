<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaKanthariHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Kanthari Honey (Bird's Eye Chilli Infused Honey) details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-kanthari-honey-birds-eye-chilli-infused-honey-for-cholesterol-care-250g';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-KNT-HNY250')
            ->orWhere('slug', 'like', '%kanthari-honey%')
            ->orWhere(function ($q) {
                $q->where('id', 57)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%kanthari%')
                          ->orWhere('slug', 'like', '%honey%');
                  });
            })
            ->get();

        $enTitle = "Aliya Kanthari Honey (കാന്താരി തേൻ) – Bird's Eye Chilli Infused Honey for Cholesterol Care (250g)";
        $enShortDesc = "A potent traditional Kerala wellness blend of pure natural honey infused with fiery Kanthari (Bird's Eye Chilli), crafted to help reduce bad cholesterol, boost metabolism, and promote fat breakdown.";

        $enBenefits = "• Advanced Lipid & Cholesterol Management: High capsaicin levels in raw Kanthari help break down arterial plaque, lower bad LDL cholesterol, and improve healthy HDL balance.\n" .
                      "• Thermogenic Metabolism & Weight Management: Stimulates brown adipose tissue to ignite thermogenesis, burning stubborn fat reserves and accelerating sluggish metabolic rates.\n" .
                      "• Cardiovascular Vitality & Healthy Circulation: Keeps blood vessels clear, dilated, and flexible, supporting smooth cardiovascular flow and heart wellness.\n" .
                      "• Clears Sinuses & Respiratory Passages: Penetrating thermal action opens clogged nasal passages, expels stubborn phlegm, and alleviates sinus headaches.\n" .
                      "• Gut Metabolism & Toxic Waste Expulsion: Stimulates peristalsis, burns gut Ama (undigested toxins), and curbs unhealthy sugar cravings.";

        $enIngredients = "• Authentic Kerala Kanthari Mulaku (Bird's Eye Chilli / Capsicum frutescens): Sun-ripened, organic indigenous green/white chillies bursting with bioactive capsaicin and Vitamin C.\n" .
                         "• 100% Pure Raw Honey: Natural wild forest honey that acts as an Ayurvedic carrier and soothes the digestive lining while preserving potency.\n" .
                         "• 100% Natural: Free from synthetic colorants, preservatives, and refined sugars.";

        $enUsage = "• Recommended Dosage: Take 1 teaspoon daily in the morning on an empty stomach with a cup of warm water.\n" .
                   "• Beginner Guidance: Start with 1/2 teaspoon to adjust to the gentle, spicy warmth of authentic Kanthari.\n" .
                   "• Storage: Keep in a cool, dry area away from direct sunlight. Do not put wet spoons into the jar.";

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
                'name' => 'ആലിയ കാന്താരി തേൻ – കൊളസ്ട്രോൾ നിയന്ത്രണത്തിനും മെറ്റബോളിസത്തിനും (250g)',
                'short_description' => 'നാടൻ കാന്താരി മുളകും ശുദ്ധമായ കാട്ടുതേനും ചേർത്തൊരുക്കിയ കേരളത്തിന്റെ പരമ്പരാഗത ഔഷധക്കൂട്ട്. ചീത്ത കൊളസ്ട്രോൾ കുറയ്ക്കാനും, അമിതവണ്ണം നിയന്ത്രിക്കാനും, ഹൃദയാരോഗ്യം സംരക്ഷിക്കാനും അത്യുത്തമം.',
                'benefits' => "• കൊളസ്ട്രോൾ നിയന്ത്രണം: കാന്താരിയിലെ കാപ്സെയ്സിൻ (Capsaicin) രക്തക്കുഴലുകളിൽ അടിഞ്ഞുകൂടുന്ന കൊഴുപ്പും ചീത്ത കൊളസ്ട്രോളും (LDL) ട്രൈഗ്ലിസറൈഡുകളും അലിയിച്ചു കളയാൻ സഹായിക്കുന്നു.\n" .
                              "• അമിതവണ്ണവും അടിവയറ്റിലെ കൊഴുപ്പും കുറയ്ക്കുന്നു: ശരീരത്തിലെ മെറ്റബോളിസം വേഗത്തിലാക്കി കൊഴുപ്പ് വേഗത്തിൽ കത്തിച്ചുകളയാനും ശരീരഭാരം നിയന്ത്രിക്കാനും സഹായിക്കുന്നു.\n" .
                              "• ഹൃദയാരോഗ്യം സംരക്ഷിക്കുന്നു: രക്തചംക്രമണം സുഗമമാക്കുകയും രക്തക്കുഴലുകളുടെ ഇലാസ്തികത വർദ്ധിപ്പിക്കുകയും ചെയ്ത് ഹൃദയത്തിന്റെ ആരോഗ്യം കാത്തുസൂക്ഷിക്കുന്നു.\n" .
                              "• സൈനസ്, കഫക്കെട്ട് എന്നിവയ്ക്ക് ശമനം: മൂക്കടപ്പ്, സൈനസൈറ്റിസ്, വിട്ടുമാറാത്ത കഫക്കെട്ട് എന്നിവ ഇല്ലാതാക്കാൻ ഇതിന്റെ എരിവും ഔഷധവീര്യവും സഹായിക്കും.\n" .
                              "• ദഹനവും വിശപ്പും ക്രമീകരിക്കുന്നു: അനാവശ്യമായ കൊതി കുറയ്ക്കുകയും ശരീരത്തിലെ വിഷാംശങ്ങൾ ദഹനത്തിലൂടെ സ്വാഭാവികമായി പുറന്തള്ളുകയും ചെയ്യുന്നു.",
                'ingredients' => "• നാടൻ കാന്താരി മുളക് (Capsicum frutescens): ഔഷധഗുണം നിറഞ്ഞ കേരളത്തിലെ ശുദ്ധമായ പച്ച കാന്താരി.\n" .
                                 "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത തേൻ: ചൂടാക്കാത്തതും ശുദ്ധവുമായ പ്രകൃതിദത്ത കാട്ടുതേൻ.\n" .
                                 "• യാതൊരുവിധ കൃത്രിമ പ്രിസർവേറ്റീവുകളോ പഞ്ചസാരയോ അടങ്ങിയിട്ടില്ല.",
                'usage' => "• കഴിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിൽ 1 ടീസ്പൂൺ കാന്താരി തേൻ ഒരു ഗ്ലാസ് ഇളംചൂടുവെള്ളത്തിൽ ചേർത്ത് കുടിക്കുക.\n" .
                           "• തുടക്കക്കാർക്ക്: എരിവ് ശീലമാകുന്നതിനായി ആദ്യത്തെ കുറച്ചുദിവസം അര ടീസ്പൂൺ വീതം ഉപയോഗിച്ച് തുടങ്ങുക.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: എപ്പോഴും ഉണങ്ങിയ സ്പൂൺ ഉപയോഗിക്കുക. സാധാരണ ഊഷ്മാവിൽ സൂക്ഷിക്കുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया कांधारी हनी (बर्ड्स आई चिली शहद) – कोलेस्ट्रॉल केयर और मेटाबॉलिज्म (250g)',
                'short_description' => 'केरल की तीखी कांधारी मिर्च (बर्ड्स आई चिली) और शुद्ध शहद का शक्तिशाली आयुर्वेदिक योग। खराब कोलेस्ट्रॉल घटाने, मेटाबॉलिज्म तेज करने और फैट बर्न करने में अत्यंत प्रभावी।',
                'benefits' => "• कोलेस्ट्रॉल और ट्राइग्लिसराइड्स नियंत्रण: कांधारी मिर्च में मौजूद कैप्सैसिन धमनियों में जमे फैट और बैड कोलेस्ट्रॉल (LDL) को पिघलाने में मदद करता है।\n" .
                              "• वजन घटाने और मेटाबॉलिज्म में सहायक: शरीर के मेटाबॉलिज्म को तेज कर जिद्दी चर्बी और फैट को तेजी से बर्न करता है।\n" .
                              "• हृदय स्वास्थ्य और रक्त संचार: नसों में ब्लॉकेज की संभावना कम कर रक्त प्रवाह को सुचारू और हृदय को स्वस्थ रखता है।\n" .
                              "• साइनस और बंद नाक से तुरंत राहत: तीखापन और प्राकृतिक गुण साइनस की रुकावट खोलते हैं और सीने के कफ को साफ करते हैं।\n" .
                              "• पाचन सुधार और टॉक्सिन्स की सफाई: आंतों की क्रियाशीलता बढ़ाकर शरीर से अपशिष्ट और अतिरिक्त चर्बी को बाहर करता है।",
                'ingredients' => "• प्राकृतिक केरल कांधारी मिर्च (Capsicum frutescens): तीखे कैप्सैसिन और विटामिन सी से भरपूर औषधीय मिर्च।\n" .
                                 "• 100% शुद्ध प्राकृतिक कच्चा शहद: शुद्ध शहद जो आंतों को शीतलता प्रदान कर मिर्च के प्रभाव को संतुलित करता है।\n" .
                                 "• शून्य रसायन: किसी भी प्रकार के प्रिजर्वेटिव या अतिरिक्त शर्करा से पूरी तरह मुक्त।",
                'usage' => "• सेवन विधि: प्रतिदिन सुबह खाली पेट 1 चम्मच कांधारी शहद एक कप गुनगुने पानी के साथ लें।\n" .
                           "• शुरुआत में: स्वाद और तीखेपन की आदत डालने के लिए पहले कुछ दिन आधा चम्मच से शुरुआत करें।\n" .
                           "• भंडारण: सूखे चम्मच का उपयोग करें। सीधे धूप और नमी से दूर रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா காந்தாரி தேன் (காந்தாரி மிளகாய் தேன்) – கொலஸ்ட்ரால் கட்டுப்பாடு & மெட்டபாலிசம் (250g)',
                'short_description' => 'கேரளாவின் காரசாரமான காந்தாரி மிளகாய் மற்றும் தூய தேன் கலந்த பாரம்பரிய மருந்து. கெட்ட கொலஸ்ட்ராலை குறைக்கவும், உடல் எடையை கட்டுப்படுத்தவும், இதய நலம் காக்கவும் சிறந்தது.',
                'benefits' => "• கொலஸ்ட்ரால் மற்றும் கொழுப்பு குறைப்பு: காந்தாரி மிளகாயில் உள்ள கேப்சைசின் ரத்த நாளங்களில் படியும் கெட்ட கொழுப்பை (LDL) கரைத்து ரத்த ஓட்டத்தை சீராக்குகிறது.\n" .
                              "• உடல் எடை குறைப்பு மற்றும் மெட்டபாலிசம்: உடலின் வளர்சிதை மாற்றத்தை வேகப்படுத்தி தேவையில்லாத தொப்பை மற்றும் கொழுப்பை எரிக்க உதவுகிறது.\n" .
                              "• இதய பாதுகாப்பு: இதய நாளங்களில் கொழுப்பு படிவதை தடுத்து சீரான ரத்த அழுத்தத்திற்கு வழிவகுக்கிறது.\n" .
                              "• சைனஸ் மற்றும் நெஞ்சு சளி நிவாரணம்: காரமும் தேனின் மூலிகைத் தன்மையும் அடைபட்ட மூக்கு, சைனஸ் மற்றும் விடாப்பிடியான சளியை எளிதில் வெளியேற்றுகிறது.\n" .
                              "• செரிமானம் மற்றும் நச்சு நீக்கம்: உடலின் கழிவுகளை வெளியேற்றி பசியை கட்டுப்படுத்தி உற்சாகம் அளிக்கிறது.",
                'ingredients' => "• தூய நாட்டு காந்தாரி மிளகாய் (Capsicum frutescens): கேப்சைசின் சத்துக்கள் நிறைந்த நாட்டு வகை காந்தாரி.\n" .
                                 "• 100% தூய இயற்கை தேன்: கலப்படமற்ற சுத்தமான இயற்கை தேன்.\n" .
                                 "• செயற்கை நிறங்கள் அல்லது ரசாயனங்கள் எதுவுமற்ற சுத்தமான வடிவம்.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் காலையில் வெறும் வயிற்றில் 1 தேக்கரண்டி காந்தாரி தேனை ஒரு டம்ளர் வெதுவெதுப்பான வெந்நீரில் கலந்து பருகவும்.\n" .
                           "• ஆரம்ப பயன்பாடு: காரத்தை தாங்க முதலில் அரை தேக்கரண்டியாக ஆரம்பித்து பின் அளவை அதிகரிக்கவும்.\n" .
                           "• சேமிப்பு முறை: உலர்ந்த கரண்டியை பயன்படுத்தவும். நேரடி வெயில் படாமல் வைக்கவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'digestion', 'chest'];
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
                $this->command?->info("Updated Aliya Kanthari Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'honey-preserves'],
                ['name' => 'Honey & Preserves', 'description' => 'Pure wild forest honey and herbal berry infusions.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-KNT-HNY250',
                'price' => 300.00,
                'sale_price' => 300.00,
                'stock_quantity' => 100,
                'unit_size' => '250 g',
                'badge' => 'Kanthari Infused Wild Honey',
                'featured_image' => 'https://yuvann.com/storage/products/091518a8-7a88-4f11-bbc5-17c997b6c10e.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 19,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Kanthari Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
