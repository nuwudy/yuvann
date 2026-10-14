<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VanatheeramBlackPepperTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Organic Wayanad Black Pepper (100g) and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'vanatheeram-organic-wayanad-black-pepper-100g';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'VAN-PEP-100G')
            ->orWhere('slug', 'like', '%black-pepper%')
            ->orWhere('slug', 'like', '%vanatheeram%pepper%')
            ->orWhere('name', 'like', '%Black Pepper%')
            ->get();

        $enTitle = 'Vanatheeram® Organic Wayanad Black Pepper – 100g';
        $enShortDesc = '100% pure, unpolished whole black pepper (Piper nigrum) harvested from indigenous tribal farms in the pristine forests of Wayanad. Unbleached, chemical-free, and bursting with high piperine content, pungent heat, and medicinal aroma.';

        $enBenefits = "• 100% Forest Organic & Unpolished: Naturally sun-dried whole peppercorns directly from indigenous Wayanad tribal farms without mineral oil polish, artificial color, or sulfur treatment.\n" .
                      "• High Natural Piperine Concentration: Rich in pure piperine, boosting thermogenic metabolism, digestive enzyme secretion, and nutrient bioavailability.\n" .
                      "• 2000% Boost in Curcumin Bioavailability: Pairing a pinch of freshly crushed black pepper with turmeric exponentially enhances curcumin absorption, unlocking powerful joint and anti-inflammatory benefits.\n" .
                      "• Traditional Respiratory & Throat Relief: Potent Ayurvedic decongestant; ideal for classical kashayams to soothe stubborn cough, sore throat, sinus congestion, and seasonal chest chills.\n" .
                      "• Stimulates Digestion & Gut Health: Promotes hydrochloric acid production in the stomach, curbing gas, flatulence, and bloating after heavy meals.\n" .
                      "• Zero Chemicals or Adulteration: Absolutely pure Piper nigrum berries with zero papaya seed adulteration or synthetic agrochemicals.\n" .
                      "• Community Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), providing sustainable livelihoods and fair wages to tribal farmers in Wayanad.";

        $enIngredients = "• 100% Pure Whole Wayanad Black Pepper (Piper nigrum): Forest-grown, sun-cured, unpolished whole peppercorns. Zero preservatives, zero additives, zero artificial processing.";

        $enUsage = "• Daily Culinary Cooking:\n" .
                   "  - Rasam / Sambar / Curries: Add 5–6 whole peppercorns during tempering (tadka) or crush 1/2 tsp freshly at the end of cooking for 10x richer flavor than pre-ground powders.\n" .
                   "  - Pepper Roast / Fry: Coarsely crush 1 tsp pepper with garlic and a dash of virgin coconut oil for authentic Wayanad-style dishes.\n" .
                   "  - Biryani & Pulao: Add 8–10 whole peppercorns while boiling rice for an exotic forest aroma.\n" .
                   "• Traditional Tribal Kashayam (Health Brew):\n" .
                   "  - For Cold, Cough & Throat Ache: Boil 5 crushed peppercorns, 3 fresh tulsi leaves, and crushed ginger in 1 cup of water until reduced by half. Sip warm morning and evening with honey.\n" .
                   "  - For Digestion: Chew 2–3 peppercorns with a pinch of rock salt, or stir 1/4 tsp crushed pepper into fresh buttermilk.\n" .
                   "• Golden Turmeric Milk: Always add a generous pinch of crushed black pepper to warm turmeric milk to maximize curcumin uptake.\n" .
                   "• Storage & Grinding Tip: For maximum potency, dry roast peppercorns on a low flame for 2 minutes before grinding only as needed. Store in an airtight container with a few grains of raw rice during humid weather to absorb moisture.";

        $mlTitle = 'വനതീരം® ഓർഗാനിക് വയനാടൻ കുരുമുളക് – 100g';
        $mlShortDesc = 'വയനാട്ടിലെ വനങ്ങളിൽ ഗോത്രവർഗ്ഗ കർഷകർ പ്രകൃതിദത്തമായി വിളയിച്ചെടുത്ത 100% ശുദ്ധമായ നാടൻ കുരുമുളക് (Piper nigrum). പോളിഷ് ചെയ്യാത്തതും രാസവസ്തുക്കൾ കലരാത്തതുമായ ഉന്നത ഗുണനിലവാരം.';

        $mlBenefits = "• 100% ഓർഗാനിക്, പോളിഷ് ചെയ്യാത്ത ശുദ്ധമായ കുരുമുളക്: യാതൊരുവിധ രാസവസ്തുക്കളോ മിനറൽ ഓയിൽ പോളിഷോ നിറങ്ങളോ ചേർക്കാതെ സ്വാഭാവികമായി ഉണക്കിയെടുത്ത അസ്സൽ വയനാടൻ കുരുമുളക്.\n" .
                      "• ഉയർന്ന പൈപ്പറിൻ (Piperine) അളവ്: കടുപ്പമേറിയ എരിവും ഉയർന്ന ഔഷധഗുണവും നൽകുന്ന പ്രകൃതിദത്ത പൈപ്പറിൻ ധാരാളമായി അടങ്ങിയിരിക്കുന്നു.\n" .
                      "• മഞ്ഞളിന്റെ ഗുണം 2000% വർദ്ധിപ്പിക്കുന്നു: കുരുമുളകിലെ പൈപ്പറിൻ മഞ്ഞളിലെ കുർക്കുമിൻ ശരീരം ആഗിരണം ചെയ്യുന്ന തോത് 2000% വരെ വർദ്ധിപ്പിക്കുന്നു.\n" .
                      "• ചുമ, കഫക്കെട്ട്, തൊണ്ടവേദന എന്നിവയ്ക്ക് ആശ്വാസം: പരമ്പരാഗത കഷായങ്ങളിലും ചൂടുവെള്ളത്തിലും ചേർത്ത് കുടിക്കുന്നത് ജലദോഷത്തിനും തൊണ്ടവേദനയ്ക്കും ഉടനടി ആശ്വാസം നൽകുന്നു.\n" .
                      "• ദഹനപ്രക്രിയ വേഗത്തിലാക്കുന്നു: വയറിലെ ഗ്യാസ്, അസിഡിറ്റി, ദഹനക്കേട് എന്നിവ അകറ്റി ഉദര ആരോഗ്യം മെച്ചപ്പെടുത്തുന്നു.\n" .
                      "• മായം ചേർക്കാത്തത്: പപ്പായ കുരുവോ കൃത്രിമ വസ്തുക്കളോ കലരാത്ത 100% സുതാര്യമായ ഉൽപന്നം.\n" .
                      "• ഗോത്രവിഭാഗങ്ങൾക്ക് താങ്ങ്: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വയനാട്ടിലെ ആദിവാസി കർഷകരുടെ ഉന്നമനത്തിനായി പ്രവർത്തിക്കുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ വയനാടൻ നാടൻ കുരുമുളക് മണികൾ (Piper nigrum). പ്രിസർവേറ്റീവുകളോ കൃത്രിമ ചേരുവകളോ ഇല്ല.";

        $mlUsage = "• പാചകത്തിന്:\n" .
                   "  - രസം, സാമ്പാർ, കറികൾ: താളിക്കുമ്പോൾ 5–6 കുരുമുളക് മണികൾ ചേർക്കുക. അല്ലെങ്കിൽ ഇറക്കുന്നതിന് തൊട്ടുമുമ്പ് അര ടീസ്പൂൺ ചതച്ചു ചേർക്കുക (പാക്കറ്റ് പൊടിയേക്കാൾ പത്തിരട്ടി സുഗന്ധവും രുചിയും നൽകും).\n" .
                   "  - പെപ്പർ ചിക്കൻ / എഗ്ഗ് റോസ്റ്റ്: 1 ടീസ്പൂൺ കുരുമുളക് ചതച്ചതും വെളുത്തുള്ളിയും വെളിച്ചെണ്ണയും ചേർത്ത് വയനാടൻ സ്പെഷ്യൽ റോസ്റ്റ് തയ്യാറാക്കാം.\n" .
                   "  - ബിരിയാണി, പുലാവ്: അരി തിളപ്പിക്കുമ്പോൾ 8–10 മണികൾ ഇടുക.\n" .
                   "• പരമ്പരാഗത കഷായം (ആരോഗ്യത്തിന്):\n" .
                   "  - ജലദോഷം, ചുമ, തൊണ്ടവേദന: 1 കപ്പ് വെള്ളത്തിൽ 5 കുരുമുളക് ചതച്ചതും 3 തുളസിയിലയും ചെറിയ ഇഞ്ചി കഷണവും ചേർത്ത് പകുതിയാകുന്നതുവരെ തിളപ്പിക്കുക. രാവിലെയും വൈകുന്നേരവും ചൂടോടെ കുടിക്കുക.\n" .
                   "  - ദഹനത്തിന്: കനത്ത ഭക്ഷണത്തിന് ശേഷം 2–3 കുരുമുളക് അല്പം ഉപ്പുചേർത്ത് ചവച്ചരയ്ക്കുക, അല്ലെങ്കിൽ മോരിൽ കാൽ ടീസ്പൂൺ ചേർത്ത് കുടിക്കുക.\n" .
                   "• സൂക്ഷിക്കേണ്ട വിധം: കാറ്റ് കടക്കാത്ത പാത്രത്തിൽ അടച്ചു സൂക്ഷിക്കുക. മഴക്കാലത്ത് ഈർപ്പം വലിച്ചെടുക്കാൻ പാത്രത്തിനുള്ളിൽ 2–3 അരിമണികൾ ഇടുന്നത് നല്ലതാണ്.";

        $hiTitle = 'वनतीरम® ऑर्गेनिक वायनाड काली मिर्च – 100g';
        $hiShortDesc = 'वायनाड के जंगलों में जनजातीय किसानों द्वारा पारंपरिक जैविक विधि से उपजाई गई 100% शुद्ध साबुत काली मिर्च (Piper nigrum)। बिना पॉलिश, बिना रसायन, प्राकृतिक तीखापन और उच्च पिपेरिन युक्त।';

        $hiBenefits = "• 100% वन जैविक एवं बिना पॉलिश वाली: बिना किसी मिनरल ऑयल, सल्फर या कृत्रिम रंग के, प्राकृतिक रूप से धूप में सुखाई गई शुद्ध काली मिर्च।\n" .
                      "• उच्च प्राकृतिक पिपेरिन: चयापचय (Metabolism) तेज करता है और भोजन के पोषक तत्वों को शरीर में तेजी से अवशोषित करता है।\n" .
                      "• हल्दी के करक्यूमिन को 2000% बेहतर सोखने में मददगार: ताजी कुटी काली मिर्च हल्दी के साथ लेने पर करक्यूमिन का अवशोषण 2000 गुना बढ़ जाता है।\n" .
                      "• खांसी, जुकाम और गले की खराश में रामबाण: पारंपरिक काढ़ा गले के दर्द, कफ और मौसमी जुकाम से तुरंत राहत दिलाता है।\n" .
                      "• पाचन तंत्र को सुधारे: पेट में हाइड्रोक्लोरिक एसिड का स्राव बढ़ाकर भारी भोजन के बाद गैस और अफारे को दूर करता है।\n" .
                      "• मिलावट मुक्त: पपीते के बीजों या किसी भी अवांछित मिलावट से पूर्णतः मुक्त।\n" .
                      "• आदिवासी समुदाय को सहयोग: STTR के सहयोग से वायनाड के आदिवासी किसानों को उचित पारिश्रमिक सुनिश्चित करता है।";

        $hiIngredients = "• 100% शुद्ध साबुत वायनाड काली मिर्च (Piper nigrum)। शून्य रसायन, शून्य मिलावट।";

        $hiUsage = "• दैनिक भोजन में: रसम, सांभर, दाल या सब्जी में तड़के के समय 5-6 साबुत दाने डालें या अंत में ताजा कूटकर डालें।\n" .
                   "• स्वास्थ्य हेतु काढ़ा: 1 कप पानी में 5 कुटी काली मिर्च, तुलसी और अदरक डालकर आधा रहने तक उबालें। गुनगुना पिएं।\n" .
                   "• हल्दी दूध: हल्दी वाले दूध में एक चुटकी ताजी कुटी काली मिर्च जरूर मिलाएं।\n" .
                   "• सुरक्षित रखने की विधि: हवा बंद डिब्बे में रखें। सीलन से बचाने के लिए डिब्बे में 2-3 कच्चे चावल के दाने डाल दें।";

        $taTitle = 'வனதீரம்® ஆர்கானிக் வயநாடு கருப்பு மிளகு – 100g';
        $taShortDesc = 'வயநாடு காடுகளின் பழங்குடியின விவசாயிகளால் இயற்கை முறையில் விளைவிக்கப்பட்ட 100% தூய பாலிஷ் செய்யப்படாத முழு கருப்பு மிளகு (Piper nigrum). அதிக பைபரின் காரமும் அசல் மருத்துவ குணமும் கொண்டது.';

        $taBenefits = "• 100% இயற்கை & பாலிஷ் செய்யப்படாதது: மினரல் ஆயில் அல்லது ரசாயன பாலிஷ் இன்றி வெயிலில் காயவைக்கப்பட்ட தூய காட்டு மிளகு.\n" .
                      "• அதிக பைபரின் சத்து: உடல் செரிமானத்தை தூண்டி நோய் எதிர்ப்பு சக்தியை அதிகரிக்கிறது.\n" .
                      "• மஞ்சளின் சத்தை 2000% உடலுக்கு சேர்க்கும் ஆற்றல்: மிளகில் உள்ள பைபரின், மஞ்சளில் உள்ள குர்குமினை உடல் எளிதில் உறிஞ்ச உதவுகிறது.\n" .
                      "• சளி, இருமல் மற்றும் தொண்டை வலிக்கு உடனடி நிவாரணம்: பாரம்பரிய மிளகு கஷாயம் தொண்டை கரகரப்பு மற்றும் மார்பு சளியை கரைத்து வெளியேற்றுகிறது.\n" .
                      "• செரிமானக் கோளாறுகளை நீக்குகிறது: வயிறு உப்புசம், வாயுத் தொல்லை மற்றும் மந்த நிலையை போக்கி பசியைத் தூண்டுகிறது.\n" .
                      "• கலப்படமற்றது: பப்பாளி விதை அல்லது செயற்கை சாயங்கள் அற்ற 100% உண்மையான கருப்பு மிளகு.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR அமைப்பின் மூலம் வயநாடு பழங்குடி மக்களுக்கு நேரடி நியாயமான வருவாயை வழங்குகிறது.";

        $taIngredients = "• 100% தூய முழு வயநாடு கருப்பு மிளகு (Piper nigrum). ரசாயனங்கள் அல்லது பதப்படுத்திகள் அற்றது.";

        $taUsage = "• சமையலில்: ரசம், சாம்பார் மற்றும் பொரியலில் தாளிக்கும் போது அல்லது இறக்கும் முன் புதிதாக இடித்து சேர்க்கவும்.\n" .
                   "• மிளகு கஷாயம்: 1 டம்ளர் நீரில் 5 இடித்த மிளகு, துளசி, இஞ்சி சேர்த்து பாதியாக வற்றும் வரை காய்ச்சி குடிக்கவும்.\n" .
                   "• மஞ்சள் பால்: மஞ்சள் பாலில் ஒரு சிட்டிகை புதிதாக இடித்த மிளகுத்தூள் கலந்து குடிக்கவும்.\n" .
                   "• சேமிப்பு முறை: காற்றுப்புகாத பாத்திரத்தில் ஈரப்பதமின்றி வைக்கவும்.";

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
        $bodyPartIds = collect([$digestionPart?->id, $chestPart?->id, $wholeBodyPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-organic-wayanad-black-pepper-100g.jpg';
        $galleryImages = [
            '/images/products/vanatheeram-organic-wayanad-black-pepper-100g.jpg',
        ];

        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $herbalPowdersCategory = Category::where('slug', 'herbal-powders')->first();
        $categoryIds = collect([$superfoodsCategory?->id, $herbalPowdersCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'name' => $enTitle,
                    'short_description' => $enShortDesc,
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                    'price' => 180.00,
                    'sale_price' => 155.00,
                    'unit_size' => '100g',
                    'featured_image' => $featuredImagePath,
                    'gallery_images' => $galleryImages,
                    'badge' => '100% Organic • Wayanad Black Pepper',
                    'is_active' => true,
                    'is_featured' => true,
                ]);

                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                if (!empty($categoryIds)) {
                    $product->categories()->syncWithoutDetaching($categoryIds);
                }

                $this->command?->info("Updated Vanatheeram Black Pepper (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VAN-PEP-100G',
                'price' => 180.00,
                'sale_price' => 155.00,
                'stock_quantity' => 100,
                'unit_size' => '100g',
                'badge' => '100% Organic • Wayanad Black Pepper',
                'featured_image' => $featuredImagePath,
                'gallery_images' => $galleryImages,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 4,
                'is_free_shipping' => false,
                'translations' => $translations,
            ]);

            if (!empty($categoryIds)) {
                $product->categories()->syncWithoutDetaching($categoryIds);
            }
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }

            $this->command?->info("Created new Vanatheeram Black Pepper product (#{$product->id}) with full 4-language translations.");
        }
    }
}
