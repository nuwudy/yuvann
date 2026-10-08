<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaNellikkaHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Nellikka Honey (Pure Amla Infused Honey) details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-nellikka-honey-pure-amla-infused-honey-iron-vitamin-c-storehouse';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-NLK-HNY250')
            ->orWhere('slug', 'like', '%nellikka%')
            ->orWhere('slug', 'like', '%amla-infused%')
            ->orWhere(function ($q) {
                $q->where('id', 60)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%nellikka%')
                          ->orWhere('slug', 'like', '%amla%')
                          ->orWhere('slug', 'like', '%honey%');
                  });
            })
            ->get();

        $enTitle = 'Aliya Nellikka Honey (നെല്ലിക്ക തേൻ) – Pure Amla Infused Honey / Iron & Vitamin C Storehouse';
        $enShortDesc = 'Traditional wellness blend of juicy wild Indian Gooseberries (Amla) steeped in pure natural honey, serving as a rich storehouse of natural Vitamin C and Iron for immunity, digestion, and hemoglobin support.';

        $enBenefits = "• Natural Iron & Hemoglobin Booster: Combining bioavailable iron with rich organic Vitamin C from wild Amla ensures optimal iron absorption, combating anemia and everyday fatigue.\n" .
                      "• Potent Vitamin C & Immune Shield: Fortifies seasonal respiratory defenses, soothing throat irritation, allergies, and recurring colds with natural antioxidants.\n" .
                      "• Digestive Rejuvenation & Acidity Relief: Gentle on the stomach, pacifies excess Pitta, relieves hyperacidity, regulates bowel movements, and stimulates metabolic fire (Agni).\n" .
                      "• Dermal Radiance & Hair Vitality: Nourishes hair follicles from the root to curb premature greying and hair thinning, while promoting clear, blemish-free skin complexion.\n" .
                      "• Daily Rasayana for Whole-Body Energy: Delivers sustained cellular energy without synthetic sugar spikes, detoxifying the liver and rejuvenating cellular vitality across all age groups.";

        $enIngredients = "• Wild Indian Gooseberry (Nellikka / Emblica officinalis / Amla): Freshly crushed indigenous gooseberries packed with natural bioflavonoids, ascorbic acid, and potent polyphenols.\n" .
                         "• 100% Pure Raw Honey (Madhu): Unheated, unfiltered natural honey acting as a potent Ayurvedic Yogavahi (catalytic carrier) to maximize herbal bioavailability.\n" .
                         "• Zero Artificial Additives: Free from added sugar, high fructose corn syrup, preservatives, or artificial coloring.";

        $enUsage = "• Recommended Dosage: Take 1 to 2 teaspoons (approx. 10–15g) along with 1-2 steeped amla pieces daily in the morning on an empty stomach or with a glass of lukewarm water.\n" .
                   "• Children (above 3 years): 1/2 to 1 teaspoon once daily for building natural seasonal resistance and supporting healthy appetite.\n" .
                   "• Storage Instructions: Store at room temperature away from direct sunlight. Use a clean, dry spoon. Do not refrigerate.";

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
                'name' => 'ആലിയ നെല്ലിക്ക തേൻ – ശുദ്ധമായ നെല്ലിക്കയും കാട്ടുതേനും ചേർത്ത അമൃത് (250g)',
                'short_description' => 'ഔഷധഗുണമുള്ള കാട്ടുനെല്ലിക്ക ശുദ്ധമായ കാട്ടുതേനിൽ പാകപ്പെടുത്തിയ പരമ്പരാഗത രസായനം. പ്രകൃതിദത്ത വിറ്റാമിൻ സിയും ഇരുമ്പും സമൃദ്ധമായി അടങ്ങിയ ഈ ഔഷധക്കൂട്ട് രോഗപ്രതിരോധശേഷിക്കും, ദഹനത്തിനും, രക്തത്തിലെ ഹീമോഗ്ലോബിൻ വർദ്ധനവിനും ഉത്തമം.',
                'benefits' => "• ഹീമോഗ്ലോബിൻ വർദ്ധനവും വിളർച്ച പരിഹാരവും: നെല്ലിക്കയിലെ പ്രകൃതിദത്ത വിറ്റാമിൻ സി തേനിൽ അടങ്ങിയിരിക്കുന്ന അയേൺ ശരീരത്തിലേക്ക് പൂർണ്ണമായി ആഗിരണം ചെയ്യാൻ സഹായിക്കുകയും ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിച്ച് ക്ഷീണം അകറ്റുകയും ചെയ്യുന്നു.\n" .
                              "• അപാര രോഗപ്രതിരോധശേഷി (വിറ്റാമിൻ സി കലവറ): കാലാവസ്ഥാ വ്യതിയാനങ്ങളിൽ ഉണ്ടാകുന്ന ചുമ, ജലദോഷം, തൊണ്ടവേദന, അലർജി എന്നിവയിൽ നിന്ന് ശരീരത്തിന് സ്വാഭാവിക പ്രതിരോധ കവചം തീർക്കുന്നു.\n" .
                              "• ദഹനപ്രക്രിയയും അസിഡിറ്റിയും ശമിപ്പിക്കുന്നു: ദഹനനാളത്തിലെ പിത്തദോഷത്തെ ശമിപ്പിച്ച് അസിഡിറ്റി, നെഞ്ചെരിച്ചിൽ, ഗ്യാസ് എന്നിവ ഒഴിവാക്കാനും മലബന്ധം അകറ്റാനും ഉത്തമം.\n" .
                              "• മുടി കൊഴിച്ചിൽ തടയലും ചർമ്മകാന്തിയും: വേരുകൾക്ക് ആവശ്യമായ പോഷണം നൽകി അകാലനരയും മുടികൊഴിച്ചിലും തടയുകയും, ചർമ്മത്തിന് സ്വാഭാവിക തിളക്കവും ആരോഗ്യവും നൽകുകയും ചെയ്യുന്നു.\n" .
                              "• സർവ്വഗുണ രസായനം: കുട്ടികൾക്കും മുതിർന്നവർക്കും ഒരുപോലെ ഉപയോഗിക്കാവുന്ന ഈ പ്രകൃതിദത്ത അമൃത് കരളിന്റെ ആരോഗ്യം സംരക്ഷിക്കുകയും ഊർജ്ജസ്വലത നിലനിർത്തുകയും ചെയ്യുന്നു.",
                'ingredients' => "• ശുദ്ധ കാട്ടുനെല്ലിക്ക (Phyllanthus emblica): വിറ്റാമിൻ സിയും ആന്റിഓക്‌സിഡന്റുകളും സമൃദ്ധമായി അടങ്ങിയ തെരഞ്ഞെടുത്ത നാടൻ നെല്ലിക്ക.\n" .
                                 "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത തേൻ: യാതൊരുവിധ രാസവസ്തുക്കളോ കൃത്രിമ മധുരമോ ചേർക്കാത്ത ശുദ്ധ കാട്ടുതേൻ.\n" .
                                 "• പ്രിസർവേറ്റീവുകളോ കൃത്രിമ നിറങ്ങളോ ചേർക്കാത്ത തികച്ചും ശുദ്ധമായ പരമ്പരാഗത കൂട്ട്.",
                'usage' => "• കഴിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിലോ ഭക്ഷണത്തിന് മുൻപോ 1 മുതൽ 2 ടീസ്പൂൺ നെല്ലിക്ക തേൻ അതിലെ ഒരു കഷണം നെല്ലിക്കയോടൊപ്പം ചവച്ചരച്ച് കഴിക്കുക.\n" .
                           "• കുട്ടികൾക്ക് (3 വയസ്സിന് മുകളിൽ): ദിവസവും അര മുതൽ ഒരു ടീസ്പൂൺ വരെ നൽകുന്നത് രോഗപ്രതിരോധശേഷിക്കും വിശപ്പ് വർദ്ധിക്കാനും നല്ലതാണ്.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: ഉണങ്ങിയ സ്പൂൺ മാത്രം ഉപയോഗിക്കുക. ഈർപ്പവും നേരിട്ടുള്ള വെയിലും ഏൽക്കാത്ത തണുപ്പുള്ള സ്ഥലത്ത് സൂക്ഷിക്കുക. ഫ്രിഡ്ജിൽ വെക്കേണ്ടതില്ല.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया नेल्लिक्का हनी (आंवला शहद) – शुद्ध आंवला युक्त प्राकृतिक शहद (250g)',
                'short_description' => 'ताजे जंगली आंवलों और 100% शुद्ध प्राकृतिक शहद का पारंपरिक आयुर्वेदिक संगम। प्राकृतिक विटामिन सी और आयरन का अनमोल खजाना, जो रोग प्रतिरोधक क्षमता, पाचन, हीमोग्लोबिन और संपूर्ण स्वास्थ्य के लिए अत्यंत लाभकारी है।',
                'benefits' => "• प्राकृतिक आयरन और हीमोग्लोबिन वर्धक: आंवले का प्राकृतिक विटामिन सी शहद के आयरन को शरीर में तेजी से अवशोषित कराता है, जिससे एनीमिया और शारीरिक कमजोरी दूर होती है।\n" .
                              "• शक्तिशाली रोग प्रतिरोधक क्षमता (Immunity Shield): मौसमी सर्दी, खांसी, गले में खराश और एलर्जी से बचाव कर शरीर को प्राकृतिक सुरक्षा कवच प्रदान करता है।\n" .
                              "• पाचन में सुधार और एसिडिटी से राहत: पेट की अतिरिक्त गर्मी (पित्त) को शांत कर गैस, एसिडिटी और सीने की जलन से राहत दिलाता है और पाचन अग्नि को बल देता है।\n" .
                              "• बालों की मजबूती और त्वचा का निखार: बालों की जड़ों को पोषण देकर असमय सफेद होने व झड़ने से रोकता है, साथ ही त्वचा में प्राकृतिक चमक लाता है।\n" .
                              "• दैनिक ऊर्जा व संपूर्ण कायाकल्प (दैनिक रसायन): शरीर से टॉक्सिन्स बाहर निकालकर लिवर को स्वस्थ रखता है और पूरे परिवार को दिनभर सक्रिय व ऊर्जावान बनाए रखता है।",
                'ingredients' => "• शुद्ध जंगली आंवला (Emblica officinalis): उच्च एंटीऑक्सीडेंट्स और प्रचुर प्राकृतिक विटामिन सी से युक्त श्रेष्ठ आंवला।\n" .
                                 "• 100% शुद्ध प्राकृतिक शहद: बिना किसी मिलावट, चीनी या चाशनी के तैयार किया गया शुद्ध शहद, जो आयुर्वेदिक योगवाही का काम करता है।\n" .
                                 "• शून्य रसायन: किसी भी प्रकार के कृत्रिम रंग, प्रिजर्वेटिव या अतिरिक्त शर्करा से पूरी तरह मुक्त।",
                'usage' => "• सेवन विधि: प्रतिदिन सुबह खाली पेट 1 से 2 चम्मच आंवला शहद एक या दो आंवले के टुकड़े के साथ चबाकर खाएं, या गुनगुने पानी के साथ लें।\n" .
                           "• बच्चों के लिए (3 वर्ष से अधिक): आधा से एक चम्मच प्रतिदिन देना बच्चों की इम्यूनिटी और भूख बढ़ाने में गुणकारी है।\n" .
                           "• भंडारण: साफ और सूखे चम्मच का उपयोग करें। सीधे धूप और नमी से दूर सामान्य तापमान पर रखें। फ्रिज में न रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா நெல்லிக்காய் தேன் – தூய காட்டு நெல்லி ஊறிய இயற்கை தேன் (250g)',
                'short_description' => 'பாரம்பரிய முறையில் தூய காட்டுத் தேனில் பதப்படுத்தப்பட்ட காட்டு நெல்லிக்காயின் அமிர்த கலவை. இயற்கையான வைட்டமின் சி மற்றும் இரும்புச்சத்தின் அரிய பெட்டகமாக விளங்கி நோய் எதிர்ப்பு சக்தி, செரிமானம் மற்றும் ரத்த சிவப்பணுக்கள் அதிகரிக்க உதவுகிறது.',
                'benefits' => "• இயற்கையான ஹீமோகுளோபின் மற்றும் ரத்த விருத்தி: நெல்லிக்காயில் உள்ள இயற்கையான வைட்டமின் சி தேனிலுள்ள இரும்புச்சத்தை உடலில் எளிதில் கிரகித்து ரத்தசோகை மற்றும் சோர்வை நீக்குகிறது.\n" .
                              "• அபார நோய் எதிர்ப்பு சக்தி (வைட்டமின் சி பெட்டகம்): பருவநிலை மாற்றங்களால் ஏற்படும் சளி, இருமல், தொண்டைக்கட்டு மற்றும் ஒவ்வாமையிலிருந்து உடலுக்கு முழுமையான பாதுகாப்பு அளிக்கிறது.\n" .
                              "• செரிமான சீரமைப்பு மற்றும் நெஞ்செரிச்சல் நிவாரணம்: பித்தத்தை தணித்து நெஞ்செரிச்சல், அசிடிட்டி, வாயுத்தொல்லை மற்றும் மலச்சிக்கலை தீர்த்து செரிமானத்தை சீராக்குகிறது.\n" .
                              "• முடி வளர்ச்சி மற்றும் சரும பொலிவு: தலைமுடியின் வேர்க்கால்களை பலப்படுத்தி இளநரை மற்றும் முடி உதிர்வை கட்டுப்படுத்துகிறது; சருமத்தை இளமையாகவும் பளபளப்பாகவும் வைக்கிறது.\n" .
                              "• அன்றாட புத்துணர்ச்சி மற்றும் முழு உடல் நலம்: நச்சுக்களை வெளியேற்றி கல்லீரலை பாதுகாத்து, உடலின் சுறுசுறுப்பையும் ஆரோக்கியத்தையும் நாள் முழுவதும் தக்கவைக்கிறது.",
                'ingredients' => "• தூய காட்டு நெல்லிக்காய் (Phyllanthus emblica): வைட்டமின் சி, பாலிபினால்கள் மற்றும் ஆன்டி-ஆக்ஸிடன்ட்கள் நிறைந்த இயற்கை நெல்லி.\n" .
                                 "• 100% தூய இயற்கை தேன்: சர்க்கரை அல்லது ரசாயன கலப்படமற்ற சுத்தமான இயற்கை காடுகளின் தேன்.\n" .
                                 "• செயற்கை நிறங்கள், சர்க்கரை அல்லது பதப்படுத்திகள் எதுவுமற்ற பாரம்பரிய முறை தயாரிப்பு.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் காலையில் வெறும் வயிற்றில் அல்லது உணவுக்கு முன் 1 முதல் 2 தேக்கரண்டி நெல்லிக்காய் தேனை ஒரு நெல்லிக்காய் துண்டுடன் மென்று சாப்பிடவும்.\n" .
                           "• குழந்தைகளுக்கு (3 வயதுக்கு மேல்): தினமும் 1/2 முதல் 1 தேக்கரண்டி வரை கொடுப்பது நோய் எதிர்ப்பு சக்தியையும் பசியையும் தூண்டும்.\n" .
                           "• சேமிப்பு முறை: உலர்ந்த ஸ்பூனை மட்டுமே பயன்படுத்தவும். ஈரப்பதம் மற்றும் நேரடி சூரிய ஒளி படாத இடத்தில் வைக்கவும். ஃப்ரிட்ஜில் வைக்க வேண்டாம்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'digestion', 'hair', 'skin'];
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
                $this->command?->info("Updated Aliya Nellikka Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'honey-preserves'],
                ['name' => 'Honey & Preserves', 'description' => 'Pure wild forest honey and herbal berry infusions.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-NLK-HNY250',
                'price' => 300.00,
                'sale_price' => 300.00,
                'stock_quantity' => 100,
                'unit_size' => '250 g',
                'badge' => 'Pure Amla Infused Wild Honey',
                'featured_image' => 'https://yuvann.com/storage/products/ea33b306-f660-4086-83f9-db543d3d07da.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 16,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Nellikka Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
