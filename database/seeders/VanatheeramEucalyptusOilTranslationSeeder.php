<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class VanatheeramEucalyptusOilTranslationSeeder extends Seeder
{
    /**
     * Seed Vanatheeram Nilgiri Eucalyptus Oil of Wayanad with 4-language translations and size variants.
     */
    public function run(): void
    {
        $primarySlug = 'vanatheeram-nilgiri-eucalyptus-oil-wayanad';

        $product = Product::where('slug', $primarySlug)
            ->orWhere('sku', 'VAN-EUC-30ML')
            ->orWhere('sku', 'VAN-EUC-100ML')
            ->first();

        $enTitle = 'Vanatheeram® Nilgiri Eucalyptus Oil of Wayanad – 100% Pure Steam Distilled';
        $enShortDesc = '100% pure, organic, steam-distilled Nilgiri Eucalyptus Oil harvested from the pristine high-altitude forests of Wayanad by indigenous tribal communities. An all-in-one natural powerhouse: 1 Bottle = 7 Proven Uses for instant relief from blocked nose, sinus, headaches, joint aches, mosquitoes, and scalp dandruff.';

        $enBenefits = "• 1. Instant Relief from Cold, Cough & Blocked Nose (#1 Selling Point): Steam inhalation clears blocked nasal passages in under 5 minutes; opens tight airways for sinus, asthma, and deep chest congestion.\n" .
                      "• 2. Natural Analgesic & Pain Relief: Fast-acting relief for throbbing headaches, joint pain, muscular aches, backache, and knee pain.\n" .
                      "• 3. Chemical-Free Mosquito & Insect Repellent: 100% natural, DEET-free protection. Diffuse in your room or spray around the house to repel mosquitoes safely without harmful fumes.\n" .
                      "• 4. Powerful Antiseptic & Skin Healer: Natural antibacterial, antifungal, and antiviral properties soothe minor cuts, insect bites, acne pimples, and superficial burns.\n" .
                      "• 5. Scalp Health & Dandruff Elimination: Deeply cleanses and cools the scalp, removes stubborn dandruff, calms itching, and eliminates head lice naturally.\n" .
                      "• 6. Stress Relief, Calming Aromatherapy & Restful Sleep: Woody, refreshing camphoraceous aroma calms the nervous system, eases anxiety, and encourages deep, uninterrupted sleep when diffused.\n" .
                      "• 7. Immunity & Natural Mind Refreshment: Pure cineole vapours purify indoor air, support upper respiratory immune defense, and sharpen mental alertness.\n" .
                      "• 8. Bonus Aromatic Floor Disinfectant: Adding a few drops to mopping water leaves the entire home smelling forest-fresh while keeping ants, flies, and crawling insects away.\n" .
                      "• Direct Tribal Empowerment: Marketed by STTR (Society for Transgenders and Tribals Relief), Wayanad, guaranteeing authentic forest harvest and sustainable tribal livelihoods.";

        $enIngredients = "• 100% Pure Organic Nilgiri Eucalyptus Essential Oil (Eucalyptus globulus). Steam-distilled from freshly handpicked forest leaves. Batch No: 002. FSSAI: 21325185000809. Zero synthetic fragrances, zero paraffin, zero adulterants.";

        $enUsage = "• Steam Inhalation for Cold / Sinus / Blocked Nose: Add 4 drops into 1 litre of steaming hot water. Cover your head with a towel and inhale deeply for 5 minutes. Repeat twice daily for rapid respiratory relief.\n" .
                   "• For Headaches: Dilute 2 drops of eucalyptus oil with 1 teaspoon of virgin coconut oil. Gently massage across your forehead, temples, and back of the neck.\n" .
                   "• For Joint & Muscle Pain: Mix 3 drops with 1 teaspoon of warm coconut oil or sesame oil. Massage firmly into painful joints, knees, or back twice daily.\n" .
                   "• For Chemical-Free Mosquito Defense: Add 6 drops to your room diffuser, or blend 10 drops in 100 ml of water in a spray bottle and mist the room before dusk.\n" .
                   "• Night Chest Rub for Cough: Blend 3 drops with 1 teaspoon of coconut oil (or herbal balm) and rub generously over the chest and upper back. Wear warm clothing to trap soothing vapours.\n" .
                   "• Rejuvenating Pain-Relief Bath: Add 5 drops into a warm bucket of bath water to dissolve full-body muscular fatigue and revitalize the body.\n" .
                   "• For Dandruff & Scalp Care: Mix 4 drops with your regular hair oil. Massage into the scalp, leave on for 1 hour, and rinse with a gentle herbal shampoo.\n" .
                   "• Bonus Floor Cleaning: Add 10 drops to your mopping water bucket for natural germ protection, pest deterrence, and a lingering forest aroma.\n" .
                   "• Mandatory Precautions: FOR EXTERNAL USE ONLY. Do not ingest or drink. Always dilute with a carrier oil (coconut/sesame) before topical application—undiluted oil may cause a burning sensation on sensitive skin. Keep strictly away from eyes. Not suitable for direct application on infants below 2 years of age. Store in a cool, dry place away from direct sunlight.";

        $mlTitle = 'വനതീരം® നീലഗിരി യൂക്കാലിപ്റ്റസ് തൈലം (Eucalyptus Oil of Wayanad)';
        $mlShortDesc = 'വയനാടൻ വനങ്ങളിൽ നിന്ന് ഗോത്രവിഭാഗങ്ങൾ പരമ്പരാഗതമായി ശേഖരിച്ച് ശുദ്ധമായ നീരാവി സ്വേദനം (Steam Distilled) വഴി ഉൽപ്പാദിപ്പിച്ച 100% പ്രകൃതിദത്ത നീലഗിരി യൂക്കാലിപ്റ്റസ് തൈലം. 1 കുപ്പി = 7 അത്ഭുത ഗുണങ്ങൾ! മൂക്കടപ്പ്, ജലദോഷം, തലവേദന, സന്ധിവേദന, കൊതുക് ശല്യം, താരൻ എന്നിവയ്ക്ക് ഉത്തമ പ്രകൃതിദത്ത പരിഹാരം.';

        $mlBenefits = "• 1. ജലദോഷം, ചുമ, മൂക്കടപ്പ് എന്നിവയ്ക്ക് ഉടനടി ശമനം (#1 Selling Point): 5 മിനിറ്റ് ആവി പിടിച്ചാൽ കഠിനമായ മൂക്കടപ്പും സൈനസും നെഞ്ചിലെ കഫക്കെട്ടും അതിവേഗം മാറും.\n" .
                      "• 2. അത്ഭുതകരമായ വേദന സംഹാരി: തലവേദന, സന്ധിവേദന, പേശിവേദന, നടുവേദന, മുട്ടുവേദന എന്നിവയ്ക്ക് തൽക്ഷണ ആശ്വാസം നൽകുന്നു.\n" .
                      "• 3. രാസവസ്തുക്കളില്ലാത്ത കൊതുക് നിവാരിണി: ഡിഫ്യൂസറിലോ റൂം സ്പ്രേയിലോ ഉപയോഗിച്ചാൽ കുട്ടികൾക്ക് യാതൊരു ദോഷവുമില്ലാതെ കൊതുകുകളെയും പ്രാണികളെയും തുരത്താം.\n" .
                      "• 4. ആന്റിസെപ്റ്റിക് & ചർമ്മ സംരക്ഷണം: ചെറിയ മുറിവുകൾ, പ്രാണികളുടെ കടി, മുഖക്കുരു, പൊള്ളലുകൾ എന്നിവയ്ക്ക് അണുബാധ തടയാൻ ആന്റിബാക്ടീരിയൽ സംരക്ഷണം.\n" .
                      "• 5. മുടിക്കും താരനും ഉത്തമം: താരൻ, തലയോട്ടിയിലെ ചൊറിച്ചിൽ, പേൻ എന്നിവ ഇല്ലാതാക്കാനും തലയ്ക്ക് കുളിർമ്മ നൽകാനും സഹായിക്കുന്നു.\n" .
                      "• 6. മാനസിക സമ്മർദ്ദവും നല്ല ഉറക്കവും: സുഖകരമായ വനസുഗന്ധം മനസ്സിന് ശാന്തത നൽകുകയും ഡിഫ്യൂസറിൽ ഉപയോഗിക്കുമ്പോൾ നല്ല ആഴത്തിലുള്ള ഉറക്കം സമ്മാനിക്കുകയും ചെയ്യുന്നു.\n" .
                      "• 7. സ്വാഭാവിക രോഗപ്രതിരോധ ശേഷി: വായു ശുദ്ധീകരിക്കാനും ശ്വാസകോശത്തിന് പുത്തനുണർവ് നൽകാനും ഉത്തമം.\n" .
                      "• 8. വീട് വൃത്തിയാക്കാൻ (Bonus): തറ തുടയ്ക്കുന്ന വെള്ളത്തിൽ ചേർത്താൽ വീട് സുഗന്ധഭരിതമാവുകയും ഉറുമ്പുകളും പ്രാണികളും അകലുകയും ചെയ്യും.\n" .
                      "• ഗോത്രവിഭാഗങ്ങൾക്ക് താങ്ങ്: വയനാട്ടിലെ ആദിവാസി ജനതയുടെ ഉന്നമനത്തിനായി STTR (സൊസൈറ്റി ഫോർ ട്രാൻസ്‌ജെൻഡേഴ്‌സ് & ട്രൈബൽസ് റിലീഫ്) വഴി വിപണിയിലെത്തിക്കുന്നു.";

        $mlIngredients = "• 100% ശുദ്ധമായ നീലഗിരി യൂക്കാലിപ്റ്റസ് തൈലം (Pure Steam Distilled Eucalyptus globulus Oil). കാട്ടുചില്ലകളിൽ നിന്ന് നീരാവി ഉപയോഗിച്ച് വേർതിരിച്ചെടുത്തത്. രാസവസ്തുക്കളോ കൃത്രിമ സുഗന്ധങ്ങളോ ചേർക്കാത്തത്. Batch No: 002. FSSAI: 21325185000809.";

        $mlUsage = "• ജലദോഷത്തിനും മൂക്കടപ്പിനും: 1 ലിറ്റർ തിളച്ച വെള്ളത്തിൽ 4 തുള്ളി യൂക്കാലിപ്റ്റസ് തൈലം ഒഴിച്ച് തലയിൽ തോർത്ത് മൂടി 5 മിനിറ്റ് ആവി പിടിക്കുക (ദിവസവും 2 നേരം).\n" .
                   "• തലവേദനയ്ക്ക്: 2 തുള്ളി യൂക്കാലിപ്റ്റസ് തൈലം 1 സ്പൂൺ വെളിച്ചെണ്ണയിൽ ചേർത്ത് നെറ്റിയിലും പിരടിയിലും പുരട്ടി തടവുക.\n" .
                   "• സന്ധി-പേശി വേദനകൾക്ക്: 3 തുള്ളി തൈലവും 1 സ്പൂൺ വെളിച്ചെണ്ണയോ എള്ളെണ്ണയോ ചേർത്ത് വേദനയുള്ള ഭാഗത്ത് ദിവസവും 2 നേരം മസാജ് ചെയ്യുക.\n" .
                   "• കൊതുകിനെ തുരത്താൻ: ഡിഫ്യൂസറിൽ 6 തുള്ളി ഒഴിക്കുക, അല്ലെങ്കിൽ 100 മില്ലി വെള്ളത്തിൽ 10 തുള്ളി ഒഴിച്ച് മുറിയിൽ സ്പ്രേ ചെയ്യുക.\n" .
                   "• കഫക്കെട്ടിന്: 3 തുള്ളി തൈലം 1 സ്പൂൺ വെളിച്ചെണ്ണയിൽ ചേർത്ത് നെഞ്ചിലും പുറത്തും പുരട്ടി ചൂടുവസ്ത്രം ധരിക്കുക.\n" .
                   "• ശരീരവേദനയ്ക്ക് കുളിക്കാൻ: ഒരു ബക്കറ്റ് ചൂടുവെള്ളത്തിൽ 5 തുള്ളി ചേർത്ത് കുളിച്ചാൽ ക്ഷീണവും ശരീരവേദനയും പമ്പകടക്കും.\n" .
                   "• മുടിക്കും താരനും: ഉപയോഗിക്കുന്ന എണ്ണയിൽ 4 തുള്ളി ചേർത്ത് തലയോട്ടിയിൽ മസാജ് ചെയ്ത് 1 മണിക്കൂറിന് ശേഷം കഴുകുക.\n" .
                   "• തറ തുടയ്ക്കാൻ: മോപ്പ് ചെയ്യുന്ന വെള്ളത്തിൽ 10 തുള്ളി ചേർത്താൽ വീട്ടിൽ സുഗന്ധം നിറയുകയും ഉറുമ്പുകളും പ്രാണികളും അകലുകയും ചെയ്യും.\n" .
                   "• പ്രധാന നിർദ്ദേശങ്ങൾ: ബാഹ്യ ഉപയോഗത്തിന് മാത്രം. ഒരിക്കലും കുടിക്കരുത്. തൊലിപ്പുറത്ത് പുരട്ടുമ്പോൾ എപ്പോഴും വെളിച്ചെണ്ണയിൽ നേർപ്പിച്ചു മാത്രം പുരട്ടുക (നേരിട്ട് പുരട്ടിയാൽ പുകച്ചിൽ ഉണ്ടാകാം). കണ്ണിൽ തട്ടാതെ സൂക്ഷിക്കുക. 2 വയസ്സിൽ താഴെയുള്ള കുട്ടികൾക്ക് നേരിട്ട് പുരട്ടരുത്. തണുത്തതും ഈർപ്പമില്ലാത്തതുമായ സ്ഥലത്ത് സൂക്ഷിക്കുക.";

        $hiTitle = 'वनतीरम® नीलगिरी का तेल – 100% शुद्ध स्टीम डिस्टिल्ड यूकेलिप्टस ऑयल (Wayanad)';
        $hiShortDesc = 'वायनाड के वनों से आदिवासी समुदायों द्वारा पारंपरिक रूप से एकत्रित 100% शुद्ध, प्राकृतिक एवं स्टीम डिस्टिल्ड नीलगिरी तेल। 1 बोतल = 7 चमत्कारी उपयोग! बंद नाक, सर्दी, खांसी, सिरदर्द, जोड़ों के दर्द, मच्छरों और रूसी (डैंड्रफ) से तुरंत प्राकृतिक राहत।';

        $hiBenefits = "• 1. सर्दी, जुकाम और बंद नाक में तुरंत आराम (#1 सेलिंग पॉइंट): 5 मिनट की भाप लेने से बंद नाक, साइनस, सांस लेने में तकलीफ और सीने की जकड़न पूरी तरह खुल जाती है।\n" .
                      "• 2. सिरदर्द और जोड़ों के दर्द का प्राकृतिक निवारक: सिरदर्द, मांसपेशियों का दर्द, पीठ दर्द, घुटनों और जोड़ों के दर्द में तुरंत राहत प्रदान करता है।\n" .
                      "• 3. केमिकल-फ्री मच्छर भगाने वाला प्राकृतिक उपाय: डिफ्यूज़र में 6 बूंदें डालने या कमरे में स्प्रे करने से बच्चे पूरी तरह सुरक्षित रहते हैं और मच्छर तुरंत भाग जाते हैं।\n" .
                      "• 4. एंटीसेप्टिक और त्वचा की सुरक्षा: छोटे-मोटे कटने, कीड़े के काटने, मुंहासों और जलन पर रोगाणुरोधी सुरक्षा प्रदान करता है।\n" .
                      "• 5. रूसी (डैंड्रफ) और बालों की देखभाल: स्कैल्प की खुजली, जुएं और जिद्दी रूसी को खत्म कर बालों की जड़ों को ठंडक देता है।\n" .
                      "• 6. तनाव मुक्ति और गहरी सुकून भरी नींद: शांत सुगंध मानसिक तनाव को कम कर गहरी और आरामदायक नींद देती है।\n" .
                      "• 7. रोग प्रतिरोधक क्षमता और ताजगी: घर की हवा को शुद्ध कर श्वसन तंत्र को तरोताजा रखता है।\n" .
                      "• 8. पोछा लगाने के पानी में सुगंध: पानी में 10 बूंदें डालने से घर में ताजगी फैलती है और चींटियां व कीड़े दूर रहते हैं।\n" .
                      "• आदिवासी समुदाय को सहयोग: STTR वायनाड के माध्यम से जनजातीय परिवारों की आजीविका को सशक्त बनाता है।";

        $hiIngredients = "• 100% शुद्ध प्राकृतिक नीलगिरी आवश्यक तेल (Eucalyptus globulus Essential Oil)। स्टीम डिस्टिल्ड। शून्य रासायनिक मिलावट। Batch No: 002. FSSAI: 21325185000809.";

        $hiUsage = "• सर्दी व बंद नाक में भाप: 1 लीटर खौलते पानी में 4 बूंदें नीलगिरी का तेल डालें और तौलिया ओढ़कर 5 मिनट भाप लें।\n" .
                   "• सिरदर्द में: 2 बूंदें नीलगिरी तेल + 1 चम्मच नारियल तेल मिलाकर माथे और गर्दन पर मालिश करें।\n" .
                   "• जोड़ों व कमर दर्द में: 3 बूंदें तेल + 1 चम्मच नारियल या तिल का तेल मिलाकर दर्द वाले स्थान पर दिन में 2 बार लगाएं।\n" .
                   "• मच्छरों से बचाव: डिफ्यूज़र में 6 बूंदें डालें या 100 मिली पानी में 10 बूंदें मिलाकर कमरे में छिड़कें।\n" .
                   "• कफ और सीने की जकड़न: 3 बूंदें तेल + 1 चम्मच नारियल तेल सीने और पीठ पर मलें और गर्म कपड़े पहनें।\n" .
                   "• नहाने के पानी में: गर्म पानी की बाल्टी में 5 बूंदें डालकर नहाने से शरीर का दर्द दूर होता है और ताजगी मिलती है।\n" .
                   "• बालों और रूसी के लिए: नियमित तेल में 4 बूंदें मिलाकर स्कैल्प में लगाएं और 1 घंटे बाद धो लें।\n" .
                   "• पोछे के पानी में: 10 बूंदें पानी में डालने से चींटियां भागती हैं और घर महक उठता है।\n" .
                   "• सावधानियां: केवल बाहरी उपयोग के लिए। इसे पिएं नहीं। त्वचा पर हमेशा नारियल तेल में मिलाकर ही लगाएं। आंखों से दूर रखें। 2 वर्ष से छोटे बच्चों पर सीधे न लगाएं।";

        $taTitle = 'வனதீரம்® நீலகிரி யூகலிப்டஸ் தைலம் – 100% தூய இயற்கை தைலம் (Wayanad)';
        $taShortDesc = 'வயநாடு அடர்ந்த மலைக்காடுகளில் பழங்குடியின மக்களால் பாரம்பரிய முறைப்படி சேகரிக்கப்பட்ட இலைகளில் இருந்து நீராவி காய்ச்சி வடித்த 100% தூய நீலகிரி யூகலிப்டஸ் தைலம். 1 பாட்டில் = 7 அற்புத நன்மைகள்! மூக்கடைப்பு, சளி, தலைவலி, மூட்டுவலி, கொசு தொல்லை மற்றும் பொடுகுக்கு மிகச் சிறந்த தீர்வு.';

        $taBenefits = "• 1. சளி, இருமல் மற்றும் மூக்கடைப்புக்கு உடனடி தீர்வு: 5 நிமிடங்கள் ஆவி பிடிக்க மூக்கடைப்பு, சைனஸ் மற்றும் நெஞ்சு சளி உடனே நீங்கும்.\n" .
                      "• 2. தலைவலி மற்றும் மூட்டு வலி நிவாரணி: தலைபாரம், கழுத்துவலி, மூட்டுவலி, இடுப்புவலி மற்றும் தசை பிடிப்புக்கு சிறந்த நிவாரணம்.\n" .
                      "• 3. ரசாயனமற்ற கொசு விரட்டி: டிஃப்யூசரில் அல்லது தண்ணீரில் கலந்து தெளிக்க கொசுக்கள் உடனே ஓடிவிடும்; குழந்தைகளுக்கு பாதுகாப்பானது.\n" .
                      "• 4. கிருமிநாசினி மற்றும் சரும பாதுகாப்பு: சிறு காயங்கள், பூச்சி கடி, பருக்கள் மற்றும் புண்களுக்கு சிறந்த ஆன்டி-பாக்டீரியல் பாதுகாப்பு.\n" .
                      "• 5. கூந்தல் மற்றும் பொடுகு நிவாரணம்: உச்சந்தலை அரிப்பு, பொடுகு மற்றும் பேன் தொல்லையை நீக்கி தலைக்கு புத்துணர்ச்சி தரும்.\n" .
                      "• 6. மன அழுத்தம் குறைந்து ஆழ்ந்த உறக்கம்: மன அமைதி தரும் வன வாசனை; நிம்மதியான ஆழ்ந்த தூக்கத்திற்கு உதவும்.\n" .
                      "• 7. நோய் எதிர்ப்பு சக்தி: இயற்கையான மூலிகை மணம் சுவாச பாதையை தூய்மைப்படுத்தி உடலுக்கு புத்துணர்ச்சி அளிக்கும்.\n" .
                      "• 8. தரை துடைக்க உதவும் நறுமணம்: மாப் போடும் தண்ணீரில் 10 சொட்டுகள் சேர்க்க வீடு முழுவதும் நறுமணம் கமழும்; எறும்பு, பூச்சிகள் வராது.\n" .
                      "• பழங்குடியினர் வாழ்வாதாரம்: STTR வயநாடு அமைப்பு மூலம் பழங்குடியின மக்களின் வாழ்வாதாரத்தை உயர்த்துகிறது.";

        $taIngredients = "• 100% தூய இயற்கை நீலகிரி யூகலிப்டஸ் தைலம் (Steam Distilled Eucalyptus Oil). செயற்கை வாசனை அல்லது ரசாயனம் இல்லாதது. Batch No: 002. FSSAI: 21325185000809.";

        $taUsage = "• சளி மற்றும் மூக்கடைப்புக்கு: 1 லிட்டர் கொதிக்கும் வெந்நீரில் 4 சொட்டு தைலம் சேர்த்து, துண்டால் மூடி 5 நிமிடங்கள் ஆவி பிடிக்கவும்.\n" .
                   "• தலைவலிக்கு: 2 சொட்டு யூகலிப்டஸ் தைலத்துடன் 1 ஸ்பூன் தேங்காய் எண்ணெய் கலந்து நெற்றி மற்றும் பிடறியில் தடவவும்.\n" .
                   "• மூட்டு மற்றும் தசை வலிக்கு: 3 சொட்டு தைலத்துடன் 1 ஸ்பூன் தேங்காய் எண்ணெய் அல்லது நல்லெண்ணெய் கலந்து வலி உள்ள இடத்தில் மசாஜ் செய்யவும்.\n" .
                   "• கொசு விரட்ட: டிஃப்யூசரில் 6 சொட்டுகள் விடவும், அல்லது 100 மி.லி தண்ணீரில் 10 சொட்டுகள் கலந்து அறையில் தெளிக்கவும்.\n" .
                   "• நெஞ்சு சளிக்கு: 3 சொட்டு தைலத்தை 1 ஸ்பூன் தேங்காய் எண்ணெயில் கலந்து நெஞ்சு மற்றும் முதுகில் தேய்க்கவும்.\n" .
                   "• குளிக்கும் நீரில்: வெந்நீர் வாளியில் 5 சொட்டுகள் விட்டு குளிக்க உடல் சோர்வு மற்றும் வலி நீங்கி புத்துணர்ச்சி கிடைக்கும்.\n" .
                   "• பொடுகு நீங்க: தலைக்கு தேய்க்கும் எண்ணெயில் 4 சொட்டு கலந்து தலையில் தேய்த்து 1 மணி நேரம் கழித்து குளிக்கவும்.\n" .
                   "• தரை துடைக்க: மாப் போடும் தண்ணீரில் 10 சொட்டுகள் கலக்க வீடு நறுமணத்துடன் இருக்கும்.\n" .
                   "• முக்கிய முன்னெச்சரிக்கை: வெளி பயன்பாட்டிற்கு மட்டுமே. குடிக்கக் கூடாது. தோலில் தடவும் போது எப்போதும் தேங்காய் எண்ணெயில் கலந்து மட்டுமே தடவ வேண்டும். கண்ணில் படாமல் பார்த்துக் கொள்ளவும். 2 வயதுக்குட்பட்ட குழந்தைகளுக்கு நேரடியாக பயன்படுத்தக் கூடாது.";

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

        $headPart = BodyPart::where('slug', 'head')->first();
        $chestPart = BodyPart::where('slug', 'chest')->first();
        $jointsPart = BodyPart::where('slug', 'joints')->first();
        $backPart = BodyPart::where('slug', 'back')->first();
        $hairPart = BodyPart::where('slug', 'hair')->first();
        $skinPart = BodyPart::where('slug', 'skin')->first();
        $wholeBodyPart = BodyPart::where('slug', 'whole-body')->first();
        $bodyPartIds = collect([
            $headPart?->id,
            $chestPart?->id,
            $jointsPart?->id,
            $backPart?->id,
            $hairPart?->id,
            $skinPart?->id,
            $wholeBodyPart?->id,
        ])->filter()->values()->all();

        $featuredImagePath = '/images/products/vanatheeram-nilgiri-eucalyptus-oil-wayanad.jpg';
        $galleryImages = [
            '/images/products/vanatheeram-nilgiri-eucalyptus-oil-wayanad.jpg',
        ];

        $hairCareCategory = Category::where('slug', 'hair-care')->first();
        $womensCareCategory = Category::where('slug', 'womens-care')->first();
        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $categoryIds = collect([$hairCareCategory?->id, $womensCareCategory?->id, $superfoodsCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        $productData = [
            'name' => $enTitle,
            'slug' => $primarySlug,
            'sku' => 'VAN-EUC-30ML',
            'price' => 140.00,
            'sale_price' => 140.00,
            'stock_quantity' => 150,
            'unit_size' => '30ml Dropper Bottle',
            'badge' => '100% Organic • Steam Distilled',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 7,
            'is_free_shipping' => false,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Vanatheeram Nilgiri Eucalyptus Oil (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Vanatheeram Nilgiri Eucalyptus Oil product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        // 2 Variants requested:
        // - 30ml Dropper Bottle: Rs. 140/-
        // - 100ml Dropper Bottle: Rs. 300/-
        $variants = [
            [
                'unit_size' => '30ml Dropper Bottle',
                'price' => 140.00,
                'sale_price' => 140.00,
                'sku' => 'VAN-EUC-30ML',
                'stock_quantity' => 75,
                'is_active' => true,
            ],
            [
                'unit_size' => '100ml Dropper Bottle',
                'price' => 300.00,
                'sale_price' => 300.00,
                'sku' => 'VAN-EUC-100ML',
                'stock_quantity' => 75,
                'is_active' => true,
            ],
        ];

        foreach ($variants as $variantData) {
            ProductVariant::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'unit_size' => $variantData['unit_size'],
                ],
                $variantData
            );
        }

        $this->command?->info("Successfully seeded 2 Eucalyptus Oil variants (30ml Dropper: ₹140, 100ml Dropper: ₹300) for Product #{$product->id}.");
    }
}
