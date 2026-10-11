<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class SkinRichBloodPurifierSyrupTranslationSeeder extends Seeder
{
    /**
     * Seed Skin Rich Ayurvedic Blood Purifier Syrup (200ml) product and full 4-language translations.
     */
    public function run(): void
    {
        $slug = 'skin-rich-ayurvedic-blood-purifier-syrup-200ml';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'SKIN-RICH-200ML')
            ->orWhere('slug', 'like', '%skin-rich%')
            ->orWhere('name', 'like', '%Skin Rich%')
            ->get();

        $enTitle = 'Skin Rich Ayurvedic Blood Purifier Syrup – 200ml';
        $enShortDesc = 'Classical 100% Ayurvedic blood purifier syrup crafted with potent herbal botanicals like Manjistha, Neem, and Khadira to flush toxins, eliminate acne and blemishes, improve digestion, and reveal radiant, healthy glowing skin from within.';

        $enBenefits = "• Comprehensive Systemic Blood Purification: Eliminates accumulated internal metabolic toxins (Ama) from the bloodstream, rejuvenating blood cells and purifying the body from within.\n" .
                      "• Clears Acne, Pimples & Skin Blemishes: Helps prevent recurring acne breakouts, fades stubborn dark spots, and alleviates skin inflammation and allergies.\n" .
                      "• Restores Natural Skin Glow & Radiance: Promotes healthy peripheral micro-circulation to nourish dermal layers, leaving skin clear, smooth, and naturally luminous.\n" .
                      "• Relieves Constipation & Enhances Digestion: Aids natural bowel regularity, detoxifies the gastrointestinal tract, and improves liver and gut function.\n" .
                      "• Boosts Immunity & Cellular Defense: Packed with natural herbal antioxidants that fight oxidative damage and strengthen the immune defense against skin infections.\n" .
                      "• 100% Ayurvedic, Safe & Delicious: Delicious and healthy herbal syrup formulated with classical time-tested botanicals for daily rejuvenation without synthetic additives.";

        $enIngredients = "• Manjistha (Rubia cordifolia): Renowned Ayurvedic blood purifier that dispels sluggish toxins, clarifies pigmentation, and enhances complexion.\n" .
                         "• Khadira (Acacia catechu): Classical skin-protective tree bark (Kusthaghna) revered for resolving chronic skin ailments and balancing Pitta-Kapha.\n" .
                         "• Nimba / Neem (Azadirachta indica): Powerful natural antibacterial and blood cleanser that purges acne-causing microbes and cools dermal heat.\n" .
                         "• Sariva / Indian Sarsaparilla (Hemidesmus indicus): Purifies the blood, soothes burning sensations, and imparts skin softness and glow.\n" .
                         "• Haridra / Turmeric (Curcuma longa): Natural antioxidant and antiseptic that speeds skin healing and fights tissue inflammation.\n" .
                         "• Amalaki / Indian Gooseberry (Phyllanthus emblica): Rich in natural Vitamin C and rejuvenating bioflavonoids that nourish collagen and tone skin.\n" .
                         "• Guduchi / Giloy (Tinospora cordifolia): Potent immunomodulator and Rasayana that clears systemic impurities and bolsters cellular defense.\n" .
                         "• Lodhra (Symplocos racemosa): Astringent botanical that tones skin tissues and clears blemishes.\n" .
                         "• Ushira / Vetiver (Chrysopogon zizanioides): Calms internal heat and relieves Pitta-related skin redness.\n" .
                         "• Purified Herbal Syrup Base & Natural Sweeteners: Delicious, easy-to-consume syrup base that makes daily intake pleasant and effective.";

        $enUsage = "• Recommended Dosage: Take 1 to 2 teaspoons (5 ml to 10 ml) of Skin Rich syrup mixed with half a glass of lukewarm water or normal drinking water.\n" .
                   "• Timing: Consume twice daily after food (morning and evening), or as directed by an Ayurvedic physician.\n" .
                   "• Important Instructions:\n" .
                   "  1. Shake the bottle well before each use.\n" .
                   "  2. Store in a cool, dry place away from direct sunlight.\n" .
                   "  3. Keep tightly closed and out of reach of children.";

        $mlTitle = 'സ്കിൻ റിച്ച് ആയുർവേദിക് ബ്ലഡ് പ്യൂരിഫയർ സിറപ്പ് – 200ml';
        $mlShortDesc = 'ഉള്ളിൽ നിന്ന് തുടങ്ങട്ടെ യഥാർത്ഥ സൗന്ദര്യം! രക്തത്തിലെ വിഷാംശങ്ങൾ നീക്കി മുഖക്കുരുവും കറുത്ത പാടുകളും അകറ്റി ചർമ്മത്തിന് സ്വാഭാവിക തിളക്കവും ആരോഗ്യവും നൽകുന്ന 100% പ്രകൃതിദത്ത ആയുർവേദ ബ്ലഡ് പ്യൂരിഫയർ സിറപ്പ്.';

        $mlBenefits = "• ശരീരത്തിലെ വിഷാംശങ്ങളെ (Toxins) നീക്കം ചെയ്യുന്നു: രക്തം ആഴത്തിൽ ശുദ്ധീകരിക്കുകയും രക്തകോശങ്ങൾക്ക് പുതിയ ഉന്മേഷവും പുനർജീവനവും നൽകുകയും ചെയ്യുന്നു.\n" .
                      "• മുഖക്കുരുവും കറുത്ത പാടുകളും തടയുന്നു: മുഖക്കുരു (Acne), കറുത്ത പാടുകൾ (Blemishes), അലർജി, മറ്റ് ത്വക്ക് രോഗങ്ങൾ എന്നിവ തടയുകയും കുറയ്ക്കുകയും ചെയ്യുന്നു.\n" .
                      "• സ്വാഭാവിക തിളക്കവും സൗന്ദര്യവും: രക്തത്തിലെ അഴുക്കുകൾ പൂർണ്ണമായും നീക്കം ചെയ്യുന്നതിലൂടെ ചർമ്മത്തിന് ഉള്ളിൽ നിന്ന് സ്വാഭാവിക തിളക്കവും തുടുപ്പും ആരോഗ്യവും നൽകുന്നു.\n" .
                      "• മലബന്ധം അകറ്റാനും ദഹനപ്രക്രിയ കാര്യക്ഷമമാക്കാനും സഹായിക്കുന്നു: ദഹനവ്യവസ്ഥയെ ശുദ്ധീകരിക്കുകയും മലബന്ധം ഒഴിവാക്കി ഉദര ആരോഗ്യം സംരക്ഷിക്കുകയും ചെയ്യുന്നു.\n" .
                      "• പ്രതിരോധശേഷി വർദ്ധിപ്പിക്കുന്നു: ശരീരത്തിന്റെ സ്വാഭാവിക രോഗപ്രതിരോധ ശേഷി വർദ്ധിപ്പിക്കാനും അണുബാധകളെ പ്രതിരോധിക്കാനും സഹായിക്കുന്നു.\n" .
                      "• 100% ആയുർവേദിക് & രുചികരം: ആരോഗ്യത്തോടൊപ്പം രുചികരവുമായ (Healthy & Tasty) പ്രത്യേക ചേരുവക്കൂട്ടിൽ തയ്യാറാക്കിയത്.";

        $mlIngredients = "• മഞ്ചിഷ്ഠ (Manjistha): രക്തശുദ്ധീകരണത്തിന് ഏറ്റവും ശ്രേഷ്ഠമായ ആയുർവേദ ഔഷധം; ചർമ്മത്തിലെ കറുത്ത പാടുകൾ മാറ്റി തുടുപ്പ് നൽകുന്നു.\n" .
                         "• കതിരം / കരിങ്ങാലി (Khadira): ത്വക്ക് രോഗങ്ങൾക്ക് ഉത്തമമായ പരമ്പരാഗത ഔഷധം; രക്തത്തിലെ മാലിന്യങ്ങളെ നീക്കം ചെയ്യുന്നു.\n" .
                         "• വേപ്പ് (Neem / Nimba): ആൻറി ബാക്ടീരിയൽ ഗുണങ്ങളാൽ സമ്പുഷ്ടം; മുഖക്കുരു ഉണ്ടാക്കുന്ന ബാക്ടീരിയകളെ നശിപ്പിക്കുന്നു.\n" .
                         "• നന്നാറി (Sariva): രക്തത്തിലെ പിത്തദോഷം കുറയ്ക്കുകയും ശരീരത്തിന് തണുപ്പും ചർമ്മത്തിന് തിളക്കവും നൽകുകയും ചെയ്യുന്നു.\n" .
                         "• മഞ്ഞൾ (Haridra): അണുബാധകളെ പ്രതിരോധിക്കുകയും കോശങ്ങളെ സംരക്ഷിക്കുകയും ചെയ്യുന്ന പ്രകൃതിദത്ത ആന്റിഓക്സിഡന്റ്.\n" .
                         "• നെല്ലിക്ക (Amalaki): വിറ്റാമിൻ സി യുടെ കലവറ; ചർമ്മത്തിന് യുവത്വവും ആരോഗ്യവും നിലനിർത്തുന്നു.\n" .
                         "• ചിറ്റമൃത് (Guduchi): ശരീരത്തിന്റെ രോഗപ്രതിരോധശേഷി വർദ്ധിപ്പിക്കുകയും വിഷാംശങ്ങളെ ഇല്ലാതാക്കുകയും ചെയ്യുന്നു.\n" .
                         "• പാച്ചോറ്റി (Lodhra): ചർമ്മകോശങ്ങളെ ദൃഢമാക്കുകയും പാടുകൾ ഇല്ലാതാക്കുകയും ചെയ്യുന്നു.\n" .
                         "• രാമച്ചം (Ushira): രക്തത്തിലെ അധിക ചൂടും പിത്തകോപവും ശമിപ്പിക്കുന്നു.\n" .
                         "• പ്രകൃതിദത്ത ഹെർബൽ സിറപ്പ് ബേസ്: ദിവസേനയുള്ള ഉപയോഗത്തിന് അനുയോജ്യമായ സ്വാദിഷ്ടവും പോഷകസമൃദ്ധവുമായ ചേരുവ.";

        $mlUsage = "• ഉപയോഗിക്കേണ്ട വിധം: ഒന്നു മുതൽ രണ്ട് ടീസ്പൂൺ സ്കിൻ റിച്ച് സിറപ്പ് അര ഗ്ലാസ് ഇളം ചൂടുവെള്ളത്തിലോ സാധാരണ വെള്ളത്തിലോ ചേർക്കുക.\n" .
                   "• ഉപയോഗ സമയം: ദിവസവും രണ്ട് നേരം ഭക്ഷണത്തിന് ശേഷം കഴിക്കുക (അല്ലെങ്കിൽ ആയുർവേദ ഡോക്ടറുടെ നിർദ്ദേശപ്രകാരം).\n" .
                   "• പ്രത്യേക ശ്രദ്ധയ്ക്ക്:\n" .
                   "  1. ഉപയോഗിക്കുന്നതിന് മുമ്പ് കുപ്പി നന്നായി കുലുക്കുക (Shake well before use).\n" .
                   "  2. തണുപ്പുള്ളതും വരണ്ടതുമായ സ്ഥലത്ത് സൂക്ഷിക്കുക (Store in a cool and dry place).\n" .
                   "  3. കുട്ടികൾക്ക് ലഭിക്കാത്ത വിധം സൂക്ഷിക്കുക (Keep out of reach of children).";

        $hiTitle = 'स्किन रिच आयुर्वेदिक ब्लड प्यूरीफायर सिरप – 200ml';
        $hiShortDesc = 'अंदर से निखारे असली सुंदरता! मंजीष्ठा, नीम और खदिर से निर्मित 100% प्राकृतिक आयुर्वेदिक ब्लड प्यूरीफायर सिरप, जो रक्त को शुद्ध कर कील-मुंहासे, दाग-धब्बे दूर करता है और त्वचा को प्राकृतिक चमक देता है।';

        $hiBenefits = "• विषैले तत्वों (Toxins) को बाहर निकाले: रक्त को गहराई से शुद्ध करता है और रक्त कोशिकाओं को नई ऊर्जा और पुनर्जीवन प्रदान करता है।\n" .
                      "• कील-मुंहासे और दाग-धब्बे दूर करे: मुँहासे (Acne), चेहरे के काले दाग-धब्बे और त्वचा संबंधी अन्य विकारों को प्रभावी रूप से रोकता है और कम करता है।\n" .
                      "• प्राकृतिक निखार और चमक: रक्त की अशुद्धियों को दूर कर त्वचा को अंदर से प्राकृतिक चमक, कोमलता और स्वस्थ निखार देता है।\n" .
                      "• कब्ज दूर करे और पाचन सुधारे: पाचन क्रिया को दुरुस्त कर मलत्याग नियमित करता है और पेट के विकारों को शांत करता है।\n" .
                      "• रोग प्रतिरोधक क्षमता (Immunity) बढ़ाए: शरीर की स्वाभाविक रोग प्रतिरोधक शक्ति को मजबूत कर संक्रमण से बचाता है।\n" .
                      "• 100% आयुर्वेदिक और स्वादिष्ट (Healthy & Tasty): बिना किसी हानिकारक रसायन के, प्राकृतिक जड़ी-बूटियों से बना स्वादिष्ट एवं स्वास्थ्यवर्धक सिरप।";

        $hiIngredients = "• मंजीष्ठा (Rubia cordifolia): आयुर्वेद का प्रसिद्ध रक्त शोधक जो त्वचा की रंगत निखारता है और पिगमेंटेशन को दूर करता है।\n" .
                         "• खदिर (Acacia catechu): त्वचा विकारों को शांत करने और रक्त से अशुद्धियों को खत्म करने वाली उत्तम औषधि।\n" .
                         "• नीम (Azadirachta indica): जीवाणुरोधी गुणों से भरपूर, जो मुंहासे पैदा करने वाले बैक्टीरिया को नष्ट करता है।\n" .
                         "• सारिवा / अनंतमूल (Hemidesmus indicus): रक्त में बढ़े हुए पित्त को शांत कर शरीर को शीतलता और त्वचा को चमक प्रदान करता है।\n" .
                         "• हल्दी (Curcuma longa): प्राकृतिक एंटीऑक्सीडेंट जो त्वचा के संक्रमण से लड़ती है और घाव जल्दी भरती है।\n" .
                         "• आंवला (Phyllanthus emblica): प्राकृतिक विटामिन सी से भरपूर, जो त्वचा को जवां और चमकदार बनाए रखता है।\n" .
                         "• गिलोय / गुडूची (Tinospora cordifolia): शरीर की प्रतिरोधक क्षमता को बढ़ाता है और टॉक्सिन्स को निष्कासित करता है।\n" .
                         "• लोध्र (Symplocos racemosa): त्वचा के ऊतकों को मजबूती प्रदान कर चेहरे के दाग मिटाता है।\n" .
                         "• उशीर / खस (Vetiver): शरीर की अतिरिक्त गर्मी को शांत करता है।\n" .
                         "• प्राकृतिक सिरप बेस: नियमित सेवन के लिए स्वादिष्ट और सेहतमंद सिरप मिश्रण।";

        $hiUsage = "• सेवन विधि: 1 से 2 चम्मच (5-10 ml) स्किन रिच सिरप आधा गिलास गुनगुने या सामान्य पानी में मिलाएं।\n" .
                   "• समय: दिन में दो बार भोजन के बाद सेवन करें (या आयुर्वेदिक चिकित्सक के परामर्शानुसार)।\n" .
                   "• विशेष सावधानियां:\n" .
                   "  1. उपयोग से पहले बोतल को अच्छी तरह हिलाएं (Shake well before use)।\n" .
                   "  2. ठंडी और सूखी जगह पर रखें।\n" .
                   "  3. बच्चों की पहुंच से दूर रखें।";

        $taTitle = 'ஸ்கின் ரிச் ஆயுர்வேத இரத்த சுத்திகரிப்பு சிரப் – 200ml';
        $taShortDesc = 'உள்ளிருந்து மலரட்டும் உண்மையான அழகு! மஞ்சிஷ்டா, வேம்பு, கதீரம் அடங்கிய 100% இயற்கை ஆயுர்வேத இரத்த சுத்திகரிப்பு சிரப். முகப்பரு, கரும்புள்ளிகளை நீக்கி சருமத்திற்கு இயற்கையான பளபளப்பையும் ஆரோக்கியத்தையும் அளிக்கிறது.';

        $taBenefits = "• நச்சுக்களை (Toxins) வெளியேற்றி இரத்தத்தை சுத்திகரிக்கிறது: உடலில் உள்ள நச்சுக்களை நீக்கி இரத்த ஓட்டத்தை புத்துணர்ச்சியூட்டுகிறது.\n" .
                      "• முகப்பரு மற்றும் கரும்புள்ளிகளை தடுக்கிறது: பருக்கள் (Acne), கரும்புள்ளிகள், மங்கு மற்றும் சரும நோய்களை கட்டுப்படுத்தி குணப்படுத்துகிறது.\n" .
                      "• சருமத்திற்கு இயற்கையான பளபளப்பு மற்றும் அழகு: இரத்த அசுத்தங்களை நீக்கி சருமத்திற்கு உள்ளிருந்து இயற்கையான மினுமினுப்பையும் புத்துணர்வையும் தருகிறது.\n" .
                      "• மலச்சிக்கலை போக்கி செரிமானத்தை சீராக்குகிறது: செரிமான மண்டலத்தை சுத்தம் செய்து மலச்சிக்கலை விரட்டி குடல் ஆரோக்கியத்தை மேம்படுத்துகிறது.\n" .
                      "• நோய் எதிர்ப்பு சக்தியை அதிகரிக்கிறது: உடலின் இயற்கை நோய் எதிர்ப்பு சக்தியை அதிகரித்து தொற்றுநோய்களிலிருந்து பாதுகாக்கிறது.\n" .
                      "• 100% ஆயுர்வேத மற்றும் சுவையானது (Healthy & Tasty): பாரம்பரிய மூலிகைகளால் தயாரிக்கப்பட்ட பாதுகாப்பான மற்றும் ருசியான ஆரோக்கிய சிரப்.";

        $taIngredients = "• மஞ்சிஷ்டா (Manjistha): இரத்தத்தை தூய்மைப்படுத்தி சரும நிறத்தை மேம்படுத்தும் இணையற்ற மூலிகை.\n" .
                         "• காசுகட்டி / கதீரம் (Khadira): சரும நோய்களை நீக்கி இரத்த நச்சுக்களை போக்கும் பாரம்பரிய மரம்.\n" .
                         "• வேம்பு (Neem): பாக்டீரியா எதிர்ப்பு குணம் கொண்டது; முகப்பருவை உண்டாக்கும் கிருமிகளை அழிக்கிறது.\n" .
                         "• நன்னாரி (Sariva): இரத்த பித்தத்தை குறைத்து உடலுக்கு குளிர்ச்சியையும் சருமத்திற்கு பொலிவையும் தருகிறது.\n" .
                         "• மஞ்சள் (Curcuma longa): சரும புண்களை ஆற்றி அழற்சியை தடுக்கும் சக்திவாய்ந்த இயற்கை மூலிகை.\n" .
                         "• நெல்லிக்காய் (Amla): வைட்டமின் சி நிறைந்தது; சருமத்தின் இளமையையும் நெகிழ்வுத்தன்மையையும் பாதுகாக்கிறது.\n" .
                         "• சீந்தில் கொடி (Guduchi): நோய் எதிர்ப்பு சக்தியை உயர்த்தி உடலை நச்சுக்களற்றதாக மாற்றுகிறது.\n" .
                         "• வெள்வேலம்பட்டை / லோத்ரா (Lodhra): சரும திசுக்களை பலப்படுத்தி கரும்புள்ளிகளை நீக்குகிறது.\n" .
                         "• வெட்டிவேர் (Ushira): அதிகப்படியான உடல் சூட்டை தணித்து தோலை அமைதிப்படுத்துகிறது.\n" .
                         "• தூய மூலிகை சிரப் தளம்: தினமும் பருக ஏதுவான ஆரோக்கியமான மற்றும் சுவையான இயற்கை சிரப்.";

        $taUsage = "• உட்கொள்ளும் முறை: 1 முதல் 2 டீஸ்பூன் (5-10 மிலி) ஸ்கின் ரிச் சிரப்பை அரை டம்ளர் வெதுவெதுப்பான அல்லது சாதாரண தண்ணீரில் கலக்கவும்.\n" .
                   "• நேரம்: தினமும் இரண்டு வேளை உணவிற்குப் பின் குடிக்கவும் (அல்லது மருத்துவரின் ஆலோசனைப்படி).\n" .
                   "• முக்கிய வழிமுறைகள்:\n" .
                   "  1. பயன்படுத்துவதற்கு முன் பாட்டிலை நன்றாக குலுக்கவும் (Shake well before use).\n" .
                   "  2. குளிர்ந்த மற்றும் உலர்ந்த இடத்தில் வைக்கவும்.\n" .
                   "  3. குழந்தைகளின் கைகளுக்கு எட்டாத இடத்தில் வைக்கவும்.";

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

        $skinPart = BodyPart::where('slug', 'skin')->first();
        $digestionPart = BodyPart::where('slug', 'digestion')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $bodyPartIds = collect([$skinPart?->id, $digestionPart?->id, $wholeBodyPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/skin-rich-ayurvedic-blood-purifier-syrup-200ml.jpg';
        $galleryImages = [
            '/images/products/skin-rich-ayurvedic-blood-purifier-syrup-200ml.jpg',
        ];

        $category = Category::where('slug', 'womens-care')->first() ?? Category::first();

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'name' => $enTitle,
                    'short_description' => $enShortDesc,
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                    'price' => 435.00,
                    'sale_price' => 385.00,
                    'unit_size' => '200 ml',
                    'featured_image' => $featuredImagePath,
                    'gallery_images' => $galleryImages,
                    'badge' => '100% Ayurvedic • Blood Purifier',
                    'is_active' => true,
                    'is_featured' => true,
                ]);

                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                if ($category) {
                    $product->categories()->syncWithoutDetaching([$category->id]);
                }

                $this->command?->info("Updated Skin Rich Blood Purifier Syrup (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'SKIN-RICH-200ML',
                'price' => 435.00,
                'sale_price' => 385.00,
                'stock_quantity' => 60,
                'unit_size' => '200 ml',
                'badge' => '100% Ayurvedic • Blood Purifier',
                'featured_image' => $featuredImagePath,
                'gallery_images' => $galleryImages,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 2,
                'is_free_shipping' => false,
                'translations' => $translations,
            ]);

            if ($category) {
                $product->categories()->syncWithoutDetaching([$category->id]);
            }
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }

            $this->command?->info("Created new Skin Rich Blood Purifier Syrup (#{$product->id}) with full 4-language translations.");
        }
    }
}
