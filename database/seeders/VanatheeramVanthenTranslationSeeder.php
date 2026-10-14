<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class VanatheeramVanthenTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Pure Vanthen (Rock Bee Honey / വൻതേൻ) with 4-language translations and size variants.
     */
    public function run(): void
    {
        $primarySlug = 'vanatheeram-vanthen-rock-bee-honey';

        $product = Product::where('slug', $primarySlug)
            ->orWhere('sku', 'VAN-VNT-45ML')
            ->orWhere('sku', 'VAN-VNT-500ML')
            ->first();

        $enTitle = 'Vanatheeram® Pure Vanthen – Raw Rock Bee Forest Honey (വൻതേൻ)';
        $enShortDesc = '100% pure, unheated, raw wild honey harvested from giant rock bee (Apis dorsata) hives perched on high Wayanad forest cliffs and tall canopies by indigenous tribal honey hunters. Packed with living enzymes, wild multi-floral pollen, and concentrated antioxidants for supreme stamina, respiratory relief, and natural vitality.';

        $enBenefits = "• 100% Pure Raw Rock Bee Honey (Apis dorsata): Traditionally gathered by Wayanad tribal honey-hunters from majestic cliff hives and tall jungle trees; unpasteurized, unheated, and chemical-free.\n" .
                      "• Natural Stamina & Vitality Booster: High concentrations of bio-available pollen, natural fructose, and essential trace minerals provide immediate energy and combat daily physical exhaustion.\n" .
                      "• Relieves Cough, Cold & Throat Congestion: Natural antiseptic and demulcent properties soothe dry coughs, ease throat irritation, and help liquefy chest phlegm.\n" .
                      "• Promotes Digestion & Gentle Detox: Taken with warm water and lemon on an empty stomach, it stimulates digestive enzymes, supports healthy gut flora, and assists in natural weight management.\n" .
                      "• Multi-Floral Forest Nectar: Sourced from hundreds of rare wild medicinal herbs and blooming forest trees, delivering rich complex aromas and robust antioxidant protection.\n" .
                      "• Ideal Natural Sweetener: Healthy, nutrient-rich alternative to refined sugar for milk, herbal decoctions, warm lemonades, and breakfast bowls.\n" .
                      "• Direct Tribal Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), Wayanad, ensuring fair livelihood for indigenous forest honey gatherers.";

        $enIngredients = "• 100% Pure Raw Wild Rock Bee Honey (Apis dorsata / Vanthen Nectar). Unfiltered, unpasteurized, and unheated. Zero added sugar, zero artificial preservatives, zero processing chemicals.";

        $enUsage = "• Daily Morning Detox: Mix 1 tablespoon of raw Vanthen with 1/2 freshly squeezed lemon juice in a glass of lukewarm water. Drink on an empty stomach every morning.\n" .
                   "• For Energy & Endurance: Take 1 teaspoon directly before physical workouts, yoga, or intense activity for sustained stamina.\n" .
                   "• For Cough & Sore Throat: Blend 1 teaspoon Vanthen with 1/4 teaspoon freshly ground black pepper and crushed ginger juice twice daily.\n" .
                   "• Restful Night Sleep: Stir 1 teaspoon Vanthen into a cup of lukewarm milk before bedtime.\n" .
                   "• Golden Rule: Never boil or cook honey directly. Add to tea, milk, or water only after cooling to lukewarm temperature (below 40°C) to safeguard delicate living enzymes.\n" .
                   "• Storage: Store at room temperature in a dry place with the lid tightly closed. Do not refrigerate. Crystallization is a natural hallmark of raw unprocessed honey; place bottle in warm water for a few minutes to liquify.";

        $mlTitle = 'വനതീരം® ശുദ്ധമായ വൻതേൻ – റോ റോക്ക് ബീ ഹണി (Vanthen)';
        $mlShortDesc = 'വയനാട്ടിലെ വൻമലനിരകളിലും പാറക്കെട്ടുകളിലും കാട്ടുചില്ലകളിലും വൻതേനീച്ചകൾ (Apis dorsata) നിർമ്മിക്കുന്ന 100% ശുദ്ധമായ പ്രകൃതിദത്ത വൻതേൻ. ആദിവാസി വിഭാഗങ്ങൾ പരമ്പരാഗതമായി ശേഖരിക്കുന്ന ചൂടാക്കാത്ത, പ്രിസർവേറ്റീവുകളോ പഞ്ചസാരയോ ചേർക്കാത്ത അസ്സൽ ഔഷധ അമൃത്.';

        $mlBenefits = "• 100% ശുദ്ധമായ റോ വൻതേൻ: വയനാടൻ കാടുകളിലെ കൂറ്റൻ മരങ്ങളിലും പാറയിടുക്കുകളിലും വൻതേനീച്ചകൾ (Apis dorsata) ഉണ്ടാക്കുന്ന ശുദ്ധമായ തേൻ; യാതൊരു രാസവസ്തുക്കളോ ചൂടാക്കലോ ഇല്ലാതെ പകർന്നെടുത്തത്.\n" .
                      "• ശാരീരിക ഉന്മേഷവും ഊർജ്ജവും: പ്രകൃതിദത്ത പൂമ്പൊടിയും ഫ്രക്ടോസും ധാതുക്കളും അടങ്ങിയിട്ടുള്ളതിനാൽ ശരീരത്തിന് തളർച്ചയില്ലാതെ ദിവസം മുഴുവൻ ഊർജ്ജവും ഉന്മേഷവും പകരുന്നു.\n" .
                      "• ചുമ, തൊണ്ടവേദന, കഫക്കെട്ട് എന്നിവയ്ക്ക് ശമനം: തൊണ്ടയിലെ അണുബാധകളെ ഇല്ലാതാക്കാനും കഫക്കെട്ടിനും വരണ്ട ചുമയ്ക്കും വളരെ വേഗം ആശ്വാസം നൽകാനും സഹായിക്കുന്നു.\n" .
                      "• ദഹനത്തിനും ശരീരഭാരം നിയന്ത്രിക്കാനും: രാവിലെ ചെറുചൂടുവെള്ളത്തിൽ ചെറുനാരങ്ങാനീരും ചേർത്ത് കുടിക്കുന്നത് ഉപാപചയം വർദ്ധിപ്പിക്കാനും കൊഴുപ്പ് കത്തിക്കാനും ദഹനം സുഗമമാക്കാനും സഹായിക്കും.\n" .
                      "• ഔഷധപ്പൂക്കളുടെ സമൃദ്ധി: കാട്ടിലെ നൂറുകണക്കിന് ഔഷധച്ചെടികളുടെ പൂന്തേൻ അടങ്ങിയിരിക്കുന്നതിനാൽ സ്വാഭാവിക ആന്റിഓക്‌സിഡന്റുകളാൽ സമൃദ്ധമാണ്.\n" .
                      "• പഞ്ചസാരയ്ക്ക് മികച്ച പ്രകൃതിദത്ത ബദൽ: ചായ, കാപ്പി, പാൽ, സ്മൂത്തി എന്നിവയിൽ വെളുത്ത പഞ്ചസാരയ്ക്ക് പകരം ഉപയോഗിക്കാവുന്ന ഉത്തമ മധുരം.\n" .
                      "• ആദിവാസി കുടുംബങ്ങൾക്ക് കരുതൽ: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വയനാട്ടിലെ തേനൂറ്റുന്ന ആദിവാസി ജനതയ്ക്ക് മാന്യമായ ഉപജീവനവും വരുമാനവും ഉറപ്പാക്കുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത വൻതേൻ (Rock Bee Honey / Apis dorsata). ചൂടാക്കാത്തതും പഞ്ചസാരയോ പ്രിസർവേറ്റീവുകളോ ചേർക്കാത്തതുമായ അസ്സൽ കാട്ടുതേൻ.";

        $mlUsage = "• ശരീരഭാരം കുറയ്ക്കാനും പുത്തനുണർവിനും: രാവിലെ വെറുംവയറ്റിൽ 1 ഗ്ലാസ് ഇളംചൂടുവെള്ളത്തിൽ 1 ടേബിൾസ്പൂൺ വൻതേനും പകുതി നാരങ്ങാനീരും ചേർത്ത് കുടിക്കുക.\n" .
                   "• ഊർജ്ജത്തിനും കായികശേഷിക്കും: വ്യായാമത്തിന് മുമ്പോ ജോലിത്തിരക്കിനിടയിലോ 1 ടീസ്പൂൺ നേരിട്ട് കഴിക്കുക.\n" .
                   "• ചുമയ്ക്കും തൊണ്ടവേദനയ്ക്കും: 1 ടീസ്പൂൺ വൻതേനിൽ അല്പം കുരുമുളകുപൊടിയും ഇഞ്ചിനീരും ചേർത്ത് ദിവസവും 2 നേരം കഴിക്കുക.\n" .
                   "• നല്ല ഉറക്കത്തിന്: രാത്രി കിടക്കുന്നതിന് മുമ്പ് 1 ടീസ്പൂൺ തേൻ ഇളം ചൂടുപാലിൽ ചേർത്ത് കഴിക്കുക.\n" .
                   "• ശ്രദ്ധിക്കുക: തേൻ ഒരിക്കലും നേരിട്ട് തിളപ്പിക്കുകയോ തിളച്ച പാനീയങ്ങളിൽ ചേർക്കുകയോ ചെയ്യരുത്. ഇളംചൂടുള്ളതിൽ മാത്രം ചേർക്കുക.\n" .
                   "• സൂക്ഷിക്കേണ്ട വിധം: ഫ്രിഡ്ജിൽ വയ്ക്കരുത്. തണുപ്പുകാലത്ത് അടിയിൽ കട്ടപിടിക്കുന്നത് ശുദ്ധമായ തേനിന്റെ ലക്ഷണമാണ്; അല്പം ചൂടുവെള്ളത്തിൽ കുപ്പി ഇറക്കിവച്ചാൽ പഴയപടിയാകും.";

        $hiTitle = 'वनतीरम® शुद्ध वनशहद (वनतेन) – रॉ रॉक बी हनी (Vanthen)';
        $hiShortDesc = 'वायनाड के विशाल पर्वतों और घने जंगलों से आदिवासी शहद-खोजी दलों द्वारा एकत्रित 100% शुद्ध, असंसाधित और बिना गर्म किया हुआ विशालकाय मधुमक्खी (रॉक बी / Apis dorsata) का जंगली शहद। प्राकृतिक एंजाइम, परागकण और इम्युनिटी बूस्टर गुणों से भरपूर।';

        $hiBenefits = "• 100% शुद्ध एवं कच्चा रॉक बी शहद: विशालकाय जंगली मधुमक्खियों (Apis dorsata) द्वारा ऊंचे पेड़ों और चट्टानों पर निर्मित पूरी तरह प्राकृतिक एवं बिना गर्म किया हुआ शहद।\n" .
                      "• शारीरिक ऊर्जा और स्टैमिना: प्राकृतिक फ्रुक्टोज और परागकणों से भरपूर, जो शरीर को तुरंत ऊर्जा और दिनभर के लिए स्फूर्ति प्रदान करता है।\n" .
                      "• खांसी, कफ और गले की खराश में राहत: गले के संक्रमण को शांत करता है और फेफड़ों में जमे कफ को आसानी से बाहर निकालने में मदद करता है।\n" .
                      "• पाचन और वजन नियंत्रण: सुबह खाली पेट गुनगुने पानी और नींबू के साथ लेने से मेटाबॉलिज्म तेज होता है और पाचन क्रिया दुरुस्त रहती है।\n" .
                      "• औषधीय वनस्पतियों का सत्व: घने जंगलों के सैकड़ों दुर्लभ औषधीय फूलों के पराग से निर्मित, जो रोग प्रतिरोधक क्षमता को बढ़ाता है।\n" .
                      "• चीनी का प्राकृतिक विकल्प: दूध, चाय और पेय पदार्थों में सफेद चीनी के स्थान पर उपयोग के लिए स्वास्थ्यप्रद विकल्प।\n" .
                      "• जनजातीय परिवारों का उत्थान: STTR के माध्यम से प्रत्येक खरीद सीधे वायनाड के आदिवासी शहद संग्राहकों को सम्मानजनक आजीविका प्रदान करती है।";

        $hiIngredients = "• 100% शुद्ध कच्चा जंगली रॉक बी शहद (Apis dorsata Honey)। शून्य चीनी, शून्य प्रिजर्वेटिव्स।";

        $hiUsage = "• वजन प्रबंधन एवं ताजगी: सुबह खाली पेट 1 गिलास गुनगुने पानी में 1 बड़ा चम्मच शहद और आधा नींबू मिलाकर पिएं।\n" .
                   "• खांसी-जुकाम में: 1 चम्मच शहद में काली मिर्च पाउडर और अदरक का रस मिलाकर दिन में 2 बार लें।\n" .
                   "• अच्छी नींद के लिए: रात को सोने से पहले हल्के गुनगुने दूध में 1 चम्मच शहद मिलाकर लें।\n" .
                   "• महत्वपूर्ण नियम: शहद को कभी सीधे न उबालें। हमेशा गुनगुने पेय में ही मिलाएं।\n" .
                   "• सुरक्षित रखने का तरीका: फ्रिज में न रखें। ढक्कन बंद करके सूखी जगह पर रखें।";

        $taTitle = 'வனதீரம்® தூய பெருந்தேன் / வன்தேன் – ரா ராக் பீ ஹனி (Vanthen)';
        $taShortDesc = 'வயநாடு அடர்ந்த மலைப்பாறைகள் மற்றும் உயரமான மரங்களில் பெருந்தேனீக்களால் (Apis dorsata) கட்டப்பட்ட 100% தூய, சூடாக்கப்படாத அசல் காட்டுத் தேன் (வன்தேன்). இயற்கையான நொதிகள், நோய் எதிர்ப்பு சக்தி மற்றும் உடனடி உடல் பலம் தரும் அற்புத இயற்கை மருந்து.';

        $taBenefits = "• 100% தூய இயற்கை பெருந்தேன்: வயநாடு காடுகளில் பெருந்தேனீக்களால் (Rock Bee / Apis dorsata) பாறைகளிலும் மரங்களிலும் கட்டப்படும் அசல், சூடாக்கப்படாத தூய காட்டுத்தேன்.\n" .
                      "• உடனடி ஆற்றலும் உடல் பலமும்: இயற்கை மகரந்த சத்துக்கள் மற்றும் தாதுக்கள் நிறைந்துள்ளதால் உடல் சோர்வை நீக்கி புத்துணர்ச்சியையும் வலிமையையும் தருகிறது.\n" .
                      "• இருமல், தொண்டை கரகரப்பு மற்றும் சளிக்கு தீர்வு: தொண்டை எரிச்சலைத் தணித்து, நெஞ்சு சளியை வெளியேற்றி சீரான சுவாசத்திற்கு உதவுகிறது.\n" .
                      "• செரிமானம் மற்றும் எடை மேலாண்மை: காலையில் மிதமான வெந்நீரில் எலுமிச்சை சாற்றுடன் சேர்த்து பருக மெட்டபாலிசம் அதிகரித்து தேவையற்ற கொழுப்பு கரையும்.\n" .
                      "• பலவித காட்டு மூலிகை மலர்களின் சத்து: காடுகளில் பூக்கும் அரிய மருத்துவ மலர்களின் நற்பண்புகள் நிறைந்த இயற்கை ஆக்ஸிஜனேற்றி.\n" .
                      "• வெள்ளை சர்க்கரைக்கு உன்னத மாற்று: பால், டீ, காபி மற்றும் ஆரோக்கிய பானங்களில் சர்க்கரைக்கு பதிலாக பயன்படுத்தலாம்.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR அமைப்பு மூலம் வயநாடு பழங்குடி மக்களுக்கு நியாயமான வருவாயை உறுதி செய்கிறது.";

        $taIngredients = "• 100% தூய காட்டு பெருந்தேன் (Raw Rock Bee Honey / Vanthen). சர்க்கரை அல்லது செயற்கை சேர்க்கைகள் இல்லாதது.";

        $taUsage = "• உடல் ஆரோக்கியத்திற்கு: காலை வெறும் வயிற்றில் மிதமான வெந்நீரில் 1 மேசைக்கரண்டி தேன் மற்றும் எலுமிச்சை சாறு கலந்து பருகவும்.\n" .
                   "• சளி மற்றும் இருமலுக்கு: 1 டீஸ்பூன் தேனுடன் மிளகுத்தூள் மற்றும் இஞ்சி சாறு கலந்து இருவேளை சாப்பிடவும்.\n" .
                   "• ஆழ்ந்த உறக்கத்திற்கு: இரவில் படுக்கும் முன் மிதமான பாலில் 1 டீஸ்பூன் தேன் கலந்து குடிக்கவும்.\n" .
                   "• குறிப்பு: தேனை ஒருபோதும் நேரடியாக சூடாக்கக் கூடாது; மிதமான சூட்டில் மட்டுமே சேர்க்க வேண்டும்.\n" .
                   "• சேமிக்கும் முறை: பிரிட்ஜில் வைக்க வேண்டாம். காற்றுப்புகாத பாட்டிலில் வைக்கவும்.";

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
                'name' => $mlTitle,
                'short_description' => $mlShortDesc,
                'benefits' => $mlBenefits,
                'ingredients' => $mlIngredients,
                'usage' => $mlUsage,
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => $hiTitle,
                'short_description' => $hiShortDesc,
                'benefits' => $hiBenefits,
                'ingredients' => $hiIngredients,
                'usage' => $hiUsage,
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => $taTitle,
                'short_description' => $taShortDesc,
                'benefits' => $taBenefits,
                'ingredients' => $taIngredients,
                'usage' => $taUsage,
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $digestionPart = BodyPart::where('slug', 'digestion')->first();
        $chestPart = BodyPart::where('slug', 'chest')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $skinPart = BodyPart::where('slug', 'skin')->first();
        $bodyPartIds = collect([$digestionPart?->id, $chestPart?->id, $wholeBodyPart?->id, $skinPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-raw-vanthen-rock-bee-honey.png';
        $galleryImages = [
            '/images/products/vanatheeram-raw-vanthen-rock-bee-honey.png',
        ];

        $honeyCategory = Category::where('slug', 'honey-preserves')->first();
        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $sweetenersCategory = Category::where('slug', 'natural-sweeteners')->first();
        $categoryIds = collect([$honeyCategory?->id, $superfoodsCategory?->id, $sweetenersCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        $productData = [
            'name' => $enTitle,
            'slug' => $primarySlug,
            'sku' => 'VAN-VNT-45ML',
            'price' => 140.00,
            'sale_price' => 140.00,
            'stock_quantity' => 200,
            'unit_size' => '45 ml',
            'badge' => '100% Organic • Raw Vanthen',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 6,
            'is_free_shipping' => false,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Vanatheeram Pure Vanthen (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Vanatheeram Pure Vanthen product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        // 4 Size Variants requested by User:
        // 140 ₹ 45 ml
        // 300₹ 100 ml
        // 800₹ 250ml
        // 1500₹ 500ml
        $variants = [
            [
                'unit_size' => '45 ml',
                'price' => 140.00,
                'sale_price' => 140.00,
                'sku' => 'VAN-VNT-45ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
            [
                'unit_size' => '100 ml',
                'price' => 300.00,
                'sale_price' => 300.00,
                'sku' => 'VAN-VNT-100ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
            [
                'unit_size' => '250 ml',
                'price' => 800.00,
                'sale_price' => 800.00,
                'sku' => 'VAN-VNT-250ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
            [
                'unit_size' => '500 ml',
                'price' => 1500.00,
                'sale_price' => 1500.00,
                'sku' => 'VAN-VNT-500ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
        ];

        foreach ($variants as $variantData) {
            ProductVariant::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'unit_size' => $variantData['unit_size'],
                ],
                $variantData
            );
        }

        $this->command?->info("Successfully seeded 4 Vanthen variants (45ml: ₹140, 100ml: ₹300, 250ml: ₹800, 500ml: ₹1500) for Product #{$product->id}.");
    }
}
