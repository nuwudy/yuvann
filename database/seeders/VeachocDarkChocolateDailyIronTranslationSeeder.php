<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VeachocDarkChocolateDailyIronTranslationSeeder extends Seeder
{
    /**
     * Seed VeaChoc Dark Chocolate Daily Iron details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'veachoc-dark-chocolate-daily-iron-premium-cocoa-chocolates-with-iron-vitamin-c-superfood-seeds';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'VCH-DRK-DLY-CHOC-10')
            ->orWhere('slug', 'like', '%veachoc-dark-chocolate-daily-iron%')
            ->orWhere(function ($q) {
                $q->where('id', 74)
                  ->where('slug', 'like', '%daily-iron%');
            })
            ->get();

        $enTitle = 'VeaChoc Dark Chocolate Daily Iron – Premium Cocoa Chocolates with Iron, Vitamin C & Superfood Seeds (10 PCs)';
        $enShortDesc = 'Rich, cocoa-dense dark functional chocolate infused with bioavailable plant iron, nutrient-rich seeds, whole grains, nuts, and Vitamin C to support hemoglobin levels, ease menstrual cramps, and build daily vitality.';

        $enBenefits = "• Daily Iron Replenishment & Fatigue Relief: Packed with bioavailable plant iron that supports healthy hemoglobin levels and red blood cell production, restoring peak daytime stamina.\n" .
                      "• Rapid Absorption with Natural Vitamin C: Enriched with citrus and fruit Vitamin C to accelerate intestinal iron uptake, preventing digestive intolerance, stomach cramps, or constipation.\n" .
                      "• Menstrual Support & Muscle Comfort: Magnesium-rich dark cocoa combined with wholesome seeds helps ease abdominal cramps, muscle fatigue, and monthly hormonal dips.\n" .
                      "• Brain Alertness & Mental Stamina: Loaded with polyphenols, almonds, and superfood seeds that nourish cognitive pathways, improve concentration, and clear midday brain fog.\n" .
                      "• Guilt-Free Functional Indulgence: Premium dark cocoa delivers rich antioxidant defense without artificial preservatives, offering a delightful way to satisfy sweet cravings while boosting nutrition.";

        $enIngredients = "• Premium Dark Cocoa Mass & Cocoa Butter (Theobroma cacao): Flavonoid-rich pure cocoa that supports circulation, vascular health, and mood elevation.\n" .
                         "• Natural Plant-Based Dietary Iron Complex: Bioactive, non-heme plant iron specifically formulated for erythrocyte nourishment.\n" .
                         "• Natural Fruit Vitamin C (Ascorbic Acid): Synergistic plant vitamin C that enhances iron bioavailability by up to 300%.\n" .
                         "• Roasted Nuts (Almonds & Cashews): Concentrated sources of vitamin E, potassium, and plant protein for sustained cellular energy.\n" .
                         "• Superfood Seeds (Pumpkin, Sunflower & Sesame Seeds): Powerhouse seeds packed with zinc, magnesium, and essential omega fatty acids.\n" .
                         "• Traditional Natural Sweetener: Masterfully tempered for an authentic, bittersweet, melt-in-the-mouth dark chocolate experience.";

        $enUsage = "• Daily Serving: Enjoy 1 to 2 pieces daily, ideally mid-morning or as an afternoon energy pick-me-up.\n" .
                   "• Sustained Vitality: Consume regularly for 3 to 4 weeks to observe marked improvements in stamina, iron markers, and daily productivity.\n" .
                   "• Recommended For: Working professionals, menstruating women, active adolescents, fitness enthusiasts, and anyone needing a convenient daily iron boost.";

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
                'name' => 'വിയാചോക്ക് ഡാർക്ക് ചോക്ലേറ്റ് ഡെയ്‌ലി അയൺ – അയൺ, വിറ്റാമിൻ സി & സൂപ്പർഫുഡ് സീഡ്സ് (10 എണ്ണം)',
                'short_description' => 'ശുദ്ധമായ ഡാർക്ക് കൊക്കോയിൽ സ്വാഭാവിക സസ്യ അയൺ, വിറ്റാമിൻ സി, പോഷക വിത്തുകൾ, നട്സുകൾ എന്നിവ സമന്വയിപ്പിച്ച ഉത്തമ ആരോഗ്യ ചോക്ലേറ്റ്. ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാനും മാസമുറക്കാലത്തെ തളർച്ചയും ക്ഷീണവും അകറ്റാനും സഹായകം.',
                'benefits' => "• ദിവസേനയുള്ള അയൺ കുറവ് പരിഹരിക്കുന്നു: രക്തത്തിലെ ഹീമോഗ്ലോബിൻ അളവ് ആരോഗ്യകരമായി നിലനിർത്താനും ചുവന്ന രക്താണുക്കളുടെ ഉത്പാദനം വർദ്ധിപ്പിക്കാനും സഹായിക്കുന്ന സ്വാഭാവിക സസ്യജന്യ അയൺ അടങ്ങിയിരിക്കുന്നു.\n" .
                              "• വിറ്റാമിൻ സി ചേർന്ന വേഗത്തിലുള്ള ആഗിരണം: പ്രകൃതിദത്ത വിറ്റാമിൻ സി അടങ്ങിയിട്ടുള്ളതിനാൽ അയൺ ശരീരത്തിൽ അതിവേഗം ആഗിരണം ചെയ്യപ്പെടുന്നു; വയറുവേദനയോ മലബന്ധമോ ഉണ്ടാക്കുന്നില്ല.\n" .
                              "• മാസമുറക്കാലത്തെ ബുദ്ധിമുട്ടുകൾക്ക് ആശ്വാസം: ഡാർക്ക് കൊക്കോയിലെയും വിത്തുകളിലെയും മഗ്നീഷ്യം പേശിവലിവ്, നടുവേദന, മാസമുറക്കാലത്തെ ക്ഷീണം എന്നിവ ലഘൂകരിക്കുന്നു.\n" .
                              "• ബുദ്ധിശക്തിയും ഏകാഗ്രതയും വർദ്ധിപ്പിക്കുന്നു: കൊക്കോയും നട്സുകളും മസ്തിഷ്കത്തിലേക്കുള്ള രക്തയോട്ടം മെച്ചപ്പെടുത്തി ഉന്മേഷവും ഓർമ്മശക്തിയും വർദ്ധിപ്പിക്കുന്നു.\n" .
                              "• ആരോഗ്യകരമായ പ്രകൃതിദത്ത മധുരം: രാസവസ്തുക്കളോ കൃത്രിമ നിറങ്ങളോ ഇല്ലാതെ തയ്യാറാക്കിയതിനാൽ ദിവസവും ധൈര്യമായി കഴിക്കാൻ കഴിയുന്ന പോഷക സമൃദ്ധമായ ചോക്ലേറ്റ്.",
                'ingredients' => "• പ്രീമിയം ഡാർക്ക് കൊക്കോ & കൊക്കോ ബട്ടർ: ഹൃദയാരോഗ്യത്തിനും ഉന്മേഷത്തിനും സഹായിക്കുന്ന ശുദ്ധ കൊക്കോ.\n" .
                                 "• ഹെമാറ്റിനിക് സസ്യ അയൺ: ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാൻ സഹായിക്കുന്ന സ്വാഭാവിക സസ്യ അയൺ.\n" .
                                 "• സ്വാഭാവിക പഴ വിറ്റാമിൻ സി: കുടലിൽ ഇരുമ്പിന്റെ ആഗിരണം മൂന്നിരട്ടിയാക്കുന്ന പ്രകൃതിദത്ത വിറ്റാമിൻ സി.\n" .
                                 "• മേന്മയേറിയ നട്സുകൾ (ബദാം & അണ്ടിപ്പരിപ്പ്): വിറ്റാമിൻ ഇ, പ്രോട്ടീൻ എന്നിവ നൽകുന്ന ഉണക്കഫലങ്ങൾ.\n" .
                                 "• സൂപ്പർഫുഡ് സീഡുകൾ (മത്തൻ വിത്ത്, സൂര്യകാന്തി വിത്ത്, എള്ള്): സിങ്ക്, മഗ്നീഷ്യം, നല്ല കൊഴുപ്പുകൾ എന്നിവയാൽ സമൃദ്ധം.\n" .
                                 "• പ്രകൃതിദത്ത മധുരം: ബിറ്റർസ്വീറ്റ് ഡാർക്ക് ചോക്ലേറ്റ് രുചിയും ആരോഗ്യഗുണങ്ങളും സമന്വയിപ്പിച്ചത്.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: ദിവസവും 1 അല്ലെങ്കിൽ 2 ചോക്ലേറ്റ് കഷ്ണങ്ങൾ ലഘുഭക്ഷണമായോ ഉച്ചതിരിഞ്ഞോ കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: രക്തക്കുറവും ക്ഷീണവുമുള്ളവർ 3 മുതൽ 4 ആഴ്ച വരെ തുടർച്ചയായി ഉപയോഗിക്കുക.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: ജോലിചെയ്യുന്ന സ്ത്രീകൾ, മാസമുറ ബുദ്ധിമുട്ടുള്ളവർ, വിദ്യാർത്ഥികൾ, ക്ഷീണം അനുഭവപ്പെടുന്ന മുതിർന്നവർ എന്നിവർക്കെല്ലാം ഉത്തമം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वियाचॉक डार्क चॉकलेट डेली आयरन – प्रीमियम कोको, आयरन, विटामिन सी और सुपरफूड बीज (10 पीस)',
                'short_description' => 'प्रीमियम डार्क कोको, प्राकृतिक पादप आयरन, विटामिन सी, पौष्टिक बीजों और मेवों से भरपूर विशेष functional चॉकलेट। हीमोग्लोबिन स्तर बनाए रखने, मासिक धर्म के दर्द में राहत देने और दैनिक ऊर्जा बढ़ाने में अत्यंत असरदार।',
                'benefits' => "• दैनिक आयरन की पूर्ति और थकान से मुक्ति: प्राकृतिक पादप आयरन से भरपूर जो शरीर में लाल रक्त कोशिकाओं का निर्माण कर दिनभर की सुस्ती और कमजोरी को दूर करता है।\n" .
                              "• विटामिन सी युक्त 3 गुना तेज अवशोषण: प्राकृतिक विटामिन सी पेट में आयरन को तेजी से सोखता है, जिससे कब्ज या गैस की समस्या नहीं होती।\n" .
                              "• पीरियड्स के दर्द और ऐंठन में राहत: डार्क कोको और बीजों में मौजूद मैग्नीशियम मांसपेशियों के खिंचाव और मासिक धर्म की ऐंठन को शांत करता है।\n" .
                              "• मस्तिष्क स्वास्थ्य और एकाग्रता: कोको और बादाम दिमाग की नसों को पोषण देकर फोकस, याददाश्त और मानसिक सतर्कता को बढ़ाते हैं।\n" .
                              "• गिल्ट-फ्री प्राकृतिक स्वाद: बिना किसी हानिकारक प्रिजर्वेटिव के, मीठे की तलब को मिटाने के साथ-साथ आवश्यक पोषण प्रदान करता है।",
                'ingredients' => "• प्रीमियम डार्क कोको मास और बटर: एंटीऑक्सीडेंट और पॉलीफेनॉल्स से भरपूर शुद्ध कोको।\n" .
                                 "• प्राकृतिक पादप आयरन (Plant Iron): हीमोग्लोबिन संश्लेषण को सीधे बढ़ावा देने वाला सुपाच्य आयरन।\n" .
                                 "• प्राकृतिक विटामिन सी (Fruit Vitamin C): आंतों में आयरन के अवशोषण को कई गुना बढ़ाने वाला फल-अर्क।\n" .
                                 "• पौष्टिक मेवे (बादाम और काजू): विटामिन ई, स्वस्थ वसा और प्राकृतिक ऊर्जा का स्रोत।\n" .
                                 "• सुपरफूड बीज (कद्दू, सूरजमुखी और तिल के बीज): जिंक, मैग्नीशियम और आवश्यक खनिजों से भरपूर।\n" .
                                 "• पारंपरिक प्राकृतिक मिठास: बेहतरीन डार्क चॉकलेट का असली और समृद्ध स्वाद।",
                'usage' => "• सेवन विधि: प्रतिदिन 1 से 2 पीस चॉकलेट का आनंद लें, दोपहर के समय या स्नैक के रूप में।\n" .
                           "• ऊर्जा और हीमोग्लोबिन के लिए: बेहतर परिणामों के लिए 3 से 4 सप्ताह तक नियमित सेवन करें।\n" .
                           "• किसके लिए उपयुक्त: कामकाजी महिलाएं, किशोरियां, खेलकूद में सक्रिय युवा और दैनिक आयरन की कमी से जूझ रहे वयस्क।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வியாச்சாக் டார்க் சாக்லேட் டெய்லி அயர்ன் – இரும்புச்சத்து, வைட்டமின் சி & சூப்பர்ஃபுட் விதைகள் (10 துண்டுகள்)',
                'short_description' => 'உயர்தர டார்க் கொக்கோ, தாவர வழி இரும்புச்சத்து, வைட்டமின் சி, ஊட்டச்சத்து விதைகள் மற்றும் நட்ஸ்கள் நிறைந்த ஆரோக்கிய சாக்லேட். ஹீமோகுளோபினை சீராக பராமரிக்கவும், மாதவிடாய் சோர்வை போக்கவும், புத்துணர்ச்சி பெறவும் சிறந்தது.',
                'benefits' => "• தினசரி இரும்புச்சத்து தேவையை பூர்த்தி செய்கிறது: தாவர வழி இரும்புச்சத்து ரத்த சிவப்பணுக்களின் உற்பத்தியை அதிகரித்து அசதி, பலவீனம் மற்றும் சோம்பலை நீக்குகிறது.\n" .
                              "• வைட்டமின் சி உடன் எளிதில் உடலால் உறிஞ்சப்படுகிறது: இயற்கை வைட்டமின் சி இரும்புச்சத்தை குடலில் விரைவாக உறிஞ்சச் செய்கிறது; அஜீரணம் அல்லது மலச்சிக்கல் ஏற்படாது.\n" .
                              "• மாதவிடாய் கால தசைப்பிடிப்புக்கு நிவாரணம்: டார்க் கொக்கோ மற்றும் விதைகளில் உள்ள மெக்னீசியம் வயிற்று வலி, இடுப்பு வலி மற்றும் தசைப்பிடிப்பை குறைக்க உதவுகிறது.\n" .
                              "• மூளை சுறுசுறுப்பு மற்றும் நினைவாற்றல்: பாதாம் மற்றும் விதைகளில் உள்ள தாதுக்கள் மூளைக்கு செல்லும் ரத்த ஓட்டத்தை சீராக்கி கவனத்தை கூர்மையாக்குகிறது.\n" .
                              "• குற்ற உணர்ச்சியற்ற சுவையான ஊட்டச்சத்து: செயற்கை இரசாயனங்கள் அற்ற ஆரோக்கியமான டார்க் சாக்லேட் வடிவில் முழுமையான உடல் புத்துணர்ச்சி.",
                'ingredients' => "• தூய டார்க் கொக்கோ & வெண்ணெய்: இதயத்தை பாதுகாக்கும் ஆன்டி-ஆக்ஸிடன்ட்கள் நிறைந்த இயற்கை கொக்கோ.\n" .
                                 "• தாவர வழி இரும்புச்சத்து: ஹீமோகுளோபின் உற்பத்திக்கு உதவும் இயற்கை உறிஞ்சக்கூடிய இரும்புச்சத்து.\n" .
                                 "• இயற்கை பழ வைட்டமின் சி: இரும்புச்சத்தை உடல் எளிதில் கிரகித்துக் கொள்ள உதவும் அத்தியாவசிய வைட்டமின்.\n" .
                                 "• தேர்வு செய்யப்பட்ட நட்ஸ் (பாதாம் & முந்திரி): வைட்டமின் ஈ, புரதம் மற்றும் தாதுக்கள் நிறைந்த உலர் பழங்கள்.\n" .
                                 "• சத்து விதைகள் (பூசணி, சூரியகாந்தி & எள் விதைகள்): ஜிங்க் மற்றும் மெக்னீசியம் நிறைந்த ஊட்டச்சத்து விதைகள்.\n" .
                                 "• இயற்கை இனிப்பு: சுவையான பிட்டர்ஸ்வீட் டார்க் சாக்லேட் அனுபவத்தை வழங்குகிறது.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் 1 அல்லது 2 சாக்லேட் துண்டுகளை சிற்றுண்டியாகவோ அல்லது உணவுக்குப் பின்போ சுவைத்து சாப்பிடலாம்.\n" .
                           "• சிறந்த பலன்களுக்கு: தொடர்ந்து 3 முதல் 4 வாரங்கள் உட்கொள்ளும்போது உடல் பலமும் ரத்த அளவும் மேம்படும்.\n" .
                           "• யாருக்கெல்லாம் ஏற்றது: பணிபுரியும் பெண்கள், மாதவிடாய் அசதி உள்ளவர்கள், மாணவர்கள் மற்றும் தினசரி இரும்புச்சத்து தேவைப்படும் பெரியவர்கள்.",
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
                $this->command?->info("Updated VeaChoc Dark Chocolate Daily Iron (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VCH-DRK-DLY-CHOC-10',
                'price' => 299.00,
                'sale_price' => 295.00,
                'stock_quantity' => 50,
                'unit_size' => '10 PCs',
                'badge' => 'Daily Iron & Magnesium',
                'featured_image' => 'https://yuvann.com/storage/products/845d8028-5f45-4cd5-9b50-533078b09d3d.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 9,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new VeaChoc Dark Chocolate Daily Iron (#{$product->id}) with full multilingual content.");
        }
    }
}
