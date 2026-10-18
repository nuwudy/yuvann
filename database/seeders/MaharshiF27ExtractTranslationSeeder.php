<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class MaharshiF27ExtractTranslationSeeder extends Seeder
{
    /**
     * Seed Maharshi’s F27 Natural Antioxidant Fruits & Vegetables Extract Juice (375 ml) with full 4-language translations.
     */
    public function run(): void
    {
        // 1. Ensure product image is copied from uploaded media
        $mediaSource = 'C:/Users/Admin/.gemini/antigravity-ide/brain/ed3bc996-42c7-4092-a535-d88e1a2ea090/.user_uploaded/media_1792286571497.jpg';
        $destPublic = public_path('images/products/maharshi-f27-natural-antioxidant-fruits-vegetables-extract-375ml.jpg');
        $destStorage = storage_path('app/public/products/maharshi-f27-natural-antioxidant-fruits-vegetables-extract-375ml.jpg');

        if (file_exists($mediaSource)) {
            @mkdir(dirname($destPublic), 0777, true);
            @mkdir(dirname($destStorage), 0777, true);
            @copy($mediaSource, $destPublic);
            @copy($mediaSource, $destStorage);
        }

        $slug = 'maharshi-f27-natural-antioxidant-fruits-vegetables-extract-375ml';

        $product = Product::where('slug', $slug)
            ->orWhere('sku', 'MHR-F27-375ML')
            ->first();

        $enTitle = 'Maharshi’s F27 Natural Antioxidant Fruits & Vegetables Extract Juice (375 ml)';
        $enShortDesc = 'F27 is a unique nutritional blend made from 18 types of fruits, 5 types of vegetables, 4 types of vitamins, and extracts from herbs. Designed to support healthy living and supply vital bio-nutrients, F27 is widely cherished for premature ageing, varicose veins, piles, mental wellness, joint pain, hair loss, and skin health.';

        $enBenefits = "• Unique 27 Botanical Blend (18 Fruits, 5 Vegetables & Herbs): A complete daily super-nutrition drink delivering concentrated phytonutrients, enzymes, and natural plant vitamins to bridge dietary gaps.\n" .
                      "• Anti-Ageing & Cellular Longevity: High concentrations of natural antioxidants neutralize oxidative free radicals to help defend against premature cellular ageing and chronic fatigue.\n" .
                      "• Vascular & Circulatory Support (Varicose Veins): Grape seed extract (5%), Pomegranate (4%), and Beetroot support healthy vascular tone, blood flow, and elasticity in tired legs.\n" .
                      "• Digestive Relief & Piles Care: Rich in natural dietary plant enzymes (Papaya, Aloe Vera, Kiwi, Amla) that promote smooth bowel regularity, soothe inflamed rectal tissues, and ease piles discomfort.\n" .
                      "• Mental Wellness & Calm Focus: Infused with Brahmi (3%) and antioxidant-rich wild berries to support emotional balance, reduce stress levels, and sharpen cognitive focus.\n" .
                      "• Joint Pain & Mobility Support: Anti-inflammatory botanical extracts (Moringa 4%, Turmeric 1%, Ginger 3%) ease morning joint stiffness and soothe inflammatory aches.\n" .
                      "• Hair Fall Reduction & Glowing Skin: Abundant in Vitamin C (20% Gooseberry / Amla), Avocado, and Tomato lycopene to nourish hair follicles, reduce hair loss, and restore healthy skin radiance.\n" .
                      "• Product Disclaimer: These are traditional nutritional product claims and supportive lifestyle benefits, not medically evaluated treatments. F27 should not be considered a replacement for prescribed medical therapies.";

        $enIngredients = "• Complete 27 Botanical Ingredients List (Adds up to exactly 100% pure botanical extracts):\n" .
                         "1. Gooseberry (Amla) – 20%\n" .
                         "2. Grape – 5%\n" .
                         "3. Drumstick (Moringa) – 4%\n" .
                         "4. Pomegranate – 4%\n" .
                         "5. Blueberry – 3%\n" .
                         "6. Blackberry – 3%\n" .
                         "7. Cranberry – 3%\n" .
                         "8. Avocado – 3%\n" .
                         "9. Kiwi – 3%\n" .
                         "10. Custard Apple (Sitaphal) – 3%\n" .
                         "11. Guava – 3%\n" .
                         "12. Mosambi (Sweet Lime) – 3%\n" .
                         "13. Mango – 3%\n" .
                         "14. Aloe Vera – 3%\n" .
                         "15. Brahmi (Bacopa monnieri) – 3%\n" .
                         "16. Carrot – 3%\n" .
                         "17. Beetroot – 3%\n" .
                         "18. Green Apple – 3%\n" .
                         "19. Noni (Morinda citrifolia) – 3%\n" .
                         "20. Strawberry – 3%\n" .
                         "21. Ginger – 3%\n" .
                         "22. Papaya – 3%\n" .
                         "23. Passion Fruit – 3%\n" .
                         "24. Chikoo (Sapodilla) – 3%\n" .
                         "25. Tomato – 3%\n" .
                         "26. Watermelon – 3%\n" .
                         "27. Turmeric (Curcuma longa) – 1%";

        $enUsage = "• Daily Recommended Serving: Take 15 ml to 30 ml once daily in the morning on an empty stomach.\n" .
                   "• How to Prepare: Dilute 20–30 ml of F27 in a glass of lukewarm or room-temperature water (100–150 ml). Mix thoroughly and drink 30 minutes before breakfast.\n" .
                   "• Shake Well: Shake bottle well before each use to ensure botanical extracts and fruit pulps are evenly distributed.\n" .
                   "• Recommended Duration: Use consistently for 60 to 90 days for optimal revitalization and wellness results.\n" .
                   "• Storage: Store in a cool, dry place away from direct sunlight. Refrigerate after opening and consume within 30 days.";

        $mlTitle = 'മഹാഋഷിസ് F27 നാച്ചുറൽ ആന്റിഓക്‌സിഡന്റ് ഫ്രൂട്ട്‌സ് & വെജിറ്റബിൾസ് എക്‌സ്‌ട്രാക്റ്റ് ജ്യൂസ് (375 ml)';
        $mlShortDesc = '18 ഇനം പഴങ്ങൾ, 5 ഇനം പച്ചക്കറികൾ, 4 ഇനം പ്രകൃതിദത്ത വിറ്റാമിനുകൾ, വിശിഷ്ട ഔഷധസസ്യങ്ങൾ എന്നിവ സമന്വയിപ്പിച്ച ഉത്തമ ആരോഗ്യപാനീയം. അകാല വാർദ്ധക്യം, വെരിക്കോസ് വെയിൻ, പൈൽസ് (മൂലക്കുരു), മാനസിക പിരിമുറുക്കം, സന്ധിവേദന, മുടികൊഴിച്ചിൽ, ചർമ്മ പ്രശ്നങ്ങൾ എന്നിവയ്ക്ക് ശരീരത്തിന് സ്വാഭാവിക പോഷക പിന്തുണ നൽകുന്നു.';

        $mlBenefits = "• 27 സമ്പൂർണ്ണ ഔഷധക്കൂട്ടുകൾ (18 പഴങ്ങൾ, 5 പച്ചക്കറികൾ): ശരീരത്തിന് ആവശ്യമായ വിറ്റാമിനുകളും ധാതുക്കളും ആന്റിഓക്‌സിഡന്റുകളും നൽകുന്ന സമ്പൂർണ്ണ ആരോഗ്യ പാനീയം.\n" .
                      "• അകാല വാർദ്ധക്യത്തെ ചെറുക്കുന്നു: ഉയർന്ന ആന്റിഓക്‌സിഡന്റ് ഗുണങ്ങളുള്ളതിനാൽ ശരീരകോശങ്ങളുടെ നാശം തടഞ്ഞ് യുവത്വവും ചുറുചുറുക്കും നിലനിർത്തുന്നു.\n" .
                      "• വെരിക്കോസ് വെയിനിന് പിന്തുണ: മുന്തിരി, മാതളം, ബീറ്റ്റൂട്ട് എന്നിവ രക്തക്കുഴലുകളെ ബലപ്പെടുത്താനും കാലുകളിലെ രക്തയോട്ടം സുഗമമാക്കാനും സഹായിക്കുന്നു.\n" .
                      "• പൈൽസ് (മൂലക്കുരു) ദഹനപ്രശ്നങ്ങൾക്ക് ആശ്വാസം: നെല്ലിക്ക, കറ്റാർവാഴ, പപ്പായ, കിവി എന്നിവ സുഖകരമായ മലശോധന ഉറപ്പാക്കുകയും മലദ്വാരത്തിലെ വീക്കവും വേദനയും കുറയ്ക്കുകയും ചെയ്യുന്നു.\n" .
                      "• മാനസികാരോഗ്യവും ഏകാഗ്രതയും: ബ്രഹ്മി (3%), ബ്ലൂബെറി എന്നിവ തലച്ചോറിന്റെ പ്രവർത്തനങ്ങൾ മെച്ചപ്പെടുത്താനും വിഷാദവും മാനസിക സമ്മർദ്ദവും കുറയ്ക്കാനും സഹായിക്കുന്നു.\n" .
                      "• സന്ധിവേദനയും നീർക്കെട്ടും കുറയ്ക്കുന്നു: മുരിങ്ങയില (4%), മഞ്ഞൾ (1%), ഇഞ്ചി (3%) എന്നിവ സന്ധികളിലെ തേയ്മാനത്തിനും വാതവേദനകൾക്കും സ്വാഭാവിക ആശ്വാസമേകുന്നു.\n" .
                      "• മുടികൊഴിച്ചിൽ തടയാനും ചർമ്മകാന്തിക്കും: 20% നെല്ലിക്കയിലെ പ്രകൃതിദത്ത വിറ്റാമിൻ സി മുടി കൊഴിച്ചിൽ തടഞ്ഞ് മുടിക്ക് കരുത്തും ചർമ്മത്തിന് സ്വാഭാവിക തിളക്കവും നൽകുന്നു.\n" .
                      "• ശ്രദ്ധിക്കുക: ഇവ പരമ്പരാഗത ആരോഗ്യ പോഷക ഗുണങ്ങളാണ്, വൈദ്യചികിത്സയ്ക്ക് പകരമല്ല. ഗുരുതരമായ രോഗങ്ങൾക്ക് ഡോക്ടറുടെ നിർദ്ദേശം തേടുക.";

        $mlIngredients = "• അടങ്ങിയിരിക്കുന്ന 27 ഘടകങ്ങളും അവയുടെ ശതമാനവും (100% പ്രകൃതിദത്ത സത്ത്):\n" .
                         "1. നെല്ലിക്ക (Amla) – 20%\n" .
                         "2. മുന്തിരി (Grape) – 5%\n" .
                         "3. മുരിങ്ങയില (Drumstick) – 4%\n" .
                         "4. മാതളം (Pomegranate) – 4%\n" .
                         "5. ബ്ലൂബെറി (Blueberry) – 3%\n" .
                         "6. ബ്ലാക്ക്‌ബെറി (Blackberry) – 3%\n" .
                         "7. ക്രാൻബെറി (Cranberry) – 3%\n" .
                         "8. അവോക്കാഡോ (Avocado) – 3%\n" .
                         "9. കിവി (Kiwi) – 3%\n" .
                         "10. ആത്തച്ചക്ക (Custard Apple) – 3%\n" .
                         "11. പേരയ്ക്ക (Guava) – 3%\n" .
                         "12. മുസംബി (Sweet Lime) – 3%\n" .
                         "13. മാമ്പഴം (Mango) – 3%\n" .
                         "14. കറ്റാർവാഴ (Aloe Vera) – 3%\n" .
                         "15. ബ്രഹ്മി (Brahmi) – 3%\n" .
                         "16. കാരറ്റ് (Carrot) – 3%\n" .
                         "17. ബീറ്റ്റൂട്ട് (Beetroot) – 3%\n" .
                         "18. ഗ്രീൻ ആപ്പിൾ (Green Apple) – 3%\n" .
                         "19. നോനി (Noni) – 3%\n" .
                         "20. സ്ട്രോബെറി (Strawberry) – 3%\n" .
                         "21. ഇഞ്ചി (Ginger) – 3%\n" .
                         "22. പപ്പായ (Papaya) – 3%\n" .
                         "23. പാഷൻ ഫ്രൂട്ട് (Passion Fruit) – 3%\n" .
                         "24. സപ്പോട്ട / ചിക്കു (Chikoo) – 3%\n" .
                         "25. തക്കാളി (Tomato) – 3%\n" .
                         "26. തണ്ണിമത്തൻ (Watermelon) – 3%\n" .
                         "27. മഞ്ഞൾ (Turmeric) – 1%";

        $mlUsage = "• ദിവസേനയുള്ള ഉപയോഗം: രാവിലെ വെറുംവയറ്റിൽ 15 മില്ലി മുതൽ 30 മില്ലി വരെ കഴിക്കുക.\n" .
                   "• കഴിക്കേണ്ട വിധം: 20–30 മില്ലി F27 ജ്യൂസ് ഒരു ഗ്ലാസ് ഇളംചൂടുവെള്ളത്തിലോ (100–150 മില്ലി) സാധാരണ വെള്ളത്തിലോ കലക്കി പ്രഭാതഭക്ഷണത്തിന് 30 മിനിറ്റ് മുമ്പ് കുടിക്കുക.\n" .
                   "• ഉപയോഗത്തിന് മുമ്പ് കുപ്പി നന്നായി കുലുക്കുക.\n" .
                   "• മികച്ച ഫലങ്ങൾക്കായി 60 മുതൽ 90 ദിവസം വരെ തുടർച്ചയായി ഉപയോഗിക്കുക.\n" .
                   "• സൂക്ഷിക്കേണ്ട വിധം: തണുത്തതും ഉണങ്ങിയതുമായ സ്ഥലത്ത് സൂക്ഷിക്കുക. തുറന്ന ശേഷം ഫ്രിഡ്ജിൽ വച്ച് 30 ദിവസത്തിനകം ഉപയോഗിക്കുക.";

        $hiTitle = 'महर्षि F27 नेचुरल एंटीऑक्सीडेंट फ्रूट्स एंड वेजिटेबल्स एक्सट्रेक्ट जूस (375 ml)';
        $hiShortDesc = '18 प्रकार के फलों, 5 सब्जियों, 4 प्राकृतिक विटामिनों और दुर्लभ जड़ी-बूटियों के अर्क से निर्मित एक अनोखा स्वास्थ्य पेय। यह असमय बुढ़ापा (प्रिमैच्योर एजिंग), वेरिकोज वेन्स, बवासीर (पाइल्स), मानसिक तनाव, जोड़ों के दर्द, बालों के झड़ने और त्वचा समस्याओं में शरीर को संपूर्ण पोषण प्रदान करता है।';

        $hiBenefits = "• 27 वानस्पतिक घटकों का अनोखा मिश्रण (18 फल, 5 सब्जियां और हर्ब्स): शरीर की दैनिक पोषण आवश्यकताओं को पूरा करने वाला प्राकृतिक सुपर-जूस।\n" .
                      "• असमय बुढ़ापे से सुरक्षा: फ्री रेडिकल्स को समाप्त कर कोशिकाओं को नई ऊर्जा और चिरस्थायी यौवन प्रदान करता है।\n" .
                      "• वेरिकोज वेन्स (नसों की कमजोरी) में लाभकारी: अंगूर (5%), अनार और चुकंदर नसों को मजबूती देकर रक्त संचार को सुगम बनाते हैं।\n" .
                      "• बवासीर (पाइल्स) और कब्ज में आराम: पपीता, एलोवेरा, आंवला और कीवी पाचन तंत्र को सुधारकर मल त्याग को आसान बनाते हैं।\n" .
                      "• मानसिक शांति और याददाश्त: ब्राह्मी (3%) और बेरीज दिमाग को शांत रखते हैं और तनाव व अवसाद को कम करते हैं।\n" .
                      "• जोड़ों के दर्द और सूजन में राहत: मोरिंगा (4%), हल्दी (1%) और सोंठ जोड़ों के दर्द और अकड़न को शांत करते हैं।\n" .
                      "• बालों का झड़ना रोके और त्वचा चमकाए: 20% आंवले का विटामिन सी बालों की जड़ों को मजबूत बनाता है और त्वचा में चमक लाता है।\n" .
                      "• अस्वीकरण (Disclaimer): ये पोषण संबंधी उत्पाद के दावे हैं, चिकित्सकीय उपचार नहीं। यह किसी डॉक्टर द्वारा निर्धारित दवा का विकल्प नहीं है।";

        $hiIngredients = "• 27 प्राकृतिक घटकों की सूची और उनका प्रतिशत (100% शुद्ध अर्क):\n" .
                         "1. आंवला (Gooseberry) – 20%\n" .
                         "2. अंगूर (Grape) – 5%\n" .
                         "3. सहजन/मोरिंगा (Drumstick) – 4%\n" .
                         "4. अनार (Pomegranate) – 4%\n" .
                         "5. ब्लूबेरी (Blueberry) – 3%\n" .
                         "6. ब्लैकबेरी (Blackberry) – 3%\n" .
                         "7. क्रैनबेरी (Cranberry) – 3%\n" .
                         "8. एवोकाडो (Avocado) – 3%\n" .
                         "9. कीवी (Kiwi) – 3%\n" .
                         "10. शरीफा/सीताफल (Custard Apple) – 3%\n" .
                         "11. अमरूद (Guava) – 3%\n" .
                         "12. मौसमी (Sweet Lime) – 3%\n" .
                         "13. आम (Mango) – 3%\n" .
                         "14. एलोवेरा (Aloe Vera) – 3%\n" .
                         "15. ब्राह्मी (Brahmi) – 3%\n" .
                         "16. गाजर (Carrot) – 3%\n" .
                         "17. चुकंदर (Beetroot) – 3%\n" .
                         "18. हरा सेब (Green Apple) – 3%\n" .
                         "19. नोनी (Noni) – 3%\n" .
                         "20. स्ट्रॉबेरी (Strawberry) – 3%\n" .
                         "21. अदरक (Ginger) – 3%\n" .
                         "22. पपीता (Papaya) – 3%\n" .
                         "23. पैशन फ्रूट (Passion Fruit) – 3%\n" .
                         "24. चीकू (Chikoo) – 3%\n" .
                         "25. टमाटर (Tomato) – 3%\n" .
                         "26. तरबूज (Watermelon) – 3%\n" .
                         "27. हल्दी (Turmeric) – 1%";

        $hiUsage = "• दैनिक सेवन मात्रा: रोज सुबह खाली पेट 15 से 30 मिलीलीटर लें।\n" .
                   "• सेवन विधि: 20-30 मिली F27 जूस को एक गिलास गुनगुने या सामान्य पानी में मिलाकर नाश्ते से आधा घंटा पहले पिएं।\n" .
                   "• उपयोग से पहले बोतल को अच्छी तरह हिलाएं।\n" .
                   "• बेहतर परिणामों के लिए 60 से 90 दिनों तक नियमित सेवन करें।\n" .
                   "• सुरक्षित रखने का तरीका: ठंडी व सूखी जगह पर रखें। ढक्कन खोलने के बाद फ्रिज में रखें और 30 दिनों के भीतर उपयोग करें।";

        $taTitle = 'மகரிஷி F27 இயற்கை ஆன்டி-ஆக்ஸிடன்ட் பழங்கள் மற்றும் காய்கறிகள் சாறு (375 ml)';
        $taShortDesc = '18 வகை பழங்கள், 5 வகை காய்கறிகள், 4 இயற்கை வைட்டமின்கள் மற்றும் அரிய மூலிகைகளின் சக்திவாய்ந்த கலவை. முதுமை தோற்றம், வெரிகோஸ் வெயின், பைல்ஸ் (மூலம்), மன அழுத்தம், மூட்டு வலி, முடி உதிர்தல் மற்றும் சரும பிரச்சனைகளுக்கு உடலுக்கு முழுமையான ஊட்டச்சத்து ஆதரவை வழங்குகிறது.';

        $taBenefits = "• 27-இன்-1 முழுமையான இயற்கை சூப்பர் ட்ரிங்க்: 18 பழங்கள், 5 காய்கறிகள் மற்றும் மூலிகைகள் அடங்கிய சமச்சீர் ஆரோக்கிய சாறு.\n" .
                      "• இளமை பாதுகாப்பு & ஆன்டி-ஏஜிங்: செல்களை சேதப்படுத்தும் ஃப்ரீ ரேடிக்கல்களை அழித்து இளமையையும் ஆற்றலையும் பாதுகாக்கிறது.\n" .
                      "• வெரிகோஸ் வெயின் (நரம்பு சுருட்டல்) நிவாரணம்: திராட்சை (5%), மாதுளை மற்றும் பீட்ரூட் நரம்புகளை பலப்படுத்தி ரத்த ஓட்டத்தை சீராக்குகிறது.\n" .
                      "• பைல்ஸ் (மூலம்) & மலச்சிக்கல் தீர்வு: பப்பாளி, கற்றாழை, நெல்லிக்காய் மற்றும் கிவி செரிமானத்தை இலகுவாக்கி மூல நோயின் வலியை தணிக்கிறது.\n" .
                      "• மன அமைதி & நினைவாற்றல்: பிராமி (3%) மற்றும் டார்க் பெர்ரி பழங்கள் மன அழுத்தத்தை போக்கி மனதை உற்சாகமாக வைக்கிறது.\n" .
                      "• மூட்டு வலி & வீக்கத்திற்கு தீர்வு: முருங்கை (4%), மஞ்சள் (1%) மற்றும் இஞ்சி மூட்டு பிடிப்பு மற்றும் வாத வலிகளை குறைக்கிறது.\n" .
                      "• முடி உதிர்தல் தடுப்பு & பளபளப்பான சருமம்: 20% நெல்லிக்காய் முடி உதிர்வதை கட்டுப்படுத்தி, முகப்பருக்களை நீக்கி சருமத்திற்கு பொலிவு தருகிறது.\n" .
                      "• மறுப்பு (Disclaimer): இவை பாரம்பரிய ஊட்டச்சத்து நன்மைகளே அன்றி மருத்துவ சிகிச்சைக்கு மாற்றாக கருதக்கூடாது.";

        $taIngredients = "• 27 மூலிகை மற்றும் இயற்கை பழங்களின் விவரம் (100% தூய இயற்கை சாறு):\n" .
                         "1. நெல்லிக்காய் (Amla) – 20%\n" .
                         "2. திராட்சை (Grape) – 5%\n" .
                         "3. முருங்கை (Drumstick/Moringa) – 4%\n" .
                         "4. மாதுளை (Pomegranate) – 4%\n" .
                         "5. ப்ளூபெர்ரி (Blueberry) – 3%\n" .
                         "6. பிளாக்பெர்ரி (Blackberry) – 3%\n" .
                         "7. கிரான்பெர்ரி (Cranberry) – 3%\n" .
                         "8. அவகேடோ (Avocado) – 3%\n" .
                         "9. கிவி (Kiwi) – 3%\n" .
                         "10. சீத்தாப்பழம் (Custard Apple) – 3%\n" .
                         "11. கொய்யா (Guava) – 3%\n" .
                         "12. சாத்துக்குடி (Sweet Lime) – 3%\n" .
                         "13. மாம்பழம் (Mango) – 3%\n" .
                         "14. கற்றாழை (Aloe Vera) – 3%\n" .
                         "15. பிராமி (Brahmi) – 3%\n" .
                         "16. கேரட் (Carrot) – 3%\n" .
                         "17. பீட்ரூட் (Beetroot) – 3%\n" .
                         "18. பச்சை ஆப்பிள் (Green Apple) – 3%\n" .
                         "19. நோனி (Noni) – 3%\n" .
                         "20. ஸ்ட்ராபெர்ரி (Strawberry) – 3%\n" .
                         "21. இஞ்சி (Ginger) – 3%\n" .
                         "22. பப்பாளி (Papaya) – 3%\n" .
                         "23. பாஷன் ஃப்ரூட் (Passion Fruit) – 3%\n" .
                         "24. சப்போட்டா (Chikoo) – 3%\n" .
                         "25. தக்காளி (Tomato) – 3%\n" .
                         "26. தர்பூசணி (Watermelon) – 3%\n" .
                         "27. மஞ்சள் (Turmeric) – 1%";

        $taUsage = "• தினசரி அளவு: காலை வெறும் வயிற்றில் 15 முதல் 30 மி.லி உட்கொள்ளவும்.\n" .
                   "• உட்கொள்ளும் முறை: 20-30 மி.லி F27 சாற்றை ஒரு டம்ளர் (100-150 மி.லி) நீரில் கலந்து காலை உணவிற்கு முன் பருகவும்.\n" .
                   "• பாட்டிலை நன்கு குலுக்கிய பின் பயன்படுத்தவும்.\n" .
                   "• சிறந்த பலனுக்கு 60 முதல் 90 நாட்கள் வரை தொடர்ந்து பயன்படுத்தவும்.\n" .
                   "• சேமிக்கும் முறை: குளிர்ந்த இடத்தில் வைக்கவும். திறந்த பிறகு பிரிட்ஜில் வைத்து 30 நாட்களுக்குள் பயன்படுத்தவும்.";

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

        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $digestionPart = BodyPart::where('slug', 'digestion')->first();
        $headPart = BodyPart::where('slug', 'head')->first();
        $skinPart = BodyPart::where('slug', 'skin')->first();
        $hairPart = BodyPart::where('slug', 'hair')->first();
        $jointsPart = BodyPart::where('slug', 'joints')->first();
        $chestPart = BodyPart::where('slug', 'chest')->first();
        $bodyPartIds = collect([
            $wholeBodyPart?->id,
            $digestionPart?->id,
            $headPart?->id,
            $skinPart?->id,
            $hairPart?->id,
            $jointsPart?->id,
            $chestPart?->id,
        ])->filter()->values()->all();

        $featuredImagePath = '/images/products/maharshi-f27-natural-antioxidant-fruits-vegetables-extract-375ml.jpg';
        $galleryImages = [
            '/images/products/maharshi-f27-natural-antioxidant-fruits-vegetables-extract-375ml.jpg',
        ];

        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $staminaCategory = Category::where('slug', 'stamina')->first();
        $categoryIds = collect([$superfoodsCategory?->id, $staminaCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        $productData = [
            'name' => $enTitle,
            'slug' => $slug,
            'sku' => 'MHR-F27-375ML',
            'price' => 999.00,
            'sale_price' => 975.00,
            'stock_quantity' => 100,
            'unit_size' => '375 ml',
            'badge' => '27 Superfoods • Natural Antioxidant',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 10,
            'is_free_shipping' => true,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Maharshi’s F27 Natural Antioxidant Extract (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Maharshi’s F27 Natural Antioxidant Extract product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        $this->command?->info("Successfully seeded Maharshi’s F27 Natural Antioxidant Extract 375ml (#{$product->id}) with 27 ingredients & targeted health claims.");
    }
}
