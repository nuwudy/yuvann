<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AshwasPainReliefOilTranslationSeeder extends Seeder
{
    /**
     * Seed Ashwas Pain Relief Oil (Mootu Oil) product and full 4-language translations.
     */
    public function run(): void
    {
        $matchingProducts = Product::where('slug', 'ashwas-pain-relief-oil-mootu-oil-50ml')
            ->orWhere('sku', 'ASH-PR-50ML')
            ->orWhere('slug', 'like', '%ashwas%')
            ->orWhere('name', 'like', '%Ashwas%')
            ->get();

        $enTitle = 'Ashwas Pain Relief Oil (Mootu Oil) – 50ml';
        $enShortDesc = 'Classical Siddha proprietary pain relief formulation enriched with Strychnos Nuxvomica, Nirgundi, and sesame oil for fast, penetrating relief from joint pain, backache, knee pain, and muscular stiffness.';

        $enBenefits = "• Rapid Joint & Knee Pain Relief: Deeply penetrates synovial joint cavities to reduce friction, relieve knee joint stiffness (Mootu Vedana), and restore pain-free mobility.\n" .
                      "• Powerful Spinal & Lower Back Support: Eases lumbar spasm, Sciatica-type nerve irritation, and postural back stiffness from prolonged sitting or heavy lifting.\n" .
                      "• Relieves Frozen Shoulder & Cervical Strain: Releases tension in the neck, traps, and shoulders, soothing nerve compression and muscular knots.\n" .
                      "• Anti-Inflammatory & Analgesic Action: Calms localized heat and tissue swelling caused by osteoarthritis, age-related degeneration, and inflammatory flare-ups.\n" .
                      "• Classical Siddha Proprietary Medicine: Manufactured under strict ISO 9001:2015 and GMP certified quality standards with 100% natural herbal ingredients.\n" .
                      "• Fast Absorbing & Non-Sticky: Formulated in pure Sesame oil (Tila Taila) for deep transdermal delivery without uncomfortably greasy residue.";

        $enIngredients = "• Strychnos Nuxvomica (Kupilu / Kanjiram) – 200 mg: Renowned classical neuro-muscular analgesic that soothes hypersensitive nerve endings, relieves chronic ache, and restores localized motor nerve vitality.\n" .
                         "• Vitex Negundo (Nirgundi / Karinochi) – 50 mg: Supreme anti-inflammatory botanical that pacifies aggravated Vata, dispels joint swelling, and eases arthritis pain.\n" .
                         "• Zingiber Officinale (Dry Ginger / Chukku) – 50 mg: Thermogenic digestive herb that disperses cold stagnation, improves local micro-vascular circulation, and provides soothing warmth.\n" .
                         "• Piper Nigrum (Black Pepper / Kurumolaku) – 25 mg: Enhances cutaneous absorption and carries active herbal compounds deep into sub-fascial tissue layers.\n" .
                         "• Nardostachys Jatamansi (Jatamansi) – 25 mg: Natural anti-spasmodic that relaxes hypertonic muscles, reduces stress-induced muscle rigidity, and calms peripheral pain.\n" .
                         "• Trachyspermum Ammi (Ajwain / Ayamodakam) – 10 mg: Relieves muscular cramps, stiffness, and local colic sensations.\n" .
                         "• Curcuma Longa (Turmeric / Manjal) – 10 mg: Curcumin-rich antioxidant that combats joint cartilage oxidative stress and tissue inflammation.\n" .
                         "• Alocasia Indica (Manaka) – 10 mg: Classical Siddha herb revered for resolving deep musculoskeletal swelling and synovial edema.\n" .
                         "• Allium Sativum (Garlic / Veluthulli) – 10 mg: Promotes circulation, dissolves localized metabolic blockages (Ama), and strengthens joint resilience.\n" .
                         "• Sesamum Indicum (Pure Sesame Oil / Tila Taila) – Q.S.: Pure traditional unctuous base possessing heavy, warm, and penetrating (Tikshna-Sukshma) properties that nourish bone and joint tissues.";

        $enUsage = "• Application Instructions:\n" .
                   "1. Take a sufficient quantity of Ashwas Pain Relief Oil on your palm.\n" .
                   "2. Gently apply over the painful joint, lower back, knee, shoulder, or neck.\n" .
                   "3. Massage in light circular strokes for 5 to 10 minutes until the oil is absorbed into the skin.\n" .
                   "4. For enhanced relief, apply mild hot fomentation (warm towel or hot water bag) 30 minutes after massage.\n" .
                   "5. Use 2 to 3 times daily, especially in the morning and before sleeping at night.\n" .
                   "• Caution: For external use only. Do not apply on open cuts, wounds, burns, or broken skin. Wash hands thoroughly after application.";

        $mlTitle = 'അശ്വാസ് പെയിൻ റിലീഫ് ഓയിൽ (മൂട്ടു ഓയിൽ) – 50ml';
        $mlShortDesc = 'കാഞ്ഞിരം, കരിനൊച്ചി, നല്ലെണ്ണ എന്നിവയാൽ സമ്പുഷ്ടമായ സിദ്ധ ഔഷധക്കൂട്ടിൽ തയ്യാറാക്കിയ, മൂട്ടുവേദന, നടുവേദന, തോൾവേദന, സന്ധിവേദന എന്നിവയ്ക്ക് ഉടനടി ആശ്വാസം നൽകുന്ന ദിവ്യ തൈലം.';

        $mlBenefits = "• മൂട്ടുവേദനയ്ക്കും സന്ധിവേദനയ്ക്കും ഉടനടി ആശ്വാസം: മൂട്ടുകളിലെയും കാൽമുട്ടുകളിലെയും തേയ്മാനവും വേദനയും കാഠിന്യവും കുറച്ച് ആയാസരഹിതമായ ചലനം സാധ്യമാക്കുന്നു.\n" .
                      "• നടുവേദനയ്ക്കും പേശിവലിവിനും ഫലപ്രദം: ദീർഘനേരം ഇരിക്കുമ്പോഴോ ഭാരം ഉയർത്തുമ്പോഴോ ഉണ്ടാകുന്ന നടുവേദന, സ്പൈനൽ ഡിസ്ക് സമ്മർദ്ദം, ഉളുക്ക് എന്നിവയ്ക്ക് പെട്ടെന്ന് ശമനം നൽകുന്നു.\n" .
                      "• തോൾവേദനയും കഴുത്തുവേദനയും ശമിപ്പിക്കുന്നു: കമ്പ്യൂട്ടർ ഉപയോഗം കൊണ്ടോ ഉറക്കത്തിലെ അപാകത കൊണ്ടോ ഉണ്ടാകുന്ന ഫ്രോസൺ ഷോൾഡർ, കഴുത്തിലെ പിടുത്തം (Cervical stiffness) എന്നിവ ഇല്ലാതാക്കുന്നു.\n" .
                      "• വാതവേദനയും നീർക്കെട്ടും മാറ്റുന്നു: സന്ധികളിൽ അടിഞ്ഞുകൂടുന്ന നീർക്കെട്ട് കുറയ്ക്കാനും വാതസംബന്ധമായ കഠിനവേദനകൾക്കും അത്യുത്തമം.\n" .
                      "• സിദ്ധ പ്രൊപ്രൈറ്ററി മെഡിസിൻ: ISO 9001:2015, GMP അംഗീകൃത മാനദണ്ഡങ്ങൾ പാലിച്ച് നിർമ്മിച്ച 100% പ്രകൃതിദത്ത ബാഹ്യ ഔഷധം.\n" .
                      "• എളുപ്പത്തിൽ ആഗിരണം ചെയ്യപ്പെടുന്നു: നല്ലെണ്ണയുടെ ഗുണങ്ങളാൽ ചർമ്മത്തിലേക്ക് ആഴത്തിൽ ആഗിരണം ചെയ്യപ്പെടുകയും വസ്ത്രങ്ങളിൽ കറയോ അമിതമായ പശയോ അവശേഷിപ്പിക്കാതിരിക്കുകയും ചെയ്യുന്നു.";

        $mlIngredients = "• കാഞ്ഞിരം (Strychnos Nuxvomica) – 200 mg: നാഡീവേദനകളെയും പേശീവേദനകളെയും വേഗത്തിൽ ശമിപ്പിക്കാൻ സഹായിക്കുന്ന അതിശക്തമായ പരമ്പരാഗത ഔഷധം.\n" .
                         "• കരിനൊച്ചി (Vitex Negundo) – 50 mg: വാതഹരവും നീർക്കെട്ട് ശമിപ്പിക്കുന്നതുമായ ശ്രേഷ്ഠ ഔഷധം; സന്ധിവാതത്തിനും നീരിനും ഉത്തമ പരിഹാരം.\n" .
                         "• ചുക്ക് (Zingiber Officinale) – 50 mg: രക്തയോട്ടം വർദ്ധിപ്പിക്കുകയും സന്ധികളിലെ തണുപ്പും മുറുക്കവും അകറ്റി ഉഷ്ണം പകരുകയും ചെയ്യുന്നു.\n" .
                         "• കുരുമുളക് (Piper Nigrum) – 25 mg: ഔഷധ ഘടകങ്ങളെ ചർമ്മത്തിന്റെ ആഴങ്ങളിലേക്ക് വേഗത്തിൽ എത്തിക്കാൻ സഹായിക്കുന്നു.\n" .
                         "• ജടാമാഞ്ചി (Nardostachys Jatamansi) – 25 mg: വേദനസംഹാരിയായി പ്രവർത്തിക്കുകയും പേശീവലിവ് തടഞ്ഞ് സ്വാഭാവിക ശാന്തത നൽകുകയും ചെയ്യുന്നു.\n" .
                         "• അയമോദകം (Trachyspermum Ammi) – 10 mg: പിരിമുറുക്കമുള്ള പേശികൾക്ക് ആശ്വാസമേകുകയും വേദന കുറയ്ക്കുകയും ചെയ്യുന്നു.\n" .
                         "• മഞ്ഞൾ (Curcuma Longa) – 10 mg: സന്ധികളിലെ ഇൻഫ്ലമേഷൻ (വീക്കം) കുറയ്ക്കാനും രോഗാണുബാധ തടയാനും സഹായിക്കുന്നു.\n" .
                         "• മാനക (Alocasia Indica) – 10 mg: സന്ധികളിലെ ആഴത്തിലുള്ള നീർക്കെട്ടും വീക്കവും മാറ്റാൻ സിദ്ധവൈദ്യത്തിൽ ഉപയോഗിക്കുന്ന വിശിഷ്ട ഔഷധം.\n" .
                         "• വെളുത്തുള്ളി (Allium Sativum) – 10 mg: രക്തയോട്ടം മെച്ചപ്പെടുത്തുകയും വാതദോഷങ്ങളെ ശമിപ്പിക്കുകയും ചെയ്യുന്നു.\n" .
                         "• ശുദ്ധമായ നല്ലെണ്ണ (Sesamum Indicum) – Q.S.: അസ്ഥികളിലേക്കും തരുണാസ്ഥികളിലേക്കും ആഴ്ന്നിറങ്ങി പോഷണം നൽകുന്ന ഉത്തമ തൈല അടിത്തറ.";

        $mlUsage = "• ഉപയോഗിക്കേണ്ട വിധം:\n" .
                   "1. ആവശ്യത്തിന് അശ്വാസ് പെയിൻ റിലീഫ് ഓയിൽ കയ്യിലെടുക്കുക.\n" .
                   "2. കാൽമുട്ട്, നടുവ്, തോൾ, കഴുത്ത് അല്ലെങ്കിൽ വേദനയുള്ള സന്ധികളിൽ പുരട്ടുക.\n" .
                   "3. എണ്ണ ചർമ്മത്തിൽ നന്നായി ആഗിരണം ചെയ്യുന്നതുവരെ 5 മുതൽ 10 മിനിറ്റ് വരെ മൃദുവായി വട്ടത്തിൽ മസാജ് ചെയ്യുക.\n" .
                   "4. മികച്ച ഫലത്തിനായി, മസാജ് ചെയ്ത് 30 മിനിറ്റിനു ശേഷം ഇളം ചൂടുള്ള തുണി കൊണ്ടോ ഹോട്ട് വാട്ടർ ബാഗ് കൊണ്ടോ ചൂടുപിടിക്കുക.\n" .
                   "5. ദിവസവും 2 മുതൽ 3 തവണ വരെ (പ്രത്യേകിച്ച് രാത്രി ഉറങ്ങുന്നതിന് മുമ്പും രാവിലെയും) ഉപയോഗിക്കുക.\n" .
                   "• ശ്രദ്ധിക്കുക: ബാഹ്യ ഉപയോഗത്തിന് മാത്രം. മുറിവുകളിലോ പൊള്ളലേറ്റ ഭാഗത്തോ പുരട്ടരുത്. ഉപയോഗത്തിന് ശേഷം കൈകൾ കഴുകുക.";

        $hiTitle = 'अश्वास पेन रिलीफ ऑयल (मूट्टू ऑयल) – 50ml';
        $hiShortDesc = 'कुचिला (कांजीरम), निर्गुंडी और शुद्ध तिल के तेल से निर्मित सिद्ध मालिका औषधि, जो घुटनों के दर्द, कमर दर्द, फ्रोजन शोल्डर और मांसपेशियों की जकड़न में त्वरित राहत प्रदान करता है।';

        $hiBenefits = "• घुटनों व जोड़ों के दर्द में तुरंत आराम: घुटनों के जोड़ों में गहराई तक समाकर घर्षण और दर्द (मूट्टू वेदना) को दूर करता है और लचीलापन बढ़ाता है।\n" .
                      "• कमर दर्द और साइटिका में बेहद प्रभावी: लंबे समय तक बैठने या भारी वजन उठाने से होने वाले कमर दर्द और मांसपेशियों के खिंचाव को शांत करता है।\n" .
                      "• फ्रोजन शोल्डर और गर्दन की जकड़न से राहत: कंधों के दर्द, गर्दन के अकड़न (Cervical) और नसों के दबाव को दूर कर तुरंत गतिशीलता प्रदान करता है।\n" .
                      "• सूजन और गठिया (वात) नाशक: जोड़ों की सूजन, ऑस्टियोआर्थराइटिस और मौसमी दर्द को कम करता है।\n" .
                      "• प्रामाणिक सिद्ध मालिका औषधि: ISO 9001:2015 और GMP प्रमाणित मानकों के तहत निर्मित 100% प्राकृतिक तेल।\n" .
                      "• त्वचा में शीघ्र अवशोषण: तिल के तेल के गुणों के कारण बिना किसी चिपचिपाहट के त्वचा के अंदर तक तेजी से असर दिखाता है।";

        $hiIngredients = "• कुचिला / कांजीरम (Strychnos Nuxvomica) – 200 mg: नसों और मांसपेशियों के गंभीर दर्द को दूर करने वाला अत्यंत शक्तिशाली पारंपरिक दर्द निवारक।\n" .
                         "• निर्गुंडी (Vitex Negundo) – 50 mg: वात नाशक और सूजन मिटाने वाली सर्वश्रेष्ठ वनस्पति औषधि; जोड़ों की सूजन को दूर करती है।\n" .
                         "• सोंठ (Zingiber Officinale) – 50 mg: रक्त संचार में सुधार कर जोड़ों की ठंडक और सुबह की अकड़न को दूर करती है।\n" .
                         "• काली मिर्च (Piper Nigrum) – 25 mg: औषधीय गुणों को त्वचा की गहरी परतों तक पहुंचाने में सहायक।\n" .
                         "• जटामांसी (Nardostachys Jatamansi) – 25 mg: तनावग्रस्त मांसपेशियों को आराम देकर दर्द की संवेदनशीलता को कम करती है।\n" .
                         "• अजवायन (Trachyspermum Ammi) – 10 mg: मांसपेशियों की ऐंठन और स्थानीय दर्द को शांत करती है।\n" .
                         "• हल्दी (Curcuma Longa) – 10 mg: जोड़ों के ऊतकों की सूजन (Inflammation) को समाप्त करने वाली प्रसिद्ध औषधि।\n" .
                         "• मानकन्द (Alocasia Indica) – 10 mg: सिद्ध चिकित्सा में जोड़ों के गहरे दर्द और सूजन को दूर करने के लिए प्रसिद्ध।\n" .
                         "• लहसुन (Allium Sativum) – 10 mg: रक्त परिसंचरण को बढ़ाकर वात के ठहराव को दूर करता है।\n" .
                         "• शुद्ध तिल का तेल (Sesamum Indicum) – Q.S.: हड्डियों और जोड़ों को गहराई से पोषण देने वाला सर्वोत्तम तेल आधार।";

        $hiUsage = "• उपयोग विधि:\n" .
                   "1. आवश्यकतानुसार अश्वास पेन रिलीफ ऑयल हथेली पर लें।\n" .
                   "2. घुटने, कमर, कंधे, गर्दन या प्रभावित जोड़ पर लगाएं।\n" .
                   "3. तेल के अवशोषित होने तक 5 से 10 मिनट तक हल्के हाथों से गोलाकार मालिश करें।\n" .
                   "4. बेहतर परिणाम के लिए मालिश के 30 मिनट बाद गर्म पानी की थैली या गर्म तौलिए से हल्की सिकाई करें।\n" .
                   "5. दिन में 2 से 3 बार, विशेष रूप से रात को सोने से पहले और सुबह उपयोग करें।\n" .
                   "• सावधानी: केवल बाहरी उपयोग के लिए। खुले घावों या कटी हुई त्वचा पर न लगाएं। उपयोग के बाद हाथ धो लें।";

        $taTitle = 'அஷ்வாஸ் வலி நிவாரண தைலம் (மூட்டு தைலம்) – 50ml';
        $taShortDesc = 'காஞ்சிரை, கருநொச்சி மற்றும் நல்லெண்ணெய் கொண்டு பாரம்பரிய சித்த மருத்துவ முறைப்படி தயாரிக்கப்பட்ட, மூட்டு வலி, இடுப்பு வலி, தோள்பட்டை வலி மற்றும் தசைப்பிடிப்புகளுக்கு உடனடி தீர்வளிக்கும் வலி நிவாரண தைலம்.';

        $taBenefits = "• மூட்டு வலிக்கு உடனடி நிவாரணம்: முழங்கால் மூட்டுகளில் ஊடுருவி உராய்வு மற்றும் வலியை (மூட்டு வலி) போக்கி சுலபமான இயக்கத்தை தருகிறது.\n" .
                      "• இடுப்பு மற்றும் முதுகு வலிக்கு சிறந்த பலன்: நீண்ட நேரம் அமர்வதால் அல்லது பாரம் தூக்குவதால் ஏற்படும் தசைப்பிடிப்பு, நரம்பு வலி மற்றும் முதுகு பிடிப்பை நீக்குகிறது.\n" .
                      "• உறைந்த தோள்பட்டை (Frozen Shoulder) மற்றும் கழுத்து வலி தீர்வு: தோள்பட்டை இறுக்கம், கழுத்து பிடிப்பு மற்றும் நரம்பு அழுத்தத்தை தணித்து புத்துணர்ச்சி அளிக்கிறது.\n" .
                      "• வீக்கம் மற்றும் வாத வலியை குறைக்கிறது: மூட்டுகளில் ஏற்படும் நீர் வீக்கம், மூட்டு தேய்மானம் மற்றும் மூட்டு வாத வலியை விரட்டுகிறது.\n" .
                      "• சித்த முறை அங்கீகரிக்கப்பட்ட மருந்து: ISO 9001:2015 மற்றும் GMP தரச்சான்றிதழ் பெற்ற அதிநவீன உற்பத்தித் தரம்.\n" .
                      "• தோலில் விரைவாக உறிஞ்சப்படும் தன்மை: நல்லெண்ணெய் அடிப்படையிலானதால் பிசுபிசுப்பின்றி தோலின் அடி ஆழம் வரை பாய்கிறது.";

        $taIngredients = "• எட்டி மரம் / காஞ்சிரை (Strychnos Nuxvomica) – 200 mg: நரம்பு மற்றும் தசை வலிகளை வேகமாக விரட்டும் ஆற்றல் வாய்ந்த மூலிகை.\n" .
                         "• கருநொச்சி (Vitex Negundo) – 50 mg: வாதத்தை சமன் செய்து மூட்டு வீக்கத்தை குறைக்கும் இணையற்ற மூலிகை.\n" .
                         "• சுக்கு (Zingiber Officinale) – 50 mg: ரத்த ஓட்டத்தை சீராக்கி காலையில் ஏற்படும் மூட்டு விறைப்பை நீக்குகிறது.\n" .
                         "• குறுமிளகு (Piper Nigrum) – 25 mg: மருத்துவ சத்துக்களை தோலின் ஆழமான அடுக்குகளுக்கு கொண்டு சேர்க்கிறது.\n" .
                         "• ஜடாமாஞ்சி (Nardostachys Jatamansi) – 25 mg: தசை பிடிப்புகளை தளர்த்தி வலி உணர்வை அமைதிப்படுத்துகிறது.\n" .
                         "• ஓமம் (Trachyspermum Ammi) – 10 mg: தசை வலிகள் மற்றும் பிடிப்புகளுக்கு உடனடி இதமளிக்கிறது.\n" .
                         "• மஞ்சள் (Curcuma Longa) – 10 mg: மூட்டுகளின் உள்புற வீக்கத்தை போக்கும் இயற்கையான ஆன்டி-இன்ஃப்ளமேட்டரி மூலிகை.\n" .
                         "• சேம்பு வகை / மானகா (Alocasia Indica) – 10 mg: சித்த மருத்துவத்தில் மூட்டு வீக்கம் மற்றும் தசை வலியை போக்க பயன்படுத்தப்படும் முக்கிய மருந்து.\n" .
                         "• பூண்டு (Allium Sativum) – 10 mg: ரத்த நாளங்களை விரிவுபடுத்தி வாத தேக்கத்தை குறைக்கிறது.\n" .
                         "• தூய நல்லெண்ணெய் (Sesamum Indicum) – Q.S.: எலும்புகளுக்கும் குருத்தெலும்புகளுக்கும் ஆழ்ந்த ஊட்டமளிக்கும் உன்னத தைல அடிப்படை.";

        $taUsage = "• பயன்படுத்தும் முறை:\n" .
                   "1. தேவையான அளவு அஷ்வாஸ் தைலத்தை உள்ளங்கையில் எடுக்கவும்.\n" .
                   "2. முழங்கால், இடுப்பு, தோள்பட்டை, கழுத்து அல்லது வலி உள்ள பகுதியில் தடவவும்.\n" .
                   "3. தைலம் தோலில் நன்றாக உறிஞ்சும் வரை 5 முதல் 10 நிமிடங்கள் மென்மையாக மசாஜ் செய்யவும்.\n" .
                   "4. சிறந்த நிவாரணத்திற்கு, மசாஜ் செய்து 30 நிமிடங்களுக்குப் பிறகு வெந்நீர் ஒத்தடம் கொடுக்கவும்.\n" .
                   "5. தினமும் 2 முதல் 3 முறை (குறிப்பாக இரவில் தூங்கும் முன்பும் காலையிலும்) பயன்படுத்தவும்.\n" .
                   "• எச்சரிக்கை: வெளிப்புற பயன்பாட்டிற்கு மட்டுமே. திறந்த புண்கள் மீது தடவக்கூடாது. தடவிய பின் கைகளை கழுவவும்.";

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

        $jointsPart = BodyPart::where('slug', 'joints')->first();
        $backPart = BodyPart::where('slug', 'back')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $bodyPartIds = collect([$jointsPart?->id, $backPart?->id, $wholeBodyPart?->id])->filter()->values()->all();

        $featuredImagePath = '/images/products/ashwas-pain-relief-oil-mootu-oil-50ml.png';
        $galleryImages = [
            '/images/products/ashwas-pain-relief-oil-front.png',
            '/images/products/ashwas-pain-relief-oil-ingredients.png',
            '/images/products/ashwas-pain-relief-oil-mootu-oil-50ml.png',
        ];

        $category = Category::where('slug', 'womens-care')->first() ?? Category::first();

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'name' => $enTitle,
                    'short_description' => $enShortDesc,
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                    'unit_size' => '50 ml',
                    'featured_image' => $featuredImagePath,
                    'gallery_images' => $galleryImages,
                    'badge' => 'Joint & Pain Relief',
                    'is_active' => true,
                    'is_featured' => true,
                ]);

                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                if ($category) {
                    $product->categories()->syncWithoutDetaching([$category->id]);
                }

                $this->command?->info("Updated Ashwas Pain Relief Oil product (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $product = Product::create([
                'name' => $enTitle,
                'slug' => 'ashwas-pain-relief-oil-mootu-oil-50ml',
                'sku' => 'ASH-PR-50ML',
                'price' => 320.00,
                'sale_price' => 260.00,
                'stock_quantity' => 60,
                'unit_size' => '50 ml',
                'badge' => 'Joint & Pain Relief',
                'featured_image' => $featuredImagePath,
                'gallery_images' => $galleryImages,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 1,
                'is_free_shipping' => false,
                'translations' => $translations,
            ]);

            if ($category) {
                $product->categories()->syncWithoutDetaching([$category->id]);
            }
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }

            $this->command?->info("Created new Ashwas Pain Relief Oil product (#{$product->id}) with full 4-language translations.");
        }
    }
}
