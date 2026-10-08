<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VeachocMilkChocolateTranslationSeeder extends Seeder
{
    /**
     * Seed VeaChoc Milk Chocolate RakthaPushti details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'veachoc-milk-chocolate-rakthapushti-organic-blood-builder-supplement-with-iron-vitamin-c';

        $product = Product::where('slug', $slug)
            ->orWhere('slug', 'like', '%veachoc-milk%')
            ->orWhere('sku', 'VCH-RKP-MLK-CHOC-10')
            ->first();

        $enTitle = 'VeaChoc Milk Chocolate RakthaPushti – Organic Blood Builder Supplement with Iron & Vitamin C (10 PCs)';
        $enShortDesc = 'Delicious milk cocoa functional chocolate infused with bioavailable plant iron, Vitamin C, superfood seeds, whole grains, and nuts to boost hemoglobin, enhance memory, and conquer iron deficiency naturally without digestive side effects.';

        $enBenefits = "• Builds Hemoglobin & Combats Anemia: Infused with natural plant-derived iron that directly stimulates red blood cell production, increases vitality, and overcomes stubborn fatigue.\n" .
                      "• Triple Iron Absorption with Vitamin C: Naturally synergized with organic Vitamin C for maximum intestinal bioavailability without nausea, constipation, or metallic taste.\n" .
                      "• Creamy Milk Chocolate Taste: Perfectly balances smooth milk chocolate sweetness with dense functional nutrition, making daily iron intake effortless and enjoyable.\n" .
                      "• Brain Nutrition & Cognitive Clarity: Packed with wholesome nuts, seeds, and roasted grains that supply zinc, magnesium, and essential nutrients to support focus and memory.\n" .
                      "• Wholesome Daily Health Treat: A 100% natural, guilt-free blood booster crafted for all age groups, eliminating the hassle of swallowing bitter iron supplements.";

        $enIngredients = "• Fine Milk Cocoa & Pure Cocoa Butter (Theobroma cacao): Smooth, rich milk chocolate base loaded with polyphenols and mood-enhancing nutrients.\n" .
                         "• Plant-Sourced Hematinic Iron Complex: Pure, bioavailable dietary iron that supports healthy erythrocyte development.\n" .
                         "• Natural Fruit Vitamin C (Ascorbic Acid): Synergistic plant vitamin C that accelerates iron absorption across the gastrointestinal barrier.\n" .
                         "• Premium Roasted Nuts (Almonds & Cashews): Rich in Vitamin E, magnesium, and proteins for stamina and muscle nourishment.\n" .
                         "• Superfood Seeds & Wholesome Grains: Pumpkin seeds, sunflower seeds, and ancient grains supplying natural minerals and dietary fiber.\n" .
                         "• Traditional Natural Sweetener & Pure Milk Solids: Carefully blended for a silky, rich, comforting milk chocolate finish.";

        $enUsage = "• Daily Intake: Savor 1 to 2 pieces daily as a wholesome snack or post-meal energy treat.\n" .
                   "• Optimal Blood Building: Consume consistently for 3 to 4 weeks alongside a balanced diet for noticeable improvement in energy and blood hemoglobin levels.\n" .
                   "• Ideal For: School-going children, active adolescents, menstruating women, expectant mothers, and adults battling fatigue.";

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
                'name' => 'വിയാചോക്ക് മിൽക്ക് ചോക്ലേറ്റ് രക്തപുഷ്ടി – അയൺ & വിറ്റാമിൻ സി ബ്ലഡ് ബിൽഡർ (10 എണ്ണം)',
                'short_description' => 'ശുദ്ധമായ പാലും കൊക്കോയും സ്വാഭാവിക അയൺ, വിറ്റാമിൻ സി, ഡ്രൈ ഫ്രൂട്ട്സ്, വിത്തുകൾ എന്നിവ സമന്വയിപ്പിച്ച സ്വാദിഷ്ടമായ മിൽക്ക് ചോക്ലേറ്റ്. ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാനും ക്ഷീണം അകറ്റി ഉന്മേഷം നൽകാനും ഉത്തമം.',
                'benefits' => "• ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിച്ച് വിളർച്ച തടയുന്നു: രക്തത്തിലെ ചുവന്ന രക്താണുക്കളുടെ ഉത്പാദനം വേഗത്തിലാക്കി അനീമിയ, തലകറക്കം, വിട്ടുമാറാത്ത ക്ഷീണം എന്നിവ അകറ്റുന്നു.\n" .
                              "• വിറ്റാമിൻ സി ചേർന്ന ഉയർന്ന ആഗിരണം: പ്രകൃതിദത്ത വിറ്റാമിൻ സി അടങ്ങിയിരിക്കുന്നതിനാൽ അയൺ ശരീരത്തിൽ അതിവേഗം ആഗിരണം ചെയ്യപ്പെടുന്നു; മലബന്ധമോ ദഹനക്കേടോ ഉണ്ടാക്കുന്നില്ല.\n" .
                              "• കൊതിപ്പിക്കുന്ന മിൽക്ക് ചോക്ലേറ്റ് രുചി: മിൽക്ക് ചോക്ലേറ്റിന്റെ കൊതിയൂറും ക്രീമി രുചിയിൽ പോഷകങ്ങൾ ലഭ്യമാകുന്നതിനാൽ കുട്ടികൾക്കും മുതിർന്നവർക്കും ഒരുപോലെ പ്രിയങ്കരം.\n" .
                              "• ബുദ്ധിശക്തിയും ഏകാഗ്രതയും വർദ്ധിപ്പിക്കുന്നു: ബദാം, അണ്ടിപ്പരിപ്പ്, പോഷക വിത്തുകൾ എന്നിവയിലെ സിങ്കും മഗ്നീഷ്യവും തലച്ചോറിന്റെ പ്രവർത്തനങ്ങളെയും ഓർമ്മശക്തിയെയും ഉത്തേജിപ്പിക്കുന്നു.\n" .
                              "• അയൺ ഗുളികകൾക്ക് സ്വാദിഷ്ടമായ പകരംവെക്കൽ: കയ്പ്പുള്ള മരുന്നുകൾക്കോ ഇഞ്ചക്ഷനുകൾക്കോ പകരമായി സന്തോഷത്തോടെ ദിവസവും കഴിക്കാൻ കഴിയുന്ന പോഷക സമ്പുഷ്ട ചോക്ലേറ്റ്.",
                'ingredients' => "• പ്രീമിയം മിൽക്ക് കൊക്കോ & കൊക്കോ ബട്ടർ: ഹൃദയാരോഗ്യത്തിനും ഉന്മേഷത്തിനും സഹായിക്കുന്ന ശുദ്ധ കൊക്കോയും പാലും.\n" .
                                 "• ഹെമാറ്റിനിക് സസ്യ അയൺ: ഹീമോഗ്ലോബിൻ ഉത്പാദനത്തെ സഹായിക്കുന്ന സ്വാഭാവിക സസ്യജന്യ അയൺ.\n" .
                                 "• സ്വാഭാവിക വിറ്റാമിൻ സി: കുടലിൽ ഇരുമ്പിന്റെ ആഗിരണം മൂന്നിരട്ടിയാക്കുന്ന പ്രകൃതിദത്ത വിറ്റാമിൻ സി.\n" .
                                 "• നട്സുകൾ (ബദാം & അണ്ടിപ്പരിപ്പ്): വിറ്റാമിൻ ഇ, പ്രോട്ടീൻ, ആരോഗ്യകരമായ കൊഴുപ്പുകൾ എന്നിവയാൽ സമൃദ്ധം.\n" .
                                 "• സൂപ്പർഫുഡ് സീഡുകൾ (മത്തൻ വിത്ത്, സൂര്യകാന്തി വിത്ത്): സിങ്കും അവശ്യ ധാതുക്കളും അടങ്ങിയ പോഷക വിത്തുകൾ.\n" .
                                 "• ശുദ്ധ പാൽ ഘടകങ്ങൾ & പ്രകൃതിദത്ത മധുരം: മൃദുലവും സ്വാദിഷ്ടവുമായ ചോക്ലേറ്റ് അനുഭവം നൽകുന്നു.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: ദിവസവും 1 അല്ലെങ്കിൽ 2 ചോക്ലേറ്റ് കഷ്ണങ്ങൾ ലഘുഭക്ഷണമായോ ഉച്ചതിരിഞ്ഞോ കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: രക്തക്കുറവും ക്ഷീണവുമുള്ളവർ 3 മുതൽ 4 ആഴ്ച വരെ തുടർച്ചയായി ഉപയോഗിക്കുക.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: സ്കൂൾ കുട്ടികൾ, കൗമാരപ്രായക്കാർ, സ്ത്രീകൾ, ഗർഭിണികൾ, മുലയൂട്ടുന്ന അമ്മമാർ, പ്രായമായവർ എന്നിവർക്കെല്ലാം സുരക്ഷിതമായ രക്തവർദ്ധക പോഷകം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वियाचॉक मिल्क चॉकलेट रक्तपुष्टि – ऑर्गेनिक ब्लड बिल्डर और आयरन-विटामिन सी सप्लीमेंट (10 पीस)',
                'short_description' => 'स्वादिष्ट मिल्क कोको, प्राकृतिक पादप आयरन, विटामिन सी, सूखे मेवों और पोषक बीजों से भरपूर functional चॉकलेट। हीमोग्लोबिन स्तर बढ़ाने, याददाश्त तेज करने और थकान मिटाने में अत्यंत गुणकारी।',
                'benefits' => "• हीमोग्लोबिन बढ़ाए और एनीमिया मिटाए: प्राकृतिक पादप आयरन लाल रक्त कोशिकाओं का निर्माण कर शरीर की कमजोरी और दैनिक थकान को जड़ से खत्म करता है।\n" .
                              "• विटामिन सी युक्त 3 गुना बेहतर अवशोषण: विटामिन सी आंतों में आयरन को तेजी से सोखता है, जिससे किसी भी तरह की कब्ज या पाचन संबंधी समस्या नहीं होती।\n" .
                              "• स्वादिष्ट क्रीमी मिल्क चॉकलेट स्वाद: कड़वे टॉनिक या गोलियों के स्थान पर मीठे और क्रीमी मिल्क चॉकलेट के रूप में संपूर्ण पोषण।\n" .
                              "• मस्तिष्क विकास और एकाग्रता: बादाम, काजू और बीजों में मौजूद जिंक व मैग्नीशियम बच्चों की याददाश्त और फोकस को बढ़ाते हैं।\n" .
                              "• संपूर्ण परिवार के लिए सुरक्षित स्वास्थ्य वर्धक: बिना किसी रसायन या धातुई स्वाद के, रोज़ाना खाया जाने वाला शुद्ध और सुरक्षित सुपरफूड।",
                'ingredients' => "• प्रीमियम मिल्क कोको और कोको बटर: मूड और ऊर्जा को बढ़ाने वाले पॉलीफेनॉल्स से भरपूर।\n" .
                                 "• प्राकृतिक पादप आयरन (Plant Iron): हीमोग्लोबिन संश्लेषण को तेज करने वाला सुपाच्य प्राकृतिक आयरन।\n" .
                                 "• प्राकृतिक विटामिन सी (Fruit Vitamin C): आंतों में आयरन के अवशोषण को कई गुना बढ़ाने वाला आवश्यक तत्व।\n" .
                                 "• पौष्टिक मेवे (बादाम और काजू): विटामिन ई, प्रोटीन और प्राकृतिक ऊर्जा का स्रोत।\n" .
                                 "• सुपरफूड बीज (कद्दू और सूरजमुखी के बीज): जिंक, मैग्नीशियम और आवश्यक फैटी एसिड्स से भरपूर।\n" .
                                 "• शुद्ध दुग्ध घटक और प्राकृतिक मिठास: मखमली और स्वादिष्ट मिल्क चॉकलेट का अनुभव।",
                'usage' => "• सेवन विधि: प्रतिदिन 1 से 2 पीस चॉकलेट का आनंद लें, नाश्ते के बाद या शाम के समय।\n" .
                           "• खून की कमी दूर करने के लिए: बेहतर परिणामों के लिए 3 से 4 सप्ताह तक नियमित सेवन करें।\n" .
                           "• किसके लिए उपयुक्त: स्कूल जाने वाले बच्चे, महिलाएं, गर्भवती व धात्री माताएं और खून की कमी से जूझ रहे सभी लोग।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வியாச்சாக் மில்க் சாக்லேட் ரத்தபுஷ்டி – இரும்புச்சத்து & வைட்டமின் சி பிளட் பில்டர் (10 துண்டுகள்)',
                'short_description' => 'சுவையான மில்க் கோகோ, தாவர வழி இரும்புச்சத்து, வைட்டமின் சி, உலர் பழங்கள் மற்றும் சத்து விதைகளால் தயாரிக்கப்பட்ட ஆரோக்கிய சாக்லேட். ரத்த சோகையை போக்கி, நினைவாற்றலையும் சுறுசுறுப்பையும் அதிகரிக்கும் உன்னத உணவு.',
                'benefits' => "• ஹீமோகுளோபின் அளவை அதிகரித்து ரத்த சோகையை நீக்குகிறது: இயற்கை இரும்புச்சத்து ரத்த சிவப்பணுக்களை விரைவாக உற்பத்தி செய்து உடல் சோர்வு மற்றும் தலைசுற்றலை போக்குகிறது.\n" .
                              "• வைட்டமின் சி உடன் எளிதில் உடலால் உறிஞ்சப்படுகிறது: இயற்கை வைட்டமின் சி இரும்புச்சத்தை குடலில் விரைவாக உறிஞ்சச் செய்கிறது; மலச்சிக்கல் அல்லது அஜீரணம் உண்டாகாது.\n" .
                              "• சுவையான கிரீமி மில்க் சாக்லேட் சுவை: குழந்தைகள் முதல் பெரியவர்கள் வரை அனைவரும் ரசித்து உண்ணும் கிரீமியான பால் சாக்லேட் வடிவில் முழுமையான ஆரோக்கியம்.\n" .
                              "• மூளை வளர்ச்சி மற்றும் நினைவாற்றல்: பாதாம், முந்திரி மற்றும் விதைகளில் உள்ள ஜிங்க், மெக்னீசியம் குழந்தைகளின் படிப்புத் திறன் மற்றும் நினைவாற்றலை மேம்படுத்துகிறது.\n" .
                              "• மாத்திரைகளுக்கு மாற்றான சுவையான ஊட்டச்சத்து: கசப்பு இரும்பு மாத்திரைகளின் உலோக சுவையின்றி மகிழ்ச்சியாக உண்ணக்கூடிய ஆரோக்கிய சூப்பர்ஃபுட்.",
                'ingredients' => "• உயர்தர மில்க் கோகோ & வெண்ணெய்: உடலுக்கு புத்துணர்ச்சியூட்டும் ஆன்டி-ஆக்ஸிடன்ட்கள் நிறைந்த தூய கொக்கோ.\n" .
                                 "• தாவர வழி இரும்புச்சத்து: ஹீமோகுளோபின் உற்பத்திக்கு உதவும் இயற்கை உறிஞ்சக்கூடிய இரும்புச்சத்து.\n" .
                                 "• இயற்கை பழ வைட்டமின் சி: இரும்புச்சத்தை உடல் எளிதில் கிரகித்துக் கொள்ள உதவும் அத்தியாவசிய வைட்டமின்.\n" .
                                 "• தேர்வு செய்யப்பட்ட நட்ஸ் (பாதாம் & முந்திரி): வைட்டமின் ஈ, புரதம் மற்றும் தாதுக்கள் நிறைந்த உலர் பழங்கள்.\n" .
                                 "• சத்து விதைகள் (பூசணி மற்றும் சூரியகாந்தி விதைகள்): ஜிங்க் மற்றும் நல்ல கொழுப்பு அமிலங்கள் நிறைந்த ஊட்டச்சத்து விதைகள்.\n" .
                                 "• தூய பால் சத்துக்கள் & இயற்கை இனிப்பு: சுவையான, நாவில் கரையும் மில்க் சாக்லேட் சுவைக்காக.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் 1 அல்லது 2 சாக்லேட் துண்டுகளை சிற்றுண்டியாகவோ அல்லது உணவுக்குப் பின்போ சாப்பிடலாம்.\n" .
                           "• சிறந்த ரத்த விருத்திக்கு: தொடர்ந்து 3 முதல் 4 வாரங்கள் உட்கொள்ளும்போது குறிப்பிடத்தக்க ஆற்றல் மற்றும் ரத்த முன்னேற்றம் கிடைக்கும்.\n" .
                           "• யாருக்கெல்லாம் சிறந்தது: பள்ளி மாணவர்கள், வளரிளம் பருவத்தினர், ரத்த சோகை உள்ள பெண்கள், கர்ப்பிணிகள் மற்றும் முதியவர்கள்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        if ($product) {
            $product->update([
                'name' => $enTitle,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'translations' => $translations,
            ]);
            $this->command?->info("Updated existing VeaChoc Milk Chocolate RakthaPushti (#{$product->id}) with full multilingual content.");
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VCH-RKP-MLK-CHOC-10',
                'price' => 299.00,
                'sale_price' => 295.00,
                'stock_quantity' => 50,
                'unit_size' => '10 PCs',
                'badge' => 'Iron & Vitamin C Rich',
                'featured_image' => 'https://yuvann.com/storage/products/880e79eb-3e34-4165-a7a9-691f67a22903.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 7,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            $this->command?->info("Created new VeaChoc Milk Chocolate RakthaPushti (#{$product->id}) with full multilingual content.");
        }

        // Attach targeted body care areas: Whole Body, Head & Mind
        $bodyPartSlugs = ['whole-body', 'head'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }
    }
}
