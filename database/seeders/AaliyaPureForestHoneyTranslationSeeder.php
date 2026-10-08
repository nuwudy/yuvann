<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AaliyaPureForestHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aaliya Pure Forest Honey details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aaliya-pure-forest-honey';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'AAL-PFH-500G')
            ->orWhere('slug', 'like', '%aaliya-pure-forest-honey%')
            ->orWhere(function ($q) {
                $q->where('id', 15)
                  ->where('slug', 'like', '%honey%');
            })
            ->get();

        $enTitle = 'Aaliya Pure Forest Honey – 100% Raw, Wild Multi-Floral Natural Forest Honey (1 Kg)';
        $enShortDesc = '100% pure, unfiltered, raw wild forest honey traditionally harvested from deep Western Ghats forests. Packed with natural bee pollen, live enzymes, and potent antioxidants to bolster immunity, soothe digestion, and nurture daily vitality.';

        $enBenefits = "• 100% Raw & Unprocessed: Extracted cold without pasteurization or heat treatment, preserving vital living enzymes, bee pollen, propolis, and bio-flavonoids.\n" .
                      "• Digestive Harmony & Gut Healing: Acts as a natural prebiotic that balances intestinal flora, soothes gastrointestinal ulcers, and combats acid reflux gently.\n" .
                      "• Respiratory Relief & Natural Immunity: Powerful antimicrobial and anti-inflammatory properties soothe irritated throats, ease dry coughs, and build year-round seasonal resistance.\n" .
                      "• Ayurvedic Yogavahi (Herbal Catalyst): Traditional Ayurvedic vehicle that enhances the cellular absorption and bioavailability of herbs and supplements.\n" .
                      "• Healthy Metabolic Sweetener: Free from artificial sugars, syrups, or chemical additives; ideal for guilt-free daily tea, lemon detox drinks, and wellness recipes.";

        $enIngredients = "• 100% Pure Wild Forest Honey (Madhu / Apis dorsata nectar): Unheated, ethically collected multi-floral raw nectar rich in natural bee pollen and live therapeutic enzymes.\n" .
                         "• Zero Additives: Free from added corn syrup, inverted sugar, preservatives, or artificial coloring.";

        $enUsage = "• Daily Wellness Tonic: Mix 1 tablespoon (15g) in a glass of lukewarm water with a squeeze of fresh lemon, consumed first thing in the morning.\n" .
                   "• Cough & Throat Care: Take 1 teaspoon directly with a pinch of black pepper or turmeric twice daily for instant soothing throat relief.\n" .
                   "• Healthy Sweetener: Use as a pure, nutrient-rich replacement for refined white sugar in herbal teas, smoothies, and breakfast oats.\n" .
                   "• Caution: Never heat honey directly or mix with boiling-hot liquids, as excessive heat alters honey's natural enzymatic balance according to Ayurvedic principles. Not recommended for infants under 12 months.";

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
                'name' => 'ആലിയ പ്യുവർ ഫോറസ്റ്റ് ഹണി – 100% ശുദ്ധമായ കാട്ടുതേൻ (1 Kg)',
                'short_description' => 'പശ്ചിമഘട്ട വനങ്ങളിൽ നിന്ന് പരമ്പരാഗതമായി ശേഖരിച്ച 100% ശുദ്ധവും സംസ്കരിക്കാത്തതുമായ കാട്ടുതേൻ. പ്രകൃതിദത്ത പൂമ്പൊടിയും എൻസൈമുകളും ആന്റിഓക്‌സിഡന്റുകളും നിറഞ്ഞ ഈ കാട്ടുതേൻ പ്രതിരോധശേഷിക്കും ദഹനത്തിനും ഉത്തമം.',
                'benefits' => "• 100% ശുദ്ധവും സംസ്കരിക്കാത്തതും: ചൂടാക്കുകയോ കൃത്രിമമായി ഫിൽട്ടർ ചെയ്യുകയോ ചെയ്യാത്തതിനാൽ തേനീച്ചയുടെ പ്രകൃതിദത്ത പൂമ്പൊടിയും ഔഷധഗുണങ്ങളും പൂർണ്ണമായി നിലനിൽക്കുന്നു.\n" .
                              "• ദഹനാരോഗ്യം മെച്ചപ്പെടുത്തുന്നു: കുടലിലെ നല്ല ബാക്ടീരിയകളെ പരിപോഷിപ്പിക്കാനും അസിഡിറ്റി, നെഞ്ചെരിച്ചിൽ, വയറ്റിലെ അൾസർ എന്നിവ ശമിപ്പിക്കാനും സഹായിക്കുന്നു.\n" .
                              "• ചുമയും തൊണ്ടവേദനയും അകറ്റുന്നു: സ്വാഭാവിക ആന്റിമൈക്രോബിയൽ ഗുണങ്ങൾ ഉള്ളതിനാൽ തൊണ്ടയിലെ അണുബാധകൾക്കും വിട്ടുമാറാത്ത വരണ്ട ചുമയ്ക്കും കഫക്കെട്ടിനും മികച്ച ശമനം നൽകുന്നു.\n" .
                              "• ആയുർവേദത്തിലെ ശ്രേഷ്ഠ അനുപാനം: ഔഷധങ്ങളുടെ ഗുണങ്ങളെ ശരീരകോശങ്ങളിലേക്ക് വേഗത്തിൽ എത്തിക്കുന്ന സ്വാഭാവിക യോഗവാഹിയായി പ്രവർത്തിക്കുന്നു.\n" .
                              "• പ്രതിരോധശേഷിയും ഉന്മേഷവും: പഞ്ചസാരയോ കൃത്രിമ മധുരങ്ങളോ ഇല്ലാത്തതിനാൽ ശരീരത്തിന് ശുദ്ധമായ ഊർജ്ജവും രോഗപ്രതിരോധശേഷിയും സമ്മാനിക്കുന്നു.",
                'ingredients' => "• 100% ശുദ്ധ കാട്ടുതേൻ (Pure Forest Honey): കാട്ടിലെ ഔഷധച്ചെടികളിൽ നിന്നും പൂക്കളിൽ നിന്നും വൻതേനീച്ചകൾ ശേഖരിച്ച പ്രകൃതിദത്ത കാട്ടുതേൻ.\n" .
                                 "• പൂമ്പൊടിയും എൻസൈമുകളും: കൃത്രിമ ചേരുവകളോ പഞ്ചസാര ലായനിയോ ഒട്ടും ചേർക്കാത്ത ശുദ്ധരൂപം.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: രാവിലെ വെറുംവയറ്റിൽ 1 ടേബിൾസ്പൂൺ തേൻ ഇളംചൂടുവെള്ളത്തിൽ (ചെറുനാരങ്ങാനീര് ചേർത്തോ അല്ലാതെയോ) കുടിക്കുക.\n" .
                           "• ചുമയ്ക്കും തൊണ്ടവേദനയ്ക്കും: 1 ടീസ്പൂൺ തേൻ കുരുമുളകുപൊടിയോ മഞ്ഞൾപ്പൊടിയോ ചേർത്ത് ദിവസവും രണ്ട് നേരം കഴിക്കുക.\n" .
                           "• ആരോഗ്യകരമായ മധുരത്തിന്: പഞ്ചസാരയ്ക്ക് പകരമായി ചായയിലോ ഗ്രീൻ ടീയിലോ സ്മൂത്തികളിലോ ചേർത്ത് ഉപയോഗിക്കുക.\n" .
                           "• ശ്രദ്ധിക്കുക: തേൻ തിളച്ച ചൂടുവെള്ളത്തിൽ ചേർക്കരുത് (ഇളംചൂടുവെള്ളത്തിൽ മാത്രം ഉപയോഗിക്കുക). ഒരു വയസ്സിന് താഴെയുള്ള കുട്ടികൾക്ക് കൊടുക്കരുത്.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया प्योर फॉरेस्ट हनी – 100% शुद्ध और प्राकृतिक जंगली शहद (1 Kg)',
                'short_description' => 'पश्चिमी घाट के घने जंगलों से पारंपरिक रूप से एकत्र किया गया 100% शुद्ध, असंसाधित जंगली शहद। परागकणों, जीवित एंजाइमों और एंटीऑक्सीडेंट्स से भरपूर, जो रोग प्रतिरोधक क्षमता, पाचन और त्वचा के स्वास्थ्य को बढ़ाता है।',
                'benefits' => "• 100% शुद्ध और कच्चा शहद: बिना किसी प्रोसेसिंग या अत्यधिक गर्म किए निकाला गया, जिससे इसके प्राकृतिक एंजाइम, परागकण (Pollen) और औषधीय गुण पूरी तरह सुरक्षित रहते हैं।\n" .
                              "• पाचन तंत्र और आंतों का स्वास्थ्य: पेट के अल्सर, एसिडिटी और गैस को शांत करने में सहायक; पेट के अच्छे बैक्टीरिया को बढ़ावा देता है।\n" .
                              "• खांसी, जुकाम और गले की खराश में राहत: शक्तिशाली एंटीबैक्टीरियल गुणों से युक्त, जो गले के संक्रमण और पुरानी सूखी खांसी को तुरंत आराम पहुंचाता है।\n" .
                              "• आयुर्वेद का उत्तम अनुपान: जड़ी-बूटियों के असर को शरीर की कोशिकाओं तक तेजी से पहुंचाने वाला प्राकृतिक उत्प्रेरक (Yogavahi)।\n" .
                              "• प्राकृतिक ऊर्जा और वजन नियंत्रण: सफेद चीनी का बेहतरीन और पौष्टिक विकल्प; गुनगुने पानी के साथ सेवन करने पर अतिरिक्त चर्बी घटाने में सहायक।",
                'ingredients' => "• 100% शुद्ध जंगली शहद (Wild Forest Honey): औषधीय पौधों और फूलों से जंगली मधुमक्खियों द्वारा संचित शुद्ध मकरंद।\n" .
                                 "• शून्य मिलावट: बिना किसी चीनी के अर्क, कॉर्न सिरप या रासायनिक प्रिजर्वेटिव के।",
                'usage' => "• दैनिक सेवन विधि: रोज सुबह खाली पेट 1 बड़ा चम्मच शहद एक गिलास गुनगुने पानी और नींबू के साथ लें।\n" .
                           "• खांसी और गले के लिए: 1 चम्मच शहद में चुटकी भर काली मिर्च या हल्दी मिलाकर दिन में दो बार चाटें।\n" .
                           "• चीनी के स्थान पर: चाय, काढ़े, दूध (हल्के गुनगुने) या फलों के साथ प्राकृतिक मिठास के रूप में उपयोग करें।\n" .
                           "• सावधानी: शहद को कभी भी उबलते गर्म पानी या सीधे आंच पर न पकाएं। 1 वर्ष से कम उम्र के शिशुओं को न दें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா பியூர் ஃபாரஸ்ட் ஹனி – 100% தூய இயற்கை காட்டுத் தேன் (1 Kg)',
                'short_description' => 'மேற்குத் தொடர்ச்சி மலைக் காடுகளிலிருந்து பாரம்பரிய முறையில் சேகரிக்கப்பட்ட 100% தூய, பதப்படுத்தப்படாத காட்டுத் தேன். இயற்கையான மகரந்தம், நொதிகள் மற்றும் ஆன்டி-ஆக்ஸிடன்ட்கள் நிறைந்து நோய் எதிர்ப்பு சக்தியையும் செரிமானத்தையும் மேம்படுத்துகிறது.',
                'benefits' => "• 100% தூய மற்றும் இயற்கையான காட்டுத்தேன்: சூடாக்கப்படாமல் பதப்படுத்தப்படாமல் எடுக்கப்படுவதால் தேனின் இயற்கை சத்துக்களும் என்சைம்களும் முழுமையாக பாதுகாக்கப்படுகின்றன.\n" .
                              "• செரிமான பலம் மற்றும் குடல் ஆரோக்கியம்: குடல் புண்கள், நெஞ்செரிச்சல் மற்றும் அசிடிட்டியை குணப்படுத்தி நல்ல பாக்டீரியாக்களின் வளர்ச்சியை ஊக்குவிக்கிறது.\n" .
                              "• சளி, இருமல் மற்றும் தொண்டை வலிக்கு நிவாரணம்: இயற்கை கிருமிநாசினி பண்புகள் தொண்டை கரகரப்பு, வறட்டு இருமல் மற்றும் சளி தொல்லையை விரைவாக நீக்குகிறது.\n" .
                              "• ஆயுர்வேத யோகவாஹி பண்பு: மூலிகைகளின் மருத்துவ குணங்களை உடலின் அனைத்து செல்களுக்கும் கொண்டு சேர்க்கும் தலைசிறந்த துணை உணவு.\n" .
                              "• ஆரோக்கியமான இயற்கை இனிப்பு: வெள்ளை சர்க்கரைக்கு மாற்றாக உடல் எடையை சீராக பராமரிக்கவும், உடனடி புத்துணர்ச்சி பெறவும் உதவுகிறது.",
                'ingredients' => "• 100% தூய காட்டுத் தேன் (Wild Forest Honey): அடர்ந்த காடுகளின் மூலிகைப் பூக்களிலிருந்து தேனீக்களால் சேகரிக்கப்பட்ட இயற்கை அமுதம்.\n" .
                                 "• செயற்கை கலப்படமற்றது: சர்க்கரைப் பாகு, நிறமூட்டிகள் அல்லது ரசாயனங்கள் எதுவுமற்ற தூய நிலை.",
                'usage' => "• அன்றாட பயன்பாடு: தினமும் காலையில் வெறும் வயிற்றில் 1 மேஜைக்கரண்டி தேனை மிதமான வெந்நீரில் எலுமிச்சை சாற்றுடன் கலந்து பருகவும்.\n" .
                           "• இருமல் மற்றும் தொண்டை கரகரப்புக்கு: 1 தேக்கரண்டி தேனுடன் சிறிதளவு மிளகுத்தூள் அல்லது மஞ்சள் கலந்து தினமும் இருவேளை சுவைத்து சாப்பிடவும்.\n" .
                           "• இயற்கை இனிப்பாக: டீ, காபி மற்றும் ஆரோக்கிய பானங்களில் வெள்ளை சர்க்கரைக்கு மாற்றாக பயன்படுத்தலாம்.\n" .
                           "• எச்சரிக்கை: தேனை கொதிக்கும் சுடுநீரில் கலக்கவோ அல்லது சூடாக்கவோ கூடாது. ஒரு வயதுக்குட்பட்ட குழந்தைகளுக்கு கொடுக்க வேண்டாம்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['digestion', 'whole-body'];
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
                $this->command?->info("Updated Aaliya Pure Forest Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'AAL-PFH-500G',
                'price' => 650.00,
                'sale_price' => 650.00,
                'stock_quantity' => 50,
                'unit_size' => '1 Kg',
                'badge' => '100% Pure Wild Forest Honey',
                'featured_image' => 'https://yuvann.com/storage/products/8a3c696d-d939-4815-880d-09a3dc21517a.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 11,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aaliya Pure Forest Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
