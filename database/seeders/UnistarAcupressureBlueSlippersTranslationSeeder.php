<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class UnistarAcupressureBlueSlippersTranslationSeeder extends Seeder
{
    /**
     * Seed Unistar Acupressure & Magnetic Therapy Blue Slippers (Orthopedic Reflexology Flip-Flops)
     * as an independent product with 4-language translations and size variants (5", 6", 7", 8", 9", 10").
     */
    public function run(): void
    {
        // 1. Ensure product image is copied from uploaded media if available
        $mediaSource = 'C:/Users/Admin/.gemini/antigravity-ide/brain/ed3bc996-42c7-4092-a535-d88e1a2ea090/.user_uploaded/media_1792411390361.jpg';
        $destPublic = public_path('images/products/unistar-acupressure-magnetic-therapy-blue-slippers.jpg');
        $destStorage = storage_path('app/public/products/unistar-acupressure-magnetic-therapy-blue-slippers.jpg');

        if (file_exists($mediaSource)) {
            @mkdir(dirname($destPublic), 0777, true);
            @mkdir(dirname($destStorage), 0777, true);
            @copy($mediaSource, $destPublic);
            @copy($mediaSource, $destStorage);
        }

        $primarySlug = 'unistar-acupressure-magnetic-therapy-blue-slippers';

        $product = Product::where('slug', $primarySlug)->first();

        $enTitle = 'Unistar Acupressure & Magnetic Therapy Blue Slippers (Orthopedic Reflexology Flip-Flops)';
        $enShortDesc = 'Ergonomic acupressure blue slippers designed with textured reflexology nodes and heel magnetic therapy discs to stimulate vital foot nerve endings, improve blood circulation, and relieve plantar heel pain.';

        $enBenefits = "• 1. Plantar Fasciitis & Heel Pain Relief: Therapeutic heel bio-magnetic disc stimulates localized micro-blood circulation to reduce severe morning heel pain, calcaneal spurs, and plantar fasciitis inflammation.\n" .
                      "• 2. Foot Sole Acupressure Reflexology: Hundreds of scientifically contoured rubber nodes massage and stimulate vital reflexology nerve zones across the foot bed corresponding to internal organs, spine, joints, and nervous system.\n" .
                      "• 3. Boosts Blood Circulation & Relieves Leg Fatigue: Walking in these slippers provides a dynamic natural acupressure massage that activates the venous muscle pump in the calves, easing swollen ankles, heavy legs, and tired feet after long standing hours.\n" .
                      "• 4. Sciatica, Lower Back & Knee Pain Relief: Encourages anatomical foot arch alignment, absorbs walking shock impacts, and eases secondary nerve compression that radiates up from the soles into the knees, hips, and lower lumbar spine.\n" .
                      "• 5. Stress Reduction & Restful Night Sleep: Daily 15 to 20 minutes of reflex point activation triggers endorphin release, relaxes built-up muscular tension, and prepares the body for deep, restorative sleep.\n" .
                      "• 6. Vibrant Blue Design, Waterproof & Anti-Skid: Crafted in a stylish oceanic blue tone with lightweight, medical-grade EVA material, moisture-resistant grooving, and deep anti-slip traction treads suitable for home, bathroom, or casual walking.";

        $enIngredients = "• High-Density Medical-Grade EVA & Soft Polyurethane sole structure.\n" .
                         "• Embedded Bio-Magnetic Heel Discs (focused magnetic flux for calcaneal stimulation).\n" .
                         "• Textured Ergonomic Reflexology Acupressure Nodules.\n" .
                         "• Waterproof, Skin-Safe, Washable & Odor-Resistant construction in Royal Blue.";

        $enUsage = "• Recommended Duration: Begin wearing for 10 to 15 minutes once or twice daily while walking indoors around the house or office.\n" .
                   "• Adaptation Period: A slight tingling, prickling, or firm pressing sensation is completely normal during the first 3–7 days as dormant foot nerves and reflex pathways are activated. If you have sensitive soles, wear with thin cotton socks until your feet acclimate.\n" .
                   "• Progressive Wear: After 1–2 weeks of regular acclimation, increase wear time to 30–45 minutes daily for optimal therapeutic relief and vitality.\n" .
                   "• Washing & Care: Simply wash with cool tap water and mild soap. Air dry in the shade. Do not expose to intense midday heat or direct flame.\n" .
                   "• Health Precaution: Individuals with electronic implants (such as cardiac pacemakers) and pregnant women should consult their healthcare professional prior to using magnetic footwear.";

        $mlTitle = 'യുണിസ്റ്റാർ അക്യുപ്രഷർ & മാഗ്നറ്റിക് തെറാപ്പി ബ്ലൂ സ്ലിപ്പേഴ്സ് (Orthopedic Reflexology Flip-Flops)';
        $mlShortDesc = 'ഉപ്പൂറ്റി വേദനയും (Plantar Fasciitis) കാൽവേദനയും അകറ്റാൻ ഹീൽ മാഗ്നറ്റിക് തെറാപ്പി ഡിസ്കുകളും കാൽപ്പാദങ്ങളിലെ നാഡീ കേന്ദ്രങ്ങളെ ഉണർത്തുന്ന റിഫ്ലെക്സോളജി പോയിന്റുകളും അടങ്ങിയ പ്രീമിയം ബ്ലൂ കളർ ഓർത്തോപീഡിക് അക്യുപ്രഷർ സ്ലിപ്പേഴ്സ്.';

        $mlBenefits = "• 1. ഉപ്പൂറ്റി വേദനയ്ക്കും പ്ലാന്റാർ ഫാസിയൈറ്റിസിനും ആശ്വാസം: ഉപ്പൂറ്റിയിലെ പ്രത്യേക കാന്തിക തെറാപ്പി ഡിസ്ക് രക്തയോട്ടം വർദ്ധിപ്പിക്കുകയും രാവിലെ എഴുന്നേൽക്കുമ്പോഴുണ്ടാകുന്ന കഠിനമായ ഉപ്പൂറ്റി വേദനയും നീർക്കെട്ടും ഇല്ലാതാക്കുകയും ചെയ്യുന്നു.\n" .
                      "• 2. നാഡീ കേന്ദ്രങ്ങളെ ഉണർത്തുന്ന അക്യുപ്രഷർ തെറാപ്പി: കാൽപ്പാദങ്ങളിലെ പ്രധാന റിഫ്ലെക്സോളജി ബിന്ദുക്കളിൽ സ്വാഭാവിക മർദ്ദം നൽകി ശരീരത്തിലെ ആന്തരിക അവയവങ്ങളുടെയും നാഡീവ്യൂഹത്തിന്റെയും പ്രവർത്തനം കാര്യക്ഷമമാക്കുന്നു.\n" .
                      "• 3. രക്തയോട്ടം വർദ്ധിപ്പിക്കുന്നു: നടക്കുമ്പോൾ കാൽപ്പാദങ്ങളിൽ തുടർച്ചയായി മൃദുവായ മസാജ് നൽകി കാലുകളിലെ ക്ഷീണവും നീരും മരവിപ്പും അകറ്റുന്നു.\n" .
                      "• 4. നടുവേദന, മുട്ടുവേദന, സയാറ്റിക്ക എന്നിവയ്ക്ക് ഗുണകരം: പാദങ്ങളുടെ ഭാരം ശരിയായി വിതരണം ചെയ്ത് സന്ധികളിലും നട്ടെല്ലിലും ഉണ്ടാകുന്ന ആഘാതങ്ങൾ കുറയ്ക്കുന്നു.\n" .
                      "• 5. മാനസിക സമ്മർദ്ദം കുറച്ച് നല്ല ഉറക്കം: ദിവസവും 15-20 മിനിറ്റ് ധരിച്ചു നടക്കുന്നത് നാഡീവ്യൂഹത്തിന് ഉന്മേഷം പകരുകയും മനസ്സിന് ശാന്തത നൽകി നല്ല ഉറക്കം സമ്മാനിക്കുകയും ചെയ്യുന്നു.\n" .
                      "• 6. ആകർഷകമായ നീല നിറവും വാട്ടർപ്രൂഫ് രൂപകൽപ്പനയും: നനഞ്ഞ പ്രതലങ്ങളിലും തെന്നി വീഴാത്ത ആന്റി-സ്കിഡ് ഗ്രിപ്പും ദീർഘകാല ഈടുമുള്ള മെഡിക്കൽ ഗ്രേഡ് നിർമ്മാണം.";

        $mlIngredients = "• ഹൈ-ഡെൻസിറ്റി മെഡിക്കൽ ഗ്രേഡ് ഇവിഎ (EVA) സോഫ്റ്റ് സോൾ നിർമ്മാണം.\n" .
                         "• ഹീൽ ബയോ-മാഗ്നറ്റിക് തെറാപ്പി ഡിസ്കുകൾ (രക്തചംക്രമണം ത്വരിതപ്പെടുത്താൻ).\n" .
                         "• പ്രകൃതിദത്ത അക്യുപ്രഷർ റിഫ്ലെക്സോളജി നോഡ്യൂളുകൾ.\n" .
                         "• റോയൽ ബ്ലൂ ഫിനിഷിലുള്ള വാട്ടർപ്രൂഫ്, കഴുകി വൃത്തിയാക്കാവുന്ന മെറ്റീരിയൽ.";

        $mlUsage = "• ഉപയോഗ രീതി: തുടക്കത്തിൽ ദിവസവും 10-15 മിനിറ്റ് മാത്രം വീടിനുള്ളിലോ മുറിക്കുള്ളിലോ നടക്കുമ്പോൾ ധരിക്കുക.\n" .
                   "• ആദ്യ ദിവസങ്ങളിൽ: കാൽപ്പാദത്തിലെ സുപ്ത നാഡികൾ ഉണരുമ്പോൾ നേരിയ ഒരു ഇക്കിളിയോ ചടുപ്പോ തോന്നുന്നത് തികച്ചും സ്വാഭാവികമാണ്. തുടക്കത്തിൽ ബുദ്ധിമുട്ട് തോന്നുകയാണെങ്കിൽ കനം കുറഞ്ഞ കോട്ടൺ സോക്സ് ധരിച്ച് ഉപയോഗിച്ചു തുടങ്ങാം.\n" .
                   "• ശീലമായ ശേഷം: 1-2 ആഴ്ചകൾക്ക് ശേഷം ദിവസവും 30-45 മിനിറ്റ് വരെ ധരിച്ചു നടക്കാവുന്നതാണ്.\n" .
                   "• വൃത്തിയാക്കാൻ: സാധാരണ വെള്ളത്തിലും നേരിയ സോപ്പിലും കഴുകി തണലിൽ ഉണക്കുക. കടുത്ത വെയിലിലോ തീയുടെ അടുത്തോ വെയ്ക്കരുത്.\n" .
                   "• മുൻകരുതൽ: പേസ്‌മേക്കർ ഘടിപ്പിച്ചവരും ഗർഭിണികളും ഡോക്ടറുടെ നിർദ്ദേശപ്രകാരം മാത്രം ഉപയോഗിക്കുക.";

        $hiTitle = 'यूनिस्टार एक्यूप्रेशर एवं मैग्नेटिक थेरेपी ब्लू स्लिपर्स (Orthopedic Reflexology Flip-Flops)';
        $hiShortDesc = 'पैरों के रक्त संचार को तेज करने, एड़ी के असहनीय दर्द (Plantar Fasciitis) से प्राकृतिक राहत दिलाने और सुप्त नसों को सक्रिय करने हेतु मैग्नेटिक हील डिस्क एवं रिफ्लेक्सोलॉजी एक्यूप्रेशर नोड्स युक्त आकर्षक नीली ऑर्थोपेडिक चप्पल।';

        $hiBenefits = "• 1. एड़ी के दर्द और प्लांटर फैसीसाइटिस में तुरंत आराम: हील मैग्नेटिक थेरेपी डिस्क एड़ी के नीचे सूक्ष्म रक्त संचार को तेज कर सुबह के कड़ेपन, दर्द और हील स्पर में त्वरित राहत देती है।\n" .
                      "• 2. संपूर्ण शरीर का रिफ्लेक्सोलॉजी एक्यूप्रेशर: तलवों में मौजूद सैकड़ों एक्यूप्रेशर नोड्स आंतरिक अंगों, रीढ़ की हड्डी और जोड़ों से जुड़े नर्व पॉइंट्स को स्टिमुलेट कर ऊर्जा का संचार करते हैं।\n" .
                      "• 3. पैरों की थकान और सूजन से राहत: हर कदम पर तलवों की कुदरती मालिश कर पिंडलियों के रक्त को ऊपर की ओर संचालित करती है, जिससे भारीपन और थकान दूर होती है।\n" .
                      "• 4. कमर दर्द, घुटनों के दर्द और साइटिका में लाभकारी: चाल के संतुलन को सुधारती है और चलने से जोड़ों व रीढ़ पर लगने वाले झटके को कम करती है।\n" .
                      "• 5. तनावमुक्ति और गहरी आरामदायक नींद: दिन में 15 से 20 मिनट पहनने से मानसिक तनाव दूर होता है और मांसपेशियों को आराम मिलकर गहरी नींद आती है।\n" .
                      "• 6. नॉन-स्लिप, वाटरप्रूफ एवं लंबे समय तक चलने वाला ब्लू डिज़ाइन: स्किन-फ्रेंडली मेडिकल-ग्रेड ईवा मटीरियल और फिसलन-रोधी सोल।";

        $hiIngredients = "• उच्च-घनत्व मेडिकल-ग्रेड ईवा (EVA) और सॉफ्ट पॉलीयूरेथेन सोल।\n" .
                         "• इनबिल्ट बायो-मैग्नेटिक हील डिस्क (एड़ी रक्त संचार हेतु)।\n" .
                         "• टेक्सचर्ड एक्यूप्रेशर रिफ्लेक्सोलॉजी नोड्यूल्स।\n" .
                         "• रॉयल ब्लू रंग में वाटरप्रूफ, धोने योग्य एवं त्वचा के लिए सुरक्षित।";

        $hiUsage = "• इस्तेमाल का तरीका: शुरुआत में रोजाना केवल 10 से 15 मिनट घर में टहलते समय ही पहनें।\n" .
                   "• शुरुआती दिनों में: नसों के सक्रिय होने पर तलवों में हल्की चुभन या झुनझुनी होना सामान्य है। यदि तलवे संवेदनशील हैं तो पतले सूती मोजे पहनकर शुरुआत करें।\n" .
                   "• नियमित आदत: 1 से 2 सप्ताह बाद रोजाना 30 से 45 मिनट तक पहन सकते हैं।\n" .
                   "• देखभाल: ठंडे पानी और सौम्य साबुन से धोएं और छाया में सुखाएं। कड़ी धूप में न रखें।\n" .
                   "• सावधानी: पेसमेकर धारक और गर्भवती महिलाएं डॉक्टर की सलाह के बाद ही इस्तेमाल करें।";

        $taTitle = 'யூனிஸ்டார் அக்குபிரஷர் & மேக்னடிக் தெரபி ப்ளூ செருப்புகள் (Orthopedic Reflexology Flip-Flops)';
        $taShortDesc = 'குதிக்கால் வலி (Plantar Fasciitis), பாத சோர்வு மற்றும் கால் வலியை போக்கும் மேக்னடிக் தெரபி ஹீல் டிஸ்க்குகள் மற்றும் பாத நரம்புகளை தூண்டும் அக்குபிரஷர் புள்ளிகள் கொண்ட நீல நிற ஆர்த்தோபெடிக் செருப்பு.';

        $taBenefits = "• 1. குதிக்கால் வலி மற்றும் பாத வீக்கத்திற்கு நிவாரணம்: ஹீல் மேக்னடிக் தெரபி டிஸ்க் குதிக்கால் பகுதியில் ரத்த ஓட்டத்தை சீராக்கி காலையில் ஏற்படும் கடுமையான குதிக்கால் வலியை போக்குகிறது.\n" .
                      "• 2. பாத நரம்புகளை தூண்டும் அக்குபிரஷர் புள்ளிகள்: பாதங்களில் உள்ள அக்குபிரஷர் புள்ளிகளை அழுத்துவதன் மூலம் உடலின் உள்ளுறுப்புகள் மற்றும் நரம்பு மண்டலத்திற்கு புத்துணர்ச்சி அளிக்கிறது.\n" .
                      "• 3. ரத்த ஓட்டம் சீராகி கால் சோர்வு நீங்கும்: நடக்கும் போது பாதங்களை மசாஜ் செய்து கெண்டைக்கால் நரம்புகளின் ரத்த ஓட்டத்தை தூண்டி வீக்கத்தை குறைக்கிறது.\n" .
                      "• 4. இடுப்பு வலி, முழங்கால் வலி மற்றும் சயாட்டிகா நிவாரணம்: நடக்கும் போது மூட்டுகள் மற்றும் முதுகெலும்பில் ஏற்படும் அழுத்தத்தை தாங்கி வலியை குறைக்கிறது.\n" .
                      "• 5. மன அழுத்தம் குறைந்து ஆழ்ந்த தூக்கம்: தினமும் 15-20 நிமிடங்கள் அணிய நரம்புகள் தளர்வடைந்து மன அமைதியும் நல்ல தூக்கமும் கிடைக்கும்.\n" .
                      "• 6. வழுக்காத கிரிப் மற்றும் நீல நிற வடிவமைப்பு: உயர்தர மெடிக்கல் கிரேடு வாட்டர்ப்ரூஃப் வடிவமைப்பு மற்றும் வழுக்காத ஆண்டி-ஸ்கிட் சோல்.";

        $taIngredients = "• மெடிக்கல்-கிரேடு இவிஏ (EVA) சாப்ட் சோல் வடிவமைப்பு.\n" .
                         "• பயோ-மேக்னடிக் ஹீல் டிஸ்க்குகள் (ரத்த ஓட்ட சிகிச்சை).\n" .
                         "• அக்குபிரஷர் ரிஃப்ளெக்சாலஜி நோட்ஸ்.\n" .
                         "• நீல நிற வாட்டர்ப்ரூஃப், துவைக்கக்கூடிய, நீடித்து உழைக்கும் மெட்டீரியல்.";

        $taUsage = "• அணியும் முறை: ஆரம்பத்தில் தினமும் 10 முதல் 15 நிமிடங்கள் மட்டும் வீட்டில் நடக்கும் போது அணியவும்.\n" .
                   "• ஆரம்ப நாட்களில்: நரம்புகள் விழிப்படையும் போது பாதங்களில் லேசான கூச்ச உணர்வு ஏற்படுவது இயல்பானது. மெல்லிய சாக்ஸ் அணிந்தும் பயன்படுத்தலாம்.\n" .
                   "• வழக்கமான பயன்பாடு: 1-2 வாரங்களுக்குப் பிறகு தினமும் 30 முதல் 45 நிமிடங்கள் வரை அணியலாம்.\n" .
                   "• பராமரிப்பு: சாதாரண நீர் மற்றும் லேசான சோப்பில் கழுவி நிழலில் உலர வைக்கவும்.\n" .
                   "• முக்கிய குறிப்பு: பேஸ்மேக்கர் பொருத்தியவர்கள் மற்றும் கர்ப்பிணி பெண்கள் மருத்துவரின் ஆலோசனை பெற்று பயன்படுத்தவும்.";

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
        $bodyPartIds = collect([
            $jointsPart?->id,
            $backPart?->id,
            $wholeBodyPart?->id,
        ])->filter()->values()->all();

        $featuredImagePath = '/images/products/unistar-acupressure-magnetic-therapy-blue-slippers.jpg';
        $galleryImages = [
            '/images/products/unistar-acupressure-magnetic-therapy-blue-slippers.jpg',
        ];

        $staminaCategory = Category::where('slug', 'stamina')->first();
        $superfoodsCategory = Category::where('slug', 'superfoods')->first();
        $categoryIds = collect([$staminaCategory?->id, $superfoodsCategory?->id])->filter()->values()->all();
        if (empty($categoryIds)) {
            $fallbackCat = Category::first();
            if ($fallbackCat) {
                $categoryIds = [$fallbackCat->id];
            }
        }

        $productData = [
            'name' => $enTitle,
            'slug' => $primarySlug,
            'sku' => 'UNI-ACU-BLU-SLP-9',
            'price' => 399.00,
            'sale_price' => 375.00,
            'stock_quantity' => 120,
            'unit_size' => '9 inch',
            'badge' => 'Acupressure & Magnetic Therapy',
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages,
            'short_description' => $enShortDesc,
            'description' => json_encode($descriptionData),
            'translations' => $translations,
            'is_active' => true,
            'is_featured' => true,
            'featured_order' => 2,
            'is_free_shipping' => false,
        ];

        if ($product) {
            $product->update($productData);
            $this->command?->info("Updated Unistar Blue Slippers (#{$product->id}, slug: {$product->slug}).");
        } else {
            $product = Product::create($productData);
            $this->command?->info("Created new Unistar Blue Slippers product (#{$product->id}).");
        }

        if (!empty($categoryIds)) {
            $product->categories()->syncWithoutDetaching($categoryIds);
        }
        if (!empty($bodyPartIds)) {
            $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
        }

        // 6 Size Variants for Blue Slippers:
        // 9 inch (default), 8 inch, 7 inch, 6 inch, 5 inch, 10 inch
        // All ₹399 MRP, ₹375 Sale Price (Save 6%)
        $variants = [
            [
                'unit_size' => '9 inch',
                'price' => 399.00,
                'sale_price' => 375.00,
                'sku' => 'UNI-ACU-BLU-SLP-9',
                'stock_quantity' => 20,
                'is_active' => true,
            ],
            [
                'unit_size' => '8 inch',
                'price' => 399.00,
                'sale_price' => 375.00,
                'sku' => 'UNI-ACU-BLU-SLP-8',
                'stock_quantity' => 20,
                'is_active' => true,
            ],
            [
                'unit_size' => '7 inch',
                'price' => 399.00,
                'sale_price' => 375.00,
                'sku' => 'UNI-ACU-BLU-SLP-7',
                'stock_quantity' => 20,
                'is_active' => true,
            ],
            [
                'unit_size' => '6 inch',
                'price' => 399.00,
                'sale_price' => 375.00,
                'sku' => 'UNI-ACU-BLU-SLP-6',
                'stock_quantity' => 20,
                'is_active' => true,
            ],
            [
                'unit_size' => '5 inch',
                'price' => 399.00,
                'sale_price' => 375.00,
                'sku' => 'UNI-ACU-BLU-SLP-5',
                'stock_quantity' => 20,
                'is_active' => true,
            ],
            [
                'unit_size' => '10 inch',
                'price' => 399.00,
                'sale_price' => 375.00,
                'sku' => 'UNI-ACU-BLU-SLP-10',
                'stock_quantity' => 20,
                'is_active' => true,
            ],
        ];

        foreach ($variants as $variantData) {
            $existingVariant = ProductVariant::where('product_id', $product->id)
                ->where(function ($q) use ($variantData) {
                    $q->where('sku', $variantData['sku'])
                      ->orWhereIn('unit_size', [
                          $variantData['unit_size'],
                          str_replace(' ', '', $variantData['unit_size']),
                          str_replace('inch', ' inch', $variantData['unit_size']),
                      ]);
                })
                ->first();

            // If a variant with this SKU exists in a DIFFERENT product, reassign it to this product
            if (!$existingVariant) {
                $existingVariant = ProductVariant::where('sku', $variantData['sku'])->first();
            }

            if ($existingVariant) {
                $existingVariant->update(array_merge($variantData, ['product_id' => $product->id]));
            } else {
                ProductVariant::create(array_merge($variantData, ['product_id' => $product->id]));
            }
        }

        // Clean up any stray variants for this product with legacy non-standard formatting
        $validSkus = collect($variants)->pluck('sku')->all();
        ProductVariant::where('product_id', $product->id)
            ->whereNotIn('sku', $validSkus)
            ->delete();

        $this->command?->info("Successfully seeded 6 size variants for Unistar Blue Slippers Product #{$product->id}.");
    }
}
