<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class EatbestBlackRiceKanjiMixTranslationSeeder extends Seeder
{
    /**
     * Seed Eatbest Black Rice Kanji Mix product details and full 4-language translations.
     */
    public function run(): void
    {
        $slug = 'eatbest-black-rice-kanji-mix';

        $product = Product::where('slug', $slug)
            ->orWhere('slug', 'like', '%black-rice-kanji%')
            ->orWhere('sku', 'BR-GRN-250')
            ->first();

        $enTitle = 'Eatbest Black Rice Kanji Mix – 250g';
        $enShortDesc = 'Packed with immunity-boosting antioxidants, dietary fiber, and essential minerals, black rice is a nutrient-dense, heart-healthy grain that supports natural digestion and balanced blood sugar.';

        $enBenefits = "• High in Anthocyanin Antioxidants: The deep purple-black pigment contains potent anthocyanins (higher than blueberries), which neutralize free radicals, reduce oxidative stress, and protect cellular health.\n" .
                      "• Stabilizes Blood Sugar Levels: Rich in complex carbohydrates and low glycemic dietary fiber, helping prevent insulin spikes and providing sustained, steady metabolic energy.\n" .
                      "• Promotes Digestive Wellness & Gut Flora: Gentle on the stomach; prebiotic natural fibers nourish gut bacteria, soothe acid irritation, and relieve digestive sluggishness.\n" .
                      "• Heart Health & Cholesterol Support: Rich in phytochemicals and plant lignans that promote arterial health, support optimal circulation, and help balance lipid profiles.\n" .
                      "• Natural Detoxification & Liver Vitality: Ancient superfood known in Eastern traditions as 'Forbidden Rice' for its ability to flush internal toxins and support hepatic cleansing.";

        $enIngredients = "• Pure Indigenous Black Rice (Oryza sativa L. indica / Karuppu Kavuni): Heritage heirloom grain rich in anthocyanins, iron, zinc, and high-potency dietary fiber.\n" .
                         "• Traditional Healing Spices (Cumin & Black Pepper): Carminative spices (Deepana-Pachana) that enhance bioavailability, stimulate digestion, and eliminate ama (endotoxins).\n" .
                         "• Himalayan Pink Salt: Pure unrefined mineral salt that balances electrolytes and enhances natural flavor.";

        $enUsage = "• Traditional Kanji Preparation: Mix 2 to 3 tablespoons (30g) of Black Rice Kanji Mix with 300ml of water or thin buttermilk. Cook on a medium flame for 5–7 minutes, stirring continuously until it reaches a smooth porridge consistency.\n" .
                   "• Warm Healing Breakfast: Consume warm as an energizing, light morning meal. You may temper with a few drops of pure desi ghee or shallots for authentic traditional taste.\n" .
                   "• For Convalescence & Daily Health: Highly recommended for elderly recovery, fitness enthusiasts, diabetics, and those seeking gentle digestive restoration.";

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
                'name' => 'ഈറ്റ് ബെസ്റ്റ് ബ്ലാക്ക് റൈസ് കഞ്ഞി മിക്സ് – 250 ഗ്രാം',
                'short_description' => 'രോഗപ്രതിരോധശേഷി വർദ്ധിപ്പിക്കുന്ന ആന്റിഓക്‌സിഡന്റുകളും നാരുകളും ധാതുക്കളും സമൃദ്ധമായി അടങ്ങിയ കറുത്ത അരി (ബ്ലാക്ക് റൈസ്) കൊണ്ടുള്ള പാരമ്പര്യ ഔഷധ കഞ്ഞി മിക്സ്. ദഹനത്തിനും പ്രമേഹ നിയന്ത്രണത്തിനും ഉത്തമം.',
                'benefits' => "• ഉയർന്ന അളവിൽ ആന്തോസയാനിൻ ആന്റിഓക്‌സിഡന്റുകൾ: കറുത്ത അരിയിലെ അപൂർവ്വ വർണ്ണകമായ ആന്തോസയാനിൻ ശരീരത്തിലെ ഫ്രീ റാഡിക്കലുകളെ ചെറുത്ത് കോശങ്ങളുടെ ആരോഗ്യം സംരക്ഷിക്കുന്നു.\n" .
                              "• രക്തത്തിലെ പഞ്ചസാരയുടെ അളവ് ക്രമീകരിക്കുന്നു: കുറഞ്ഞ ഗ്ലൈസെമിക് ഇൻഡക്സും സങ്കീർണ്ണ കാർബോഹൈഡ്രേറ്റുകളും രക്തത്തിൽ പഞ്ചസാര പെട്ടെന്ന് ഉയരുന്നത് തടയുകയും ദീർഘനേരം വിശപ്പില്ലാതെ നിലനിർത്തുകയും ചെയ്യുന്നു.\n" .
                              "• ദഹനത്തിനും വയറിന്റെ ആരോഗ്യത്തിനും ഉത്തമം: സ്വാഭാവിക പ്രീബയോട്ടിക് നാരുകൾ വയറ്റിലെ അസിഡിറ്റിയും ഗ്യാസും ശമിപ്പിച്ച് കുടൽ ആരോഗ്യവും മലവിസർജ്ജനവും സുഗമമാക്കുന്നു.\n" .
                              "• ഹൃദയാരോഗ്യവും കൊളസ്ട്രോൾ നിയന്ത്രണവും: രക്തചംക്രമണം മെച്ചപ്പെടുത്താനും ചീത്ത കൊളസ്ട്രോൾ കുറയ്ക്കാനും സഹായിക്കുന്ന സസ്യഘടകങ്ങൾ അടങ്ങിയിരിക്കുന്നു.\n" .
                              "• ശരീര ശുദ്ധീകരണവും കരൾ ആരോഗ്യവും: 'രാജാക്കന്മാരുടെ അരി' (Forbidden Rice) എന്നറിയപ്പെടുന്ന കറുത്ത അരി ശരീരത്തിലെ വിഷാംശങ്ങളെ പുറന്തള്ളാൻ സഹായിക്കുന്നു.",
                'ingredients' => "• ശുദ്ധമായ കറുത്ത അരി (Karuppu Kavuni Rice): ആന്റിഓക്‌സിഡന്റുകളും ഇരുമ്പും സിങ്കും നാരുകളും നിറഞ്ഞ പരമ്പരാഗത ഔഷധ നെല്ലിനം.\n" .
                                 "• പരമ്പരാഗത ദഹന കൂട്ടുകൾ (ജീരകം & കുരുമുളക്): ദഹനശക്തി വർദ്ധിപ്പിക്കാനും ശരീരത്തിലെ വിഷാംശങ്ങളെ ഇല്ലാതാക്കാനും ഉതകുന്ന കൂട്ടുകൾ.\n" .
                                 "• ഇന്തുപ്പ് (Himalayan Rock Salt): സ്വാഭാവിക ധാതുക്കളടങ്ങിയ ഇന്തുപ്പ് ദഹനത്തിന് ഗുണകരമാണ്.",
                'usage' => "• കഞ്ഞി തയ്യാറാക്കുന്ന വിധം: 2-3 ടേബിൾസ്പൂൺ (30 ഗ്രാം) ബ്ലാക്ക് റൈസ് മിക്സ് 300 മില്ലി വെള്ളത്തിലോ മോരിലോ ചേർത്ത് കട്ടകെട്ടാതെ ഇളക്കുക. ചെറുതീയിൽ 5-7 മിനിറ്റ് കുറുക്കി എടുക്കുക.\n" .
                           "• പ്രഭാതഭക്ഷണമായി കഴിക്കാൻ: ഇളംചൂടോടെ രാവിലെ കഴിക്കുന്നത് ദിവസം മുഴുവൻ ഊർജ്ജം നൽകും. രുചിക്കായി അല്പം നാടൻ നെയ്യോ ചെറിയ ഉള്ളിയോ ചേർക്കാവുന്നതാണ്.\n" .
                           "• ആർക്കൊക്കെ അനുയോജ്യം: പ്രമേഹരോഗികൾക്കും ഉദരസംബന്ധമായ ബുദ്ധിമുട്ടുള്ളവർക്കും കായികതാരങ്ങൾക്കും പ്രായമായവർക്കും ദിവസേന കഴിക്കാവുന്ന മികച്ച സമീകൃതാഹാരം.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'ईटबेस्ट ब्लैक राइस कांजी मिक्स – 250 ग्राम',
                'short_description' => 'रोग प्रतिरोधक क्षमता बढ़ाने वाले एंटीऑक्सीडेंट्स, फाइबर और आवश्यक खनिजों से भरपूर काले चावल का पारंपरिक पौष्टिक कांजी (दलिया) मिक्स। पाचन और शुगर संतुलन के लिए श्रेष्ठ।',
                'benefits' => "• शक्तिशाली एंथोसायनिन एंटीऑक्सीडेंट्स: काले चावल का गहरा रंग शक्तिशाली एंटीऑक्सीडेंट्स से भरपूर है, जो कोशिकाओं की रक्षा करता है और उम्र बढ़ने की प्रक्रिया को धीमा करता है।\n" .
                              "• ब्लड शुगर को संतुलित रखे: कम ग्लाइसेमिक इंडेक्स और जटिल कार्बोहाइड्रेट्स इंसुलिन के स्तर को स्थिर रखते हैं और लगातार ऊर्जा प्रदान करते हैं।\n" .
                              "• पाचन तंत्र और आंतों के लिए वरदान: हल्का और सुपाच्य; पेट की जलन, गैस और कब्ज को शांत कर आंतों के बैक्टीरिया को पोषण देता है।\n" .
                              "• हृदय स्वास्थ्य और कोलेस्ट्रॉल नियंत्रण: धमनियों के स्वास्थ्य और रक्त परिसंचरण को सुगम बनाने वाले पोषक तत्वों से भरपूर।\n" .
                              "• प्राकृतिक डिटॉक्सिफिकेशन: प्राचीन काल में 'निषिद्ध चावल' (Forbidden Rice) के नाम से प्रसिद्ध, जो लिवर को डिटॉक्स करने में मदद करता है।",
                'ingredients' => "• शुद्ध देसी काला चावल (Karuppu Kavuni Rice): एंटीऑक्सीडेंट्स, आयरन, जिंक और फाइबर से भरपूर पारंपरिक धान की किस्म।\n" .
                                 "• पाचक मसाले (जीरा और काली मिर्च): दीपन-पाचन गुण युक्त मसाले जो अवशोषण को तेज करते हैं।\n" .
                                 "• सेंधा नमक (Rock Salt): इलेक्ट्रोलाइट्स को संतुलित करने वाला प्राकृतिक खनिज लवण।",
                'usage' => "• कांजी बनाने की विधि: 2-3 चम्मच (30 ग्राम) ब्लैक राइस मिक्स को 300 मिली पानी या छाछ में मिलाएं। मध्यम आंच पर 5-7 मिनट तक लगातार चलाते हुए पकाएं।\n" .
                           "• गर्म स्वास्थ्यवर्धक नाश्ता: सुबह के समय हल्का गुनगुना पिएं। स्वाद के लिए थोड़ी देसी घी या भुने जीरे का तड़का लगा सकते हैं।\n" .
                           "• सभी के लिए उत्तम: डायबिटीज के मरीजों, बुजुर्गों और पेट की समस्याओं से जूझ रहे लोगों के लिए अत्यंत लाभकारी।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஈட்பெஸ்ட் கருப்பு கவுனி அரிசி கஞ்சி மிக்ஸ் – 250 கிராம்',
                'short_description' => 'நோய் எதிர்ப்பு சக்தியை அதிகரிக்கும் ஆன்டி-ஆக்ஸிடன்ட்கள், நார்ச்சத்து மற்றும் அத்தியாவசிய தாதுக்கள் நிறைந்த பாரம்பரிய கருப்பு கவுனி அரிசி கஞ்சி மிக்ஸ். செரிமானம் மற்றும் ரத்த சர்க்கரை சமநிலைக்கு சிறந்தது.',
                'benefits' => "• அதிக ஆந்தோசயனின் ஆன்டி-ஆக்ஸிடன்ட்கள்: கருப்பு கவுனி அரிசியில் உள்ள இயற்கை சத்துக்கள் உடலில் உள்ள நச்சுக்களை வெளியேற்றி செல்களை இளமையுடன் வைக்கிறது.\n" .
                              "• ரத்த சர்க்கரை அளவை கட்டுப்படுத்துகிறது: குறைவான கிளைசெமிக் குறியீடு கொண்டதால் சர்க்கரை நோயாளிகளுக்கு மிகச் சிறந்த ஆரோக்கிய உணவு.\n" .
                              "• சிறந்த செரிமானம் மற்றும் குடல் நலம்: எளிதில் செரிமானமாகி வயிற்றுப்புண், நெஞ்செரிச்சல் மற்றும் மலச்சிக்கலை குணப்படுத்துகிறது.\n" .
                              "• இதய ஆரோக்கியம்: கொலஸ்ட்ராலை குறைத்து ரத்த அழுத்தத்தை சீராக பராமரிக்க உதவுகிறது.\n" .
                              "• ராஜ உணவு / நச்சு நீக்கம்: மன்னர்கள் காலத்து பாரம்பரிய 'விலக்கப்பட்ட அரிசி' (Forbidden Rice); உடலின் உள் உறுப்புகளை இயற்கை முறையில் சுத்திகரிக்கிறது.",
                'ingredients' => "• தூய கருப்பு கவுனி அரிசி (Black Rice): பாரம்பரிய மருத்துவ குணம் கொண்ட இரும்புச்சத்து மற்றும் நார்ச்சத்து நிறைந்த பாரம்பரிய நெல் ரகம்.\n" .
                                 "• பாரம்பரிய சீரகக் கூட்டு (சீரகம் & மிளகு): பசியை தூண்டி நச்சுக்களை நீக்கும் செரிமான மூலிகைகள்.\n" .
                                 "• இந்துப்பு (Himalayan Rock Salt): செரிமானத்திற்கு ஏற்ற இயற்கை தாதுக்கள் நிறைந்த உப்பு.",
                'usage' => "• கஞ்சி தயாரிக்கும் முறை: 2 முதல் 3 தேக்கரண்டி (30 கிராம்) கருப்பு கவுனி மிக்ஸை 300 மி.லி தண்ணீர் அல்லது மோரில் கட்டியின்றி கரைத்து, மிதமான தீயில் 5-7 நிமிடங்கள் வேக வைக்கவும்.\n" .
                           "• சத்தான காலை உணவு: காலையில் வெதுவெதுப்பான கஞ்சியாக அருந்தவும். சுவைக்கு சிறிதளவு நெய் அல்லது சின்ன வெங்காயம் தாளித்து சேர்க்கலாம்.\n" .
                           "• அனைவருக்கும் ஏற்றது: சர்க்கரை நோயாளிகள், குழந்தைகள், பெரியவர்கள் மற்றும் உடல் நலம் தேறுபவர்களுக்கு சிறந்த ஊட்டச்சத்து கஞ்சி.",
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
            $this->command?->info("Updated existing Eatbest Black Rice Kanji Mix (#{$product->id}) with full multilingual content.");
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'BR-GRN-250',
                'price' => 310.00,
                'sale_price' => 295.00,
                'stock_quantity' => 50,
                'unit_size' => '250 gm',
                'badge' => 'Ancient Superfood',
                'featured_image' => 'https://yuvann.com/storage/products/f75ddcf8-43f2-46d0-b8da-9b79e5f6f4fd.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 4,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            $this->command?->info("Created new Eatbest Black Rice Kanji Mix product (#{$product->id}) with full multilingual content.");
        }

        // Attach targeted body care areas: Digestion & Gut, Whole Body
        $bodyPartSlugs = ['digestion', 'whole-body'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }
    }
}
