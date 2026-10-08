<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaPureCheruthenHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Pure Cheruthen Honey details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-pure-cheruthen-stingless-bee-honey-wild-dammer-bee-honey';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-CHR-HNY-RAW-1000')
            ->orWhere('slug', 'like', '%cheruthen%')
            ->orWhere(function ($q) {
                $q->where('id', 77)
                  ->where('slug', 'like', '%honey%');
            })
            ->get();

        $enTitle = 'Aliya Pure Cheruthen (ശുദ്ധമായ ചെറുതേൻ) – Raw Stingless Bee Honey / Wild Dammer Bee Honey (1 kg)';
        $enShortDesc = '100% pure, raw, and unheated medicinal stingless bee honey (Cheruthen / Melipona honey) harvested from tiny native bees. Celebrated in Ayurveda for its signature sweet-tangy taste, high propolis content, live enzymes, and unmatched immune-building potency.';

        $enBenefits = "• Rare & Highly Medicinal: Collected from stingless dammer bees (Tetragonula iridipennis) that feed on microscopic medicinal blossoms, yielding nature's most concentrated healing nectar.\n" .
                      "• Naturally Propolis-Infused: Stored by bees in resinous cerumen pots rather than wax combs, enriching the honey with therapeutic plant flavonoids, propolis, and phenolic antioxidants.\n" .
                      "• Supreme Immune Shield for Children & Adults: Cherished as the premier Ayurvedic Rasayana for children, infants, and adults to guard against recurrent colds, fevers, and respiratory allergies.\n" .
                      "• Gut Soothing & Ulcer Healing: Naturally acidic and enzyme-active; balances healthy gut microbiome, heals digestive tract inflammation, and calms acid reflux.\n" .
                      "• Signature Sweet & Tangy Taste: Features a distinct, authentic fruity-tangy flavor with a thinner, golden viscosity that signifies genuine raw stingless bee honey.";

        $enIngredients = "• 100% Pure Raw Cheruthen (Stingless Bee Honey / Trigona iridipennis Nectar): Unpasteurized, unfiltered, cold-extracted medicinal honey rich in natural propolis and live therapeutic enzymes.\n" .
                         "• Zero Processing: Free from added sugars, artificial colors, preservatives, or heat treatment.";

        $enUsage = "• Daily Immune Booster: Take 1 teaspoon (5ml) directly on an empty stomach in the morning, or mix with lukewarm water.\n" .
                   "• For Respiratory & Cough Relief: Take 1/2 to 1 teaspoon mixed with a pinch of sitopaladi churna or freshly ground black pepper twice daily.\n" .
                   "• Ideal Anupana: The gold-standard Ayurvedic vehicle (Anupana) for administering pediatric remedies, chyavanprash, and herbal lehyams.\n" .
                   "• Storage Note: Store at room temperature away from direct sunlight. Do not heat directly or mix into boiling liquids.";

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
                'name' => 'ആലിയ പ്യുവർ ചെറുതേൻ – ശുദ്ധമായ ഔഷധ ചെറുതേൻ / ഡാമർ ബീ ഹണി (1 kg)',
                'short_description' => 'കൊമ്പില്ലാ ഈച്ചകൾ (ചെറുതേനീച്ചകൾ) ഔഷധസസ്യങ്ങളിൽ നിന്ന് ശേഖരിച്ച 100% പ്രകൃതിദത്തവും ശുദ്ധവുമായ ഔഷധ ചെറുതേൻ. പ്രൊപ്പൊളിസും എൻസൈമുകളും നിറഞ്ഞ ഇതിന്റെ പുളിപ്പു കലർന്ന മധുരരുചി പ്രതിരോധശേഷിക്കും ദഹനത്തിനും സർവ്വരോഗ ശമനത്തിനും ഉത്തമം.',
                'benefits' => "• ആയുർവേദത്തിലെ ശ്രേഷ്ഠ ഔഷധം: അതീവ സൂക്ഷ്മമായ ഔഷധപ്പൂക്കളിൽ നിന്ന് ചെറുതേനീച്ചകൾ ശേഖരിക്കുന്നതിനാൽ സാധാരണ തേനിനേക്കാൾ പതിന്മടങ്ങ് ഔഷധഗുണവും രോഗശമന ശേഷിയും നൽകുന്നു.\n" .
                              "• പ്രകൃതിദത്ത പ്രൊപ്പൊളിസ് ഗുണങ്ങൾ: മെഴുക് അറകൾക്ക് പകരം ഔഷധക്കറകൾ (Propolis) കൊണ്ട് നിർമ്മിച്ച അറകളിൽ സൂക്ഷിക്കുന്നതിനാൽ അണുബാധകളെ തടയാൻ അതിശക്തമായ ശേഷിയുണ്ട്.\n" .
                              "• കുട്ടികളിലെ പ്രതിരോധശേഷി വർദ്ധിപ്പിക്കുന്നു: ആയുർവേദത്തിൽ കുട്ടികൾക്ക് നിത്യേന നൽകാൻ നിർദ്ദേശിക്കുന്ന അമൃതാണ് ചെറുതേൻ; വിട്ടുമാറാത്ത ജലദോഷം, ചുമ, തുമ്മൽ, പനി എന്നിവ തടയുന്നു.\n" .
                              "• ദഹനത്തിനും അൾസറിനും ശമനം: കുടലിലെ വ്രണങ്ങൾ ഉണക്കാനും ദഹനക്കേട്, നെഞ്ചെരിച്ചിൽ, വയറ്റിലെ അണുബാധകൾ എന്നിവ മാറ്റാനും അതീവ ഫലപ്രദം.\n" .
                              "• പ്രത്യേക പുളികലർന്ന സ്വാഭാവിക രുചി: ചെറുതേനിന്റെ സവിശേഷതയായ ഇളം പുളിയും മധുരവും നേർത്ത കൊഴുപ്പും ഇതിന്റെ 100% പരിശുദ്ധി തെളിയിക്കുന്നു.",
                'ingredients' => "• 100% ശുദ്ധ ചെറുതേൻ (Pure Stingless Bee Honey): പ്രകൃതിദത്തമായി ശേഖരിച്ച സംസ്കരിക്കാത്ത, ചൂടാക്കാത്ത ശുദ്ധ ചെറുതേൻ.\n" .
                                 "• പ്രൊപ്പൊളിസും ജീവൽ എൻസൈമുകളും: ഔഷധക്കറകളും ജീവൽ ഘടകങ്ങളും ഒട്ടും നഷ്ടപ്പെടാതെ നിറച്ച തനത് രൂപം.",
                'usage' => "• നിത്യേന ഉപയോഗിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിൽ 1 ടീസ്പൂൺ ചെറുതേൻ നേരിട്ടോ ഇളംചൂടുവെള്ളത്തിലോ കഴിക്കുക.\n" .
                           "• ചുമയ്ക്കും കഫക്കെട്ടിനും: 1 ടീസ്പൂൺ ചെറുതേനിൽ അല്പം കുരുമുളകുപൊടിയോ തുളസിനീരോ ചേർത്ത് ദിവസവും 2 നേരം സേവിക്കുക.\n" .
                           "• കുട്ടികൾക്ക്: മുതിർന്നവരുടെ നിർദ്ദേശപ്രകാരം അര ടീസ്പൂൺ വീതം ദിവസേന നൽകുന്നത് രോഗപ്രതിരോധശേഷി ഇരട്ടിയാക്കും.\n" .
                           "• ശ്രദ്ധിക്കുക: തിളച്ച വെള്ളത്തിലോ നേരിട്ട് തീയിലോ ചൂടാക്കരുത്. തണുത്ത, ഈർപ്പമില്ലാത്ത സ്ഥലത്ത് സൂക്ഷിക്കുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया प्योर चेरुथेन (शुद्ध डामर मधु) – स्टिंगलेस बी हनी / जंगली चेरुथेन (1 kg)',
                'short_description' => 'बिना डंक वाली छोटी मधुमक्खियों (Stingless Bee) द्वारा औषधीय फूलों से एकत्र किया गया 100% शुद्ध और अत्यंत दुर्लभ जंगली चेरुथेन शहद। आयुर्वेद में अद्वितीय औषधीय गुणों, खट्टे-मीठे स्वाद और असाधारण रोग प्रतिरोधक क्षमता के लिए प्रसिद्ध।',
                'benefits' => "• दुर्लभ और अत्यधिक औषधीय: छोटी डामर मधुमक्खियां सूक्ष्म औषधीय फूलों से पराग चुनती हैं, जिससे यह सामान्य शहद की तुलना में कई गुना अधिक शक्तिशाली बनता है।\n" .
                              "• प्राकृतिक प्रोपोलिस और एंटीऑक्सीडेंट्स: यह शहद प्रोपोलिस (पेड़ों के औषधीय गोंद) के पात्रों में संग्रहित होता है, जो इसे शक्तिशाली एंटीबैक्टीरियल और एंटीवायरल गुण देता है।\n" .
                              "• बच्चों और वयस्कों की असीम रोग प्रतिरोधक क्षमता: बार-बार होने वाले सर्दी-जुकाम, गले के संक्रमण और एलर्जी से प्राकृतिक सुरक्षा देने वाला सर्वोत्तम आयुर्वेदिक रसायन।\n" .
                              "• पेट के अल्सर और आंतों का उपचार: आंतों की सूजन और गैस्ट्रिक अल्सर को शांत करता है तथा पाचन अग्नि को प्रदीप्त करता है।\n" .
                              "• अनोखा खट्टा-मीठा स्वाद: चेरुथेन का हल्का खट्टा-मीठा स्वाद और पतलापन इसकी 100% प्राकृतिक शुद्धता और उच्च एंजाइम स्तर की पहचान है।",
                'ingredients' => "• 100% शुद्ध चेरुथेन (Raw Stingless Bee Honey): बिना गर्म किया हुआ, कच्चा और प्राकृतिक औषधीय शहद।\n" .
                                 "• शून्य मिलावट: बिना किसी कृत्रिम रंग, चीनी या प्रिजर्वेटिव के शुद्ध प्रकृति प्रदत्त उपहार।",
                'usage' => "• दैनिक सेवन विधि: रोज सुबह खाली पेट 1 छोटा चम्मच (5 मिली) सीधे लें या गुनगुने पानी के साथ पिएं।\n" .
                           "• खांसी और गले की खराश के लिए: आधा से एक चम्मच शहद में चुटकी भर काली मिर्च या सोंठ मिलाकर दिन में दो बार लें।\n" .
                           "• बच्चों के लिए: बालकों को आधा चम्मच शहद देना मौसमी बीमारियों से सुरक्षा प्रदान करता है।\n" .
                           "• सावधानी: शहद को कभी भी आग पर न पकाएं या उबलते गर्म पानी में न मिलाएं। कमरे के सामान्य तापमान पर रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா பியூர் சிறுதேன் – தூய கொம்புத் தேன் / கொசுத் தேன் / ஸ்டிங்லெஸ் பீ ஹனி (1 kg)',
                'short_description' => 'கொடுக்கில்லா சிறு தேனீக்களால் மூலிகைப் பூக்களிலிருந்து சேகரிக்கப்பட்ட 100% தூய மருத்துவ சிறுதேன் (கொசுத்தேன்). இதன் புளிப்பு கலந்த தனித்துவ இனிப்புச் சுவையும், புரோபோலிஸ் சத்துக்களும் அபாரமான நோய் எதிர்ப்பு சக்தியையும் ஆரோக்கியத்தையும் தருகிறது.',
                'benefits' => "• அரிதான அதீத மருத்துவக் குணம்: மிகச் சிறிய மூலிகைப் பூக்களிலிருந்து தேனீக்கள் சேகரிப்பதால் சாதாரண தேனை விட பல மடங்கு மருத்துவ வீரியமும் நோய் எதிர்ப்பு ஆற்றலும் கொண்டது.\n" .
                              "• இயற்கை புரோபோலிஸ் (மரப்பிசின்) சத்துக்கள்: மூலிகை பிசின்களால் ஆன அறைகளில் தேன் சேமிக்கப்படுவதால் தொற்றுக்களை அழிக்கும் ஆற்றல் மிக்க இயற்கை ஆன்டிபயாடிக் ஆக செயல்படுகிறது.\n" .
                              "• குழந்தைகளுக்கு உன்னதமான நோய் எதிர்ப்பு அரண்: சளி, இருமல், ஆஸ்துமா மற்றும் அலர்ஜியை போக்கி குழந்தைகளுக்கு வலிமையான நோய் எதிர்ப்பு சக்தியை உருவாக்குகிறது.\n" .
                              "• குடல் புண்கள் மற்றும் செரிமான கோளாறுகளுக்கு நிவாரணம்: வயிற்றுப் புண்கள், அசிடிட்டி மற்றும் குடல் அழற்சியை ஆற்றி செரிமானத்தை சீராக்குகிறது.\n" .
                              "• தனித்துவமான புளிப்பு-இனிப்பு சுவை: சிறுதேனுக்கே உரிய இனிப்பும் லேசான புளிப்பும் கலந்த இயற்கை சுவையும் நளினமான அடர்த்தியும் இதன் 100% உண்மைத் தன்மையை உணர்த்துகிறது.",
                'ingredients' => "• 100% தூய சிறுதேன் (Raw Stingless Bee Honey): சூடாக்கப்படாத, வடிகட்டப்படாத தூய மூலிகை சிறுதேன்.\n" .
                                 "• இயற்கை புரோபோலிஸ் மற்றும் என்சைம்கள்: எந்தவித கலப்படமும் இல்லாத பாரம்பரிய காட்டுத் தேன்.",
                'usage' => "• அன்றாட பயன்பாடு: தினமும் காலையில் வெறும் வயிற்றில் 1 தேக்கரண்டி நேரடியாகவோ அல்லது மிதமான வெந்நீரிலோ பருகலாம்.\n" .
                           "• சளி மற்றும் இருமலுக்கு: 1 தேக்கரண்டி சிறுதேனுடன் மிளகுத்தூள் அல்லது துளசி சாறு கலந்து இருவேளை உட்கொள்ளவும்.\n" .
                           "• குழந்தைகளுக்கு: அரை தேக்கரண்டி வீதம் கொடுப்பது நினைவாற்றலையும் ஆரோக்கியத்தையும் மேம்படுத்தும்.\n" .
                           "• குறிப்பு: கொதிக்கும் சுடுநீரில் சேர்க்கக் கூடாது. சாதாரண வெப்பநிலையில் மூடி வைக்கவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['digestion', 'whole-body', 'head'];
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
                $this->command?->info("Updated Aliya Pure Cheruthen Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-CHR-HNY-RAW-1000',
                'price' => 2970.00,
                'sale_price' => 2970.00,
                'stock_quantity' => 50,
                'unit_size' => '1 kg',
                'badge' => '100% Pure Raw Cheruthen',
                'featured_image' => 'https://yuvann.com/storage/products/1ffdeffd-6486-497f-ae19-422131180c8c.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 12,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Pure Cheruthen Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
