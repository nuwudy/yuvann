<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VeachocPowerplusSuperfoodTranslationSeeder extends Seeder
{
    /**
     * Seed VeaChoc PowerPlus Functional Superfood for Men details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'veachoc-powerplus-functional-superfood-for-men-shilajit-ginseng-super-seeds';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'VC-PWP-MEN')
            ->orWhere('slug', 'like', '%veachoc-powerplus%')
            ->orWhere(function ($q) {
                $q->where('id', 37)
                  ->where('slug', 'like', '%powerplus%');
            })
            ->get();

        $enTitle = 'VeaChoc PowerPlus Functional Superfood for Men (Shilajit, Ginseng & Super Seeds) – 300g';
        $enShortDesc = 'Concentrated functional chocolate superfood for men infused with pure Himalayan Shilajit, Ginseng, plant iron, 16 super seeds, and dry fruits to enhance stamina, vigor, muscle recovery, hemoglobin, and stress resilience.';

        $enBenefits = "• Peak Physical Stamina & Vigor: Enriched with pure Himalayan Shilajit and Panax Ginseng to accelerate mitochondrial ATP production, boost endurance, and combat chronic male fatigue.\n" .
                      "• Natural Vitality & Hormonal Balance: Rich in natural zinc, magnesium, and bioavailable fulvic acid that support healthy testosterone levels, vitality, and metabolic strength.\n" .
                      "• Oxygen Delivery & Hemoglobin Building: Fortified with plant-based iron and Vitamin C to stimulate red blood cell formation and optimize oxygen supply to working muscles during physical exertion.\n" .
                      "• Cognitive Focus & Stress Resilience: Potent adaptogens soothe cortisol levels, eliminate mental brain fog, and promote sharp focus throughout demanding workdays.\n" .
                      "• Nutrient-Dense Superfood Chocolate: Combines the antioxidant richness of dark cocoa with pumpkin seeds, watermelon seeds, almonds, and walnuts for rapid post-workout muscle recovery.";

        $enIngredients = "• Purified Himalayan Shilajit (Asphaltum punjabianum): Rich in >60% fulvic acid and 84+ bio-minerals to boost cellular stamina and nutrient absorption.\n" .
                         "• Adaptogenic Ginseng Extract (Panax Ginseng & Ashwagandha): Powerful tonic that strengthens adrenals, reduces fatigue, and enhances physical performance.\n" .
                         "• Bioavailable Plant Iron Complex: Natural dietary iron supporting erythrocyte synthesis and muscular oxygenation.\n" .
                         "• Superfood Seeds Mix (Pumpkin, Watermelon, Chia & Flax Seeds): Packed with elemental zinc, L-arginine, and essential omega-3 fatty acids.\n" .
                         "• Handpicked Nuts (California Almonds & Walnuts): Dense in healthy fats, vitamin E, and magnesium for cardiovascular and neurological vitality.\n" .
                         "• Fine Dark Cocoa & Traditional Natural Sweetener: Masterfully tempered into a rich, decadent, functional dark chocolate paste.";

        $enUsage = "• Daily Dosage: Take 1 to 2 spoonfuls (approx. 10–15g) daily, preferably in the morning after breakfast or 30 minutes before physical workouts.\n" .
                   "• Recommended Course: Consume consistently for 6 to 8 weeks alongside an active lifestyle for optimal vigor, stamina, and endurance.\n" .
                   "• Suitable For: Adult men experiencing daily fatigue, athletes, fitness enthusiasts, and professionals dealing with stress and low vitality.";

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
                'name' => 'വിയാചോക്ക് പവർപ്ലസ് ഫങ്ഷണൽ സൂപ്പർഫുഡ് ഫോർ മെൻ (ശിലാജിത്ത്, ജിൻസെങ് & സൂപ്പർ സീഡ്സ്) – 300g',
                'short_description' => 'ശുദ്ധമായ ഹിമാലയൻ ശിലാജിത്ത്, ജിൻസെങ്, സസ്യ അയൺ, പോഷക വിത്തുകൾ, നട്സുകൾ എന്നിവ ചേർത്ത പുരുഷന്മാർക്കായുള്ള അതീവ പോഷക സമ്പുഷ്ടമായ ചോക്ലേറ്റ് സൂപ്പർഫുഡ്. കായികക്ഷമത, ഉന്മേഷം, പേശീബലം, ഹീമോഗ്ലോബിൻ എന്നിവ വർദ്ധിപ്പിക്കാൻ ഉത്തമം.',
                'benefits' => "• കായികക്ഷമതയും ഊർജ്ജസ്വലതയും വർദ്ധിപ്പിക്കുന്നു: ശുദ്ധ ഹിമാലയൻ ശിലാജിത്തും ജിൻസെങ്ങും കോശങ്ങളിലെ എ.ടി.പി (ATP) ഉത്പാദനം വേഗത്തിലാക്കി വിട്ടുമാറാത്ത ക്ഷീണം അകറ്റി ഉയർന്ന സ്റ്റാമിന നൽകുന്നു.\n" .
                              "• പുരുഷ ഹോർമോൺ സന്തുലിതാവസ്ഥയും കരുത്തും: സിങ്ക്, മഗ്നീഷ്യം, ഫുൾവിക് ആസിഡ് എന്നിവ സ്വാഭാവിക ടെസ്റ്റോസ്റ്റിറോൺ അളവും പേശീബലവും നിലനിർത്താൻ സഹായിക്കുന്നു.\n" .
                              "• ഹീമോഗ്ലോബിനും രക്തയോട്ടവും വർദ്ധിപ്പിക്കുന്നു: സസ്യജന്യ അയൺ രക്തത്തിലെ ചുവന്ന രക്താണുക്കൾ വർദ്ധിപ്പിക്കുകയും പേശികളിലേക്കുള്ള ഓക്സിജൻ പ്രവാഹം സുഗമമാക്കുകയും ചെയ്യുന്നു.\n" .
                              "• മാനസിക സമ്മർദ്ദവും അലസതയും അകറ്റുന്നു: ശക്തമായ അഡാപ്റ്റോജനുകൾ കോർട്ടിസോൾ ഹോർമോൺ കുറയ്ക്കുകയും തലച്ചോറിന് ഏകാഗ്രതയും ശാന്തതയും സമ്മാനിക്കുകയും ചെയ്യുന്നു.\n" .
                              "• സ്വാഭാവിക പേശീ വീണ്ടെടുക്കൽ (Muscle Recovery): ഡാർക്ക് കൊക്കോയും മത്തൻ വിത്തുകളും നട്സുകളും വ്യായാമത്തിന് ശേഷമുള്ള പേശീവേദനയും തളർച്ചയും വേഗത്തിൽ മാറ്റുന്നു.",
                'ingredients' => "• ശുദ്ധ ഹിമാലയൻ ശിലാജിത്ത് (Shilajit): 84-ലധികം ധാതുക്കളും ഫുൾവിക് ആസിഡും അടങ്ങിയ പ്രകൃതിദത്ത ഊർജ്ജസ്രോതസ്സ്.\n" .
                                 "• ജിൻസെങ് & അശ്വഗന്ധ (Ginseng Extract): പേശികൾക്ക് കരുത്തും ഉന്മേഷവും നൽകുന്ന ഔഷധക്കൂട്ട്.\n" .
                                 "• സസ്യ അയൺ കോംപ്ലക്സ് (Plant Iron): രക്തക്കുറവ് പരിഹരിക്കാനും ശ്വാസകോശ-പേശി ശേഷി കൂട്ടാനും സഹായിക്കുന്ന അയൺ.\n" .
                                 "• സൂപ്പർഫുഡ് സീഡ് മിക്സ് (മത്തൻ വിത്ത്, തണ്ണിമത്തൻ വിത്ത്, ചിയാ, ഫ്ലാക്സ് സീഡ്): സിങ്കും ഒമേഗ ഫാറ്റി ആസിഡുകളും നിറഞ്ഞ വിത്തുകൾ.\n" .
                                 "• പ്രീമിയം നട്സുകൾ (ബദാം & വാൽനട്ട്): വിറ്റാമിൻ ഇ, മഗ്നീഷ്യം എന്നിവയാൽ സമ്പുഷ്ടമായ നട്സുകൾ.\n" .
                                 "• ശുദ്ധ ഡാർക്ക് കൊക്കോ & പ്രകൃതിദത്ത മധുരം: അതീവ സ്വാദിഷ്ടമായ ഫങ്ഷണൽ ചോക്ലേറ്റ് പേസ്റ്റ് അനുഭവം.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: ദിവസവും 1 അല്ലെങ്കിൽ 2 സ്പൂൺ (10-15 ഗ്രാം) രാവിലെയോ അല്ലെങ്കിൽ വർക്ക്ഔട്ടിന് 30 മിനിറ്റ് മുൻപോ കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: മികച്ച ഉന്മേഷത്തിനും കരുത്തിനുമായി 6 മുതൽ 8 ആഴ്ച വരെ പതിവായി ഉപയോഗിക്കുക.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: ക്ഷീണം അനുഭവപ്പെടുന്ന പുരുഷന്മാർ, കായികതാരങ്ങൾ, ജിമ്മിൽ പോകുന്നവർ, കഠിന ജോലി ചെയ്യുന്നവർ എന്നിവർക്കെല്ലാം ഉത്തമം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वियाचॉक पावरप्लस फंक्शनल सुपरफूड फॉर मेन (शिलाजीत, जिनसेंग और सुपर सीड्स) – 300g',
                'short_description' => 'शुद्ध हिमालयी शिलाजीत, जिनसेंग, पादप आयरन, 16 सुपर सीड्स और सूखे मेवों से युक्त पुरुषों के लिए शक्तिशाली डार्क चॉकलेट सुपरफूड। स्टैमिना, पौरुष शक्ति, हीमोग्लोबिन और मांसपेशियों की रिकवरी में अत्यंत लाभकारी।',
                'benefits' => "• सर्वोच्च स्टैमिना और शारीरिक ऊर्जा: शुद्ध शिलाजीत और जिनसेंग कोशिकाओं में ऊर्जा उत्पादन (ATP) बढ़ाकर दिनभर की थकान को दूर भगाते हैं और शारीरिक सहनशक्ति बढ़ाते हैं।\n" .
                              "• टेस्टोस्टेरोन और पौरुष बल में वृद्धि: प्राकृतिक जिंक, मैग्नीशियम और फुल्विक एसिड पुरुषों के हार्मोनल संतुलन और शारीरिक ताकत को सुदृढ़ करते हैं।\n" .
                              "• हीमोग्लोबिन और बेहतर रक्त संचार: पादप आयरन मांसपेशियों तक ऑक्सीजन पहुंचाने में मदद करता है, जिससे वर्कआउट या भारी काम के दौरान सांस फूलने की समस्या कम होती है।\n" .
                              "• तनाव मुक्ति और तेज फोकस: जिनसेंग और अश्वगंधा तनाव के स्तर (कॉर्टिसोल) को घटाकर मानसिक सतर्कता और एकाग्रता को बढ़ाते हैं।\n" .
                              "• मांसपेशियों की त्वरित रिकवरी: कद्दू के बीज, तरबूज के बीज, बादाम और अखरोट कसरत के बाद शरीर को तेज़ी से पोषण देकर रिकवर करते हैं।",
                'ingredients' => "• शुद्ध हिमालयी शिलाजीत (Shilajit): 84+ खनिज और फुल्विक एसिड से भरपूर, जो ऊर्जा और शक्ति का प्राकृतिक स्रोत है।\n" .
                                 "• जिनसेंग और अश्वगंधा अर्क (Ginseng & Ashwagandha): तनाव घटाने और शारीरिक सहनशक्ति बढ़ाने वाला शक्तिशाली टॉनिक।\n" .
                                 "• प्राकृतिक पादप आयरन (Plant Iron): मांसपेशियों और रक्त में ऑक्सीजन का स्तर बढ़ाने वाला सुपाच्य आयरन।\n" .
                                 "• सुपरफूड बीज मिश्रण (कद्दू, तरबूज, चिया और अलसी के बीज): जिंक और आवश्यक फैटी एसिड्स से भरपूर।\n" .
                                 "• सूखे मेवे (बादाम और अखरोट): विटामिन ई और मैग्नीशियम का समृद्ध स्रोत।\n" .
                                 "• प्रीमियम डार्क कोको और प्राकृतिक मिठास: स्वादिष्ट और गाढ़ा functional चॉकलेट पेस्ट।",
                'usage' => "• सेवन विधि: प्रतिदिन 1 से 2 चम्मच (लगभग 10-15 ग्राम) सुबह नाश्ते के बाद या वर्कआउट से 30 मिनट पहले लें।\n" .
                           "• श्रेष्ठ परिणामों के लिए: निरंतर 6 से 8 सप्ताह तक नियमित सेवन करें।\n" .
                           "• किसके लिए उपयुक्त: वयस्क पुरुष, एथलीट्स, जिम जाने वाले, तनाव और कम स्टैमिना से जूझ रहे कामकाजी व्यक्ति।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வியாச்சாக் பவர்பிளஸ் ஃபங்க்ஷனல் சூப்பர்ஃபுட் ஃபார் மென் (ஷிலாஜித், ஜின்செங் & சூப்பர் விதைகள்) – 300g',
                'short_description' => 'தூய இமயமலை ஷிலாஜித், ஜின்செங், தாவர இரும்புச்சத்து, 16 ஊட்டச்சத்து விதைகள் மற்றும் உலர் பழங்கள் நிறைந்த ஆண்களுக்கான ஆற்றல் சூப்பர்ஃபுட். உடல் வலிமை, ஆண்மை, ரத்த ஓட்டம் மற்றும் புத்துணர்ச்சியை பெருக்கும் சிறந்த உணவு.',
                'benefits' => "• அதிகப்படியான உடல் வலிமை மற்றும் ஸ்டேமினா: தூய ஷிலாஜித் மற்றும் ஜின்செங் உடல் செல்களில் ஆற்றல் உற்பத்தியை அதிகரித்து நீடித்த உடற்பலத்தையும் சுறுசுறுப்பையும் அளிக்கிறது.\n" .
                              "• இயற்கை ஆண்மை சக்தி மற்றும் ஹார்மோன் சமநிலை: ஜிங்க், மெக்னீசியம் மற்றும் ஃபுல்விக் அமிலம் டெஸ்டோஸ்டிரோன் அளவை சீராக்கி உடல் உறுதியை மேம்படுத்துகிறது.\n" .
                              "• ஹீமோகுளோபின் மற்றும் திசுக்களுக்கு ஆக்சிஜன் விநியோகம்: தாவர இரும்புச்சத்து தசை நார்களுக்கு ரத்த ஓட்டத்தையும் ஆக்சிஜனையும் விரைவாக கொண்டு சேர்க்கிறது.\n" .
                              "• மன அழுத்தம் நீங்கி கூர்மையான கவனம்: ஜின்செங் மற்றும் அஸ்வகந்தா மன அழுத்தத்தை போக்கி விழிப்புணர்வையும் நினைவாற்றலையும் உயர்த்துகிறது.\n" .
                              "• தசை வளர்ச்சி மற்றும் விரைவு நிவாரணம்: பூசணி விதைகள், பாதாம் மற்றும் அக்ரூட் உடற்பயிற்சிக்கு பின்னான தசை வலிகளை போக்கி வலிமை சேர்க்கிறது.",
                'ingredients' => "• தூய இமயமலை ஷிலாஜித் (Shilajit): 84-க்கும் மேற்பட்ட தாதுக்கள் மற்றும் ஃபுல்விக் அமிலம் கொண்ட இயற்கை சக்தி மருந்து.\n" .
                                 "• ஜின்செங் மற்றும் அஸ்வகந்தா (Ginseng Extract): உடலுக்கு அபரிமிதமான ஆற்றலைத் தரும் பாரம்பரிய மூலிகைகள்.\n" .
                                 "• தாவர வழி இரும்புச்சத்து: ஹீமோகுளோபின் மற்றும் ரத்த சிவப்பணுக்களின் உற்பத்தியை தூண்டும் உன்னத சத்து.\n" .
                                 "• சத்து விதைகள் கலவை (பூசணி, தர்பூசணி, சியா, ஆளிவிதை): ஜிங்க் மற்றும் ஒமேகா கொழுப்பு அமிலங்கள் நிறைந்த விதைகள்.\n" .
                                 "• தேர்வு செய்யப்பட்ட நட்ஸ் (பாதாம் & வால்நட்): இதயத்திற்கும் நரம்புகளுக்கும் ஊட்டமளிக்கும் நட்ஸ்.\n" .
                                 "• தூய டார்க் கொக்கோ & இயற்கை இனிப்பு: நாவில் சுவை கூட்டும் கிரீமியான டார்க் சாக்லேட் பேஸ்ட் வடிவம்.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் 1 அல்லது 2 ஸ்பூன் (10-15 கிராம்) காலையில் உணவுக்குப் பின்போ அல்லது உடற்பயிற்சிக்கு 30 நிமிடங்களுக்கு முன்போ சாப்பிடலாம்.\n" .
                           "• சிறந்த பலன்களுக்கு: தொடர்ந்து 6 முதல் 8 வாரங்கள் உட்கொள்ளும்போது முழுமையான வலிமையும் ஆற்றலும் வெளிப்படும்.\n" .
                           "• யாருக்கெல்லாம் ஏற்றது: வயது வந்த ஆண்கள், விளையாட்டு வீரர்கள், உடற்பயிற்சி செய்வோர் மற்றும் தீவிர உடல் உழைப்பு உள்ளவர்கள்.",
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
                $this->command?->info("Updated VeaChoc PowerPlus Superfood (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'stamina'],
                ['name' => 'Stamina & Vitality', 'description' => 'Ayurvedic formulations and superfoods for peak endurance, vitality, and cellular energy.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VC-PWP-MEN',
                'price' => 1280.00,
                'sale_price' => 1280.00,
                'stock_quantity' => 50,
                'unit_size' => '300 g',
                'badge' => 'Shilajit & Ginseng Superfood',
                'featured_image' => 'https://yuvann.com/storage/products/05522ad6-0703-4708-a62d-14ae25628dd0.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 10,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new VeaChoc PowerPlus Superfood (#{$product->id}) with full multilingual content.");
        }
    }
}
