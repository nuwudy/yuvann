<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VanatheeramRobustaCoffeeTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Organic Wayanad Robusta Coffee Powder (100g) and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'vanatheeram-organic-robusta-coffee-powder-100g';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'VAN-COF-100G')
            ->orWhere('slug', 'like', '%vanatheeram%')
            ->orWhere('name', 'like', '%Vanatheeram%')
            ->orWhere('name', 'like', '%Robusta%')
            ->get();

        $enTitle = 'Vanatheeram® Organic Wayanad Robusta Coffee Powder – 100g';
        $enShortDesc = 'Single-origin 100% organic Wayanad shade-grown Robusta coffee powder ethically cultivated by indigenous tribal communities. Delivers bold, earthy strength, thick crema, elevated natural caffeine, and rich antioxidant vitality.';

        $enBenefits = "• Bold, Earthy & Uncompromised Strength: Harvested from native Wayanad shade-grown Robusta beans to deliver a dense crema, rich body, and intense aroma suited for lovers of traditional strong coffee.\n" .
                      "• Naturally Elevated Caffeine: Boasts significantly higher natural caffeine content than Arabica, sharpening cognitive alertness, mental focus, and sustained physical endurance without a mid-day crash.\n" .
                      "• Rich in Antioxidants & Chlorogenic Acid: High concentrations of polyphenols and chlorogenic acids stimulate metabolic rate and cellular protection against oxidative stress.\n" .
                      "• Essential Micronutrient Boost: Naturally packed with bioavailable potassium, magnesium, and niacin (Vitamin B3) to support nerve transmission and steady vitality.\n" .
                      "• Lean & Clean Palate: Inherently lower in lipids and sugars than Arabica, producing a crisp, clean finish that pairs effortlessly with milk or stands tall as black coffee.\n" .
                      "• 100% Chemical-Free Forest Farming: Grown strictly without synthetic fertilizers, weedicides, or chemical pesticides, utilizing native organic compost and cow dung enrichment.\n" .
                      "• Direct Social Impact: Every pack directly empowers indigenous Wayanad tribal families through fair community trade facilitated by STTR (Society for Transgenders and Tribals Relief).";

        $enIngredients = "• 100% Pure Organic Wayanad Robusta Coffee Beans (Coffea canephora): Shade-grown under natural forest canopies in Wayanad, sun-dried, traditionally roasted, and finely ground to preserve natural aromatic oils, chlorogenic acids, and rich caffeine content.\n" .
                         "• Zero Chicory, Zero Preservatives, Zero Artificial Flavors or Colors.";

        $enUsage = "• Traditional South Indian Filter Coffee: Add 1 to 2 tablespoons of Vanatheeram Robusta coffee powder into the upper chamber of a traditional coffee filter. Pour freshly boiled hot water (approx. 100ml) over the powder and let it brew for 10–15 minutes. Combine the rich decoction with hot frothy milk and jaggery or natural sugar to taste.\n" .
                   "• Black Coffee / Americano: Add 1 teaspoon of powder into a cup, pour hot boiling water, steep for 3 to 4 minutes, strain, and enjoy bold and black.\n" .
                   "• Cold Brew: Steep 3 tablespoons of powder in 300ml cold water for 12–16 hours in the refrigerator, strain, and serve chilled with ice.\n" .
                   "• Storage: Store in an airtight container in a cool, dry place away from moisture and direct sunlight to preserve freshness and aroma.";

        $mlTitle = 'വനതീരം® ഓർഗാനിക് വയനാടൻ റോബസ്റ്റ കോഫി പൗഡർ – 100g';
        $mlShortDesc = 'വയനാടൻ കാടുകളിലെ തണലിൽ ഗോത്രവർഗ്ഗ കർഷകർ തികച്ചും ജൈവരീതിയിൽ വിളയിച്ചെടുത്ത 100% ശുദ്ധമായ റോബസ്റ്റ കോഫി പൗഡർ. കട്ടികൂടിയ കൊഴുപ്പും സ്വാഭാവിക കഫീൻ ഊർജ്ജവും കടും കാപ്പിയുടെ തനത് സ്വാദും പ്രധാനം ചെയ്യുന്നു.';

        $mlBenefits = "• കടുപ്പമേറിയ തനത് വയനാടൻ രുചിയും സുഗന്ധവും: വയനാട്ടിലെ തണൽ മരങ്ങൾക്ക് കീഴിൽ വളരുന്ന തനത് റോബസ്റ്റ കാപ്പിക്കുരുക്കളിൽ നിന്ന് തയ്യാറാക്കിയത്; കൊഴുപ്പാർന്ന ക്രീമയും ഗാഢമായ കാപ്പി സുഗന്ധവും നൽകുന്നു.\n" .
                      "• ഉയർന്ന സ്വാഭാവിക കഫീൻ – ഉന്മേഷവും ഏകാഗ്രതയും: അറബിക്കയെ അപേക്ഷിച്ച് ഉയർന്ന അളവിലുള്ള സ്വാഭാവിക കഫീൻ അടങ്ങിയിരിക്കുന്നതിനാൽ മസ്തിഷ്കത്തിന് ഉണർവും ഏകാഗ്രതയും ശാരീരിക ഊർജ്ജവും പ്രദാനം ചെയ്യുന്നു.\n" .
                      "• ആന്റിഓക്സിഡന്റുകളാൽ സമ്പുഷ്ടം: ഉയർന്ന അളവിലുള്ള പോളിഫെനോളുകളും ക്ലോറോജെനിക് ആസിഡും ശരീരത്തിലെ മെറ്റബോളിസം വർദ്ധിപ്പിക്കാനും കോശങ്ങളെ സംരക്ഷിക്കാനും സഹായിക്കുന്നു.\n" .
                      "• അവശ്യ മൈക്രോ ന്യൂട്രിയന്റുകൾ: പൊട്ടാസ്യം, മഗ്നീഷ്യം, നിയാസിൻ (വിറ്റാമിൻ B3) എന്നിവയാൽ സമ്പുഷ്ടമായതിനാൽ നാഡീവ്യവസ്ഥയുടെ ആരോഗ്യവും ഉന്മേഷവും നിലനിർത്തുന്നു.\n" .
                      "• കൊഴുപ്പും പഞ്ചസാരയും കുറഞ്ഞ ശുദ്ധമായ രുചി: കൊഴുപ്പും പ്രകൃതിദത്ത പഞ്ചസാരയും കുറവായതിനാൽ പാൽ ചേർത്തോ കട്ടൻ കാപ്പിയായോ ആസ്വദിക്കാൻ ഏറ്റവും ഉത്തമം.\n" .
                      "• 100% രാസവളങ്ങളില്ലാത്ത വന കൃഷി: കീടനാശിനികളോ രാസവളങ്ങളോ കളനാശിനികളോ ഇല്ലാതെ ചാണകവും ജൈവവളങ്ങളും മാത്രം ഉപയോഗിച്ച് കൃഷി ചെയ്തത്.\n" .
                      "• ഗോത്രവിഭാഗങ്ങൾക്ക് കരുതൽ: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി ഓരോ പാക്കറ്റും വയനാട്ടിലെ ആദിവാസി കുടുംബങ്ങൾക്ക് ന്യായമായ വരുമാനവും സ്വാശ്രയത്വവും ഉറപ്പാക്കുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ ഓർഗാനിക് വയനാടൻ റോബസ്റ്റ കാപ്പിക്കുരു പൊടിച്ചത് (Coffea canephora): കാട്ടുതണലിൽ വളർന്ന് സൂര്യപ്രകാശത്തിൽ ഉണക്കി പരമ്പരാഗതമായി വറുത്ത് പൊടിച്ചെടുത്തത്.\n" .
                         "• ചിക്കറിയോ പ്രിസർവേറ്റീവുകളോ കൃത്രിമ സുഗന്ധങ്ങളോ നിറങ്ങളോ ചേർക്കാത്തത്.";

        $mlUsage = "• പരമ്പരാഗത ഫിൽട്ടർ കോഫി: ഫിൽട്ടറിന്റെ മുകൾ തട്ടിൽ 1–2 ടീസ്പൂൺ വനതീരം കാപ്പിപ്പൊടിയിട്ട് തിളച്ച വെള്ളം ഒഴിക്കുക. 10–15 മിനിറ്റിൽ ഇറങ്ങുന്ന കടുപ്പമേറിയ ഡികോക്ഷനിലേക്ക് ആവശ്യത്തിന് തിളപ്പിച്ച പാലും ശർക്കരയോ പഞ്ചസാരയോ ചേർത്ത് പതപ്പിച്ച് കുടിക്കുക.\n" .
                   "• കട്ടൻ കാപ്പി (Black Coffee): ഒരു കപ്പ് തിളച്ച വെള്ളത്തിൽ 1 ടീസ്പൂൺ കാപ്പിപ്പൊടി ചേർത്ത് 3–4 മിനിറ്റ് തിളപ്പിച്ച് അരിച്ചെടുത്ത് ഉപയോഗിക്കുക.\n" .
                   "• സൂക്ഷിക്കേണ്ട വിധം: കാപ്പിയുടെ സ്വാഭാവിക സുഗന്ധവും ഗുണങ്ങളും നിലനിർത്താൻ വായു കടക്കാത്ത പാത്രത്തിൽ ഈർപ്പമില്ലാത്ത സ്ഥലത്ത് സൂക്ഷിക്കുക.";

        $hiTitle = 'वनतीरम® ऑर्गेनिक वायनाड रोबस्टा कॉफी पाउडर – 100g';
        $hiShortDesc = 'वायनाड के घने जंगलों में आदिवासी समुदायों द्वारा छाया में उगाई गई 100% शुद्ध ऑर्गेनिक रोबस्टा कॉफी। गाढ़ी क्रीमी लेयर, प्राकृतिक कैफीन की भरपूर ताजगी और पारंपरिक कड़क कॉफी का बेमिसाल स्वाद।';

        $hiBenefits = "• कड़क, सौंधी और बेजोड़ खुशबू: वायनाड के जंगलों में छायादार वृक्षों के नीचे उपजी रोबस्टा बीन्स से तैयार, जो गाढ़ी क्रीमा, भरपूर स्वाद और तीव्र सुगंध प्रदान करती है।\n" .
                      "• प्राकृतिक कैफीन की प्रचुरता – मानसिक सतर्कता व ऊर्जा: अरेबिका की तुलना में अधिक प्राकृतिक कैफीन से युक्त, जो दिनभर थकान दूर कर मानसिक एकाग्रता और शारीरिक ऊर्जा बनाए रखता है।\n" .
                      "• एंटीऑक्सीडेंट्स और क्लोरोजेनिक एसिड से भरपूर: उच्च मात्रा में पॉलीफेनोल्स और क्लोरोजेनिक एसिड मेटाबॉलिज्म तेज करते हैं और कोशिकाओं को सुरक्षित रखते हैं।\n" .
                      "• जरूरी पोषक तत्व: पोटैशियम, मैग्नीशियम और नियासिन (विटामिन B3) से भरपूर, जो तंत्रिका तंत्र को मजबूत कर सक्रियता बनाए रखते हैं।\n" .
                      "• शुद्ध एवं ताजगी भरा स्वाद: अरेबिका की तुलना में वसा और प्राकृतिक शर्करा कम होने से यह दूध के साथ या ब्लैक कॉफी के रूप में बेहद स्वादिष्ट लगती है।\n" .
                      "• 100% रसायन मुक्त वन खेती: बिना किसी रासायनिक खाद, कीटनाशक या खरपतवार नाशक के, केवल प्राकृतिक जैविक खाद से उगाई गई।\n" .
                      "• आदिवासी परिवारों का सशक्तिकरण: STTR के माध्यम से प्रत्येक पैक सीधे वायनाड के मूल निवासी जनजातीय परिवारों को उचित आजीविका प्रदान करता है।";

        $hiIngredients = "• 100% शुद्ध ऑर्गेनिक वायनाड रोबस्टा कॉफी बीन्स (Coffea canephora): पारंपरिक रूप से भुनी और बारीक पीसी हुई शुद्ध कॉफी।\n" .
                         "• बिना चिकोरी, बिना प्रिजर्वेटिव्स, बिना कृत्रिम सुगंध या रंग।";

        $hiUsage = "• पारंपरिक फिल्टर कॉफी: कॉफी फिल्टर में 1-2 चम्मच वनतीरम रोबस्टा पाउडर डालें और उबलता गर्म पानी डालें। 10-15 मिनट में तैयार डिकॉक्शन में गर्म दूध और स्वादानुसार गुड़ या शक्कर मिलाकर पिएं।\n" .
                   "• ब्लैक कॉफी: एक कप खौलते पानी में 1 चम्मच पाउडर डालें, 3-4 मिनट तक उबलने दें, छानकर गरमा-गरम आनंद लें।\n" .
                   "• सुरक्षित रखने का तरीका: ताजगी और महक बरकरार रखने के लिए एयरटाइट डिब्बे में ठंडी व सूखी जगह पर रखें।";

        $taTitle = 'வனதீரம்® ஆர்கானிக் வயநாடு ரோபஸ்டா காபி தூள் – 100g';
        $taShortDesc = 'வயநாடு மலைக்காடுகளில் பழங்குடியின மக்களால் இயற்கை முறையில் நிழலில் பயிரிடப்பட்ட 100% தூய ஆர்கானிக் ரோபஸ்டா காபி தூள். அடர்த்தியான நறுமணம், இயற்கையான புத்துணர்ச்சி மற்றும் பாரம்பரிய கடும்பில் காப்பியின் அசல் சுவை.';

        $taBenefits = "• அடர்ந்த காபி நறுமணமும் அசல் கடும்பில் சுவையும்: வயநாட்டின் இயற்கை காடுகளில் நிழலில் விளைந்த ரோபஸ்டா காபி கொட்டைகளிலிருந்து தயாரிக்கப்பட்டது; சிறந்த க்ரீமாவும் அழுத்தமான சுவையும் தருகிறது.\n" .
                      "• இயற்கையான அதிக கஃபைன் – மன விழிப்புணர்வும் ஆற்றலும்: அரபிகா காபியை விட அதிக இயற்கைக் கஃபைன் நிறைந்தது; நாள் முழுவதும் சுறுசுறுப்பையும் கவனக் குவிப்பையும் நீடிக்கச் செய்கிறது.\n" .
                      "• ஆன்டிஆக்ஸிடன்ட்கள் மற்றும் குளோரோஜெனிக் அமிலம்: அதிகப்படியான பாலிபினால்கள் உடல் வளர்சிதை மாற்றத்தை (Metabolism) தூண்டி செல்களைப் பாதுகாக்கிறது.\n" .
                      "• அத்தியாவசிய தாதுக்கள்: பொட்டாசியம், மெக்னீசியம் மற்றும் நியாசின் (வைட்டமின் B3) நிறைந்து நரம்பு மண்டலத்திற்கு புத்துணர்ச்சி அளிக்கிறது.\n" .
                      "• தூய்மையான சுவை: கொழுப்பு மற்றும் சர்க்கரை அளவு குறைவாக இருப்பதால் பாலுடன் கலந்தோ அல்லது பிளாக் காபியாகவோ அருந்த மிகச் சிறந்தது.\n" .
                      "• 100% ரசாயனமற்ற இயற்கை விவசாயம்: செயற்கை உரங்கள், பூச்சிக்கொல்லிகள் இன்றி பாரம்பரிய இயற்கை சாண எரு மட்டுமே பயன்படுத்தி விளைவிக்கப்பட்டது.\n" .
                      "• பழங்குடியின மக்களின் வாழ்வாதார மேம்பாடு: STTR அமைப்பு மூலம் வயநாடு பழங்குடியின குடும்பங்களுக்கு நேரடி நியாயமான வருவாயை உறுதி செய்கிறது.";

        $taIngredients = "• 100% தூய ஆர்கானிக் வயநாடு ரோபஸ்டா காபி கொட்டைகள் (Coffea canephora): காடுகளின் நிழலில் வளர்ந்து பாரம்பரிய முறையில் வறுத்து அரைக்கப்பட்டது.\n" .
                         "• சிக்கரி, பதப்படுத்திகள் அல்லது செயற்கை நிறமூட்டிகள் சேர்க்கப்படாதது.";

        $taUsage = "• பாரம்பரிய பில்டர் காபி: காபி பில்டரில் 1–2 டீஸ்பூன் காபி தூள் சேர்த்து கொதிக்கும் வெந்நீர் ஊற்றவும். 10–15 நிமிடங்களில் இறங்கும் திக்கான டிக்காஷனில் சூடான பால் மற்றும் நாட்டுச்சர்க்கரை சேர்த்து நுரைக்க ஆற்றிப் பருகவும்.\n" .
                   "• பிளாக் காபி: ஒரு கப் கொதிக்கும் தண்ணீரில் 1 டீஸ்பூன் காபி தூள் சேர்த்து 3 நிமிடங்கள் கொதிக்க வைத்து வடிகட்டி பருகவும்.\n" .
                   "• சேமிப்பு முறை: நறுமணமும் சுவையும் மாறாமல் இருக்க காற்றுப்புகாத பாத்திரத்தில் வைக்கவும்.";

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

        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $headPart = BodyPart::where('slug', 'head')->first();
        $digestionPart = BodyPart::where('slug', 'digestion')->first();
        $bodyPartIds = collect([$wholeBodyPart?->id, $headPart?->id, $digestionPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-organic-robusta-coffee-powder-100g.png';
        $galleryImages = [
            '/images/products/vanatheeram-organic-robusta-coffee-powder-100g.png',
        ];

        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $staminaCategory = Category::where('slug', 'stamina')->first();
        $categoryIds = collect([$superfoodsCategory?->id, $staminaCategory?->id])->filter()->values()->all();
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
                    'price' => 240.00,
                    'sale_price' => 210.00,
                    'unit_size' => '100g',
                    'featured_image' => $featuredImagePath,
                    'gallery_images' => $galleryImages,
                    'badge' => '100% Organic • Wayanad Robusta',
                    'is_active' => true,
                    'is_featured' => true,
                ]);

                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                if (!empty($categoryIds)) {
                    $product->categories()->syncWithoutDetaching($categoryIds);
                }

                $this->command?->info("Updated Vanatheeram Robusta Coffee (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VAN-COF-100G',
                'price' => 240.00,
                'sale_price' => 210.00,
                'stock_quantity' => 100,
                'unit_size' => '100g',
                'badge' => '100% Organic • Wayanad Robusta',
                'featured_image' => $featuredImagePath,
                'gallery_images' => $galleryImages,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 3,
                'is_free_shipping' => false,
                'translations' => $translations,
            ]);

            if (!empty($categoryIds)) {
                $product->categories()->syncWithoutDetaching($categoryIds);
            }
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }

            $this->command?->info("Created new Vanatheeram Robusta Coffee product (#{$product->id}) with full 4-language translations.");
        }
    }
}
