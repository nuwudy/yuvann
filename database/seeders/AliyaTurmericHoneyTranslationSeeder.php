<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaTurmericHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Turmeric Honey details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-turmeric-honey-natural-food-detox-immunity-support-250g';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-TRM-HNY250')
            ->orWhere('slug', 'like', '%turmeric-honey%')
            ->orWhere(function ($q) {
                $q->where('id', 59)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%turmeric%')
                          ->orWhere('slug', 'like', '%honey%');
                  });
            })
            ->get();

        $enTitle = 'Aliya Turmeric Honey (മഞ്ഞൾ തേൻ) – Natural Food Detox & Immunity Support (250g)';
        $enShortDesc = 'A traditional wellness blend of pure natural honey infused with potent medicinal turmeric, crafted to neutralize dietary toxins, support liver detoxification, and build daily immunity.';

        $enBenefits = "• Potent Hepatic Detoxification & Liver Health: Helps flush accumulated dietary toxins (Ama) from the liver and gallbladder, supporting healthy bile secretion and lipid metabolism.\n" .
                      "• Enhanced Curcumin Bioavailability: Natural enzymes and bio-catalytic properties of raw honey act as a yogavahi carrier, maximizing systemic absorption of active curcuminoids.\n" .
                      "• Systemic Anti-Inflammatory & Joint Comfort: Soothes internal chronic low-grade inflammation, easing stiff joints, muscle aches, and seasonal bodily discomfort.\n" .
                      "• Clear, Blemish-Free Dermal Radiance: Purifies blood to combat acne-causing bacteria from within, promoting an even skin tone and natural youthful glow.\n" .
                      "• Seasonal Immune Fortification: High antioxidant and antimicrobial profile creates an everyday barrier against respiratory pathogens, throat tickles, and allergies.";

        $enIngredients = "• High-Curcumin Medicinal Turmeric (Curcuma longa / Haridra): Pure, organic mountain-grown turmeric rich in bioactive curcuminoids.\n" .
                         "• 100% Pure Raw Honey: Unprocessed, enzyme-rich wild floral honey free from sugar syrup or thermal processing.\n" .
                         "• 100% Natural: No artificial flavors, synthetic preservatives, or added colors.";

        $enUsage = "• Recommended Dosage: Take 1 to 2 teaspoons daily in the morning with a glass of lukewarm water or milk.\n" .
                   "• Golden Wellness Drink: Stir 1 tablespoon into warm milk or herbal tea before bedtime for restorative cellular repair and immunity.\n" .
                   "• Storage: Keep in a cool, dry place away from moisture and direct sunlight. Use a clean, dry spoon. Do not refrigerate.";

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
                'name' => 'ആലിയ മഞ്ഞൾ തേൻ – സ്വാഭാവിക വിഷാംശ നിർമ്മാർജ്ജനവും രോഗപ്രതിരോധവും (250g)',
                'short_description' => 'ഔഷധഗുണമുള്ള കാട്ടുമഞ്ഞൾ ശുദ്ധമായ തേനിൽ ചേർത്തൊരുക്കിയ ആയുർവേദ രസായനം. ശരീരത്തിലെ മാലിന്യങ്ങളും വിഷാംശങ്ങളും നീക്കം ചെയ്യാനും, കരളിന്റെ ആരോഗ്യം സംരക്ഷിക്കാനും, പ്രതിരോധശേഷി വർദ്ധിപ്പിക്കാനും ഉത്തമം.',
                'benefits' => "• കരളിലെ വിഷാംശങ്ങൾ നീക്കം ചെയ്യുന്നു (ഡീറ്റോക്സ്): ആഹാരത്തിലൂടെയും മറ്റും ശരീരത്തിൽ അടിഞ്ഞുകൂടുന്ന മാലിന്യങ്ങളെയും ടോക്സിനുകളെയും നീക്കം ചെയ്ത് കരളിന്റെയും പിത്തസഞ്ചിയുടെയും പ്രവർത്തനം മെച്ചപ്പെടുത്തുന്നു.\n" .
                              "• കുർക്കുമിൻ ആഗിരണം വർദ്ധിപ്പിക്കുന്നു: തേനിന്റെ പ്രകൃതിദത്ത ഗുണങ്ങൾ മഞ്ഞളിലെ കുർക്കുമിനെ ശരീരം വേഗത്തിലും പൂർണ്ണമായും ആഗിരണം ചെയ്യാൻ സഹായിക്കുന്നു.\n" .
                              "• സന്ധിവേദനയും വീക്കവും ശമിപ്പിക്കുന്നു: ശരീരത്തിലെ ആന്തരിക നീർക്കെട്ടും സന്ധികളിലെ വേദനയും കാഠിന്യവും കുറയ്ക്കാൻ സഹായിക്കുന്ന പ്രകൃതിദത്ത ആന്റി-ഇൻഫ്ലമേറ്ററി കൂട്ട്.\n" .
                              "• രക്തശുദ്ധീകരണവും തിളങ്ങുന്ന ചർമ്മവും: രക്തം ശുദ്ധീകരിച്ച് മുഖക്കുരുവും കറുത്ത പാടുകളും അകറ്റി ചർമ്മത്തിന് സ്വാഭാവിക തിളക്കവും ആരോഗ്യവും നൽകുന്നു.\n" .
                              "• കാലാവസ്ഥാ രോഗങ്ങൾക്കെതിരെ പ്രതിരോധം: ശക്തമായ ആന്റിഓക്‌സിഡന്റുകൾ കാലാവസ്ഥാ വ്യതിയാനങ്ങളിൽ ഉണ്ടാകുന്ന അലർജി, തൊണ്ടവേദന, ജലദോഷം എന്നിവയ്ക്കെതിരെ ശക്തമായ സംരക്ഷണം നൽകുന്നു.",
                'ingredients' => "• ഔഷധ കാട്ടുമഞ്ഞൾ (Curcuma longa): ഉയർന്ന കുർക്കുമിൻ അടങ്ങിയ ശുദ്ധമായ ജൈവ മഞ്ഞൾ.\n" .
                                 "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത തേൻ: ചൂടാക്കാത്തതും മായം ചേർക്കാത്തതുമായ നാടൻ കാട്ടുതേൻ.\n" .
                                 "• യാതൊരുവിധ കൃത്രിമ പ്രിസർവേറ്റീവുകളോ നിറങ്ങളോ മധുരമോ ചേർക്കാത്ത ശുദ്ധമായ ഉത്പന്നം.",
                'usage' => "• കഴിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിൽ 1 മുതൽ 2 ടീസ്പൂൺ മഞ്ഞൾ തേൻ ഇളംചൂടുവെള്ളത്തിലോ പാലിലോ ചേർത്ത് കഴിക്കുക.\n" .
                           "• രാത്രിയിലെ ഉപയോഗം: കിടക്കുന്നതിന് മുൻപ് ഒരു ഗ്ലാസ് ഇളംചൂടുള്ള പാലിൽ ഒരു ടേബിൾസ്പൂൺ ചേർത്ത് കുടിക്കുന്നത് നല്ല ഉറക്കത്തിനും ശരീരവേദന കുറയ്ക്കാനും നല്ലതാണ്.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: ഈർപ്പമില്ലാത്ത ഉണങ്ങിയ സ്പൂൺ ഉപയോഗിക്കുക. സാധാരണ ഊഷ്മാവിൽ സൂക്ഷിക്കുക. ഫ്രിഡ്ജിൽ വെക്കേണ്ടതില്ല.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया हल्दी शहद (टर्मरिक हनी) – प्राकृतिक डिटॉक्स और रोग प्रतिरोधक क्षमता (250g)',
                'short_description' => 'शुद्ध प्राकृतिक शहद और औषधीय हल्दी का दिव्य आयुर्वेदिक मिश्रण। शरीर से विषैले तत्वों (टॉक्सिन्स) को बाहर निकालने, लिवर स्वास्थ्य सुधारने और दैनिक इम्यूनिटी बढ़ाने के लिए सर्वोत्तम।',
                'benefits' => "• लिवर डिटॉक्स और विषैले पदार्थों का निष्कासन: शरीर और पाचन तंत्र से संचित विषाक्त तत्वों को बाहर निकालकर लिवर के स्वास्थ्य व कार्यक्षमता को मजबूत करता है।\n" .
                              "• करक्यूमिन का बेहतरीन अवशोषण: शहद के प्राकृतिक एंजाइम्स हल्दी के करक्यूमिन को शरीर में तेजी से अवशोषित कराने में सहायक हैं।\n" .
                              "• सूजन व जोड़ों के दर्द में राहत: शरीर की आंतरिक सूजन को शांत कर जोड़ों के दर्द, अकड़न और मांसपेशियों की थकान को कम करता है।\n" .
                              "• रक्त शुद्धि और चेहरे का प्राकृतिक निखार: रक्त को शुद्ध कर कील-मुंहासों से मुक्ति दिलाता है और त्वचा को प्राकृतिक चमक और कसाव प्रदान करता है।\n" .
                              "• मौसमी संक्रमणों से सुरक्षा: मजबूत एंटीऑक्सीडेंट कवच जो बदलते मौसम में सर्दी, एलर्जी और गले के संक्रमण से रक्षा करता है।",
                'ingredients' => "• शुद्ध औषधीय हल्दी (Curcuma longa): उच्च करक्यूमिन युक्त प्राकृतिक पर्वतीय हल्दी।\n" .
                                 "• 100% शुद्ध कच्चा शहद: बिना किसी मिलावट व चाशनी के शुद्ध प्राकृतिक मधु।\n" .
                                 "• शून्य रसायन: किसी भी प्रकार के प्रिजर्वेटिव्स, कृत्रिम रंग या चीनी से पूरी तरह मुक्त।",
                'usage' => "• सेवन विधि: प्रतिदिन सुबह 1 से 2 चम्मच हल्दी शहद गुनगुने पानी या दूध के साथ लें।\n" .
                           "• रात्रि उपयोग: रात को सोने से पहले गुनगुने दूध में 1 चम्मच मिलाकर पीने से अच्छी नींद और रोग प्रतिरोधक क्षमता मिलती है।\n" .
                           "• भंडारण: सूखे चम्मच का प्रयोग करें। सामान्य तापमान पर रखें, फ्रिज में न रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா மஞ்சள் தேன் – இயற்கை நச்சு நீக்கம் மற்றும் நோய் எதிர்ப்பு சக்தி (250g)',
                'short_description' => 'தூய இயற்கை தேனில் சக்திவாய்ந்த மருத்துவ மஞ்சள் கலந்து தயாரிக்கப்பட்ட பாரம்பரிய ஆரோக்கியக் கலவை. உடலின் நச்சுக்களை வெளியேற்றவும், கல்லீரலை பாதுகாக்கவும், நோய் எதிர்ப்பு சக்தியை கூட்டவும் சிறந்தது.',
                'benefits' => "• கல்லீரல் நச்சு நீக்கம்: உடலில் தேங்கும் தேவையற்ற நச்சுக்களை வெளியேற்றி கல்லீரல் மற்றும் செரிமான உறுப்புகளின் ஆரோக்கியத்தை பலப்படுத்துகிறது.\n" .
                              "• குர்குமின் உறிஞ்சுதலை அதிகரிக்கிறது: தேனின் விசேஷ குணங்கள் மஞ்சளிலுள்ள குர்குமினை உடலின் செல்கள் எளிதில் கிரகிக்க உதவுகிறது.\n" .
                              "• மூட்டுவலி மற்றும் வீக்கம் நிவாரணம்: உடலின் உட்புற அழற்சியை (வீக்கம்) குறைத்து மூட்டுவலி, சோர்வு மற்றும் தசை பிடிப்புகளுக்கு நிவாரணம் அளிக்கிறது.\n" .
                              "• ரத்த சுத்தி மற்றும் சரும பொலிவு: ரத்தத்தை தூய்மைப்படுத்தி முகப்பருவை நீக்கி சருமத்திற்கு பொலிவையும் இளமையையும் அளிக்கிறது.\n" .
                              "• பருவ கால நோய் எதிர்ப்பு சக்தி: சக்திவாய்ந்த ஆன்டி-ஆக்ஸிடன்ட்கள் சளி, இருமல் மற்றும் தொண்டை கரகரப்பிலிருந்து இயற்கையான பாதுகாப்பு தருகிறது.",
                'ingredients' => "• மருத்துவ மஞ்சள் (Curcuma longa): அதிக குர்குமின் நிறைந்த தூய நாட்டு மஞ்சள்.\n" .
                                 "• 100% தூய இயற்கை தேன்: சர்க்கரை அல்லது ரசாயன கலப்பில்லாத இயற்கையான காட்டுத் தேன்.\n" .
                                 "• செயற்கை நிறங்கள் அல்லது பதப்படுத்திகள் எதுவுமற்ற 100% இயற்கை தயாரிப்பு.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் காலையில் 1 முதல் 2 தேக்கரண்டி மஞ்சள் தேனை மிதமான வெந்நீரிலோ அல்லது பாலிலோ கலந்து அருந்தவும்.\n" .
                           "• இரவு பயன்பாடு: தூங்குவதற்கு முன் வெதுவெதுப்பான பாலில் 1 தேக்கரண்டி கலந்து குடிப்பது ஆழ்ந்த உறக்கத்திற்கும் உடல் பலத்திற்கும் உகந்தது.\n" .
                           "• சேமிப்பு முறை: உலர்ந்த ஸ்பூனை மட்டுமே பயன்படுத்தவும். அறை வெப்பநிலையில் வைக்கவும், ஃப்ரிட்ஜில் வைக்க வேண்டாம்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'digestion', 'skin'];
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
                $this->command?->info("Updated Aliya Turmeric Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'honey-preserves'],
                ['name' => 'Honey & Preserves', 'description' => 'Pure wild forest honey and herbal berry infusions.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-TRM-HNY250',
                'price' => 300.00,
                'sale_price' => 300.00,
                'stock_quantity' => 100,
                'unit_size' => '250 g',
                'badge' => 'Turmeric Infused Wild Honey',
                'featured_image' => 'https://yuvann.com/storage/products/35883af2-7e00-41b1-88ad-208f4f622595.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 17,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Turmeric Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
