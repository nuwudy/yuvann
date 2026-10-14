<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class VanatheeramCheruthenTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Pure Cheruthen (Stingless Bee Honey / ചെറുതേൻ) with 4-language translations and size variants.
     */
    public function run(): void
    {
        $primarySlug = 'vanatheeram-cheruthen-stingless-bee-honey';

        // Match existing product #38 or previously seeded raw forest honey slug to ensure clean update
        $product = Product::where('slug', $primarySlug)
            ->orWhere('slug', 'vanatheeram-raw-forest-honey-500ml')
            ->orWhere('id', 38)
            ->orWhere('sku', 'VAN-CHT-45ML')
            ->orWhere('sku', 'VAN-HNY-500ML')
            ->first();

        $enTitle = 'Vanatheeram® Pure Cheruthen – Raw Stingless Bee Honey (ചെറുതേൻ)';
        $enShortDesc = '100% pure, unheated, unpasteurized Cheruthen (Stingless Bee Honey / Trigona Dammer Honey) gathered by indigenous Wayanad tribals. Renowned in Ayurveda as nature\'s most potent medicinal nectar with a signature sweet-tangy taste, abundant bio-propolis, and unmatched immunity benefits.';

        $enBenefits = "• 100% Authentic Forest Cheruthen: Harvested from stingless bees (Meliponini / Tetragonula iridipennis) that build cerumen hives in hollow tree trunks across Wayanad's virgin forest canopy.\n" .
                      "• High Medicinal Propolis Content: Unlike normal honey stored in wax combs, stingless bees store nectar in pots sealed with natural plant resins and propolis, imbuing every drop with powerful natural antibiotics, antioxidants, and flavonoids.\n" .
                      "• Signature Sweet & Tangy Taste: Features a unique, naturally acidic sweet-sour flavor profile and thin liquid consistency—the true hallmarks of pure, raw, unheated stingless bee honey.\n" .
                      "• Supreme Immunity & Pediatric Rasayana: Revered in traditional Ayurveda as the foremost medicinal honey for infants, growing children, and the elderly to guard against seasonal infections, fevers, and asthma.\n" .
                      "• Relieves Cough, Cold & Respiratory Ailments: Naturally coats the throat mucosa, eases persistent bronchial irritation, and expels deep-seated chest congestion.\n" .
                      "• Potent Digestive & Ulcer Healing: Proven therapeutic action in soothing gastric mucosal irritation, healing peptic ulcers, and rebalancing beneficial gut flora.\n" .
                      "• Direct Tribal Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), Wayanad, ensuring fair trade and sustainable forest livelihood for tribal honey collectors.";

        $enIngredients = "• 100% Pure Raw Forest Cheruthen (Stingless Bee Honey / Melipona Nectar). Cold-extracted, unfiltered, and unheated. Zero added sugar, zero artificial preservatives, zero processing chemicals.";

        $enUsage = "• Daily Immunity Booster: Adults: 1 teaspoon (5–10 ml) on an empty stomach in the morning. Children (above 1 year): 1/2 teaspoon daily.\n" .
                   "• For Cough & Sore Throat: Mix 1 teaspoon Cheruthen with 1/4 teaspoon freshly ground black pepper or ginger juice twice daily.\n" .
                   "• Golden Rule: Never boil or cook honey directly. Add to herbal teas or milk only after cooling to lukewarm temperature (below 40°C) to protect therapeutic enzymes.\n" .
                   "• Ayurvedic Anupana: Ideal medicinal carrier (Anupana) for administering herbal powders, sitopaladi churna, and chyavanprash.\n" .
                   "• Storage: Store in a cool, dry place away from direct sunlight with lid tightly closed. Do not refrigerate. Natural slight effervescence is proof of living raw stingless bee honey.";

        $mlTitle = 'വനതീരം® ശുദ്ധമായ ചെറുതേൻ – റോ സ്റ്റിംഗ്‌ലെസ്സ് ബീ ഹണി (Cheruthen)';
        $mlShortDesc = 'വയനാട്ടിലെ വനങ്ങളിൽ നിന്ന് ഗോത്രവർഗ്ഗക്കാർ പരമ്പരാഗതമായി ശേഖരിച്ച 100% ശുദ്ധമായ പ്രകൃതിദത്ത ചെറുതേൻ (Stingless Bee Honey). ഉയർന്ന ഔഷധഗുണവും പ്രൊപ്പൊളിസും നിറഞ്ഞതും സ്വാഭാവിക പുളിപ്പു കലർന്ന മധുരമുള്ളതുമായ അസ്സൽ ഔഷധ അമൃത്.';

        $mlBenefits = "• 100% ശുദ്ധമായ അസ്സൽ ചെറുതേൻ: കൊമ്പില്ലാത്ത ചെറുതേനീച്ചകൾ കാട്ടുചില്ലകളിലും മരപ്പൊത്തുകളിലും നിർമ്മിക്കുന്ന ചെറുതേൻ വയനാട്ടിലെ ആദിവാസികൾ സ്വാഭാവിക രീതിയിൽ ശേഖരിക്കുന്നു.\n" .
                      "• പ്രകൃതിദത്ത പ്രൊപ്പൊളിസ് ഗുണങ്ങൾ: സാധാരണ തേനീച്ചകൾ മെഴുക് അറകളിൽ തേൻ സൂക്ഷിക്കുമ്പോൾ, ചെറുതേനീച്ചകൾ ഔഷധക്കറകൾ (Propolis) കൊണ്ടാണ് അറകൾ നിർമ്മിക്കുന്നത്. ഇത് ശരീരത്തിന് ശക്തമായ ആന്റിബയോട്ടിക് സംരക്ഷണം നൽകുന്നു.\n" .
                      "• സവിശേഷമായ പുളിയും മധുരവും കലർന്ന രുചി: ചെറുതേനിന്റെ തനിമയായ നേർത്ത കൊഴുപ്പും സ്വാഭാവികമായ പുളിപ്പ് കലർന്ന മധുരവും ഇതിന്റെ ശുദ്ധത തെളിയിക്കുന്നു.\n" .
                      "• കുട്ടികൾക്കും മുതിർന്നവർക്കും ശ്രേഷ്ഠ ഔഷധം: കുട്ടികളുടെ പ്രതിരോധശേഷി വർദ്ധിപ്പിക്കാനും ഇടവിട്ടുള്ള ജലദോഷം, പനി, കഫക്കെട്ട് എന്നിവ തടയാനും ആയുർവേദം നിഷ്കർഷിക്കുന്ന ഏറ്റവും ഉത്തമ അമൃത്.\n" .
                      "• ചുമ, തൊണ്ടവേദന, ശ്വാസകോശ രോഗങ്ങൾക്ക്: വരണ്ട ചുമ, തൊണ്ടയിലെ അണുബാധ, ആസ്ത്മ എന്നിവയ്ക്ക് അതിവേഗ ആശ്വാസം നൽകുന്നു.\n" .
                      "• ദഹനത്തിനും അൾസറിനും ഉത്തമം: വയറ്റിലെ അൾസർ, അസിഡിറ്റി, ഗ്യാസ് എന്നിവ ശമിപ്പിക്കാനും കുടലിന്റെ ആരോഗ്യം നിലനിർത്താനും സഹായിക്കുന്നു.\n" .
                      "• ഗോത്രവിഭാഗങ്ങൾക്ക് താങ്ങ്: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വയനാട്ടിലെ ആദിവാസി കുടുംബങ്ങൾക്ക് ന്യായമായ വരുമാനവും സ്വാശ്രയത്വവും നൽകുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ ഔഷധ ചെറുതേൻ (Pure Stingless Bee Honey). ചൂടാക്കാത്തതും പഞ്ചസാരയോ പ്രിസർവേറ്റീവുകളോ ചേർക്കാത്തതുമായ അസ്സൽ റോ ചെറുതേൻ.";

        $mlUsage = "• പ്രതിരോധശേഷിക്ക്: മുതിർന്നവർ രാവിലെ വെറുംവയറ്റിൽ 1 ടീസ്പൂൺ കഴിക്കുക. 1 വയസ്സിന് മുകളിലുള്ള കുട്ടികൾക്ക് അര ടീസ്പൂൺ നൽകാം.\n" .
                   "• ചുമയ്ക്കും കഫക്കെട്ടിനും: 1 ടീസ്പൂൺ ചെറുതേനിൽ അല്പം കുരുമുളകുപൊടിയോ ചുക്കുപൊടിയോ തുളസിനീരോ ചേർത്ത് ദിവസവും 2 നേരം കഴിക്കുക.\n" .
                   "• ശ്രദ്ധിക്കുക: തേൻ നേരിട്ട് തിളപ്പിക്കുകയോ തിളച്ച പാനീയങ്ങളിൽ ഒഴിക്കുകയോ ചെയ്യരുത്. ചെറുചൂടുള്ള പാനീയങ്ങളിൽ മാത്രം ചേർക്കുക.\n" .
                   "• ഔഷധങ്ങൾക്കൊപ്പം: ആയുർവേദ ചൂർണ്ണങ്ങൾക്കും ലേഹ്യങ്ങൾക്കുമൊപ്പം കഴിക്കാൻ ഏറ്റവും അനുയോജ്യം.\n" .
                   "• സൂക്ഷിക്കേണ്ട വിധം: ഫ്രിഡ്ജിൽ വയ്ക്കരുത്. അടച്ചു ഈർപ്പമില്ലാത്ത സ്ഥലത്ത് സൂക്ഷിക്കുക.";

        $hiTitle = 'वनतीरम® शुद्ध छोटी मधुमक्खी का शहद (चेरुतेन) – रॉ स्टिंगलेस बी हनी';
        $hiShortDesc = 'वायनाड के घने जंगलों से आदिवासी परिवारों द्वारा एकत्रित 100% शुद्ध, प्राकृतिक और असंसाधित चेरुतेन (डैमर / स्टिंगलेस बी हनी)। प्रोपोलिस, प्राकृतिक एंजाइमों और अद्वितीय खट्टे-मीठे स्वाद से भरपूर दुर्लभ औषधीय शहद।';

        $hiBenefits = "• 100% शुद्ध और प्राकृतिक चेरुतेन: पेड़ों के खोखलों में छोटी डैमर मधुमक्खियों (Trigona) द्वारा निर्मित अति-दुर्लभ एवं शक्तिशाली औषधीय शहद।\n" .
                      "• प्राकृतिक प्रोपोलिस का वरदान: रासायनिक मोम के बजाय प्रोपोलिस और औषधीय राल के बर्तनों में जमा होने के कारण यह प्राकृतिक एंटीबायोटिक गुणों से भरपूर है।\n" .
                      "• विशिष्ट खट्टा-मीठा स्वाद: चेरुतेन की प्रामाणिक पहचान इसका हल्का खट्टा-मीठा स्वाद और पतला तरल स्वरूप है।\n" .
                      "• बच्चों और वयस्कों की रोग प्रतिरोधक क्षमता: बार-बार होने वाले जुकाम, खांसी और संक्रमण से बच्चों की सुरक्षा के लिए आयुर्वेद का प्रमुख रसायन।\n" .
                      "• खांसी, कफ और गले के संक्रमण में असरदार: गले की सूजन को शांत कर श्वासनली में जमे कफ को आसानी से बाहर निकालता है।\n" .
                      "• पेट के अल्सर और पाचन में लाभकारी: पेट की जलन, गैस और गैस्ट्रिक अल्सर को ठीक करने में अत्यंत सहायक।\n" .
                      "• आदिवासी आजीविका को सहयोग: STTR के माध्यम से प्रत्येक खरीद सीधे वायनाड के आदिवासी समुदाय को सशक्त बनाती है।";

        $hiIngredients = "• 100% शुद्ध असंसाधित चेरुतेन शहद (Stingless Bee Honey)। शून्य चीनी, शून्य रसायन।";

        $hiUsage = "• नियमित सेवन: सुबह खाली पेट 1 चम्मच शहद का सीधा सेवन करें।\n" .
                   "• खांसी-जुकाम में: 1 चम्मच चेरुतेन में काली मिर्च पाउडर या अदरक का रस मिलाकर दिन में 2 बार लें।\n" .
                   "• सावधानी: शहद को कभी गर्म न करें और न ही उबलते पानी में डालें।\n" .
                   "• सुरक्षित रखना: फ्रिज में न रखें। ठंडी व सूखी जगह पर रखें।";

        $taTitle = 'வனதீரம்® தூய கொம்புத் தேன் / சிறுதேன் – ரா ஸ்டிங்லெஸ் பீ ஹனி (Cheruthen)';
        $taShortDesc = 'வயநாடு அடர்ந்த காடுகளில் பழங்குடியின மக்களால் பாரம்பரிய முறைப்படி சேகரிக்கப்பட்ட 100% தூய மருத்துவ சிறுதேன் (கொம்புத் தேன் / Stingless Bee Honey). அதிக புரோபோலிஸ் மற்றும் புளிப்பு கலந்த இனிய சுவையுடன் கூடிய சிறந்த நோய் எதிர்ப்பு அமிர்தம்.';

        $taBenefits = "• 100% தூய இயற்கை சிறுதேன்: கொட்டும் கொடுக்கு இல்லாத சிறு தேனீக்களால் (Dammer Bees) மரப்பொந்துகளில் கட்டப்படும் மருத்துவ குணம் கொண்ட அசல் தேன்.\n" .
                      "• இயற்கையான புரோபோலிஸ் சத்து: சிறு தேனீக்கள் பிசின் மற்றும் புரோபோலிஸ் கொண்டு கூடுகளை அமைப்பதால் இதில் இயற்கை ஆன்டி-பயாடிக் நன்மைகள் அதிகம்.\n" .
                      "• தனித்துவமான புளிப்பும் இனிப்பும் கலந்த சுவை: சிறுதேனின் உண்மையான அடையாளம் அதன் இயற்கை புளிப்பு கலந்த சுவையும் மெல்லிய திரவத் தன்மையுமாகும்.\n" .
                      "• குழந்தைகள் மற்றும் பெரியவர்களுக்கு சிறந்த நோய் எதிர்ப்பு சக்தி: அடிக்கடி வரும் சளி, இருமல், காய்ச்சல் மற்றும் அலர்ஜியை போக்கும் ஆயுர்வேத வரப்பிரசாதம்.\n" .
                      "• இருமல், தொண்டை புண் மற்றும் சளிக்கு நிவாரணம்: தொண்டையில் ஏற்படும் தொற்றுக்களை நீக்கி நெஞ்சு சளியை இளக்கி வெளியேற்றுகிறது.\n" .
                      "• வயிற்றுப்புண் மற்றும் செரிமானம்: குடல் அழற்சி, வயிற்றுப்புண் (அல்சர்) மற்றும் அசிடிட்டியை குணப்படுத்த உதவுகிறது.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR அமைப்பு மூலம் வயநாடு பழங்குடி மக்களுக்கு நேரடி நியாயமான வருவாயை வழங்குகிறது.";

        $taIngredients = "• 100% தூய சூடாக்கப்படாத சிறுதேன் (Pure Stingless Bee Honey). சர்க்கரை அல்லது செயற்கை சேர்க்கைகள் இல்லாதது.";

        $taUsage = "• நோய் எதிர்ப்பு சக்திக்கு: காலை வெறும் வயிற்றில் 1 டீஸ்பூன் தேன் நேரடியாக உட்கொள்ளவும். 1 வயதுக்கு மேற்பட்ட குழந்தைகளுக்கு அரை டீஸ்பூன் போதுமானது.\n" .
                   "• சளி மற்றும் இருமலுக்கு: 1 டீஸ்பூன் சிறுதேனுடன் சிறிது மிளகுத்தூள் அல்லது இஞ்சி சாறு கலந்து இருவேளை உட்கொள்ளவும்.\n" .
                   "• முக்கிய குறிப்பு: தேனை நேரடியாக சூடாக்கவோ கொதிக்கும் பானங்களில் சேர்க்கவோ கூடாது.\n" .
                   "• சேமிக்கும் முறை: காற்றுப்புகாத பாட்டிலில் அறை வெப்பநிலையில் வைக்கவும். பிரிட்ஜில் வைக்க வேண்டாம்.";

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

        $featuredImagePath = '/images/products/vanatheeram-raw-cheruthen-stingless-bee-honey.jpg';
        $galleryImages = [
            '/images/products/vanatheeram-raw-cheruthen-stingless-bee-honey.jpg',
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
            'sku' => 'VAN-CHT-45ML',
            'price' => 180.00,
            'sale_price' => 180.00,
            'stock_quantity' => 200,
            'unit_size' => '45 ml',
            'badge' => '100% Organic • Raw Cheruthen',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 5,
            'is_free_shipping' => false,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Vanatheeram Pure Cheruthen (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Vanatheeram Pure Cheruthen product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        // 4 Size Variants requested by User:
        // 180₹ 45 ml
        // 390₹ 100 ml
        // 980₹ 250 ml
        // 1950 ₹ 500ml
        $variants = [
            [
                'unit_size' => '45 ml',
                'price' => 180.00,
                'sale_price' => 180.00,
                'sku' => 'VAN-CHT-45ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
            [
                'unit_size' => '100 ml',
                'price' => 390.00,
                'sale_price' => 390.00,
                'sku' => 'VAN-CHT-100ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
            [
                'unit_size' => '250 ml',
                'price' => 980.00,
                'sale_price' => 980.00,
                'sku' => 'VAN-CHT-250ML',
                'stock_quantity' => 50,
                'is_active' => true,
            ],
            [
                'unit_size' => '500 ml',
                'price' => 1950.00,
                'sale_price' => 1950.00,
                'sku' => 'VAN-CHT-500ML',
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

        $this->command?->info("Successfully seeded 4 Cheruthen variants (45ml: ₹180, 100ml: ₹390, 250ml: ₹980, 500ml: ₹1950) for Product #{$product->id}.");
    }
}
