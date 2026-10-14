<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class VanatheeramAromaticTurmericTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Aromatic Turmeric / Kasthuri Manjal (100g) with 4-language translations.
     */
    public function run(): void
    {
        $slug = 'vanatheeram-aromatic-turmeric-kasthuri-manjal-100g';

        $product = Product::where('slug', $slug)
            ->orWhere('sku', 'VAN-KST-MNJ-100G')
            ->first();

        $enTitle = 'Vanatheeram® Aromatic Turmeric – Pure Kasthuri Manjal Powder (100g)';
        $enShortDesc = '100% pure, organic, unadulterated Kasthuri Manjal (Curcuma aromatica / Wild Turmeric) hand-harvested by Wayanad tribal farmers. Exclusively crafted for skin care and bridal beauty: non-staining, delightfully fragrant, reduces unwanted facial hair, clears stubborn acne, and leaves skin with a luminous natural glow.';

        $enBenefits = "• 100% Pure Organic Kasthuri Manjal (Curcuma aromatica): Authentic forest wild turmeric grown chemical-free in Wayanad; non-hybrid, unmixed, and finely pulverized for gentle skin application.\n" .
                      "• Zero Yellow Staining: Unlike ordinary cooking turmeric (Curcuma longa), genuine Kasthuri Manjal does NOT leave unsightly yellow stains on the face, skin, or towels—it washes off completely clean.\n" .
                      "• Naturally Slows & Reduces Facial Hair: Regular application with gram flour weakens hair roots over time, reducing unwanted facial fuzz on the upper lip, chin, and underarms.\n" .
                      "• Powerful Acne & Pimple Defense: Rich in natural camphoraceous terpenes and curcuminoids with potent antibacterial properties that dry up active acne, pimples, and boils rapidly.\n" .
                      "• Sun Tan Removal & Radiant Glow: Brightens dull skin, fades dark sun spots and pigmentation patches, and evens out skin tone without chemical bleaching.\n" .
                      "• Traditional Chemical-Free Baby Bath: Safe and gentle for infants when blended with green gram flour as a nourishing, soap-free herbal bath wash (Snana Choorna).\n" .
                      "• Heavenly Aromatic Scent: Naturally sweet, camphoraceous herbal aroma that calms the senses and refreshes the skin without bitterness.\n" .
                      "• Direct Tribal Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), Wayanad, ensuring fair trade and sustainable income for tribal women farmers.";

        $enIngredients = "• 100% Pure Wild Aromatic Turmeric Rhizome Powder (Curcuma aromatica / Kasthuri Manjal). Sun-dried and micro-milled. Batch No: 002. FSSAI: 21325185000809. Zero added colors, zero cooking turmeric mix, zero preservatives. FOR EXTERNAL SKIN USE ONLY.";

        $enUsage = "• 1. Daily Glow Face Pack (Most Popular): Mix 1 tsp Aromatic Turmeric + 1 tsp Red Sandalwood Powder with pure rose water or fresh curd. Apply evenly on the face and neck for 15 minutes, then wash off with cool water. Use 3 times weekly.\n" .
                   "• 2. For Active Acne & Oily Skin: Blend 1 tsp Kasthuri Manjal + 1 tsp Vanatheeram Raw Honey + 3–4 drops of fresh lemon juice. Apply directly on breakouts for 15 minutes and rinse. Dries pimples fast without burning.\n" .
                   "• 3. For Facial Hair & Underarm Care: Mix 1 tsp Kasthuri Manjal + 1 tsp besan (gram flour) + thick curd to form a paste. Apply on upper lip, chin, or underarms. When semi-dry (80%), gently scrub off in the opposite direction of hair growth. Use 3 times a week for 2 months to visibly weaken and slow hair regrowth.\n" .
                   "• 4. Traditional Baby Bath Powder (Ubtan): Blend 2 tbsp Aromatic Turmeric + 1 cup green gram powder (cherupayar podi) + 2 tbsp rice flour. Use as a gentle, 100% chemical-free baby bath powder instead of harsh soaps.\n" .
                   "• 5. Bridal & Pre-Wedding Ubtan (Nalangu Maavu): Combine Kasthuri Manjal + Red Sandalwood powder + Raw Milk to create the timeless Kerala bridal body mask for silky-smooth, glowing skin.\n" .
                   "• Important Note: FOR EXTERNAL BEAUTY USE ONLY. NOT FOR COOKING. Store in a cool, dry place sealed inside the zip-pouch.";

        $mlTitle = 'വനതീരം® കസ്തൂരി മഞ്ഞൾ (Aromatic Turmeric) – 100% പ്രകൃതിദത്ത സൗന്ദര്യക്കൂട്ട് (100g)';
        $mlShortDesc = 'വയനാടൻ മലനിരകളിൽ ഗോത്രകർഷകർ സ്വാഭാവികമായി കൃഷി ചെയ്തെടുത്ത 100% ശുദ്ധമായ കസ്തൂരി മഞ്ഞൾ (Wild Turmeric). കറ പിടിക്കാത്തതും അതീവ സുഗന്ധമുള്ളതുമായ ഈ അസ്സൽ നാടൻ കൂട്ട് മുഖത്തെ അനാവശ്യ രോമങ്ങൾ നീക്കാനും മുഖക്കുരുവും പാടുകളും മാറ്റി മുഖത്തിന് സ്വാഭാവിക തിളക്കം നൽകാനും ഉത്തമം.';

        $mlBenefits = "• 100% ശുദ്ധമായ അസ്സൽ കസ്തൂരി മഞ്ഞൾ: യാതൊരുവിധ രാസവസ്തുക്കളോ കൃത്രിമ മഞ്ഞളോ ചേർക്കാത്ത വയനാടൻ കാട്ടു കസ്തൂരി മഞ്ഞൾപ്പൊടി; ചർമ്മത്തിന് പൂർണ്ണ സുരക്ഷിതം.\n" .
                      "• മുഖത്ത് മഞ്ഞക്കറ പിടിക്കില്ല: കറിവേപ്പിലെ മഞ്ഞൾ പോലെ മുഖത്തോ വസ്ത്രങ്ങളിലോ മഞ്ഞ നിറം അവശേഷിപ്പിക്കില്ല; കഴുകുമ്പോൾ തന്നെ ചർമ്മം ശുദ്ധവും സുന്ദരവുമാകും.\n" .
                      "• അനാവശ്യ രോമവളർച്ച കുറയ്ക്കുന്നു: കടലമാവിനൊപ്പം പതിവായി ഉപയോഗിക്കുന്നത് മുഖത്തെയും മേൽച്ചുണ്ടിലെയും അനാവശ്യ രോമങ്ങളുടെ വേരുകളെ ദുർബലപ്പെടുത്തി രോമവളർച്ച കുറയ്ക്കും.\n" .
                      "• മുഖക്കുരുവിനും കറുത്ത പാടുകൾക്കും: അതിശക്തമായ ആന്റിബാക്ടീരിയൽ ഗുണങ്ങളുള്ളതിനാൽ മുഖക്കുരുവും കുരുക്കളുടെ പാടുകളും വെയിലേറ്റ കരിവാളിപ്പും വേഗത്തിൽ മാറ്റുന്നു.\n" .
                      "• കുട്ടികളുടെ കുളിപ്പൊടിക്ക് ഉത്തമം: പണ്ടുമുതലേ കേരളത്തിൽ കുഞ്ഞുങ്ങൾക്ക് സോപ്പിന് പകരം ചെറുപയർ പൊടിക്കൊപ്പം ചേർത്ത് ഉപയോഗിക്കുന്ന പരമ്പരാഗത കൂട്ടാണിത്.\n" .
                      "• ചർമ്മത്തിന് തിളക്കവും മൃദുത്വവും: ചർമ്മത്തിലെ മൃതകോശങ്ങളെ നീക്കം ചെയ്ത് ചർമ്മത്തിന് മൃദുത്വവും പ്രകൃതിദത്ത ശോഭയും നൽകുന്നു.\n" .
                      "• നറുമണമുള്ള കസ്തൂരി ഗന്ധം: കാട്ടു മഞ്ഞളിന്റെ പ്രത്യേക സുഗന്ധം മനസ്സിനും ശരീരത്തിനും നവോന്മേഷം പകരുന്നു.\n" .
                      "• ഗോത്രകർഷകർക്ക് താങ്ങ്: STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വയനാട്ടിലെ ആദിവാസി വനിതകൾക്ക് നേരിട്ടുള്ള വരുമാനം നൽകുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ നാടൻ കസ്തൂരി മഞ്ഞൾപ്പൊടി (Curcuma aromatica). മറ്റ് മഞ്ഞളുകളോ രാസവസ്തുക്കളോ ചേർക്കാത്തത്. ബാച്ച് നമ്പർ: 002. FSSAI: 21325185000809. ബാഹ്യ ഉപയോഗത്തിന് മാത്രം (NOT FOR COOKING).";

        $mlUsage = "• 1. തിളക്കമുള്ള മുഖത്തിന് (Face Pack): 1 ടീസ്പൂൺ കസ്തൂരി മഞ്ഞളും 1 ടീസ്പൂൺ രക്തചന്ദനപ്പൊടിയും റോസ് വാട്ടറിലോ തൈരിലോ ചാലിച്ച് മുഖത്ത് പുരട്ടി 15 മിനിറ്റിനു ശേഷം കഴുകിക്കളയുക. ആഴ്ചയിൽ 3 ദിവസം ചെയ്യാം.\n" .
                   "• 2. മുഖക്കുരു മാറാൻ: 1 ടീസ്പൂൺ കസ്തൂരി മഞ്ഞളിൽ 1 ടീസ്പൂൺ വനതീരം തേനും കുറച്ച് തുള്ളി നാരങ്ങാനീരും ചേർത്ത് മുഖക്കുരുവുള്ള ഭാഗത്ത് പുരട്ടി 15 മിനിറ്റിനു ശേഷം കഴുകുക.\n" .
                   "• 3. അനാവശ്യ രോമങ്ങൾ അകറ്റാൻ: 1 ടീസ്പൂൺ കസ്തൂരി മഞ്ഞൾ, 1 ടീസ്പൂൺ കടലമാവ്, തൈര് എന്നിവ ചേർത്ത് പേസ്റ്റ് രൂപത്തിലാക്കി മേൽച്ചുണ്ടിലോ കഴുത്തിലോ പുരട്ടുക. പകുതി ഉണങ്ങുമ്പോൾ രോമവളർച്ചയ്ക്ക് എതിർദിശയിൽ മൃദുവായി ഉരച്ചു കളയുക. ആഴ്ചയിൽ 3 തവണ വീതം 2 മാസം തുടർച്ചയായി ചെയ്യുക.\n" .
                   "• 4. കുഞ്ഞുങ്ങളുടെ കുളിപ്പൊടി: 2 ടേബിൾസ്പൂൺ കസ്തൂരി മഞ്ഞൾ, 1 കപ്പ് ചെറുപയർ പൊടി, അല്പം അരിപ്പൊടി എന്നിവ ചേർത്ത് കുഞ്ഞുങ്ങൾക്ക് സോപ്പിന് പകരം തേച്ചു കുളിപ്പിക്കാം.\n" .
                   "• 5. കല്യാണപ്പെണ്ണിന്റെ തിളക്കത്തിന് (നാല്പാമരക്കൂട്ട്): കസ്തൂരി മഞ്ഞളും രക്തചന്ദനവും പാലും ചേർത്ത് ശരീരമാസകലം പുരട്ടി കുളിക്കുന്നത് ശരീരത്തിന് അതീവ ശോഭ നൽകും.\n" .
                   "• ശ്രദ്ധിക്കുക: സൗന്ദര്യ സംരക്ഷണത്തിന് ചർമ്മത്തിൽ പുരട്ടാൻ മാത്രം (NOT FOR COOKING). വായു കടക്കാതെ ഈർപ്പമില്ലാത്ത സ്ഥലത്ത് സൂക്ഷിക്കുക.";

        $hiTitle = 'वनतीरम® कस्तूरी हल्दी (एरोमैटिक टर्मरिक) – 100% शुद्ध त्वचा सौंदर्य चूर्ण (100g)';
        $hiShortDesc = 'वायनाड के आदिवासी किसानों द्वारा जैविक विधि से उगाई गई 100% शुद्ध कस्तूरी हल्दी (जंगली हल्दी / Curcuma aromatica)। चेहरे पर बिना पीला दाग छोड़े चेहरे के अनचाहे बालों को कम करने, कील-मुंहासे मिटाने और त्वचा में प्राकृतिक निखार लाने वाला प्रामाणिक सौंदर्य चूर्ण।';

        $hiBenefits = "• 100% शुद्ध जैविक कस्तूरी हल्दी: बिना किसी रसायन या साधारण हल्दी के मिलावट की शुद्ध जंगली हल्दी; चेहरे की कोमल त्वचा के लिए पूर्णतः सुरक्षित।\n" .
                      "• चेहरे पर कोई पीला दाग नहीं: रसोई की हल्दी की तरह यह चेहरे या कपड़ों पर पीलापन नहीं छोड़ती, धोने पर चेहरा पूरी तरह साफ और चमकदार दिखता है।\n" .
                      "• चेहरे के अनचाहे बालों को कम करे: बेसन और दही के साथ नियमित उपयोग से चेहरे के अनचाहे रोएं धीरे-धीरे कमजोर होकर कम होने लगते हैं।\n" .
                      "• कील-मुंहासे, दाग-धब्बे और टैनिंग दूर करे: एंटीबैक्टीरियल गुणों से भरपूर होने के कारण मुंहासों को तेजी से सुखाती है और धूप से हुई टैनिंग मिटाती है।\n" .
                      "• बच्चों के उबटन के लिए पारंपरिक उपयोग: केरल की परंपरा अनुसार शिशुओं की कोमल त्वचा के लिए साबुन के स्थान पर मूंग दाल के साथ इस्तेमाल किया जाने वाला सुरक्षित उबटन।\n" .
                      "• अद्भुत प्राकृतिक खुशबू: मीठी और मनमोहक प्राकृतिक सुंगध जो त्वचा को ठंडक और ताजगी देती है।\n" .
                      "• जनजातीय समुदाय को संबल: STTR के माध्यम से प्रत्येक खरीद सीधे वायनाड के आदिवासी परिवारों को सहयोग प्रदान करती है।";

        $hiIngredients = "• 100% शुद्ध जंगली कस्तूरी हल्दी चूर्ण (Curcuma aromatica)। शून्य मिलावट, शून्य रंग। केवल त्वचा उपयोग हेतु (भोजन के लिए नहीं)। Batch No: 002. FSSAI: 21325185000809.";

        $hiUsage = "• 1. चेहरे की चमक के लिए (डेली फेस पैक): 1 चम्मच कस्तूरी हल्दी + 1 चम्मच लाल चंदन पाउडर को गुलाब जल या दही में मिलाकर चेहरे पर 15 मिनट लगाएं, फिर ताजे पानी से धो लें।\n" .
                   "• 2. कील-मुंहासों के लिए: 1 चम्मच कस्तूरी हल्दी + 1 चम्मच शुद्ध शहद + कुछ बूंदें नींबू का रस मिलाकर मुंहासों पर लगाएं और 15 मिनट बाद धो लें।\n" .
                   "• 3. अनचाहे बालों के लिए: 1 चम्मच कस्तूरी हल्दी + 1 चम्मच बेसन + दही का गाढ़ा पेस्ट बनाएं। होंठों के ऊपर या ठोड़ी पर लगाएं, हल्का सूखने पर बालों की विपरीत दिशा में धीरे-धीरे रगड़कर धोएं (हफ्ते में 3 बार, 2 महीने तक)।\n" .
                   "• 4. बच्चों का उबटन: 2 चम्मच कस्तूरी हल्दी को 1 कप पिसी मूंग दाल के साथ मिलाकर शिशु के प्राकृतिक स्नान चूर्ण के रूप में उपयोग करें।\n" .
                   "• 5. ब्राइडल निखार: कस्तूरी हल्दी, लाल चंदन और कच्चे दूध का उबटन बनाकर लगाने से विवाह पूर्व त्वचा में स्वर्णिम निखार आता है।\n" .
                   "• महत्वपूर्ण: केवल त्वचा के बाहरी उपयोग के लिए। भोजन या पकाने के लिए नहीं।";

        $taTitle = 'வனதீரம்® கஸ்தூரி மஞ்சள் – 100% தூய இயற்கை முக அழகு பொடி (100g)';
        $taShortDesc = 'வயநாடு மலைப்பகுதிகளில் பழங்குடியின விவசாயிகளால் இயற்கை முறையில் விளைவிக்கப்பட்ட 100% தூய கஸ்தூரி மஞ்சள் (Curcuma aromatica). முகத்தில் மஞ்சள் கறை படியாமல் தேவையற்ற முக முடிகளை நீக்கவும், பருக்கள் மற்றும் தழும்புகளை போக்கி இயற்கையான பொலிவைத் தரும் மூலிகை அழகு பொடி.';

        $taBenefits = "• 100% தூய காட்டு கஸ்தூரி மஞ்சள்: கலப்படமில்லாத ஒரிஜினல் கஸ்தூரி மஞ்சள் பொடி; முகத்தின் மென்மையான சருமத்திற்கு ஏற்றது.\n" .
                      "• முகத்தில் மஞ்சள் கறை படியாது: சமையல் மஞ்சள் போல் முகத்தில் மஞ்சள் நிறத்தை ஏற்படுத்தாது; கழுவியவுடன் முகம் பளபளப்பாக மாறும்.\n" .
                      "• தேவையற்ற முக முடிகளை நீக்கும்: கடலை மாவுடன் சேர்த்து தொடர்ந்து பயன்படுத்தி வர முகத்தில் உள்ள மெல்லிய முடிகள் உதிர்ந்து வளராமல் தடுக்கும்.\n" .
                      "• முகப்பரு, கரும்புள்ளிகள் மற்றும் மங்கு போக்கும்: சிறந்த ஆன்டி-பாக்டீரியல் நன்மைகளால் பருக்களை விரைவாக உலர்த்தி தழும்புகளை மறையச் செய்கிறது.\n" .
                      "• குழந்தைகளுக்கு பாரம்பரிய நலங்கு மாவு: சோப்பிற்கு மாற்றாக பாசிப்பயறு மாவுடன் சேர்த்து குழந்தைகளுக்கு பூசி குளிப்பாட்டலாம்.\n" .
                      "• நறுமணமிக்க இயற்கை வாசனை: மனதிற்கும் உடலுக்கும் புத்துணர்ச்சி அளிக்கும் சுகந்த மூலிகை மணம்.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR வயநாடு அமைப்பு மூலம் பழங்குடியின பெண்களுக்கு நேரடி வாழ்வாதாரம் வழங்குகிறது.";

        $taIngredients = "• 100% தூய காட்டு கஸ்தூரி மஞ்சள் பொடி (Curcuma aromatica). வெளிப்பூச்சுக்கு மட்டுமே (சமையலுக்கு அல்ல). Batch No: 002. FSSAI: 21325185000809.";

        $taUsage = "• 1. முகப்பொலிவு பேக்: 1 ஸ்பூன் கஸ்தூரி மஞ்சள் + 1 ஸ்பூன் ரத்த சந்தன பொடி + ரோஸ் வாட்டர் அல்லது தயிர் கலந்து முகத்தில் 15 நிமிடங்கள் பூசி கழுவவும்.\n" .
                   "• 2. பருக்கள் நீங்க: 1 ஸ்பூன் கஸ்தூரி மஞ்சள் + 1 ஸ்பூன் தேன் + சில துளிகள் எலுமிச்சை சாறு கலந்து பருக்கள் மீது தடவவும்.\n" .
                   "• 3. முக முடி நீக்க: 1 ஸ்பூன் கஸ்தூரி மஞ்சள் + 1 ஸ்பூன் கடலை மாவு + தயிர் கலந்து அடர்த்தியாக பூசவும்; காய்ந்ததும் மென்மையாக தேய்த்து கழுவவும் (வாரம் 3 முறை).\n" .
                   "• 4. குழந்தைகள் குளியல் பொடி: கஸ்தூரி மஞ்சள் மற்றும் பாசிப்பயறு மாவு கலந்து ரசாயனமில்லாத சோப்பாக பயன்படுத்தலாம்.\n" .
                   "• 5. மணப்பெண் நலங்கு மாவு: கஸ்தூரி மஞ்சள், ரத்த சந்தனம் மற்றும் பால் கலந்து உடலுக்கு பூசினால் பொன்னிற பளபளப்பு கிடைக்கும்.\n" .
                   "• குறிப்பு: முக அழகுக்கு மட்டுமே. சமையலுக்கு பயன்படுத்தக் கூடாது.";

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
        $headPart = BodyPart::where('slug', 'head')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $bodyPartIds = collect([$skinPart?->id, $headPart?->id, $wholeBodyPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-aromatic-turmeric-kasthuri-manjal-100g.jpg';
        $galleryImages = [
            '/images/products/vanatheeram-aromatic-turmeric-kasthuri-manjal-100g.jpg',
        ];

        $womensCareCategory = Category::where('slug', 'womens-care')->first();
        $herbalPowdersCategory = Category::where('slug', 'herbal-powders')->first();
        $categoryIds = collect([$womensCareCategory?->id, $herbalPowdersCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        $productData = [
            'name' => $enTitle,
            'slug' => $slug,
            'sku' => 'VAN-KST-MNJ-100G',
            'price' => 180.00,
            'sale_price' => 160.00,
            'stock_quantity' => 100,
            'unit_size' => '100g',
            'badge' => '100% Organic • Non-Staining Kasthuri Manjal',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 8,
            'is_free_shipping' => false,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Vanatheeram Aromatic Turmeric (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Vanatheeram Aromatic Turmeric product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        $this->command?->info("Successfully seeded Vanatheeram Aromatic Turmeric / Kasthuri Manjal 100g (#{$product->id}).");
    }
}
