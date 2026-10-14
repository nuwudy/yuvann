<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VanatheeramRawForestHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Raw Forest Honey (500ml) and full 4-language translations.
     */
    public function run(): void
    {
        $slug = 'vanatheeram-raw-forest-honey-500ml';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'VAN-HNY-500ML')
            ->orWhere('slug', 'like', '%vanatheeram%honey%')
            ->orWhere('name', 'like', '%Vanatheeram%Honey%')
            ->get();

        $enTitle = 'Vanatheeram® Raw Forest Honey – 100% Pure & Natural Wild Honey (500ml)';
        $enShortDesc = '100% pure, unheated, unprocessed raw wild forest honey traditionally gathered by indigenous Wayanad tribal honey hunters. Packed with living enzymes, pollen, and natural antioxidants for immune defense, digestive wellness, and daily vitality.';

        $enBenefits = "• 100% Raw, Unprocessed & Unheated: Sourced from deep virgin forest canopies of Wayanad; never pasteurized, ultra-filtered, or adulterated with sugar syrups or preservatives.\n" .
                      "• Natural Immunity & Energy Booster: Rich in bioavailable bee pollen, trace minerals, and natural simple sugars (fructose and glucose) that deliver sustained stamina without blood sugar spikes.\n" .
                      "• Soothes Cough, Cold & Sore Throat: Natural antibacterial and anti-inflammatory properties coat and soothe irritated throat mucosal linings and loosen stubborn seasonal congestion.\n" .
                      "• Promotes Digestion & Weight Management: Stimulates digestive metabolism and gently cleanses the gut when consumed with warm water and lemon on an empty stomach.\n" .
                      "• Nutrient-Dense Natural Sweetener: Delicious, low-glycemic, enzyme-rich alternative to refined white sugar for milk, warm herbal teas, juices, and desserts.\n" .
                      "• Therapeutic Skin Care: Natural humectant and antiseptic that can be applied directly on minor skin cuts or blended with turmeric for a radiant herbal face pack.\n" .
                      "• Direct Tribal Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), providing sustainable forest livelihoods to Wayanad tribal families.";

        $enIngredients = "• 100% Pure Raw Wild Forest Honey (Apis dorsata / Wild Honeybee Nectar): Unpasteurized, unfiltered, wild multi-floral raw honey. Zero added sugar, zero preservatives, zero artificial coloring or flavoring.";

        $enUsage = "• Daily Morning Detox & Weight Management: Stir 1 tablespoon of raw honey and 1/2 freshly squeezed lemon juice into a glass of lukewarm water. Drink on an empty stomach every morning.\n" .
                   "• Restful Sleep & Night Immunity: Mix 1 teaspoon of raw honey into a cup of lukewarm milk before bedtime.\n" .
                   "• Cold & Cough Relief: Blend 1 teaspoon honey with 1/4 tsp dry ginger powder (chukku), 1/4 tsp crushed black pepper, and 1 tsp fresh tulsi juice. Take twice daily.\n" .
                   "• Important Nutritional Rule: Never boil or cook honey directly. Always wait for tea, coffee, or milk to cool to a lukewarm temperature (below 40°C) before adding honey to safeguard living enzymes.\n" .
                   "• Culinary Use: Drizzle over warm dosas, chapatis, toast, oatmeal, yogurt bowls, and smoothies. For children above 1 year, 1 teaspoon daily.\n" .
                   "• Natural Face Glow Pack: Mix 1 teaspoon of raw honey with a pinch of wild turmeric powder. Apply to face for 15 minutes, then rinse with lukewarm water.\n" .
                   "• Storage Instructions: Store at room temperature in a dry place with the lid tightly closed. Do not refrigerate. Crystallization is proof of genuine raw honey; if crystallized, immerse the sealed bottle in a bowl of warm water for 5 minutes to restore liquid consistency.";

        $mlTitle = 'വനതീരം® റോ ഫോറസ്റ്റ് ഹണി – 100% ശുദ്ധമായ കാട്ടുതേൻ (500ml)';
        $mlShortDesc = 'വയനാട്ടിലെ വനങ്ങളിൽ നിന്ന് ഗോത്രവർഗ്ഗക്കാർ പരമ്പരാഗതമായി ശേഖരിച്ച 100% ശുദ്ധമായ പ്രകൃതിദത്ത കാട്ടുതേൻ. ചൂടാക്കാത്തതും പ്രിസർവേറ്റീവുകളോ പഞ്ചസാരയോ ചേർക്കാത്തതുമായ ഉത്തമ ഔഷധ അമൃത്.';

        $mlBenefits = "• 100% ശുദ്ധമായ റോ ഫോറസ്റ്റ് ഹണി: യാതൊരുവിധ സംസ്കരണങ്ങളോ കൃത്രിമ ചൂടാക്കലോ ഇല്ലാതെ കാടുകളിൽ നിന്ന് നേരിട്ട് ശേഖരിക്കുന്ന അസ്സൽ തേൻ; തേനീച്ചയുടെ സ്വാഭാവിക പൂമ്പൊടിയും എൻസൈമുകളും പൂർണ്ണമായി നിലനിൽക്കുന്നു.\n" .
                      "• രോഗപ്രതിരോധശേഷിയും ഉന്മേഷവും: ശരീരത്തിന് ഉടനടി ഊർജ്ജവും സ്വാഭാവിക രോഗപ്രതിരോധ ശേഷിയും നൽകുന്ന പോഷകങ്ങളുടെ കലവറ.\n" .
                      "• ചുമ, കഫക്കെട്ട്, തൊണ്ടവേദന എന്നിവയ്ക്ക് ഉത്തമം: തൊണ്ടയിലെ അണുബാധകളെ തടയാനും വരണ്ട ചുമയ്ക്കും കഫക്കെട്ടിനും ശമനം നൽകാനും സഹായിക്കുന്നു.\n" .
                      "• ദഹനത്തിനും അമിതവണ്ണം കുറയ്ക്കാനും: രാവിലെ ചെറുചൂടുവെള്ളത്തിലും ചെറുനാരങ്ങാനീരിലും ചേർത്ത് കുടിക്കുന്നത് ദഹനം മെച്ചപ്പെടുത്താനും കൊഴുപ്പ് കത്തിക്കാനും സഹായിക്കുന്നു.\n" .
                      "• പഞ്ചസാരയ്ക്ക് മികച്ച പ്രകൃതിദത്ത ബദൽ: ചായ, കാപ്പി, പലഹാരങ്ങൾ എന്നിവയിൽ വെളുത്ത പഞ്ചസാരയ്ക്ക് പകരം ഉപയോഗിക്കാവുന്ന ഏറ്റവും ആരോഗ്യകരമായ മധുരം.\n" .
                      "• ചർമ്മ സംരക്ഷണത്തിന്: പ്രകൃതിദത്ത ആന്റിബാക്ടീരിയൽ ഗുണങ്ങളുള്ളതിനാൽ മുഖത്തെ പാടുകൾ മാറ്റാൻ മഞ്ഞൾ ചേർത്തും ചെറിയ മുറിവുകളിൽ നേരിട്ടും പുരട്ടാം.\n" .
                      "• ഗോത്രവിഭാഗങ്ങൾക്ക് കരുതൽ: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വയനാട്ടിലെ ആദിവാസി കുടുംബങ്ങൾക്ക് ന്യായമായ വരുമാനവും സ്വാശ്രയത്വവും നൽകുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത വന്യ കാട്ടുതേൻ (Raw Forest Honey). പഞ്ചസാരയോ രാസവസ്തുക്കളോ കൃത്രിമ നിറങ്ങളോ ചേർക്കാത്തത്.";

        $mlUsage = "• ശരീരഭാരം കുറയ്ക്കാനും ഉന്മേഷത്തിനും: രാവിലെ വെറുംവയറ്റിൽ 1 ഗ്ലാസ് ഇളംചൂടുവെള്ളത്തിൽ 1 ടേബിൾസ്പൂൺ തേനും പകുതി നാരങ്ങാനീരും ചേർത്ത് കുടിക്കുക.\n" .
                   "• നല്ല ഉറക്കത്തിന്: രാത്രി കിടക്കുന്നതിന് മുമ്പ് 1 ടീസ്പൂൺ തേൻ ഇളം ചൂടുപാലിൽ ചേർത്ത് കഴിക്കുക.\n" .
                   "• ചുമയ്ക്കും ജലദോഷത്തിനും: 1 ടീസ്പൂൺ തേനിൽ കാൽ ടീസ്പൂൺ ചുക്കുപൊടിയും കാൽ ടീസ്പൂൺ കുരുമുളകുപൊടിയും തുളസിനീരും ചേർത്ത് ദിവസവും 2 നേരം കഴിക്കുക.\n" .
                   "• ശ്രദ്ധിക്കുക: തേൻ ഒരിക്കലും നേരിട്ട് തിളപ്പിക്കുകയോ തിളച്ച വെള്ളത്തിലോ ചായയിലോ ഒഴിക്കുകയോ ചെയ്യരുത്. ചൂട് കുറഞ്ഞ് ഇളംചൂടായ ശേഷം മാത്രം തേൻ ചേർക്കുക.\n" .
                   "• ഭക്ഷണത്തിൽ: ബ്രെഡ്, ദോശ, ചപ്പാത്തി എന്നിവയിൽ പുരട്ടാം. സാലഡ്, തൈര്, സ്മൂത്തി എന്നിവയിൽ പഞ്ചസാരയ്ക്ക് പകരം ചേർക്കാം. 1 വയസ്സിന് മുകളിലുള്ള കുട്ടികൾക്ക് ദിവസവും 1 ടീസ്പൂൺ നൽകാം.\n" .
                   "• ചർമ്മത്തിന്: തേനും കസ്തൂരിമഞ്ഞളും ചാലിച്ച് മുഖത്ത് പുരട്ടി 15 മിനിറ്റിനു ശേഷം കഴുകിക്കളയുക. ചെറിയ മുറിവുകളിൽ നേരിട്ട് പുരട്ടാം.\n" .
                   "• സൂക്ഷിക്കേണ്ട വിധം: ഫ്രിഡ്ജിൽ സൂക്ഷിക്കരുത്. അടച്ചു ഈർപ്പമില്ലാത്ത സ്ഥലത്ത് വയ്ക്കുക. തണുപ്പുകാലത്ത് തേൻ കട്ടപിടിക്കുന്നത് സ്വാഭാവികമാണ്; കുപ്പി 5 മിനിറ്റ് ചെറുചൂടുവെള്ളത്തിൽ ഇറക്കിവച്ചാൽ വീണ്ടും പഴയ രൂപത്തിലാകും.";

        $hiTitle = 'वनतीरम® रॉ फॉरेस्ट हनी – 100% शुद्ध एवं प्राकृतिक जंगली शहद (500ml)';
        $hiShortDesc = 'वायनाड के घने जंगलों से आदिवासी समुदायों द्वारा पारंपरिक रूप से एकत्रित 100% शुद्ध, असंसाधित और बिना गर्म किया हुआ प्राकृतिक जंगली शहद। प्राकृतिक एंजाइम, परागकण और इम्युनिटी बूस्टर गुणों से भरपूर।';

        $hiBenefits = "• 100% कच्चा, असंसाधित एवं प्राकृतिक: बिना किसी पाश्चुरीकरण, अल्ट्रा-फ़िल्ट्रेशन या कृत्रिम चीनी के सीधे जंगलों से निकाला गया शुद्ध शहद।\n" .
                      "• रोग प्रतिरोधक क्षमता और ऊर्जा का स्रोत: प्राकृतिक एंटीऑक्सीडेंट्स और जीवित एंजाइमों से भरपूर, जो शरीर को तुरंत सक्रियता और रोगों से लड़ने की शक्ति प्रदान करता है।\n" .
                      "• खांसी, जुकाम और गले की खराश में असरदार: गले के संक्रमण को शांत करता है और मौसमी कफ से तुरंत आराम दिलाता है।\n" .
                      "• पाचन और वजन नियंत्रण: सुबह खाली पेट गुनगुने पानी और नींबू के साथ सेवन करने से मेटाबॉलिज्म तेज होता है और वजन घटाने में मदद मिलती है।\n" .
                      "• चीनी का सर्वोत्तम प्राकृतिक विकल्प: चाय, दूध और पेय पदार्थों में सफेद चीनी की जगह इस्तेमाल करने के लिए स्वास्थ्यवर्धक विकल्प।\n" .
                      "• त्वचा और घावों के लिए लाभकारी: चेहरे की चमक के लिए फेस पैक में या मामूली कटने-छिलने पर प्राकृतिक एंटीसेप्टिक के रूप में इस्तेमाल करें।\n" .
                      "• आदिवासी परिवारों का कल्याण: STTR के सहयोग से प्रत्येक खरीद सीधे वायनाड के जनजातीय परिवारों को उचित आजीविका प्रदान करती है।";

        $hiIngredients = "• 100% शुद्ध कच्चा जंगली शहद (Raw Forest Honey)। शून्य चीनी मिलावट, शून्य रसायन।";

        $hiUsage = "• वजन प्रबंधन एवं डिटॉक्स: रोज सुबह खाली पेट 1 गिलास गुनगुने पानी में 1 बड़ा चम्मच शहद और आधा नींबू मिलाकर पिएं।\n" .
                   "• अच्छी नींद और इम्युनिटी: रात को सोने से पहले 1 चम्मच शहद हल्के गुनगुने दूध में मिलाकर लें।\n" .
                   "• खांसी-जुकाम में: 1 चम्मच शहद में 1/4 चम्मच सोंठ, 1/4 चम्मच कुटी काली मिर्च और तुलसी का रस मिलाकर दिन में 2 बार लें।\n" .
                   "• महत्वपूर्ण नियम: शहद को कभी सीधे न उबालें और न ही खौलते हुए पेय में डालें। हमेशा गुनगुना होने पर ही मिलाएं।\n" .
                   "• त्वचा के लिए: 1 चम्मच शहद में चुटकी भर हल्दी मिलाकर चेहरे पर 15 मिनट लगाएं, फिर गुनगुने पानी से धो लें।\n" .
                   "• सुरक्षित रखने का तरीका: फ्रिज में न रखें। ठंडी व सूखी जगह पर ढक्कन बंद करके रखें। सर्दियों में जमना शुद्ध शहद की निशानी है; बोतल को 5 मिनट गुनगुने पानी में रखने से यह पुनः तरल हो जाता है।";

        $taTitle = 'வனதீரம்® ரா ஃபாரஸ்ட் ஹனி – 100% தூய இயற்கை காட்டுத் தேன் (500ml)';
        $taShortDesc = 'வயநாடு அடர்ந்த மலைக்காடுகளில் பழங்குடியின மக்களால் பாரம்பரிய முறைப்படி சேகரிக்கப்பட்ட 100% தூய, சூடாக்கப்படாத அசல் காட்டுத் தேன். இயற்கையான நொதிகள், நோய் எதிர்ப்பு சக்தி மற்றும் ஆரோக்கிய நன்மைகள் நிறைந்தது.';

        $taBenefits = "• 100% அசல், சூடாக்கப்படாத காட்டுத் தேன்: செயற்கை சர்க்கரை கலக்காமல், பாஸ்டுரைஸ் செய்யாமல் இயற்கையான நற்பண்புகளுடன் சேகரிக்கப்பட்டது.\n" .
                      "• உடனடி புத்துணர்ச்சியும் நோய் எதிர்ப்பு சக்தியும்: இயற்கை தாதுக்கள் மற்றும் தேனீ மகரந்த சத்துக்கள் நிறைந்து நாள் முழுவதும் சுறுசுறுப்பைத் தருகிறது.\n" .
                      "• இருமல், சளி மற்றும் தொண்டை கரகரப்புக்கு சிறந்த தீர்வு: தொண்டை அழற்சியை போக்கி சளியை எளிதில் வெளியேற்றுகிறது.\n" .
                      "• செரிமானம் மற்றும் உடல் எடை குறைப்பு: காலையில் மிதமான வெந்நீரில் எலுமிச்சை சாற்றுடன் சேர்த்து குடிக்க உடல் கொழுப்பு கரையும்.\n" .
                      "• சர்க்கரைக்கு ஆரோக்கியமான மாற்று: வெள்ளை சர்க்கரைக்கு மாற்றாக பால், டீ, காபி மற்றும் ஜூஸ்களில் பயன்படுத்தலாம்.\n" .
                      "• சரும அழகு மற்றும் காயம் ஆற்றுதல்: தேன் மற்றும் மஞ்சள் கலந்து முகத்தில் தடவ முகம் பொலிவு பெறும்; சிறு காயங்களுக்கு சிறந்த கிருமிநாசினி.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR அமைப்பு மூலம் வயநாடு பழங்குடியின மக்களுக்கு நேரடி நியாயமான வருவாயை உறுதி செய்கிறது.";

        $taIngredients = "• 100% தூய காட்டுத் தேன் (Raw Forest Honey). சர்க்கரை அல்லது பதப்படுத்திகள் சேர்க்கப்படாதது.";

        $taUsage = "• எடை குறைப்பு & உடலை தூய்மைப்படுத்த: காலை வெறும் வயிற்றில் 1 டம்ளர் மிதமான வெந்நீரில் 1 மேசைக்கரண்டி தேன் மற்றும் எலுமிச்சை சாறு கலந்து பருகவும்.\n" .
                   "• ஆழ்ந்த உறக்கத்திற்கு: இரவில் படுக்கும் முன் 1 டீஸ்பூன் தேனை மிதமான பாலில் கலந்து குடிக்கவும்.\n" .
                   "• சளி மற்றும் இருமலுக்கு: 1 டீஸ்பூன் தேனில் சுக்குத்தூள், மிளகுத்தூள் மற்றும் துளசி சாறு கலந்து இருவேளை உட்கொள்ளவும்.\n" .
                   "• முக்கிய விதிமுறை: தேனை நேரடியாக கொதிக்க வைக்கக் கூடாது. பானங்கள் மிதமான சூட்டிற்கு வந்த பிறகே தேன் சேர்க்க வேண்டும்.\n" .
                   "• சருமத்திற்கு: தேனுடன் கஸ்தூரி மஞ்சள் கலந்து 15 நிமிடங்கள் முகத்தில் பூசி கழுவினால் முகம் பளபளக்கும்.\n" .
                   "• சேமிக்கும் முறை: பிரிட்ஜில் வைக்க வேண்டாம். காற்றுப்புகாத பாத்திரத்தில் வைக்கவும். குளிர்காலத்தில் தேன் உறைவது அதன் அசல் தன்மையைக் காட்டுகிறது; வெதுவெதுப்பான நீரில் பாட்டிலை 5 நிமிடங்கள் வைத்தால் பழைய நிலைக்கு வந்துவிடும்.";

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
                'name' => $mlTitle,
                'short_description' => $mlShortDesc,
                'benefits' => $mlBenefits,
                'ingredients' => $mlIngredients,
                'usage' => $mlUsage,
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => $hiTitle,
                'short_description' => $hiShortDesc,
                'benefits' => $hiBenefits,
                'ingredients' => $hiIngredients,
                'usage' => $hiUsage,
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => $taTitle,
                'short_description' => $taShortDesc,
                'benefits' => $taBenefits,
                'ingredients' => $taIngredients,
                'usage' => $taUsage,
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $digestionPart = BodyPart::where('slug', 'digestion')->first();
        $chestPart = BodyPart::where('slug', 'chest')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $skinPart = BodyPart::where('slug', 'skin')->first();
        $bodyPartIds = collect([$digestionPart?->id, $chestPart?->id, $wholeBodyPart?->id, $skinPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-raw-forest-honey-500ml.png';
        $galleryImages = [
            '/images/products/vanatheeram-raw-forest-honey-500ml.png',
        ];

        $honeyCategory = Category::where('slug', 'honey-preserves')->first();
        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $sweetenersCategory = Category::where('slug', 'natural-sweeteners')->first();
        $categoryIds = collect([$honeyCategory?->id, $superfoodsCategory?->id, $sweetenersCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'name' => $enTitle,
                    'short_description' => $enShortDesc,
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                    'price' => 380.00,
                    'sale_price' => 340.00,
                    'unit_size' => '500ml',
                    'featured_image' => $featuredImagePath,
                    'gallery_images' => $galleryImages,
                    'badge' => '100% Organic • Raw Forest Honey',
                    'is_active' => true,
                    'is_featured' => true,
                ]);

                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                if (!empty($categoryIds)) {
                    $product->categories()->syncWithoutDetaching($categoryIds);
                }

                $this->command?->info("Updated Vanatheeram Raw Forest Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'VAN-HNY-500ML',
                'price' => 380.00,
                'sale_price' => 340.00,
                'stock_quantity' => 100,
                'unit_size' => '500ml',
                'badge' => '100% Organic • Raw Forest Honey',
                'featured_image' => $featuredImagePath,
                'gallery_images' => $galleryImages,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 5,
                'is_free_shipping' => false,
                'translations' => $translations,
            ]);

            if (!empty($categoryIds)) {
                $product->categories()->syncWithoutDetaching($categoryIds);
            }
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }

            $this->command?->info("Created new Vanatheeram Raw Forest Honey product (#{$product->id}) with full 4-language translations.");
        }
    }
}
