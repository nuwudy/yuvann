<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VeachocSugarFreeChocolateTranslationSeeder extends Seeder
{
    /**
     * Seed VeaChoc Sugar Free RakthaPushti Chocolate details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'veachoc-sugar-free-rakthapushti-chocolate';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'VEA-SFRP-30P')
            ->orWhere('slug', 'like', '%veachoc-sugar-free%')
            ->orWhere(function ($q) {
                $q->where('id', 18)
                  ->where('slug', 'like', '%sugar-free%');
            })
            ->get();

        $enTitle = 'VeaChoc Sugar Free RakthaPushti Chocolate – Zero Sweetener Blood & Brain Health Supplement (30 PCs)';
        $enShortDesc = 'Artisan zero-sweetener bittersweet dark functional chocolate enriched with bioavailable plant iron, natural Vitamin C, 16 superfood seeds, and brain-nourishing nuts. Formulated to boost hemoglobin, sharpen focus, and restore daily vitality without raising blood sugar.';

        $enBenefits = "• Builds Hemoglobin Without Sugar Spike: Clinically formulated with bioavailable dietary plant iron to stimulate red blood cell synthesis, completely free of added sugars or maltodextrin.\n" .
                      "• Diabetic-Friendly & Calorie Conscious: Zero refined sugar or artificial sweeteners; safe for diabetics, pre-diabetics, keto enthusiasts, and weight-conscious individuals.\n" .
                      "• Enhanced Iron Absorption with Vitamin C: Naturally infused with Vitamin C to triple intestinal iron bioavailability without stomach upset or digestive discomfort.\n" .
                      "• 16 Superfood Seeds & Nuts for Brain & Nerve Health: Dense in magnesium, zinc, omega fatty acids, and selenium to nourish neurotransmitters, improve memory, and combat brain fog.\n" .
                      "• Pure Bittersweet Cocoa Antioxidant Shield: Polyphenol-rich dark cocoa promotes cardiovascular microcirculation and cellular defense against oxidative stress.";

        $enIngredients = "• Pure Unsweetened Cocoa Mass & Butter (Theobroma cacao): Premium antioxidant-dense dark cocoa core with zero added sucrose.\n" .
                         "• Hematinic Dietary Plant Iron Complex: Natural, non-constipating plant iron specifically designed for red blood cell and hemoglobin formation.\n" .
                         "• Natural Fruit Vitamin C (Ascorbic Acid): Synergistic plant-derived Vitamin C that dramatically accelerates gut iron uptake.\n" .
                         "• 16 Nutrient-Dense Seeds & Nuts: Almonds, walnuts, pumpkin seeds, sunflower seeds, flaxseeds, chia seeds, sesame, and watermelon seeds rich in zinc, magnesium, and omega-3s.\n" .
                         "• Zero Sugar / Zero Artificial Sweetener Base: Pure, natural, authentic bittersweet dark chocolate without sugar substitutes.";

        $enUsage = "• Daily Dosage: Consume 1 piece daily, ideally mid-morning or as an afternoon vitality boost.\n" .
                   "• For Iron & Hemoglobin Restoration: Use consistently for 3 to 4 weeks alongside a wholesome balanced diet for visible improvement in stamina and blood counts.\n" .
                   "• Suitable For: Diabetics, health-conscious adults, fitness enthusiasts, and anyone needing iron support without sugar.";

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
                'name' => 'വിയാചോക്ക് ഷുഗർ ഫ്രീ രക്തപുഷ്ടി ചോക്ലേറ്റ് – പ്രമേഹസൗഹൃദ അയൺ & വിറ്റാമിൻ സി സൂപ്പർഫുഡ് (30 എണ്ണം)',
                'short_description' => 'മധുരമില്ലാത്ത ശുദ്ധ ഡാർക്ക് കൊക്കോയിൽ സസ്യ അയൺ, വിറ്റാമിൻ സി, 16 സൂപ്പർഫുഡ് വിത്തുകൾ, നട്സുകൾ എന്നിവ ചേർത്ത പ്രമേഹസൗഹൃദ ചോക്ലേറ്റ്. പഞ്ചസാരയുടെ അളവ് കൂട്ടാതെ ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാനും ഓർമ്മശക്തിയും ഊർജ്ജവും നിലനിർത്താനും ഉത്തമം.',
                'benefits' => "• പഞ്ചസാര കൂട്ടാതെ ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കുന്നു: രക്തത്തിലെ ചുവന്ന രക്താണുക്കളുടെ ഉത്പാദനം വേഗത്തിലാക്കി വിളർച്ചയും വിട്ടുമാറാത്ത ക്ഷീണവും അകറ്റുന്ന സ്വാഭാവിക സസ്യജന്യ അയൺ അടങ്ങിയിരിക്കുന്നു.\n" .
                              "• 100% ഷുഗർ ഫ്രീ & പ്രമേഹസൗഹൃദം: പഞ്ചസാരയോ കൃത്രിമ മധുരങ്ങളോ ചേർക്കാത്തതിനാൽ പ്രമേഹരോഗികൾക്കും ശരീരഭാരം നിയന്ത്രിക്കുന്നവർക്കും തികച്ചും സുരക്ഷിതം.\n" .
                              "• വിറ്റാമിൻ സി ചേർന്ന ഉയർന്ന ആഗിരണം: പ്രകൃതിദത്ത വിറ്റാമിൻ സി അടങ്ങിയിട്ടുള്ളതിനാൽ അയൺ ശരീരത്തിൽ അതിവേഗം ആഗിരണം ചെയ്യപ്പെടുന്നു; മലബന്ധമോ ദഹനക്കേടോ ഉണ്ടാകുന്നില്ല.\n" .
                              "• 16 സൂപ്പർഫുഡ് വിത്തുകളും നട്സുകളും: ബദാം, വാൽനട്ട്, മത്തൻ വിത്ത്, ഫ്ലാക്സ് സീഡ്, ചിയാ സീഡ് എന്നിവ തലച്ചോറിന്റെ പ്രവർത്തനങ്ങളെയും ഓർമ്മശക്തിയെയും ഏകാഗ്രതയെയും ത്വരിതപ്പെടുത്തുന്നു.\n" .
                              "• ശുദ്ധ ഡാർക്ക് കൊക്കോ ആന്റിഓക്‌സിഡന്റ് കവചം: രക്തയോട്ടം മെച്ചപ്പെടുത്താനും ഹൃദയാരോഗ്യം സംരക്ഷിക്കാനും സഹായിക്കുന്ന പ്രകൃതിദത്ത ഫ്ലേവനോയിഡുകൾ.",
                'ingredients' => "• ശുദ്ധ കൊക്കോ മാസ് & കൊക്കോ ബട്ടർ: പഞ്ചസാരയില്ലാത്ത, ആന്റിഓക്‌സിഡന്റുകളാൽ സമ്പന്നമായ പ്രീമിയം ഡാർക്ക് കൊക്കോ.\n" .
                                 "• ഹെമാറ്റിനിക് സസ്യ അയൺ: ഹീമോഗ്ലോബിൻ നിർമ്മാണത്തെ നേരിട്ട് സഹായിക്കുന്ന ശുദ്ധ സസ്യ അയൺ കോംപ്ലക്സ്.\n" .
                                 "• പ്രകൃതിദത്ത പഴ വിറ്റാമിൻ സി: കുടലിൽ ഇരുമ്പിന്റെ ആഗിരണം മൂന്നിരട്ടിയാക്കുന്ന സ്വാഭാവിക വിറ്റാമിൻ സി ഘടകങ്ങൾ.\n" .
                                 "• 16 പോഷക വിത്തുകളും ഡ്രൈ ഫ്രൂട്ട്സുകളും: ബദാം, വാൽനട്ട്, മത്തൻ വിത്ത്, സൂര്യകാന്തി വിത്ത്, ചണവിത്ത് (ഫ്ലാക്സ് സീഡ്), ചിയാ സീഡ്, എള്ള് എന്നിവ.\n" .
                                 "• പ്രകൃതിദത്ത ബിറ്റർസ്വീറ്റ് ഫോർമുല: കൃത്രിമ രാസവസ്തുക്കളോ അഡിറ്റീവുകളോ ഇല്ലാതെ തയ്യാറാക്കിയത്.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: ദിവസവും 1 ചോക്ലേറ്റ് കഷ്ണം ഉച്ചതിരിഞ്ഞോ ലഘുഭക്ഷണമായോ കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: രക്തക്കുറവും ക്ഷീണവുമുള്ളവർ കുറഞ്ഞത് 3-4 ആഴ്ച തുടർച്ചയായി ഉപയോഗിക്കുക.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: പ്രമേഹമുള്ളവർ, കെറ്റോ/ഡയറ്റ് പിന്തുടരുന്നവർ, രക്തക്കുറവുള്ള മുതിർന്നവർ എന്നിവർക്ക് ഏറ്റവും ഉത്തമം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वियाचॉक शुगर फ्री रक्तपुष्टि चॉकलेट – डायबिटिक-फ्रेंडली आयरन और विटामिन सी सुपरफूड (30 पीस)',
                'short_description' => 'बिना शक्कर की शुद्ध डार्क कोको, प्राकृतिक पादप आयरन, विटामिन सी, 16 सुपरफूड बीजों और मेवों से भरपूर विशेष चॉकलेट। ब्लड शुगर बढ़ाए बिना हीमोग्लोबिन स्तर बढ़ाने, याददाश्त तेज करने और थकान मिटाने में अत्यंत असरदार।',
                'benefits' => "• शुगर बढ़ाए बिना हीमोग्लोबिन बढ़ाए: प्राकृतिक पादप आयरन लाल रक्त कोशिकाओं का निर्माण कर एनीमिया और शारीरिक कमजोरी को दूर करता है।\n" .
                              "• 100% शुगर फ्री और डायबिटिक-फ्रेंडली: रिफाइंड चीनी या हानिकारक मिठास से पूरी तरह मुक्त; मधुमेह रोगियों और वजन नियंत्रित करने वालों के लिए पूर्णतः सुरक्षित।\n" .
                              "• विटामिन सी युक्त श्रेष्ठ अवशोषण: प्राकृतिक विटामिन सी पेट में आयरन को तेजी से सोखता है, जिससे कब्ज या पेट दर्द नहीं होता।\n" .
                              "• 16 सुपरफूड बीजों और मेवों की शक्ति: बादाम, अखरोट, कद्दू, अलसी और चिया के बीज दिमाग की नसों को पोषण देकर फोकस और याददाश्त को मजबूत करते हैं।\n" .
                              "• शुद्ध कोको एंटीऑक्सीडेंट सुरक्षा: हृदय स्वास्थ्य और रक्त संचार को दुरुस्त रखने वाला प्राकृतिक पॉलीफेनॉल सुरक्षा चक्र।",
                'ingredients' => "• शुद्ध अनस्वीटनड कोको (Cocoa Mass & Butter): बिना किसी शक्कर के शक्तिशाली एंटीऑक्सीडेंट डार्क कोको।\n" .
                                 "• प्राकृतिक पादप आयरन (Plant Iron): हीमोग्लोबिन संश्लेषण को सीधे बढ़ावा देने वाला सुपाच्य आयरन।\n" .
                                 "• प्राकृतिक विटामिन सी (Fruit Vitamin C): आंतों में आयरन के अवशोषण को 3 गुना तेज करने वाला फल-अर्क।\n" .
                                 "• 16 सुपरफूड बीज और मेवे: बादाम, अखरोट, कद्दू के बीज, सूरजमुखी के बीज, अलसी, चिया बीज और तिल।\n" .
                                 "• प्राकृतिक जीरो-शुगर बेस: बिना किसी रासायनिक प्रिजर्वेटिव या मिलावट के।",
                'usage' => "• सेवन विधि: प्रतिदिन 1 पीस चॉकलेट का आनंद लें, दोपहर के समय या शाम के नाश्ते के रूप में।\n" .
                           "• खून की कमी दूर करने के लिए: बेहतर परिणामों के लिए 3 से 4 सप्ताह तक नियमित सेवन करें।\n" .
                           "• किसके लिए उपयुक्त: मधुमेह रोगी, प्री-डायबिटिक, कीटो डाइट फॉलो करने वाले और स्वास्थ्य-जागरूक वयस्क।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வியாச்சாக் சுகர் ஃப்ரீ ரத்தபுஷ்டி சாக்லேட் – சர்க்கரை இல்லாத இரும்புச்சத்து & வைட்டமின் சி சூப்பர்ஃபுட் (30 துண்டுகள்)',
                'short_description' => 'சர்க்கரை சேர்க்கப்படாத தூய டார்க் கொக்கோ, இயற்கை இரும்புச்சத்து, வைட்டமின் சி, 16 சத்து விதைகள் மற்றும் நட்ஸ் அடங்கிய சத்துணவு சாக்லேட். ரத்த சர்க்கரை அளவை உயர்த்தாமல் ஹீமோகுளோபினை அதிகரித்து புத்துணர்ச்சி அளிக்கிறது.',
                'benefits' => "• சர்க்கரையின்றி ரத்தத்தை விருத்தி செய்கிறது: இயற்கை இரும்புச்சத்து ரத்த சிவப்பணுக்களை விரைவாக உற்பத்தி செய்து சோர்வு, அசதி மற்றும் பலவீனத்தை நீக்குகிறது.\n" .
                              "• 100% சர்க்கரை அற்ற நீரிழிவு நோயாளிகளுக்கானது: சுத்திகரிக்கப்பட்ட சர்க்கரையோ அல்லது செயற்கை இனிப்புகளோ இல்லாததால் சர்க்கரை நோயாளிகளுக்கு முற்றிலும் பாதுகாப்பானது.\n" .
                              "• வைட்டமின் சி உடனான முழுமையான உறிஞ்சுதல்: இயற்கை வைட்டமின் சி இரும்புச்சத்தை குடலில் விரைவாக உறிஞ்சச் செய்கிறது; மலச்சிக்கல் அல்லது வயிற்று வலி உண்டாகாது.\n" .
                              "• 16 சத்து விதைகள் மற்றும் உலர் கொட்டைகள்: பாதாம், வால்நட், பூசணி, ஆளிவிதை, சியா விதைகள் மூளை நரம்புகளை பலப்படுத்தி நினைவாற்றலை பெருக்குகிறது.\n" .
                              "• கொக்கோ ஆன்டி-ஆக்ஸிடன்ட் பாதுகாப்பு: ரத்த நாளங்களை சீராக்கி இதயத்தை பாதுகாக்கும் இயற்கையான டார்க் கொக்கோ பாலிபினால்கள்.",
                'ingredients' => "• தூய டார்க் கொக்கோ (Pure Cocoa Mass & Butter): சர்க்கரை சேர்க்கப்படாத சக்திவாய்ந்த ஆன்டி-ஆக்ஸிடன்ட் கொக்கோ.\n" .
                                 "• தாவர வழி இரும்புச்சத்து (Plant Iron): ஹீமோகுளோபின் உற்பத்திக்கு உதவும் இயற்கை இரும்புச்சத்து.\n" .
                                 "• இயற்கை பழ வைட்டமின் சி: இரும்புச்சத்தை உடல் எளிதில் உறிஞ்ச உதவும் அத்தியாவசிய வைட்டமின்.\n" .
                                 "• 16 ஊட்டச்சத்து விதைகள் & நட்ஸ்: பாதாம், வால்நட், பூசணி, சூரியகாந்தி, ஆளிவிதை, சியா விதை மற்றும் எள்.\n" .
                                 "• சர்க்கரையற்ற இயற்கை வடிவம்: செயற்கை நிறமிகள் அல்லது பாதுகாப்பிகள் அற்ற தூய வடிவம்.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் 1 சாக்லேட் துண்டை சிற்றுண்டியாகவோ அல்லது உணவுக்குப் பின்போ சாப்பிடலாம்.\n" .
                           "• சிறந்த ரத்த விருத்திக்கு: தொடர்ந்து 3 முதல் 4 வாரங்கள் உட்கொள்ளும்போது உடல் சுறுசுறுப்பும் ரத்த அளவும் கூடும்.\n" .
                           "• யாருக்கெல்லாம் ஏற்றது: சர்க்கரை நோயாளிகள், எடை குறைக்க விரும்புவோர், ரத்த சோகை உள்ள பெரியவர்கள் அனைவருக்கும் மிகச் சிறந்தது.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'head'];
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
                $this->command?->info("Updated VeaChoc Sugar Free RakthaPushti (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VEA-SFRP-30P',
                'price' => 775.00,
                'sale_price' => 775.00,
                'stock_quantity' => 50,
                'unit_size' => '30 PCs',
                'badge' => 'Sugar Free & Diabetic Friendly',
                'featured_image' => 'https://yuvann.com/storage/products/37d1d0f4-1df5-4956-8902-a00b75be0415.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 8,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new VeaChoc Sugar Free RakthaPushti (#{$product->id}) with full multilingual content.");
        }
    }
}
