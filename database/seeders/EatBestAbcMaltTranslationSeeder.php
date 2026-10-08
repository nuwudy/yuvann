<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class EatBestAbcMaltTranslationSeeder extends Seeder
{
    /**
     * Seed Eat Best ABC Malt product details and full 4-language translations.
     */
    public function run(): void
    {
        $slug = 'eat-best-abc-malt-apple-beetroot-carrot-nutritional-health-drink-mix';

        $product = Product::where('slug', $slug)
            ->orWhere('slug', 'like', '%eat-best-abc-malt%')
            ->orWhere('sku', 'EBT-ABC-MLT400')
            ->first();

        $enTitle = 'Eat Best ABC Malt (ആരോഗ്യത്തിന്റെ കലവറ) – Apple, Beetroot & Carrot Nutritional Health Drink Mix';
        $enShortDesc = 'A 100% natural, nutrient-dense health drink mix made from fresh Apple, Beetroot, and Carrot sweetened with unrefined traditional jaggery. Rich in vitamins, dietary fiber, iron, and plant energy for whole-family vitality.';

        $enBenefits = "• Boosts Natural Hemoglobin & Vitality: Naturally rich in iron and folates from fresh beetroot, helping combat fatigue, low energy, and nutritional anemia.\n" .
                      "• Radiant Skin & Cellular Rejuvenation: Loaded with antioxidants, beta-carotene (Vitamin A), and Vitamin C from apples and carrots for glowing, youthful skin.\n" .
                      "• Strengthens Immune Defense: Essential micronutrients and minerals fortify the body's natural resistance against seasonal ailments.\n" .
                      "• Promotes Healthy Digestion & Gut Health: High in prebiotic dietary fiber, supporting smooth bowel regularity, gut microbiome balance, and gentle detoxification.\n" .
                      "• Clean Energy Without Refined Sugar: Sweetened naturally with mineral-rich traditional jaggery (Nattu Chakkarai); free from artificial preservatives, maltodextrin, and synthetic colors.";

        $enIngredients = "• Fresh Mountain Apples (Malus domestica): Rich in pectin, quercetin, and Vitamin C for heart health, cellular energy, and daily detoxification.\n" .
                         "• Organic Farm Beetroot (Beta vulgaris): Natural vasodilator and hematinic root that enhances blood oxygenation, stamina, and liver cleansing.\n" .
                         "• Sweet Juicy Carrots (Daucus carota): Rich source of beta-carotene, lutein, and provitamin A for ocular wellness and radiant dermal health.\n" .
                         "• Traditional Unrefined Country Jaggery: Rich in natural iron, magnesium, and trace minerals providing steady metabolic energy without blood sugar spikes.\n" .
                         "• Cardamom & Dry Ginger (Elaichi & Shunthi): Digestive carminatives (Deepana-Pachana) that enhance bioavailability, nutrient absorption, and delightful aroma.\n" .
                         "• Crunchy Cashews & Almonds (Dry Fruits): Nutrient-dense healthy fats and natural plant proteins for strength and brain nourishment.";

        $enUsage = "• With Warm Milk: Add 1 to 2 tablespoons (15-20g) of Eat Best ABC Malt to a cup of warm boiled milk. Stir well and serve without adding extra sugar.\n" .
                   "• Refreshing Cold Beverage: Mix with chilled milk or blend into smoothies for a revitalizing, nutrient-dense afternoon energy drink.\n" .
                   "• Ideal For All Ages: Perfect daily nourishment for growing children, working professionals, pregnant or nursing mothers, and elderly elders.";

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
                'name' => 'ഈറ്റ് ബെസ്റ്റ് എബിസി മാൾട്ട് (ആരോഗ്യത്തിന്റെ കലവറ) – ആപ്പിൾ, ബീറ്റ്റൂട്ട് & ക്യാരറ്റ് ന്യൂട്രീഷ്യനൽ ഹെൽത്ത് മിക്സ്',
                'short_description' => 'ശുദ്ധമായ ആപ്പിൾ, ബീറ്റ്റൂട്ട്, ക്യാരറ്റ് എന്നിവ പരമ്പരാഗത ശർക്കര ചേർത്ത് തയ്യാറാക്കിയ 100% പ്രകൃതിദത്ത പോഷക സമ്പുഷ്ട മാൾട്ട് മിക്സ്. ഇരുമ്പ് സത്തും വിറ്റാമിനുകളും നിറഞ്ഞ ആരോഗ്യ പാനീയം.',
                'benefits' => "• രക്തത്തിലെ ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കുന്നു: ബീറ്റ്റൂട്ടിലെ സ്വാഭാവിക അയേണും ഫോളേറ്റുകളും വിളർച്ച (Anemia), ക്ഷീണം എന്നിവ അകറ്റി ശരീരത്തിന് നവോന്മേഷം നൽകുന്നു.\n" .
                              "• ചർമ്മത്തിന് തിളക്കവും യുവത്വവും: ആപ്പിളിലും ക്യാരറ്റിലുമുള്ള വിറ്റാമിൻ സി, എ, ആന്റിഓക്‌സിഡന്റുകൾ ചർമ്മത്തിന്റെ സ്വാഭാവിക കാന്തിയും മൃദുത്വവും നിലനിർത്തുന്നു.\n" .
                              "• പ്രതിരോധശേഷി വർദ്ധിപ്പിക്കുന്നു: കുട്ടികൾക്കും മുതിർന്നവർക്കും കാലാവസ്ഥാ വ്യതിയാനങ്ങളിൽ രോഗപ്രതിരോധ ശേഷി നൽകുന്ന അവശ്യ വിറ്റാമിനുകൾ അടങ്ങിയിരിക്കുന്നു.\n" .
                              "• ദഹനത്തിനും ഉദരാരോഗ്യത്തിനും ഉത്തമം: സ്വാഭാവിക നാരുകൾ അടങ്ങിയിട്ടുള്ളതിനാൽ ദഹനം സുഗമമാക്കാനും വയറ്റിലെ അസ്വസ്ഥതകൾ ഒഴിവാക്കാനും സഹായിക്കുന്നു.\n" .
                              "• കൃത്രിമ മധുരമോ പ്രിസർവേറ്റീവുകളോ ഇല്ല: വെളുത്ത പഞ്ചസാരയോ കൃത്രിമ രാസവസ്തുക്കളോ ഇല്ലാതെ പരമ്പരാഗത നാടൻ ശർക്കര ചേർത്താണ് തയ്യാറാക്കിയിരിക്കുന്നത്.",
                'ingredients' => "• ശുദ്ധമായ മലയോര ആപ്പിൾ (Apple): ഹൃദയാരോഗ്യത്തിനും ഊർജ്ജത്തിനും ഉതകുന്ന പെക്റ്റിനും ആന്റിഓക്‌സിഡന്റുകളും സമൃദ്ധം.\n" .
                                 "• നാടൻ ബീറ്റ്റൂട്ട് (Beetroot): രക്തയോട്ടം കൂട്ടാനും രക്തശുദ്ധീകരണത്തിനും സഹായിക്കുന്ന സ്വാഭാവിക ഔഷധ പച്ചക്കറി.\n" .
                                 "• നല്ല ക്യാരറ്റ് (Carrot): കണ്ണിന്റെ കാഴ്ചശക്തിക്കും ചർമ്മത്തിനും ഗുണകരമായ ബീറ്റാ കരോട്ടിനും വിറ്റാമിൻ എയും.\n" .
                                 "• പരമ്പരാഗത നാടൻ ശർക്കര (Jaggery): ധാതുക്കളും ഇരുമ്പ് സത്തും നിറഞ്ഞ ശുദ്ധമായ നാടൻ മധുരം.\n" .
                                 "• ഏലക്ക & ചുക്ക് (Cardamom & Dry Ginger): ദഹനം എളുപ്പമാക്കാനും രുചിയും സുഗന്ധവും നൽകാനും സഹായിക്കുന്നു.\n" .
                                 "• കശുവണ്ടി & ബദാം (Dry Fruits): കുട്ടികളുടെ ശാരീരിക-മാനസിക വളർച്ചയ്ക്ക് ആവശ്യമായ പ്രകൃതിദത്ത പ്രോട്ടീനും നല്ല കൊഴുപ്പുകളും.",
                'usage' => "• ചൂടുപാലിൽ ചേർത്ത് കഴിക്കാൻ: 1-2 ടേബിൾസ്പൂൺ (15-20 ഗ്രാം) എബിസി മാൾട്ട് ഒരു ഗ്ലാസ് ചെറുചൂടുള്ള പാലിൽ ചേർത്ത് നന്നായി ഇളക്കി കുടിക്കുക (കൂടുതൽ പഞ്ചസാര ചേർക്കേണ്ടതില്ല).\n" .
                           "• തണുത്ത പാനീയമായി: തണുത്ത പാലിലോ സ്മൂത്തികളിലോ ചേർത്തും രുചികരമായ ഹെൽത്ത് ഡ്രിങ്കായി ഉപയോഗിക്കാം.\n" .
                           "• എല്ലാ പ്രായക്കാർക്കും അനുയോജ്യം: കുട്ടികൾക്കും മുതിർന്നവർക്കും മുലയൂട്ടുന്ന അമ്മമാർക്കും പ്രായമായവർക്കും ദിവസേനയുള്ള സമീകൃതാഹാരമായി ഉപയോഗിക്കാം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'ईट बेस्ट एबीसी माल्ट (आरोग्य की खान) – सेब, चुकंदर और गाजर न्यूट्रिशनल हेल्थ ड्रिंक मिक्स',
                'short_description' => 'ताजा सेब, चुकंदर और गाजर से बना 100% प्राकृतिक और पोषक तत्वों से भरपूर संपूर्ण स्वास्थ्य पेय। पारंपरिक प्राकृतिक गुड़ से मीठा किया गया।',
                'benefits' => "• हीमोग्लोबिन और ऊर्जा स्तर में वृद्धि: चुकंदर में मौजूद प्राकृतिक आयरन और फोलेट खून की कमी और दैनिक थकान को दूर करने में अत्यंत प्रभावी हैं।\n" .
                              "• त्वचा में प्राकृतिक चमक: सेब और गाजर के एंटीऑक्सीडेंट्स, विटामिन ए और सी त्वचा को स्वस्थ, चमकदार और युवा बनाए रखते हैं।\n" .
                              "• रोग प्रतिरोधक क्षमता (इम्यूनिटी) को मजबूत करे: आवश्यक विटामिन्स और मिनरल्स पूरे परिवार को मौसमी बीमारियों से सुरक्षित रखते हैं।\n" .
                              "• पाचन और पेट के लिए गुणकारी: प्राकृतिक डायटरी फाइबर पाचन क्रिया को सुगम बनाता है और पेट को साफ रखता है।\n" .
                              "• सफेद चीनी और रसायनों से पूरी तरह मुक्त: इसमें कोई रिफाइंड चीनी, प्रिजर्वेटिव या कृत्रिम रंग नहीं मिलाए गए हैं; केवल शुद्ध गुड़ का उपयोग किया गया है।",
                'ingredients' => "• ताजा सेब (Apple): पेक्टिन और विटामिन सी से भरपूर, जो हृदय और शरीर को दैनिक ऊर्जा प्रदान करता है।\n" .
                                 "• जैविक चुकंदर (Beetroot): रक्त शुद्धिकरण, बेहतर ऑक्सीजन प्रवाह और सहनशक्ति को बढ़ावा देने वाला सुपरफूड।\n" .
                                 "• मीठी गाजर (Carrot): आंखों की रोशनी और त्वचा के स्वास्थ्य के लिए विटामिन ए और बीटा-कैरोटीन का श्रेष्ठ स्रोत।\n" .
                                 "• पारंपरिक देशी गुड़ (Jaggery): आयरन और आवश्यक खनिजों से युक्त शुद्ध प्राकृतिक मिठास।\n" .
                                 "• इलायची और सोंठ (Cardamom & Dry Ginger): पाचन अग्नि को प्रदीप्त करने वाले और बेहतरीन स्वाद देने वाले तत्व।\n" .
                                 "• काजू और बादाम (Nuts): मस्तिष्क और शारीरिक विकास के लिए प्राकृतिक प्रोटीन और स्वास्थ्यवर्धक वसा।",
                'usage' => "• गुनगुने दूध के साथ: 1 से 2 बड़े चम्मच (15-20 ग्राम) एबीसी माल्ट एक कप गुनगुने दूध में मिलाकर पिएं। अतिरिक्त चीनी मिलाने की आवश्यकता नहीं है।\n" .
                           "• ठंडे पेय या स्मूदी में: गर्मियों में ठंडे दूध या शेक में मिलाकर भी इसका आनंद लिया जा सकता है।\n" .
                           "• पूरे परिवार के लिए उपयुक्त: बढ़ते बच्चों, कामकाजी वयस्कों, महिलाओं और बुजुर्गों के लिए दैनिक पोषण का उत्तम स्रोत।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஈட் பெஸ்ட் ஏபிசி மால்ட் (ஆரோக்கியத்தின் பொக்கிஷம்) – ஆப்பிள், பீட்ரூட் & கேரட் ஊட்டச்சத்து ஹெல்த் மிக்ஸ்',
                'short_description' => 'புதிய ஆப்பிள், பீட்ரூட் மற்றும் கேரட்டுடன் பாரம்பரிய நாட்டு சர்க்கரை சேர்த்து தயாரிக்கப்பட்ட 100% இயற்கையான ஊட்டச்சத்து பானம்.',
                'benefits' => "• இயற்கையான ஹீமோகுளோபின் மற்றும் புத்துணர்ச்சி: பீட்ரூட்டில் உள்ள இயற்கையான இரும்புச்சத்து மற்றும் போலேட்டுகள் ரத்த சோகை மற்றும் சோர்வை நீக்குகிறது.\n" .
                              "• சரும பொலிவு மற்றும் இளமை: ஆப்பிள் மற்றும் கேரட்டில் உள்ள வைட்டமின் ஏ, சி மற்றும் ஆன்டி-ஆக்ஸிடன்ட்கள் சருமத்திற்கு இயற்கை பொலிவை தருகிறது.\n" .
                              "• நோய் எதிர்ப்பு சக்தியை பலப்படுத்துகிறது: அத்தியாவசிய வைட்டமின்கள் மற்றும் தாதுக்கள் உடலின் நோய் எதிர்ப்பு மண்டலத்தை வலுப்படுத்துகின்றன.\n" .
                              "• சிறந்த செரிமானம் மற்றும் குடல் ஆரோக்கியம்: அதிக நார்ச்சத்து செரிமானத்தை சீராக்கி, குடல் கழிவுகளை எளிதாக வெளியேற்ற உதவுகிறது.\n" .
                              "• வெள்ளை சர்க்கரை அல்லது ரசாயனங்கள் இல்லை: வெள்ளை சர்க்கரை, பிரசர்வேடிவ்ஸ் எதுவும் இன்றி பாரம்பரிய நாட்டு வெல்லத்தால் இயற்கையாக இனிப்பூட்டப்பட்டது.",
                'ingredients' => "• மலை ஆப்பிள் (Apple): இதய நலம் மற்றும் உடல் ஆற்றலுக்கு தேவையான பெக்டின் மற்றும் வைட்டமின் சி நிறைந்தது.\n" .
                                 "• இயற்கை பீட்ரூட் (Beetroot): ரத்த ஓட்டத்தை சீராக்கி, ரத்தத்தை சுத்திகரிக்கும் இயற்கை ஊட்டச்சத்து கிழங்கு.\n" .
                                 "• சுவை கேரட் (Carrot): கண் பார்வை மற்றும் சரும நலனை பாதுகாக்கும் பீட்டா-கரோட்டின் மற்றும் வைட்டமின் ஏ.\n" .
                                 "• பாரம்பரிய நாட்டு வெல்லம் (Jaggery): இயற்கையான இரும்புச்சத்து மற்றும் தாதுக்கள் நிறைந்த சுத்தமான இனிப்பு.\n" .
                                 "• ஏலக்காய் & சுக்கு (Cardamom & Dry Ginger): செரிமானத்தை எளிதாக்கி சிறந்த நறுமணமும் சுவையும் அளிக்கும் மூலிகைகள்.\n" .
                                 "• முந்திரி & பாதாம் (Dry Fruits): மூளை மற்றும் உடல் பலத்தை அதிகரிக்கும் இயற்கை புரோட்டீன் மற்றும் சத்துக்கள்.",
                'usage' => "• வெதுவெதுப்பான பாலுடன்: 1 முதல் 2 டேபிள்ஸ்பூன் (15-20 கிராம்) ஏபிசி மால்ட்டை ஒரு டம்ளர் வெதுவெதுப்பான பாலில் கலந்து குடிக்கவும் (கூடுதல் சர்க்கரை சேர்க்க தேவையில்லை).\n" .
                           "• குளிர்ந்த பானமாக: குளிர்ச்சியான பால் அல்லது ஸ்மூத்திகளிலும் கலந்து அருந்தலாம்.\n" .
                           "• அனைத்து வயதினருக்கும் சிறந்தது: வளரும் குழந்தைகள், தாய்மார்கள், பெரியவர்கள் என குடும்பத்தில் உள்ள அனைவருக்கும் சிறந்த தினசரி சத்துணவு.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        if ($product) {
            $product->update([
                'name' => $enTitle,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'translations' => $translations,
            ]);
            $this->command?->info("Updated existing Eat Best ABC Malt (#{$product->id}) with full multilingual content.");
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'EBT-ABC-MLT400',
                'price' => 280.00,
                'sale_price' => 275.00,
                'stock_quantity' => 60,
                'unit_size' => '200 g',
                'badge' => '100% Natural Superfood',
                'featured_image' => 'https://yuvann.com/storage/products/38d2a1bf-02c5-47e4-853e-e0d6dd2f1224.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 3,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            $this->command?->info("Created new Eat Best ABC Malt product (#{$product->id}) with full multilingual content.");
        }

        // Attach targeted body care areas: Whole Body, Skin, Digestion & Gut
        $bodyPartSlugs = ['whole-body', 'skin', 'digestion'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }
    }
}
