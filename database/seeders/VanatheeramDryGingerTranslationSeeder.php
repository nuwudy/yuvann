<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VanatheeramDryGingerTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Organic Dry Ginger (Chukku / Sukku 100g) with 4-language translations.
     */
    public function run(): void
    {
        $slug = 'vanatheeram-organic-dry-ginger-chukku-100g';

        $product = Product::where('slug', $slug)
            ->orWhere('sku', 'VAN-CHK-100G')
            ->first();

        $enTitle = 'Vanatheeram® Organic Dry Ginger (Chukku / Sukku) – 100% Sun-Dried Whole Ginger (100g)';
        $enShortDesc = '100% pure, natural, sun-dried whole dry ginger (Chukku / Sonth / Sukku) harvested by indigenous tribal farmers in Wayanad. Celebrated in Ayurveda as "Vishwabheshaja" (the Universal Medicine) for rapid relief from colds, coughs, sore throat, indigestion, nausea, and joint inflammation.';

        $enBenefits = "• 100% Organic Sun-Dried Whole Ginger: Cultivated in the fertile shade-rich soils of Wayanad by tribal farmers without synthetic fertilizers, chemical washes, or artificial bleaching agents.\n" .
                      "• Relieves Cold, Cough, Sore Throat & Fever: Potent natural antiviral and expectorant that liquefies stubborn respiratory mucus, soothes throat raw inflammation, and promotes healing perspiration during fevers.\n" .
                      "• Stimulates Digestion & Eliminates Bloating: High in active gingerols and shogaols; naturally triggers gastric enzymes, calms nausea/motion sickness, and expels painful trapped abdominal gas.\n" .
                      "• Boosts Metabolism & Weight Loss: Thermogenic properties accelerate caloric expenditure, stimulate fat metabolism, and improve nutrient assimilation.\n" .
                      "• Powerful Natural Anti-Inflammatory: Significantly eases inflammatory joint aches, arthritis pain, stiffness, and post-workout muscular soreness.\n" .
                      "• Renowned Ayurvedic 'Vishwabheshaja': Cherished for millennia in Indian traditional medicine as the supreme universal healer for balancing Kapha and Vata doshas.\n" .
                      "• Direct Tribal Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), Wayanad, ensuring fair prices and sustainable livelihoods for tribal farm families.";

        $enIngredients = "• 100% Pure Whole Sun-Dried Ginger Rhizomes (Zingiber officinale / Chukku). Unbleached, chemical-free, non-irradiated. Batch No: 002. FSSAI: 21325185000809.";

        $enUsage = "• 1. Traditional Chukku Kaapi / Herbal Tea (Kerala's #1 Cold Remedy): Crush 1 small piece (5g) of dry ginger. Boil with 2 cups of water, 1/2 tsp crushed black pepper, and fresh tulsi leaves for 5 minutes. Add a pinch of coffee powder if desired. Strain and sweeten with jaggery or Vanatheeram raw honey. Drink hot twice daily for fast relief.\n" .
                   "• 2. Homemade Chukku Powder: Break dry ginger into smaller chunks, dry-roast lightly on a skillet for 1 minute, and grind into a fine powder. Store in an airtight glass jar. Add 1/4 tsp to morning tea, warm milk, pepper rasam, or ginger chutneys.\n" .
                   "• 3. For Stomach Bloating & Digestion: Mix 1/4 tsp dry ginger powder with a pinch of rock salt, 1 tsp fresh lemon juice, and a glass of warm water. Drink 15 minutes after heavy meals.\n" .
                   "• 4. Culinary Delights: Essential spice for traditional South Indian rasam, sambar, sukku malli coffee, masala chai, gingerbread, and rich curries.\n" .
                   "• 5. Storage Instructions: Store in a dry, clean airtight jar. Sun-dry once every 2 months for 1 hour to prevent moisture and fungus. Shelf life is up to 12 months.";

        $mlTitle = 'വനതീരം® നാടൻ ചുക്ക് (Dry Ginger / Chukku) – 100% പ്രകൃതിദത്തം (100g)';
        $mlShortDesc = 'വയനാടൻ മലനിരകളിൽ ഗോത്രകർഷകർ ജൈവരീതിയിൽ ഉൽപ്പാദിപ്പിച്ച് വെയിലത്തുണക്കിയെടുത്ത 100% ശുദ്ധമായ നാടൻ ചുക്ക്. ആയുർവേദത്തിലെ "വിശ്വഭേഷജം" (സർവ്വരോഗ സംഹാരി)! ജലദോഷം, ചുമ, തൊണ്ടവേദന, ദഹനക്കേട്, ഗ്യാസ്, സന്ധിവേദന എന്നിവയ്ക്ക് ഉത്തമ പരിഹാരം.';

        $mlBenefits = "• 100% ശുദ്ധമായ നാടൻ കാട്ടുചുക്ക്: രാസവളങ്ങളോ കുമ്മായം പൂശലോ (ബ്ലീച്ചിംഗ്) ഇല്ലാതെ വെയിലിൽ ഉണക്കിയെടുത്ത അസ്സൽ വയനാടൻ ചുക്ക്.\n" .
                      "• ജലദോഷം, ചുമ, പനി എന്നിവയ്ക്ക് ഉടനടി ശമനം: തൊണ്ടവേദനയും നെഞ്ചിലെ കഫക്കെട്ടും മാറ്റാനും പനി കുറയ്ക്കാനും പണ്ടുമുതലേ മലയാളികൾ ആശ്രയിക്കുന്ന ഒന്നാംതരം നാട്ടുഔഷധം.\n" .
                      "• ദഹനം മെച്ചപ്പെടുത്താനും ഗ്യാസ് കുറയ്ക്കാനും: ദഹനരസങ്ങളെ ഉത്തേജിപ്പിക്കുകയും വയറ്റിലെ ഗ്യാസ്, പുളിച്ചുതികട്ടൽ, ഛർദ്ദി എന്നിവ തടയുകയും ചെയ്യുന്നു.\n" .
                      "• ശരീരഭാരം കുറയ്ക്കാനും ഉപാപചയം കൂട്ടാനും: ശരീരത്തിലെ കൊഴുപ്പ് എരിച്ചു കളയാനും ദഹനപ്രക്രിയ ഊർജ്ജിതമാക്കാനും സഹായിക്കുന്നു.\n" .
                      "• സന്ധിവേദനയ്ക്കും നീർക്കെട്ടിനും: ശരീരത്തിലെ നീർക്കെട്ടും വാതസംബന്ധമായ വേദനകളും പേശി വേദനകളും കുറയ്ക്കാൻ സഹായിക്കുന്ന ആന്റി-ഇൻഫ്ലമേറ്ററി ഗുണങ്ങൾ.\n" .
                      "• ആയുർവേദത്തിലെ വിശ്വഭേഷജം: ആയുർവേദത്തിൽ സർവ്വരോഗ ശമനിയായി വിശേഷിപ്പിക്കുന്ന ചുക്ക് രോഗപ്രതിരോധ ശേഷി വർദ്ധിപ്പിക്കുന്നു.\n" .
                      "• ഗോത്രകർഷകർക്ക് താങ്ങ്: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വയനാട്ടിലെ ആദിവാസി കർഷകർക്ക് ന്യായമായ വിലയും ഉപജീവനവും ഉറപ്പാക്കുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ വെയിലത്തുണക്കിയ നാടൻ ചുക്ക് (Zingiber officinale). രാസവസ്തുക്കളോ കൃത്രിമ നിറങ്ങളോ ചേർക്കാത്തത്. ബാച്ച് നമ്പർ: 002. FSSAI: 21325185000809.";

        $mlUsage = "• 1. ചുക്കുകാപ്പി / കട്ടൻചായ (ഏറ്റവും ജനപ്രിയം): ചെറിയ കഷ്ണം (5 ഗ്രാം) ചുക്ക് ചതച്ച് 2 ഗ്ലാസ് വെള്ളത്തിൽ കുരുമുളകും തുളസിയിലയും ചേർത്ത് തിളപ്പിക്കുക. ആവശ്യത്തിന് കാപ്പിപ്പൊടി ചേർക്കാം. അരിച്ചെടുത്ത് ശർക്കരയോ തേനോ ചേർത്ത് ചൂടോടെ കുടിക്കുക.\n" .
                   "• 2. ചുക്കുപൊടി ഉണ്ടാക്കാൻ: ചുക്ക് ചെറിയ കഷ്ണങ്ങളാക്കി 1 മിനിറ്റ് പാനിൽ ചൂടാക്കി മിക്സിയിൽ പൊടിച്ചെടുക്കുക. ചായയിലോ പാലിലോ രസത്തിലോ കാൽ ടീസ്പൂൺ വീതം ചേർത്ത് ഉപയോഗിക്കാം.\n" .
                   "• 3. ഗ്യാസിനും ദഹനത്തിനും: കാൽ ടീസ്പൂൺ ചുക്കുപൊടിയും അല്പം ഉപ്പും നാരങ്ങാനീരും ചെറുചൂടുവെള്ളത്തിൽ ചേർത്ത് ഭക്ഷണത്തിന് ശേഷം കുടിക്കുക.\n" .
                   "• 4. കറികളിൽ: രസം, സാമ്പാർ, മീൻ കറി, ചിക്കൻ കറി എന്നിവയിൽ ചേർത്താൽ വിശേഷപ്പെട്ട രുചിയും ആരോഗ്യഗുണവും ലഭിക്കും.\n" .
                   "• 5. സൂക്ഷിക്കേണ്ട വിധം: ഈർപ്പമില്ലാത്ത വായു കടക്കാത്ത പാത്രത്തിൽ അടച്ചു സൂക്ഷിക്കുക. പൂപ്പൽ വരാതിരിക്കാൻ 2 മാസത്തിലൊരിക്കൽ അല്പനേരം വെയിൽ കൊള്ളിക്കുന്നത് നല്ലതാണ്. 12 മാസം വരെ കേടുകൂടാതെ ഇരിക്കും.";

        $hiTitle = 'वनतीरम® जैविक सोंठ (ड्राई जिंजर / सूंठ) – 100% शुद्ध धूप में सुखाई गई सोंठ (100g)';
        $hiShortDesc = 'वायनाड के आदिवासी किसानों द्वारा प्राकृतिक रूप से उगाई और धूप में सुखाई गई 100% शुद्ध साबुत सोंठ (Dry Ginger / Sonth)। आयुर्वेद में "विश्वभेषज" (सार्वभौमिक औषधि) के रूप में प्रसिद्ध; सर्दी, खांसी, गले की खराश, गैस, अपच और जोड़ों के दर्द का अचूक प्राकृतिक उपचार।';

        $hiBenefits = "• 100% शुद्ध जैविक सोंठ: बिना किसी रासायनिक पॉलिश या ब्लीच के प्राकृतिक रूप से सुखाई गई शुद्ध साबुत सोंठ।\n" .
                      "• सर्दी, खांसी और गले की खराश में रामबाण: फेफड़ों के कफ को पिघलाकर बाहर निकालती है और गले के संक्रमण को तुरंत शांत करती है।\n" .
                      "• पाचन दुरुस्त करे और गैस मिटाए: भोजन को तेजी से पचाने, पेट की गैस, भारीपन और मतली को दूर करने में अत्यंत असरदार।\n" .
                      "• वजन घटाने और मेटाबॉलिज्म में सहायक: शरीर की अतिरिक्त चर्बी को पिघलाने और ऊर्जा स्तर को बढ़ाने में मदद करती है।\n" .
                      "• जोड़ों और मांसपेशियों के दर्द में राहत: प्राकृतिक एंटी-इंफ्लेमेटरी गुणों के कारण गठिया और मांसपेशियों के दर्द को कम करती है।\n" .
                      "• आयुर्वेद का 'विश्वभेषज': त्रिदोषों (विशेष रूप से वात और कफ) को संतुलित करने वाली प्राचीन प्राकृतिक औषधि।\n" .
                      "• आदिवासी किसानों का सशक्तिकरण: STTR के माध्यम से प्रत्येक खरीद सीधे वायनाड के जनजातीय कृषकों को लाभकारी मूल्य प्रदान करती है।";

        $hiIngredients = "• 100% शुद्ध धूप में सुखाई गई साबुत सोंठ (Zingiber officinale)। शून्य रसायन, शून्य ब्लीच। Batch No: 002. FSSAI: 21325185000809.";

        $hiUsage = "• 1. सोंठ का काढ़ा / मसाला चाय: सोंठ का एक छोटा टुकड़ा कूटकर पानी में काली मिर्च और तुलसी के साथ उबालें। गुड़ या शहद मिलाकर दिन में 2 बार पिएं।\n" .
                   "• 2. सोंठ पाउडर बनाना: सोंठ को छोटे टुकड़ों में तोड़कर हल्का भूनें और मिक्सी में बारीक पीस लें। चाय, दूध या काढ़े में 1/4 चम्मच इस्तेमाल करें।\n" .
                   "• 3. पेट की गैस और अपच के लिए: 1/4 चम्मच सोंठ पाउडर, चुटकी भर सेंधा नमक और थोड़ा नींबू का रस गुनगुने पानी में मिलाकर भोजन के बाद लें।\n" .
                   "• 4. भोजन में उपयोग: दाल, सब्जी, रसम, सूप और सर्दियों के लड्डुओं में स्वादिष्ट और गुणकारी।\n" .
                   "• 5. सुरक्षित रखने का तरीका: सूखे एयरटाइट जार में रखें। फफूंद से बचाने के लिए 2 महीने में एक बार धूप दिखाएं।";

        $taTitle = 'வனதீரம்® நாட்டு சுக்கு (Dry Ginger / Sukku) – 100% தூய இயற்கை சுக்கு (100g)';
        $taShortDesc = 'வயநாடு பழங்குடியின விவசாயிகளால் இயற்கை முறையில் விளைவிக்கப்பட்டு வெயிலில் உலர்த்தப்பட்ட 100% தூய முழு சுக்கு (Sukku). ஆயுர்வேதத்தின் "விஸ்வபேஷஜம்"; சளி, இருமல், தொண்டை வலி, செரிமானக் கோளாறு, வாயுத்தொல்லை மற்றும் மூட்டு வலிக்கு சிறந்த பாரம்பரிய மூலிகை.';

        $taBenefits = "• 100% தூய வெயிலில் உலர்த்திய சுக்கு: ரசாயன பூச்சு அல்லது சுண்ணாம்பு வெளுப்பு இல்லாமல் இயற்கையாக உலர்த்தப்பட்ட அசல் நாட்டு சுக்கு.\n" .
                      "• சளி, இருமல் மற்றும் தொண்டை கரகரப்புக்கு உடனடி தீர்வு: நெஞ்சு சளியை இளக்கி வெளியேற்றும்; தொண்டை வலி மற்றும் காய்ச்சலுக்கு சிறந்த நிவாரணம்.\n" .
                      "• செரிமானம் மற்றும் வாயு தொல்லை நீங்க: அஜீரணம், பசியின்மை, நெஞ்செரிச்சல் மற்றும் வயிற்று உப்புசத்தை போக்கி குடல் இயக்கத்தை சீராக்கும்.\n" .
                      "• உடல் எடை குறைப்பு மற்றும் கொழுப்பு கரைப்பு: உடலின் மெட்டபாலிசத்தை தூண்டி தேவையில்லாத கொழுப்பை கரைக்க உதவுகிறது.\n" .
                      "• மூட்டு வலி மற்றும் வீக்கம் குறைய: மூட்டு பிடிப்பு, தசை வலி மற்றும் வாத வலிகளுக்கு இயற்கையான வலி நிவாரணி.\n" .
                      "• ஆயுர்வேதத்தின் சர்வரோக நிவாரணி: வாதம் மற்றும் கபத்தை சமன் செய்து நோயெதிர்ப்பு சக்தியை அதிகரிக்கும் அற்புத மூலிகை.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR வயநாடு அமைப்பு மூலம் பழங்குடியின விவசாயிகளுக்கு நேரடி நியாயமான வருவாயை உறுதி செய்கிறது.";

        $taIngredients = "• 100% தூய முழு சுக்கு (Zingiber officinale). ரசாயனம் அல்லது சாயம் சேர்க்கப்படாதது. Batch No: 002. FSSAI: 21325185000809.";

        $taUsage = "• 1. சுக்கு காப்பி / சுக்கு மல்லி டீ: சுக்கை தட்டி மிளகு, மல்லி மற்றும் துளசியுடன் தண்ணீரில் கொதிக்க வைத்து, கருப்பட்டி அல்லது தேன் சேர்த்து சூடாக குடிக்கவும்.\n" .
                   "• 2. சுக்கு பொடி செய்ய: சுக்கை சிறு துண்டுகளாக உடைத்து லேசாக வறுத்து மிக்ஸியில் பொடி செய்யவும். டீ, ரசம் மற்றும் பாலில் 1/4 டீஸ்பூன் சேர்த்து பருகலாம்.\n" .
                   "• 3. அஜீரணம் மற்றும் வாயுவுக்கு: 1/4 டீஸ்பூன் சுக்கு பொடியுடன் சிறிது உப்பு மற்றும் எலுமிச்சை சாறு வெந்நீரில் கலந்து உணவிற்கு பின் குடிக்கவும்.\n" .
                   "• 4. சமையலில்: ரசம், சாம்பார் மற்றும் மசாலா சமையல்களில் நறுமணத்திற்கும் ஆரோக்கியத்திற்கும் பயன்படுத்தலாம்.\n" .
                   "• 5. சேமிக்கும் முறை: காற்றுப்புகாத கண்ணாடி பாட்டிலில் வைக்கவும். பூஞ்சை வராமல் இருக்க 2 மாதங்களுக்கு ஒருமுறை வெயிலில் உலர்த்தவும்.";

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
        $jointsPart = BodyPart::where('slug', 'joints')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $bodyPartIds = collect([
            $digestionPart?->id,
            $chestPart?->id,
            $jointsPart?->id,
            $wholeBodyPart?->id,
        ])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-organic-dry-ginger-chukku-100g.jpg';
        $galleryImages = [
            '/images/products/vanatheeram-organic-dry-ginger-chukku-100g.jpg',
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

        $productData = [
            'name' => $enTitle,
            'slug' => $slug,
            'sku' => 'VAN-CHK-100G',
            'price' => 120.00,
            'sale_price' => 110.00,
            'stock_quantity' => 100,
            'unit_size' => '100g',
            'badge' => '100% Organic • Sun-Dried Whole Chukku',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 9,
            'is_free_shipping' => false,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Vanatheeram Dry Ginger (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Vanatheeram Dry Ginger product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        $this->command?->info("Successfully seeded Vanatheeram Organic Dry Ginger 100g (#{$product->id}).");
    }
}
