<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VeachocWhiteChocolateTranslationSeeder extends Seeder
{
    /**
     * Seed VeaChoc White Chocolate RakthaPushti details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'veachoc-white-chocolate-rakthapushti-iron-vitamin-c-blood-builder-supplement';

        $product = Product::where('slug', $slug)
            ->orWhere('slug', 'like', '%veachoc-white%')
            ->orWhere('sku', 'VCH-RKP-WHT-CHOC-10')
            ->first();

        $enTitle = 'VeaChoc White Chocolate RakthaPushti – Iron & Vitamin C Blood Builder Supplement (10 PCs)';
        $enShortDesc = 'A rich, cocoa-solid-free artisan white chocolate treat packed with bioavailable plant iron, nutrient-rich seeds, dry fruits, and Vitamin C to support hemoglobin synthesis, enhance memory, and revitalize daily stamina.';

        $enBenefits = "• Boosts Hemoglobin & Fights Anemia: Delivers bioavailable dietary plant iron that accelerates healthy red blood cell production, enhances oxygenation, and combats everyday exhaustion.\n" .
                      "• Synergistic Vitamin C for High Absorption: Naturally enriched with Vitamin C to triple non-heme iron absorption in the gut, preventing stomach irritation or digestive discomfort.\n" .
                      "• Pure Cocoa-Solid-Free Formulation: Creamy, delicate white chocolate base made without dark cocoa solids or caffeine—gentle on sensitive tummies and heavily favoured by children.\n" .
                      "• Brain Vitality & Mental Alertness: Nourishing almonds and nutrient seeds provide zinc, magnesium, and essential healthy fats to support cognitive development, focus, and memory.\n" .
                      "• Delicious Everyday Iron Treat: Completely eliminates medicinal aftertaste or metallic palate, turning essential blood-building nutrition into a delightful daily reward.";

        $enIngredients = "• Pure Cocoa Butter (Theobroma cacao): Premium cold-pressed cocoa butter base that provides a rich, silky texture without bitter cocoa powder solids.\n" .
                         "• Hematinic Plant Iron Complex: Natural, non-constipating plant-derived dietary iron specifically formulated for red blood cell synthesis.\n" .
                         "• Natural Vitamin C (Ascorbic Acid from Fruit Extracts): Crucial nutritional co-factor that dramatically enhances non-heme iron uptake in the digestive tract.\n" .
                         "• Selected Dry Fruits & Nuts (Almonds & Golden Raisins): Loaded with Vitamin E, potassium, and plant protein for sustained cellular energy.\n" .
                         "• Superfood Seeds (Pumpkin & Sunflower Seeds): Natural reservoir of zinc, magnesium, and healthy essential fatty acids.\n" .
                         "• Natural Sweetener & Pure Milk Solids: Perfectly tempered to create a creamy, melt-in-mouth white chocolate experience.";

        $enUsage = "• Daily Serving: Enjoy 1 to 2 pieces daily, ideally between meals or as an afternoon energy booster.\n" .
                   "• Anemia & Hemoglobin Building: Consume daily for 3 to 4 consecutive weeks for noticeable improvements in energy, complexion, and stamina.\n" .
                   "• Suitable For: Growing children, pregnant and nursing mothers, women during menstrual cycles, and anyone sensitive to dark cocoa.";

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
                'name' => 'വിയാചോക്ക് വൈറ്റ് ചോക്ലേറ്റ് രക്തപുഷ്ടി – അയൺ & വിറ്റാമിൻ സി ബ്ലഡ് ബിൽഡർ (10 എണ്ണം)',
                'short_description' => 'കൊക്കോ സോളിഡ്സ് ഇല്ലാത്ത, പ്രകൃതിദത്ത അയൺ, വിറ്റാമിൻ സി, ഡ്രൈ ഫ്രൂട്ട്സ്, പോഷക വിത്തുകൾ എന്നിവ അടങ്ങിയ സ്വാദിഷ്ടമായ വൈറ്റ് ചോക്ലേറ്റ്. കുട്ടികൾക്കും മുതിർന്നവർക്കും ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാനും ക്ഷീണമകറ്റാനും ഉത്തമം.',
                'benefits' => "• ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിച്ച് വിളർച്ച തടയുന്നു: രക്തത്തിലെ ചുവന്ന രക്താണുക്കളുടെ നിർമ്മാണത്തിന് സഹായിക്കുന്ന സസ്യജന്യ അയൺ അടങ്ങിയിരിക്കുന്നതിനാൽ ക്ഷീണവും തളർച്ചയും അകറ്റുന്നു.\n" .
                              "• വിറ്റാമിൻ സി ചേർന്ന മികച്ച ആഗിരണം: പ്രകൃതിദത്ത വിറ്റാമിൻ സി അടങ്ങിയിട്ടുള്ളതിനാൽ അയൺ ശരീരത്തിൽ അതിവേഗം ആഗിരണം ചെയ്യപ്പെടുകയും വയറുവേദനയോ മലബന്ധമോ ഉണ്ടാക്കാതിരിക്കുകയും ചെയ്യുന്നു.\n" .
                              "• കുട്ടികൾക്ക് പ്രിയപ്പെട്ട കൊക്കോ രഹിത രുചി: കയ്പ്പുള്ള കൊക്കോ സോളിഡ്സ് ഇല്ലാത്തതിനാൽ ചെറിയ കുട്ടികൾക്ക് അതീവ സ്വാദിഷ്ടവും സുരക്ഷിതവുമായ വൈറ്റ് ചോക്ലേറ്റ് അനുഭവം.\n" .
                              "• ബുദ്ധിവികാസത്തിനും ഓർമ്മശക്തിക്കും: ബദാം, മത്തൻ വിത്തുകൾ എന്നിവയിലെ സിങ്കും മഗ്നീഷ്യവും കുട്ടികളുടെ പഠനശേഷിയും ഓർമ്മശക്തിയും ഏകാഗ്രതയും വർദ്ധിപ്പിക്കുന്നു.\n" .
                              "• മരുന്നിന്റെ ചുവയില്ലാത്ത രുചികരമായ പോഷകം: മരുന്നുകളുടെയോ അയൺ ഗുളികകളുടെയോ ലോഹരുചിയില്ലാതെ സന്തോഷത്തോടെ കഴിക്കാൻ കഴിയുന്ന പോഷകാഹാരം.",
                'ingredients' => "• ശുദ്ധ കൊക്കോ ബട്ടർ (Cocoa Butter): കൊക്കോ പൊടി ഇല്ലാതെ സ്വാഭാവിക മൃദുത്വവും പോഷകഗുണവും നൽകുന്ന കൊക്കോ ബട്ടർ.\n" .
                                 "• പ്രകൃതിദത്ത സസ്യ അയൺ (Plant-based Iron): രക്തത്തിലെ ഹീമോഗ്ലോബിൻ നിർമ്മാണത്തിന് ആവശ്യമായ ശുദ്ധ സസ്യജന്യ അയൺ.\n" .
                                 "• സ്വാഭാവിക വിറ്റാമിൻ സി (Natural Vitamin C): കുടലിൽ ഇരുമ്പിന്റെ ആഗിരണം മൂന്നിരട്ടിയാക്കുന്ന പ്രകൃതിദത്ത പഴച്ചാറുകളിൽ നിന്നുള്ള വിറ്റാമിൻ സി.\n" .
                                 "• മേന്മയേറിയ നട്സുകൾ (ബദാം & ഉണക്കമുന്തിരി): വിറ്റാമിൻ ഇ, പൊട്ടാസ്യം എന്നിവയാൽ സമ്പന്നമായ ബദാമും ഉണക്കമുന്തിരിയും.\n" .
                                 "• പോഷക വിത്തുകൾ (മത്തൻ വിത്ത് & സൂര്യകാന്തി വിത്ത്): സിങ്ക്, നല്ല കൊഴുപ്പുകൾ എന്നിവ നൽകുന്ന സൂപ്പർഫുഡ് സീഡുകൾ.\n" .
                                 "• ശുദ്ധ പാൽ ഘടകങ്ങൾ & പ്രകൃതിദത്ത മധുരം: ക്രീമിയായ വൈറ്റ് ചോക്ലേറ്റ് രുചി പ്രദാനം ചെയ്യുന്നു.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: ദിവസവും 1 അല്ലെങ്കിൽ 2 ചോക്ലേറ്റ് കഷ്ണങ്ങൾ ലഘുഭക്ഷണമായോ ഉച്ചതിരിഞ്ഞോ കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: രക്തക്കുറവുള്ളവർ 3 മുതൽ 4 ആഴ്ച വരെ തുടർച്ചയായി കഴിക്കുക.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: വിളർച്ചയുള്ള കുട്ടികൾ, കൗമാരപ്രായക്കാർ, ഗർഭിണികൾ, മുലയൂട്ടുന്ന അമ്മമാർ, ഡാർക്ക് ചോക്ലേറ്റ് ഇഷ്ടപ്പെടാത്തവർ എന്നിവർക്ക് ഏറ്റവും അനുയോജ്യം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वियाचॉक व्हाइट चॉकलेट रक्तपुष्टि – आयरन और विटामिन सी ब्लड बिल्डर (10 पीस)',
                'short_description' => 'कोको सॉलिड्स मुक्त, प्राकृतिक पादप आयरन, विटामिन सी, सूखे मेवों और पौष्टिक बीजों से युक्त मखमली व्हाइट चॉकलेट। हीमोग्लोबिन बढ़ाने, याददाश्त तेज करने और थकान मिटाने का स्वादिष्ट प्राकृतिक उपाय।',
                'benefits' => "• हीमोग्लोबिन बढ़ाए और एनीमिया मिटाए: प्राकृतिक पादप आयरन से भरपूर जो लाल रक्त कोशिकाओं का निर्माण कर शरीर की कमजोरी और थकान को दूर करता है।\n" .
                              "• विटामिन सी युक्त श्रेष्ठ अवशोषण: प्राकृतिक विटामिन सी पेट में आयरन के अवशोषण को 3 गुना तेज करता है, जिससे कब्ज या पेट में भारीपन नहीं होता।\n" .
                              "• बिना कड़वाहट बच्चों की पसंदीदा: कोको सॉलिड्स और कैफीन मुक्त होने के कारण यह कोमल पेट वाले बच्चों और संवेदनशील व्यक्तियों के लिए बेहद सुरक्षित और स्वादिष्ट है।\n" .
                              "• मानसिक विकास और तेज याददाश्त: बादाम, कद्दू और सूरजमुखी के बीज दिमाग की नसों को पोषण देकर एकाग्रता और पढ़ाई में ध्यान बढ़ाते हैं।\n" .
                              "• दवाइयों के कड़वे स्वाद से छुटकारा: किसी भी कड़वे या धातुई स्वाद के बिना, चॉकलेट के आनंद के साथ संपूर्ण खून की कमी की पूर्ति।",
                'ingredients' => "• शुद्ध कोको बटर (Pure Cocoa Butter): बिना कोको पाउडर के मखमली, स्वादिष्ट और शुद्ध बनावट प्रदान करता है।\n" .
                                 "• प्राकृतिक पादप आयरन (Plant Iron): लाल रक्त कोशिकाओं के निर्माण के लिए आसानी से पचने वाला प्राकृतिक आयरन।\n" .
                                 "• प्राकृतिक विटामिन सी (Fruit Vitamin C): आंतों में आयरन को तेजी से सोखने वाला आवश्यक पोषक तत्व।\n" .
                                 "• सूखे मेवे (बादाम और किशमिश): विटामिन ई, प्रोटीन और प्राकृतिक ऊर्जा से भरपूर।\n" .
                                 "• सुपरफूड बीज (कद्दू और सूरजमुखी के बीज): जिंक, मैग्नीशियम और स्वस्थ वसा का प्राकृतिक भंडार।\n" .
                                 "• शुद्ध दुग्ध घटक और प्राकृतिक मिठास: बेहतरीन और मखमली व्हाइट चॉकलेट का स्वाद देने के लिए।",
                'usage' => "• सेवन विधि: प्रतिदिन 1 से 2 पीस चॉकलेट का आनंद लें, दोपहर के समय या शाम के स्नैक के रूप में।\n" .
                           "• खून की कमी के लिए: बेहतर हीमोग्लोबिन स्तर के लिए 3 से 4 सप्ताह तक नियमित सेवन करें।\n" .
                           "• किसके लिए उपयुक्त: बढ़ते बच्चे, किशोर, गर्भवती महिलाएं, स्तनपान कराने वाली माताएं और डार्क चॉकलेट से परहेज करने वाले सभी लोग।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வியாச்சாக் ஒயிட் சாக்லேட் ரத்தபுஷ்டி – இரும்புச்சத்து & வைட்டமின் சி பிளட் பில்டர் (10 துண்டுகள்)',
                'short_description' => 'கொக்கோ துகள்கள் இல்லாத, தூய இரும்புச்சத்து, வைட்டமின் சி, உலர் பழங்கள் மற்றும் சத்து விதைகளால் தயாரிக்கப்பட்ட சுவையான ஒயிட் சாக்லேட். குழந்தைகள் மற்றும் பெரியவர்களுக்கு ரத்த சோகையை போக்கி சுறுசுறுப்பை வழங்கும் சத்துணவு.',
                'benefits' => "• ரத்தத்தில் ஹீமோகுளோபின் அளவை உயர்த்துகிறது: தாவர வழி இரும்புச்சத்து ரத்த சிவப்பணுக்களின் உற்பத்தியை அதிகரித்து அசதி, தலைச்சுற்றல் மற்றும் சோர்வை நீக்குகிறது.\n" .
                              "• வைட்டமின் சி உடனான முழுமையான உறிஞ்சுதல்: இயற்கை வைட்டமின் சி இரும்புச்சத்தை குடலில் விரைவாக உறிஞ்சச் செய்கிறது; வயிற்று உபாதைகள் அல்லது மலச்சிக்கல் உண்டாகாது.\n" .
                              "• குழந்தைகள் விரும்பும் சுவையான வடிவம்: கசப்பு கொக்கோ துகள்கள் இல்லாததால் குழந்தைகள் விரும்பி உண்ணும் கிரீமியான பால் சாக்லேட் வடிவம்.\n" .
                              "• மூளை வளர்ச்சி மற்றும் நினைவாற்றல்: பாதாம் மற்றும் விதைகளில் உள்ள ஜிங்க், மெக்னீசியம் குழந்தைகளின் கவனிக்கும் திறன் மற்றும் நினைவாற்றலை மேம்படுத்துகிறது.\n" .
                              "• சத்து மாத்திரைகளுக்கு சுவையான மாற்று: மருந்துகள் மற்றும் இரும்புச்சத்து டானிக்குகளின் கசப்புத் தன்மை இல்லாமல் மகிழ்ச்சியாக சுவைக்கக்கூடிய ஊட்டச்சத்து.",
                'ingredients' => "• தூய கொக்கோ வெண்ணெய் (Pure Cocoa Butter): கொக்கோ பவுடர் இல்லாத கிரீமியான சுவையைத் தரும் உயர்தர கொக்கோ வெண்ணெய்.\n" .
                                 "• தாவர வழி இரும்புச்சத்து (Plant Iron): ஹீமோகுளோபின் உற்பத்திக்கு உதவும் இயற்கை இரும்புச்சத்து.\n" .
                                 "• இயற்கை வைட்டமின் சி (Natural Vitamin C): இரும்புச்சத்தை உடல் எளிதில் உறிஞ்ச உதவும் இயற்கை வைட்டமின் சி.\n" .
                                 "• தேர்வு செய்யப்பட்ட உலர் பழங்கள் (பாதாம் & உலர் திராட்சை): வைட்டமின் ஈ மற்றும் பொட்டாசியம் நிறைந்த இயற்கை நட்ஸ்.\n" .
                                 "• சத்து விதைகள் (பூசணி மற்றும் சூரியகாந்தி விதைகள்): ஜிங்க், மெக்னீசியம் மற்றும் நல்ல கொழுப்பு அமிலங்கள் நிறைந்த விதைகள்.\n" .
                                 "• தூய பால் சத்துக்கள் மற்றும் இயற்கை இனிப்பு: நாவில் கரையும் சுவையான வெள்ளை சாக்லேட் அனுபவத்தை வழங்குகிறது.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் 1 அல்லது 2 சாக்லேட் துண்டுகளை சிற்றுண்டியாகவோ அல்லது உணவுக்குப் பின்போ சாப்பிடலாம்.\n" .
                           "• சிறந்த பலன்களுக்கு: ரத்த சோகை உள்ளவர்கள் தொடர்ந்து 3 முதல் 4 வாரங்கள் உட்கொள்ளவும்.\n" .
                           "• யாருக்கெல்லாம் ஏற்றது: வளரும் குழந்தைகள், ரத்த சோகை உள்ள பெண்கள், கர்ப்பிணிகள், பாலூட்டும் தாய்மார்கள் மற்றும் டார்க் சாக்லேட் விரும்பாத அனைவருக்கும் மிகச் சிறந்தது.",
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
            $this->command?->info("Updated existing VeaChoc White Chocolate RakthaPushti (#{$product->id}) with full multilingual content.");
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VCH-RKP-WHT-CHOC-10',
                'price' => 299.00,
                'sale_price' => 295.00,
                'stock_quantity' => 50,
                'unit_size' => '10 PCs',
                'badge' => 'Iron & Vitamin C Rich',
                'featured_image' => 'https://yuvann.com/storage/products/fc4e00a3-e2ff-4242-ba2f-fb1070734da4.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 6,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            $this->command?->info("Created new VeaChoc White Chocolate RakthaPushti (#{$product->id}) with full multilingual content.");
        }

        // Attach targeted body care areas: Whole Body, Head & Mind
        $bodyPartSlugs = ['whole-body', 'head'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }
    }
}
