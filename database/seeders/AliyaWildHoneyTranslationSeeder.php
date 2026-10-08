<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaWildHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Wild Honey (Puttu Then) details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-wild-honey-pure-natural-raw-natures-sweetest-gift';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-WLD-HNY500')
            ->orWhere('slug', 'like', '%aliya-wild-honey%')
            ->orWhere(function ($q) {
                $q->where('id', 54)
                  ->where('slug', 'like', '%wild-honey%');
            })
            ->get();

        $enTitle = 'Aliya Wild Honey (ആലിയ പുറ്റു തേൻ) – Pure, Natural, Raw Wild Forest Honey (500g)';
        $enShortDesc = '100% pure, unpasteurized wild forest honey (Puttu Then) harvested directly from pristine forest earth hives. Rich in living enzymes, rare soil-derived trace minerals, and antioxidants to fortify immunity, improve respiration, and restore daily vitality.';

        $enBenefits = "• Traditional Puttu Then Heritage: Harvested from subterranean forest cavities and natural hives, delivering rare earth-derived trace minerals (iron, magnesium, silica) and deep therapeutic potency.\n" .
                      "• 100% Raw & Unheated: Completely unpasteurized and cold-filtered to safeguard delicate living enzymes (invertase, catalase), wild bee pollen, and natural antibacterial inhibine.\n" .
                      "• Respiratory Defense & Throat Soothing: Natural demulcent properties quickly coat inflamed mucous membranes, clearing stubborn phlegm, allergic coughs, and throat irritation.\n" .
                      "• Cellular Rejuvenation & Detox: Abundant in bioflavonoids and phenolic acids that flush metabolic toxins (Ama) from the blood, enhancing skin complexion and natural immunity.\n" .
                      "• Digestive Soothing & Gut Flora: Gentle prebiotic action nurtures healthy gut flora, relieves acid hyperacidity, and supports optimal nutrient absorption.";

        $enIngredients = "• 100% Pure Wild Puttu Honey (Natural Raw Forest Nectar): Ethically gathered wild multi-floral honey containing natural pollen grains, propolis traces, and active enzymes.\n" .
                         "• Zero Chemical Additives: No artificial sugar syrups, preservatives, heat processing, or colorants.";

        $enUsage = "• Daily Morning Rejuvenation: Stir 1 tablespoon (15g) into a glass of lukewarm water with half a squeezed lemon, consumed on an empty stomach.\n" .
                   "• For Cough & Bronchial Relief: Blend 1 teaspoon of honey with a pinch of crushed black pepper or ginger juice twice daily.\n" .
                   "• Natural Sweetener & Anupana: Use as an authentic Ayurvedic medium (Anupana) for consuming herbal powders, tonics, and teas.\n" .
                   "• Usage Caution: Never mix honey with boiling-hot liquids or cook over fire. Store in a cool, dry place. Not suitable for infants under 12 months.";

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
                'name' => 'ആലിയ പുറ്റു തേൻ – 100% ശുദ്ധമായ പ്രകൃതിദത്ത കാട്ടുതേൻ (500g)',
                'short_description' => 'കാട്ടിലെ പ്രകൃതിദത്ത പുറ്റുകളിൽ നിന്നും മൺപൊത്തുകളിൽ നിന്നും ശേഖരിച്ച 100% ശുദ്ധവും സംസ്കരിക്കാത്തതുമായ പുറ്റുതേൻ. അപൂർവ്വ ധാതുക്കളും ഔഷധഗുണങ്ങളും നിറഞ്ഞ ഈ തേനമൃത് രോഗപ്രതിരോധശേഷിക്കും ശ്വാസകോശാരോഗ്യത്തിനും ഉത്തമം.',
                'benefits' => "• പരമ്പരാഗത പുറ്റുതേൻ ഔഷധഗുണം: മൺപുറ്റുകളിൽ നിന്നും സ്വാഭാവിക കൂനകളിൽ നിന്നും ശേഖരിക്കുന്നതിനാൽ മണ്ണിലെ അപൂർവ്വ ധാതുക്കളും അയണും ഔഷധവീര്യവും സ്വാഭാവികമായി സമന്വയിച്ചിരിക്കുന്നു.\n" .
                              "• 100% ശുദ്ധവും ചൂടാക്കാത്തതും: തിളപ്പിക്കുകയോ കൃത്രിമമായി അരിക്കുകയോ ചെയ്യാത്തതിനാൽ തേനീച്ചയുടെ പ്രകൃതിദത്ത പൂമ്പൊടിയും ജീവൽ എൻസൈമുകളും പൂർണ്ണമായി നിലനിൽക്കുന്നു.\n" .
                              "• കഫക്കെട്ടും ശ്വാസതടസ്സവും മാറ്റുന്നു: വിട്ടുമാറാത്ത വരണ്ട ചുമ, കഫക്കെട്ട്, തൊണ്ടവേദന, അലർജി എന്നിവയ്ക്ക് അതിവേഗം ആശ്വാസം നൽകുന്ന മികച്ച ഔഷധം.\n" .
                              "• രക്തശുദ്ധീകരണവും പ്രതിരോധശേഷിയും: ശരീരത്തിലെ ദുഷിപ്പുകളെ (ആമം) പുറന്തള്ളി രക്തം ശുദ്ധീകരിക്കാനും ചർമ്മത്തിന് തിളക്കവും രോഗപ്രതിരോധശേഷിയും നൽകാനും സഹായിക്കുന്നു.\n" .
                              "• ദഹനാരോഗ്യം മെച്ചപ്പെടുത്തുന്നു: കുടലിലെ അസിഡിറ്റി, നെഞ്ചെരിച്ചിൽ, വ്രണങ്ങൾ എന്നിവ ശമിപ്പിക്കുകയും ദഹനം സുഗമമാക്കുകയും ചെയ്യുന്നു.",
                'ingredients' => "• 100% ശുദ്ധ പുറ്റുതേൻ (Pure Wild Puttu Honey): പശ്ചിമഘട്ട കാടുകളിൽ നിന്ന് ശേഖരിച്ച ശുദ്ധമായ അസംസ്കൃത തേൻ.\n" .
                                 "• പൂമ്പൊടിയും എൻസൈമുകളും: പഞ്ചസാര ലായനിയോ പ്രിസർവേറ്റീവുകളോ ഒട്ടും ചേർക്കാത്ത പ്രകൃതിദത്ത അമൃത്.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: രാവിലെ വെറുംവയറ്റിൽ 1 ടേബിൾസ്പൂൺ തേൻ ഇളംചൂടുവെള്ളത്തിൽ നാരങ്ങാനീര് ചേർത്തോ അല്ലാതെയോ കഴിക്കുക.\n" .
                           "• ചുമയ്ക്കും തൊണ്ടവേദനയ്ക്കും: 1 ടീസ്പൂൺ പുറ്റുതേൻ കുരുമുളകുപൊടിയോ ഇഞ്ചിനീരോ ചേർത്ത് ദിവസവും രണ്ട് നേരം സേവിക്കുക.\n" .
                           "• ആരോഗ്യകരമായ മധുരത്തിന്: പഞ്ചസാരയ്ക്ക് പകരമായി ഔഷധ ചായകളിലോ പാൽ ചേർത്ത ഇളംചൂടുള്ള പാനീയങ്ങളിലോ ഉപയോഗിക്കുക.\n" .
                           "• ശ്രദ്ധിക്കുക: തേൻ തിളച്ച വെള്ളത്തിൽ ചേർക്കരുത്. സാധാരണ ഊഷ്മാവിൽ സൂക്ഷിക്കുക. ഒരു വയസ്സിന് താഴെയുള്ള കുട്ടികൾക്ക് നൽകരുത്.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया वाइल्ड हनी (आलिया पुट्टू तेन) – 100% शुद्ध और प्राकृतिक जंगली शहद (500g)',
                'short_description' => 'घने जंगलों के प्राकृतिक छत्तों और पुट्टू से पारंपरिक रूप से एकत्र किया गया 100% शुद्ध और असंसाधित जंगली शहद। परागकणों, एंजाइमों और दुर्लभ प्राकृतिक खनिजों से भरपूर, जो रोग प्रतिरोधक क्षमता, श्वसन तंत्र और संपूर्ण स्वास्थ्य को सुदृढ़ करता है।',
                'benefits' => "• पारंपरिक पुट्टू शहद के दुर्लभ गुण: प्राकृतिक वन-गुहाओं से संचित होने के कारण इसमें प्राकृतिक लौह तत्व, सिलिका और मिट्टी के दुर्लभ खनिज प्रचुर मात्रा में होते हैं।\n" .
                              "• 100% कच्चा और गैर-पाश्चुरीकृत: बिना किसी रासायनिक प्रसंस्करण या अत्यधिक तापमान के निकाला गया, जिससे इसके जीवित एंजाइम और प्राकृतिक पराग सुरक्षित रहते हैं।\n" .
                              "• खांसी, जुकाम और कफ में तुरंत राहत: गले की श्लेष्मा झिल्ली को शांत कर पुरानी खांसी, गले की खराश और ब्रोन्कियल एलर्जी को जड़ से मिटाता है।\n" .
                              "• रक्त शोधन और विषहरण (Detox): शरीर की कोशिकाओं से टॉक्सिन्स को बाहर निकालकर हीमोग्लोबिन स्तर बढ़ाता है और चेहरे पर प्राकृतिक चमक लाता है।\n" .
                              "• पाचन और आंतों का संतुलन: पेट की जलन, अल्सर और हाइपरएसिडिटी को शांत कर पाचन अग्नि को दुरुस्त करता है।",
                'ingredients' => "• 100% शुद्ध जंगली पुट्टू शहद (Wild Puttu Honey): घने औषधीय वनों से मधुमक्खियों द्वारा संचित शुद्ध प्राकृतिक मकरंद.\n" .
                                 "• शून्य मिलावट: किसी भी चीनी सिरप, रंग या रसायनों से पूरी तरह मुक्त।",
                'usage' => "• दैनिक सेवन विधि: रोज सुबह खाली पेट 1 बड़ा चम्मच शहद एक गिलास गुनगुने पानी और नींबू के साथ पिएं।\n" .
                           "• खांसी और बलगम के लिए: 1 चम्मच शहद में कुटी हुई काली मिर्च या अदरक का रस मिलाकर दिन में दो बार लें।\n" .
                           "• प्राकृतिक मिठास: चाय, काढ़े और हर्बल पेय में चीनी के सर्वोत्तम विकल्प के रूप में उपयोग करें।\n" .
                           "• सावधानी: शहद को कभी भी उबलते गर्म पानी में न मिलाएं या पकाएं नहीं। 1 वर्ष से कम उम्र के बच्चों को न दें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா வைல்ட் ஹனி (புற்றுத் தேன்) – 100% தூய இயற்கை காட்டுத் தேன் (500g)',
                'short_description' => 'இயற்கையான புற்று மற்றும் அடர்ந்த காட்டுப் பொந்துகளிலிருந்து பாரம்பரியமாக சேகரிக்கப்பட்ட 100% தூய மூலிகை புற்றுத்தேன். உயிருள்ள நொதிகள், தாதுக்கள் மற்றும் ஆன்டி-ஆக்ஸிடன்ட்கள் நிறைந்து நோய் எதிர்ப்பு சக்தியையும் சுவாச ஆரோக்கியத்தையும் மேம்படுத்துகிறது.',
                'benefits' => "• பாரம்பரிய புற்றுத்தேன் மருத்துவ மேன்மை: இயற்கையான புற்றுகளில் இருந்து எடுக்கப்படுவதால் மண்ணின் அரிய தாது உப்புகளும், இரும்புச்சத்தும், அபரிமிதமான மருத்துவ சக்தியும் நிறைந்தது.\n" .
                              "• 100% தூய மற்றும் சூடாக்கப்படாதது: பதப்படுத்தப்படாமல் நேரடியாக எடுக்கப்படுவதால் தேனின் இயற்கை சத்துக்களும், மகரந்தமும், மருத்துவ குணங்களும் அப்படியே பாதுகாக்கப்படுகின்றன.\n" .
                              "• இருமல், கபம் மற்றும் ஆஸ்துமாவுக்கு நிவாரணம்: வறட்டு இருமல், நெஞ்சு சளி, தொண்டை வலி மற்றும் சுவாசக் கோளாறுகளை குணப்படுத்தும் அற்புத மூலிகை மருந்து.\n" .
                              "• ரத்த சுத்திகரிப்பு மற்றும் பொலிவு: உடலின் நச்சுக்களை வெளியேற்றி ரத்தத்தை சுத்திகரித்து உடலுக்கு அபார சுறுசுறுப்பையும் சருமப் பொலிவையும் அளிக்கிறது.\n" .
                              "• குடல் புண்கள் மற்றும் செரிமான பலம்: வயிற்றுப்புண், நெஞ்செரிச்சல் மற்றும் அமிலத்தன்மையை சமன் செய்து செரிமானத்தை சீராக்குகிறது.",
                'ingredients' => "• 100% தூய காட்டுப் புற்றுத் தேன் (Pure Wild Puttu Honey): மூலிகைப் பூக்களின் தேனீக்களால் சேகரிக்கப்பட்ட இயற்கை அமுதம்.\n" .
                                 "• செயற்கை கலப்படமற்றது: சர்க்கரைப் பாகு, நிறமூட்டிகள் அல்லது ரசாயனங்கள் எதுவுமற்ற தூய நிலை.",
                'usage' => "• அன்றாட பயன்பாடு: தினமும் காலையில் வெறும் வயிற்றில் 1 மேஜைக்கரண்டி தேனை மிதமான வெந்நீரில் எலுமிச்சை சாற்றுடன் கலந்து பருகவும்.\n" .
                           "• சளி மற்றும் இருமலுக்கு: 1 தேக்கரண்டி தேனுடன் சிறிதளவு மிளகுத்தூள் அல்லது இஞ்சி சாறு சேர்த்து இருவேளை உட்கொள்ளவும்.\n" .
                           "• இயற்கை இனிப்பாக: வெள்ளை சர்க்கரைக்கு மாற்றாக மூலிகை டீ மற்றும் ஆரோக்கிய பானங்களில் பயன்படுத்தலாம்.\n" .
                           "• குறிப்பு: கொதிக்கும் சுடுநீரில் கலக்கக் கூடாது. சாதாரண வெப்பநிலையில் மூடி வைக்கவும். ஒரு வயதுக்குட்பட்ட குழந்தைகளுக்கு கொடுக்க வேண்டாம்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'head', 'digestion'];
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
                $this->command?->info("Updated Aliya Wild Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-WLD-HNY500',
                'price' => 650.00,
                'sale_price' => 650.00,
                'stock_quantity' => 50,
                'unit_size' => '500 g',
                'badge' => '100% Pure Wild Puttu Honey',
                'featured_image' => 'https://yuvann.com/storage/products/14c0d7a9-9da4-4935-869f-88c695b943cd.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 13,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Wild Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
