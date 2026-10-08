<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VeachocRakthapushtiDarkChocolateTranslationSeeder extends Seeder
{
    /**
     * Seed VeaChoc RakthaPushti Dark Chocolate details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'veachoc-rakthapushti-dark-chocolate-iron-vitamin-c-blood-builder-supplement';

        $product = Product::where('slug', $slug)
            ->orWhere('slug', 'like', '%veachoc-rakthapushti-dark%')
            ->orWhere('sku', 'VCH-RKP-DRK-CHOC-10')
            ->first();

        $enTitle = 'VeaChoc RakthaPushti Dark Chocolate – Iron & Vitamin C Blood Builder Supplement (10 PCs)';
        $enShortDesc = 'Delicious artisan dark chocolate infused with plant-based iron, Vitamin C, dry fruits, and nutrient-dense seeds to support hemoglobin formation, boost memory, and combat daily fatigue naturally.';

        $enBenefits = "• Enhances Hemoglobin & Combats Anemia: Rich in bioavailable dietary iron that supports healthy red blood cell production, improves oxygen delivery, and eliminates lethargy.\n" .
                      "• Synergistic Vitamin C for Maximum Iron Uptake: Naturally infused with Vitamin C to dramatically accelerate intestinal iron absorption without constipation or stomach upset.\n" .
                      "• Brain Function & Cognitive Alertness: Flavanol-rich dark cocoa combined with nutrient-rich nuts promotes cerebral blood flow, sharpens focus, and reduces mental brain fog.\n" .
                      "• Guilt-Free Functional Superfood: Satisfies sweet cravings while delivering essential minerals (zinc, copper, magnesium) and rich antioxidants.\n" .
                      "• Gentle on Digestion: Crafted without heavy chemical additives or metallic aftertaste; pleasant, delicious, and child-approved daily supplementation.";

        $enIngredients = "• Premium Cocoa Mass & Butter (Theobroma cacao): Polyphenol-rich antioxidant core that enhances mood, cardiovascular tone, and microcirculation.\n" .
                         "• Natural Hematinic Iron Complex: Plant-sourced dietary iron that directly supports erythrocyte and hemoglobin synthesis.\n" .
                         "• Vitamin C (Ascorbic Acid from Natural Fruit Sources): Critical co-factor that triples natural non-heme iron bioavailability in the gut.\n" .
                         "• Handpicked Dry Fruits & Nuts (Almonds & Raisins): Dense in vitamin E, healthy fats, and potassium for cellular vitality and nerve nourishment.\n" .
                         "• Superfood Seeds (Pumpkin & Sunflower Seeds): Natural sources of zinc, magnesium, and essential omega fatty acids.\n" .
                         "• Traditional Natural Sweetener: Smoothly tempered to deliver a luxurious, rich dark chocolate taste profile.";

        $enUsage = "• Daily Nutritional Treat: Enjoy 1 to 2 pieces daily, preferably mid-morning or as an afternoon revitalization snack.\n" .
                   "• For Anemia & Energy Support: Consume consistently for 3 to 4 weeks alongside a balanced diet to notice visible improvements in stamina and vitality.\n" .
                   "• Ideal For All Ages: Perfect for growing children, menstruating or pregnant women, fitness enthusiasts, and anyone struggling with iron deficiency.";

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
                'name' => 'വിയാചോക്ക് രക്തപുഷ്ടി ഡാർക്ക് ചോക്ലേറ്റ് – അയൺ & വിറ്റാമിൻ സി ബ്ലഡ് ബിൽഡർ (10 എണ്ണം)',
                'short_description' => 'സ്വാഭാവിക ഇരുമ്പ് സത്ത് (അയൺ), വിറ്റാമിൻ സി, നട്സുകൾ, സീഡുകൾ എന്നിവ ചേർത്ത 100% സ്വാദിഷ്ടവും പോഷകസമൃദ്ധവുമായ ഡാർക്ക് ചോക്ലേറ്റ്. ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കാനും ക്ഷീണം അകറ്റാനും ഉത്തമം.',
                'benefits' => "• ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിച്ച് വിളർച്ച തടയുന്നു: രക്തത്തിലെ ഹീമോഗ്ലോബിന്റെ അളവ് സ്വാഭാവികമായി വർദ്ധിപ്പിക്കാനും ശരീരത്തിന് ഊർജ്ജം നൽകാനും സഹായിക്കുന്ന സസ്യജന്യ അയൺ അടങ്ങിയിരിക്കുന്നു.\n" .
                              "• വിറ്റാമിൻ സി ചേർന്ന മികച്ച ആഗിരണം: അയൺ ശരീരത്തിൽ വേഗത്തിൽ ആഗിരണം ചെയ്യപ്പെടാൻ ആവശ്യമായ പ്രകൃതിദത്ത വിറ്റാമിൻ സി അടങ്ങിയിരിക്കുന്നതിനാൽ പാർശ്വഫലങ്ങളോ മലബന്ധമോ ഉണ്ടാക്കുന്നില്ല.\n" .
                              "• ബുദ്ധിശക്തിയും ഏകാഗ്രതയും മെച്ചപ്പെടുത്തുന്നു: കൊക്കോയും നട്സുകളും മസ്തിഷ്കത്തിലേക്കുള്ള രക്തയോട്ടം മെച്ചപ്പെടുത്തുകയും ഓർമ്മശക്തിയും ഉന്മേഷവും വർദ്ധിപ്പിക്കുകയും ചെയ്യുന്നു.\n" .
                              "• ആരോഗ്യകരമായ സൂപ്പർഫുഡ് ചോക്ലേറ്റ്: മധുരത്തോടുള്ള ആഗ്രഹം ശമിപ്പിക്കുന്നതിനൊപ്പം സിങ്ക്, മഗ്നീഷ്യം, ആന്റിഓക്‌സിഡന്റുകൾ തുടങ്ങിയ അവശ്യ ധാതുക്കൾ ശരീരത്തിന് സമ്മാനിക്കുന്നു.\n" .
                              "• ദഹനത്തിന് എളുപ്പവും സ്വാദിഷ്ടവും: കുട്ടികൾക്കും മുതിർന്നവർക്കും ഒരുപോലെ ഇഷ്ടപ്പെടുന്ന വിധത്തിൽ ലോഹരുചിയോ രാസവസ്തുക്കളോ ഇല്ലാതെ തയ്യാറാക്കിയത്.",
                'ingredients' => "• പ്രീമിയം കൊക്കോ മാസ് & കൊക്കോ ബട്ടർ (Cocoa): ഹൃദയാരോഗ്യത്തിനും ഉന്മേഷത്തിനും സഹായിക്കുന്ന ഫ്ലേവനോയിഡുകൾ അടങ്ങിയ ശുദ്ധ കൊക്കോ.\n" .
                                 "• ഹെമാറ്റിനിക് അയൺ കോംപ്ലക്സ് (Plant Iron): ഹീമോഗ്ലോബിൻ ഉത്പാദനത്തിന് നേരിട്ട് സഹായിക്കുന്ന പ്രകൃതിദത്ത അയൺ.\n" .
                                 "• സ്വാഭാവിക വിറ്റാമിൻ സി (Vitamin C): കുടലിൽ ഇരുമ്പിന്റെ ആഗിരണം മൂന്നിരട്ടിയാക്കുന്ന പ്രകൃതിദത്ത വിറ്റാമിൻ സി ഘടകങ്ങൾ.\n" .
                                 "• തിരഞ്ഞെടുക്കപ്പെട്ട നട്സുകൾ (ബദാം & ഉണക്കമുന്തിരി): വിറ്റാമിൻ ഇ, പ്രോട്ടീൻ, പൊട്ടാസ്യം എന്നിവയാൽ സമ്പന്നം.\n" .
                                 "• പോഷക വിത്തുകൾ (മത്തൻ വിത്ത് & സൂര്യകാന്തി വിത്ത്): സിങ്കും നല്ല കൊഴുപ്പുകളും നൽകുന്ന സൂപ്പർഫുഡ് സീഡുകൾ.",
                'usage' => "• ദിവസേന കഴിക്കേണ്ട വിധം: ദിവസവും 1 അല്ലെങ്കിൽ 2 ചോക്ലേറ്റ് കഷ്ണങ്ങൾ ലഘുഭക്ഷണമായോ ഉച്ചതിരിഞ്ഞോ കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: രക്തക്കുറവും ക്ഷീണവുമുള്ളവർ കുറഞ്ഞത് 3-4 ആഴ്ച തുടർച്ചയായി ഉപയോഗിക്കുക.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: വിളർച്ചയുള്ള സ്ത്രീകൾക്കും പഠിക്കുന്ന കുട്ടികൾക്കും ഗർഭിണികൾക്കും മുലയൂട്ടുന്ന അമ്മമാർക്കും പ്രായമായവർക്കും തികച്ചും സുരക്ഷിതമായ പോഷകാഹാരം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वियाचॉक रक्तपुष्टि डार्क चॉकलेट – आयरन और विटामिन सी ब्लड बिल्डर (10 पीस)',
                'short_description' => 'प्राकृतिक आयरन, विटामिन सी, मेवों और बीजों से भरपूर स्वादिष्ट आर्टिसन डार्क चॉकलेट। हीमोग्लोबिन बढ़ाने, याददाश्त तेज करने और दैनिक थकान दूर करने में अत्यंत असरदार।',
                'benefits' => "• हीमोग्लोबिन स्तर में तेजी से वृद्धि: शरीर में लाल रक्त कोशिकाओं का निर्माण कर एनीमिया और सुस्ती को दूर भगाता है।\n" .
                              "• विटामिन सी युक्त श्रेष्ठ अवशोषण: विटामिन सी आयरन को पेट में तेजी से अवशोषित करता है, जिससे कब्ज या पेट दर्द की समस्या नहीं होती।\n" .
                              "• मस्तिष्क स्वास्थ्य और एकाग्रता: कोको और बादाम दिमाग की नसों को पोषण देकर याददाश्त और फोकस को बढ़ाते हैं।\n" .
                              "• गिल्ट-फ्री पौष्टिक चॉकलेट: मीठे की तलब को मिटाने के साथ-साथ जिंक, मैग्नीशियम और एंटीऑक्सीडेंट्स की दैनिक पूर्ति करता है।\n" .
                              "• बच्चों और बड़ों का पसंदीदा स्वाद: बिना किसी कड़वे या धातुई स्वाद के, अत्यंत स्वादिष्ट और सुरक्षित पूरक आहार।",
                'ingredients' => "• प्रीमियम डार्क कोको (Cocoa): एंटीऑक्सीडेंट्स और पॉलीफेनॉल्स से भरपूर, जो मूड और रक्तसंचार को बेहतर बनाता है।\n" .
                                 "• प्राकृतिक पादप आयरन (Plant Iron): हीमोग्लोबिन संश्लेषण को सीधे बढ़ावा देने वाला सुपाच्य आयरन।\n" .
                                 "• प्राकृतिक विटामिन सी (Vitamin C): आंतों में आयरन के अवशोषण को 3 गुना बढ़ाने वाला आवश्यक तत्व।\n" .
                                 "• सूखे मेवे (बादाम और किशमिश): स्वस्थ वसा, विटामिन ई और प्राकृतिक मिठास का स्रोत।\n" .
                                 "• कद्दू और सूरजमुखी के बीज (Seeds): जिंक और मैग्नीशियम से भरपूर सुपरफूड बीज।",
                'usage' => "• सेवन विधि: प्रतिदिन 1 से 2 पीस चॉकलेट का आनंद लें, दोपहर के समय या स्नैक के रूप में।\n" .
                           "• खून की कमी के लिए: बेहतर हीमोग्लोबिन स्तर के लिए 3 से 4 सप्ताह तक नियमित सेवन करें।\n" .
                           "• पूरे परिवार के लिए: बढ़ती उम्र के बच्चों, महिलाओं, गर्भवती माताओं और बुजुर्गों के लिए पूरी तरह सुरक्षित।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வியாச்சாக் ரத்தபுஷ்டி டார்க் சாக்லேட் – இரும்புச்சத்து & வைட்டமின் சி பிளட் பில்டர் (10 துண்டுகள்)',
                'short_description' => 'இயற்கை இரும்புச்சத்து, வைட்டமின் சி, உலர் பழங்கள் மற்றும் சத்து விதைகளால் தயாரிக்கப்பட்ட சுவையான டார்க் சாக்லேட். ரத்த சோகையை போக்கி, நினைவாற்றலை பெருக்கும் ஆரோக்கிய சத்துணவு.',
                'benefits' => "• ரத்தத்தில் ஹீமோகுளோபின் அளவை உயர்த்துகிறது: இரும்புச்சத்து ரத்த சிவப்பணுக்களின் உற்பத்தியை அதிகரித்து அசதி மற்றும் பலவீனத்தை போக்குகிறது.\n" .
                              "• வைட்டமின் சி உடனான முழுமையான உறிஞ்சுதல்: வைட்டமின் சி இரும்புச்சத்தை உடல் உடனடியாக கிரகித்துக் கொள்ள உதவுகிறது; மலச்சிக்கல் உண்டாகாது.\n" .
                              "• மூளை வளர்ச்சி மற்றும் நினைவாற்றல்: டார்க் கோகோ மற்றும் பாதாம் மூளைக்கு செல்லும் ரத்த ஓட்டத்தை சீராக்கி கவனத்தை கூர்மையாக்குகிறது.\n" .
                              "• ஆரோக்கியமான சூப்பர்ஃபுட் சாக்லேட்: சத்துக்கள் நிறைந்த சுவையான ஆரோக்கிய மிட்டாய் வடிவில் ஜிங்க், மெக்னீசியம் மற்றும் ஆன்டி-ஆக்ஸிடன்ட்கள் கிடைக்கிறது.\n" .
                              "• எளிதில் செரிமானமாகும் சுவையான வடிவம்: கசப்பு அல்லது ரசாயன சுவையின்றி குழந்தைகள் முதல் பெரியவர்கள் வரை அனைவரும் விரும்பி உண்ணும் வடிவம்.",
                'ingredients' => "• உயர் ரக கோகோ (Cocoa): ரத்த நாளங்களை பாதுகாக்கும் இயற்கை ஆன்டி-ஆக்ஸிடன்ட் கோகோ.\n" .
                                 "• தாவர வழி இரும்புச்சத்து (Plant Iron): ஹீமோகுளோபின் வளர்ச்சிக்கு உதவும் தூய இரும்புச்சத்து.\n" .
                                 "• இயற்கை வைட்டமின் சி (Vitamin C): இரும்புச்சத்தை குடல் எளிதாக உறிஞ்ச உதவும் அத்தியாவசிய வைட்டமின்.\n" .
                                 "• உலர் பழங்கள் (பாதாம் & உலர் திராட்சை): வைட்டமின் ஈ மற்றும் பொட்டாசியம் நிறைந்த இயற்கை நட்ஸ்.\n" .
                                 "• பூசணி மற்றும் சூரியகாந்தி விதைகள் (Superfood Seeds): ஜிங்க் மற்றும் நல்ல கொழுப்பு அமிலங்கள் நிறைந்த விதைகள்.",
                'usage' => "• பயன்பாட்டு முறை: தினமும் 1 அல்லது 2 சாக்லேட் துண்டுகளை சிற்றுண்டியாகவோ அல்லது உணவுக்குப் பின்போ சுவைத்து சாப்பிடலாம்.\n" .
                           "• ரத்த சோகை உள்ளவர்கள்: சிறந்த பலன்களுக்கு தொடர்ந்து 3 முதல் 4 வாரங்கள் உட்கொள்ளவும்.\n" .
                           "• குடும்பத்தில் உள்ள அனைவருக்கும்: ரத்த சோகையால் பாதிக்கப்படும் பெண்கள், வளரும் குழந்தைகள், பெரியவர்களுக்கு மிகவும் சிறந்தது.",
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
            $this->command?->info("Updated existing VeaChoc RakthaPushti Dark Chocolate (#{$product->id}) with full multilingual content.");
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VCH-RKP-DRK-CHOC-10',
                'price' => 299.00,
                'sale_price' => 295.00,
                'stock_quantity' => 50,
                'unit_size' => '10 PCs',
                'badge' => 'Iron & Vitamin C Rich',
                'featured_image' => 'https://yuvann.com/storage/products/cb7c2e61-02e4-4988-afff-d8f4c6c17151.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 5,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            $this->command?->info("Created new VeaChoc RakthaPushti Dark Chocolate (#{$product->id}) with full multilingual content.");
        }

        // Attach targeted body care areas: Whole Body, Head & Mind
        $bodyPartSlugs = ['whole-body', 'head'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }
    }
}
