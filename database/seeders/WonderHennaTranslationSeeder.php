<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class WonderHennaTranslationSeeder extends Seeder
{
    /**
     * Seed WonderHenna Herbal Hair Color details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'wonderhenna-herbal-hair-color';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'HP-PWD-15')
            ->orWhere('slug', 'like', '%wonderhenna%')
            ->orWhere('slug', 'like', '%wonder-henna%')
            ->orWhere(function ($q) {
                $q->where('id', 9)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%henna%')
                          ->orWhere('slug', 'like', '%hair%')
                          ->orWhere('slug', 'like', '%color%');
                  });
            })
            ->get();

        $enTitle = 'WonderHenna Herbal Hair Color® – 100% Natural Ammonia & PPD Free Herbal Hair Dye (15g)';
        $enShortDesc = '100% natural Ayurvedic herbal hair color enriched with Rajasthani Henna, Indigo, Amla, and Bhringraj. Provides deep, natural dark grey coverage without ammonia, PPD, peroxide, or skin staining.';

        $enBenefits = "• 100% Natural Grey Coverage: Blends seamlessly with your natural hair tone to impart a rich, lustrous dark color without any unnatural reddish or orange tint.\n" .
                      "• Zero Harmful Chemicals (No PPD, No Ammonia): Free from paraphenylenediamine (PPD), ammonia, synthetic peroxides, resorcinol, and parabens, ensuring complete scalp safety with zero burning or itching.\n" .
                      "• Zero Forehead or Skin Staining: Specially balanced herbal formulation that binds purely to hair keratin and washes clean off forehead, ears, and skin without stubborn stains.\n" .
                      "• Deep Follicular Conditioning & Anti-Dandruff: Infused with Amla and Shikakai to naturally condition coarse hair strands, eliminate scalp dryness, and soothe chronic dandruff.\n" .
                      "• Strengthens Roots & Reduces Breakage: Bhringraj and Brahmi nourish hair follicles from within, curbing premature hair fall and leaving strands voluminous, silky, and naturally shiny.";

        $enIngredients = "• Pure Rajasthani Henna Leaves (Lawsonia inermis / Mailanchi): Triple-sifted micro-fine organic henna for rich natural pigmentation and cooling scalp conditioning.\n" .
                         "• True Indigo Powder (Indigofera tinctoria / Neelamari): Natural plant indigo that oxidizes on hair shafts to deliver deep, natural dark shades.\n" .
                         "• Indian Gooseberry (Emblica officinalis / Amla): Rich in natural tannins and Vitamin C that fix the herbal color and restore hair elasticity.\n" .
                         "• Bhringraj (Eclipta alba - The King of Hair Herbs): Stimulates dormant hair follicles and curbs thinning.\n" .
                         "• Shikakai & Brahmi: Natural cleansing saponins that detangle, soften strands, and balance scalp sebum.";

        $enUsage = "• Preparation: Empty the 15g sachet into a non-metallic (glass or plastic) bowl. Add approximately 50–60 ml of lukewarm water and mix thoroughly until a smooth, lump-free paste is formed.\n" .
                   "• Application: Apply evenly from roots to tips on clean, dry or slightly damp hair using a hair dye brush or gloved fingers. Ensure full coverage over grey areas.\n" .
                   "• Processing Time: Leave the paste on hair for 30 to 45 minutes for optimal natural color absorption.\n" .
                   "• Rinsing: Rinse thoroughly with plain lukewarm water until water runs clear. For best color longevity, avoid using chemical shampoo for the first 24 hours.";

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
                'name' => 'വണ്ടർഹെന്ന ഹെർബൽ ഹെയർ കളർ® – 100% പ്രകൃതിദത്ത അമോണിയ & PPD രഹിത ഹെയർ ഡൈ (15g)',
                'short_description' => 'രാജസ്ഥാനി മൈലാഞ്ചി, നീലയമരി, നെല്ലിക്ക, ഭൃംഗരാജ് എന്നിവ ചേർത്തൊരുക്കിയ 100% പ്രകൃതിദത്ത ആയുർവേദ ഹെയർ കളർ. അമോണിയയോ പി.പി.ഡിയോ ഇല്ലാതെ നരച്ച മുടിക്ക് സ്വാഭാവിക കറുപ്പ് നിറം നൽകുന്നു. ചർമ്മത്തിൽ കറ പിടിക്കില്ല.',
                'benefits' => "• സ്വാഭാവിക കറുപ്പ് നിറവും സമ്പൂർണ്ണ നര മറയ്ക്കലും: മുടിക്ക് കൃത്രിമ ചുവപ്പോ ഓറഞ്ചോ നിറം നൽകാതെ സ്വാഭാവികമായ തിളങ്ങുന്ന കറുപ്പ്/ഡാർക്ക് ഷേഡ് നൽകുന്നു.\n" .
                              "• PPD-യും അമോണിയയും ഇല്ലാത്ത സുരക്ഷിതത്വം: തലയോട്ടിയിൽ ചൊറിച്ചിലോ അലർജിയോ ഉണ്ടാക്കുന്ന PPD (Paraphenylenediamine), അമോണിയ, പെറോക്സൈഡ് എന്നിവ പൂർണ്ണമായും ഒഴിവാക്കിയ 100% സുരക്ഷിത ഹെർബൽ കൂട്ട്.\n" .
                              "• നെറ്റിയിലോ ചർമ്മത്തിലോ കറ പിടിക്കില്ല: മുടിയുടെ കെരാറ്റിനിൽ മാത്രം പ്രവർത്തിക്കുന്നതിനാൽ നെറ്റിയിലോ ചെവിയിലോ കൈകളിലോ പാടുകളോ കറയോ അവശേഷിപ്പിക്കില്ല.\n" .
                              "• തലയോട്ടിക്ക് തണുപ്പും താരൻ ശമനവും: മൈലാഞ്ചിയുടെ സ്വാഭാവിക തണുപ്പും നെല്ലിക്ക, ഷിക്കാക്കായ് എന്നിവയുടെ ഔഷധഗുണവും താരനും തലയോട്ടിയിലെ വരൾച്ചയും അകറ്റുന്നു.\n" .
                              "• മുടി കൊഴിച്ചിൽ തടയലും തിളക്കവും: ഭൃംഗരാജും ബ്രഹ്മിയും വേരുകളെ ബലപ്പെടുത്തുകയും മുടി പൊട്ടിപ്പോകുന്നത് തടഞ്ഞ് തിളക്കവും മൃദുത്വവും നൽകുകയും ചെയ്യുന്നു.",
                'ingredients' => "• ശുദ്ധ രാജസ്ഥാനി മൈലാഞ്ചി (Lawsonia inermis): സൂക്ഷ്മമായി പൊടിച്ചെടുത്ത നാച്വറൽ മെഹന്തി.\n" .
                                 "• നീലയമരി (Indigofera tinctoria / നീല അമരി): നരച്ച മുടിക്ക് സ്വാഭാവിക കറുപ്പ് നിറം നൽകുന്ന പ്രകൃതിദത്ത നീലയമരിപ്പൊടി.\n" .
                                 "• നാടൻ നെല്ലിക്ക (Amla): നിറം കൂടുതൽ നാൾ നിലനിൽക്കാനും മുടിക്ക് തിളക്കം നൽകാനും സഹായിക്കുന്നു.\n" .
                                 "• കയ്യോന്നി / ഭൃംഗരാജ് (Bhringraj): മുടിയുടെ വളർച്ചയെ ത്വരിതപ്പെടുത്തുന്ന കേശവർദ്ധിനി.\n" .
                                 "• ഷിക്കാക്കായ് & ബ്രഹ്മി: മുടിക്ക് മൃദുത്വവും തലയോട്ടിക്ക് ആരോഗ്യവും നൽകുന്ന പ്രകൃതിദത്ത ചേരുവകൾ.",
                'usage' => "• തയ്യാറാക്കുന്ന വിധം: ഒരു നോൺ-മെറ്റാലിക് പാത്രത്തിൽ (ഗ്ലാസ് അല്ലെങ്കിൽ പ്ലാസ്റ്റിക്) ഒരു പാക്കറ്റ് (15g) പൊടിയെടുത്ത് ആവശ്യത്തിന് ഇളംചൂടുവെള്ളം (ഏകദേശം 50-60 ml) ചേർത്ത് കുഴമ്പ് പരുവത്തിൽ ഇളക്കി യോജിപ്പിക്കുക.\n" .
                           "• പുരട്ടേണ്ട വിധം: ബ്രഷ് ഉപയോഗിച്ച് നരച്ച ഭാഗങ്ങളിലും തലമുടിയുടെ വേരുകൾ മുതൽ തുമ്പുവരെയും ഒരേപോലെ തേച്ചുപിടിപ്പിക്കുക.\n" .
                           "• സമയം: 30 മുതൽ 45 മിനിറ്റ് വരെ തലയിൽ വെക്കുക.\n" .
                           "• കഴുകിക്കളയേണ്ട വിധം: ശുദ്ധജലത്തിൽ നന്നായി കഴുകുക. നിറം ദീർഘനാൾ നിലനിൽക്കാൻ ആദ്യത്തെ 24 മണിക്കൂർ ഷാംപൂ ഉപയോഗിക്കാതിരിക്കുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'वंडरहिना हर्बल हेयर कलर® – 100% प्राकृतिक अमोनिया व PPD मुक्त हेयर डाई (15g)',
                'short_description' => 'राजस्थानी हिना, इंडिगो (नील), आंवला और भृंगराज से युक्त 100% प्राकृतिक आयुर्वेदिक हेयर कलर। अमोनिया, पीपीडी और हानिकारक रसायनों से पूरी तरह मुक्त, जो सफेद बालों को प्राकृतिक गहरा रंग दे बिना त्वचा पर दाग छोड़े।',
                'benefits' => "• 100% प्राकृतिक गहरा रंग और सफेद बालों का कवरेज: बालों को अस्वाभाविक लाल या नारंगी किए बिना प्राकृतिक गहरा काला/भूरा रंग प्रदान करता है।\n" .
                              "• अमोनिया और PPD रहित संपूर्ण सुरक्षा: हानिकारक पैराफेनिलीनडायमाइन (PPD), अमोनिया और पेरोक्साइड से 100% मुक्त, जिससे सिर में जलन, खुजली या एलर्जी नहीं होती।\n" .
                              "• माथे या त्वचा पर कोई दाग नहीं: यह विशेष हर्बल फार्मूला केवल बालों के केराटिन पर असर करता है और माथे या कानों पर कोई जिद्दी काला निशान नहीं छोड़ता।\n" .
                              "• रूसी (डैंड्रफ) से मुक्ति और प्राकृतिक कंडीशनिंग: आंवला और शिकाकाई बालों को रूखेपन से बचाते हैं, सिर को ठंडक देते हैं और डैंड्रफ को जड़ से समाप्त करते हैं।\n" .
                              "• मजबूत बाल व बालों का झड़ना बंद: भृंगराज और ब्राह्मी बालों की जड़ों को पोषण देकर बालों का टूटना रोकते हैं और उन्हें घना व चमकदार बनाते हैं।",
                'ingredients' => "• शुद्ध राजस्थानी मेहंदी (Lawsonia inermis): प्राकृतिक रंगत और ठंडक प्रदान करने वाली शुद्ध मेहंदी पत्तियां।\n" .
                                 "• शुद्ध नील पत्र (Indigofera tinctoria): प्राकृतिक गहरा रंग देने वाला आयुर्वेदिक इंडिगो।\n" .
                                 "• सूखा आंवला (Emblica officinalis): रंग को लंबे समय तक टिकाने वाला विटामिन सी और टैनिन युक्त घटक।\n" .
                                 "• भृंगराज (केशराज) व ब्राह्मी: बालों की जड़ों को मजबूत और स्वस्थ बनाने वाली श्रेष्ठ जड़ी-बूटियां।\n" .
                                 "• शिकाकाई: बालों को रेशमी और चमकदार बनाने वाला प्राकृतिक कंडीशनर।",
                'usage' => "• घोल तैयार करना: किसी कांच या प्लास्टिक के बर्तन में 15 ग्राम का पाउच खाली करें और 50-60 मिली गुनगुना पानी मिलाकर गाढ़ा पेस्ट बनाएं।\n" .
                           "• लगाने की विधि: ब्रश या दस्ताने पहने हाथों से सफेद बालों की जड़ों से लेकर सिरों तक समान रूप से लगाएं।\n" .
                           "• समय: 30 से 45 मिनट तक सूखने दें।\n" .
                           "• धोना: सादे गुनगुने पानी से अच्छी तरह धो लें। बेहतर और लंबे रंग के लिए पहले 24 घंटे केमिकल शैम्पू का प्रयोग न करें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'வண்டர்ஹென்னா ஹெர்பல் ஹேர் கலர்® – 100% இயற்கை அமோனியா & PPD அற்ற மூலிகை முடி சாயம் (15g)',
                'short_description' => 'ராஜஸ்தானி மருதாணி, அவுரி (இண்டிகோ), நெல்லிக்காய் மற்றும் கரிசலாங்கண்ணி கலந்த 100% இயற்கை ஆயுர்வேத முடி சாயம். அமோனியா மற்றும் PPD இன்றி நரை முடிக்கு இயற்கையான கருமை நிறத்தை அளிக்கிறது; தோலில் கறை படியாது.',
                'benefits' => "• இயற்கையான நரை முடி கவரிங்: செயற்கையான சிவப்பு அல்லது ஆரஞ்சு நிறம் தராமல் தலைமுடிக்கு இயற்கையான பளபளப்பான அடர் கருமை நிறத்தை அளிக்கிறது.\n" .
                              "• அமோனியா மற்றும் PPD அற்ற முழு பாதுகாப்பு: உச்சந்தலையில் எரிச்சல், அரிப்பு மற்றும் ஒவ்வாமை உண்டாக்கும் அமோனியா, பி.பி.டி (PPD), பெராக்ஸைடு எதுவும் இல்லாத பாதுகாப்பான இயற்கை தயாரிப்பு.\n" .
                              "• நெற்றி அல்லது தோலில் கறை படியாது: தலைமுடியின் வேர்களில் மட்டும் பிடித்துக்கொள்ளும் சிறப்பு மூலிகைக் கலவை என்பதால் நெற்றி, காதுகளில் கறை படியாமல் எளிதில் கழுவ முடிகிறது.\n" .
                              "• பொடுகு நீக்கம் மற்றும் தலைமுடி கண்டிஷனிங்: மருதாணியின் இயற்கை குளிர்ச்சியும் நெல்லி, சியக்காயின் சத்துக்களும் பொடுகை நீக்கி உச்சந்தலையை ஆரோக்கியமாக வைக்கிறது.\n" .
                              "• முடி உதிர்வு தடுப்பு மற்றும் பளபளப்பு: கரிசலாங்கண்ணி மற்றும் பிராமி வேர்க்கால்களை பலப்படுத்தி முடி உதிர்வை தடுத்து அடர்த்தியாகவும் மென்மையாகவும் வைக்கிறது.",
                'ingredients' => "• தூய ராஜஸ்தானி மருதாணி (Lawsonia inermis): இயற்கையான குளிர்ச்சி மற்றும் சாயம் தரும் மைக்ரோ-ஃபைன் மருதாணி.\n" .
                                 "• நீல அவுரி இலை பொடி (Indigofera tinctoria): முடிக்கு இயற்கையான அடர் கருமை நிறத்தை தரும் தூய இண்டிகோ.\n" .
                                 "• நாட்டு நெல்லிக்காய் (Amla): நிறம் நீண்ட நாட்கள் நிலைத்து நிற்க உதவும் இயற்கை வைட்டமின் சி.\n" .
                                 "• கரிசலாங்கண்ணி (Bhringraj) & பிராமி: முடி வளர்ச்சியை தூண்டி நரையை கட்டுப்படுத்தும் கேச மூலிகைகள்.\n" .
                                 "• சியக்காய்: முடியை மென்மையாகவும் பளபளப்பாகவும் மாற்றும் இயற்கை நுரைமூலிகை.",
                'usage' => "• தயாரிக்கும் முறை: கண்ணாடி அல்லது பிளாஸ்டிக் பாத்திரத்தில் 15 கிராம் பாக்கெட்டை கொட்டி 50–60 மி.லி மிதமான வெந்நீர் சேர்த்து கட்டியில்லாமல் பேஸ்ட் போல் கலக்கவும்.\n" .
                           "• பூசும் முறை: பிரஷ் கொண்டு நரைத்த முடிகள் மற்றும் வேர்க்கால்களில் சமமாக பூசவும்.\n" .
                           "• நேரம்: 30 முதல் 45 நிமிடங்கள் வரை ஊற வைக்கவும்.\n" .
                           "• கழுவுதல்: வெறும் வெதுவெதுப்பான தண்ணீரில் நன்றாக அலசவும். நிறம் நீண்ட நாட்கள் நீடிக்க முதல் 24 மணி நேரத்திற்கு ஷாம்பூ பயன்படுத்த வேண்டாம்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['hair', 'head'];
        $bodyPartIds = BodyPart::whereIn('slug', $bodyPartSlugs)->pluck('id')->toArray();

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'name' => $enTitle,
                    'short_description' => $enShortDesc,
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                ]);
                if (!empty($bodyPartIds)) {
                    $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
                }
                $this->command?->info("Updated WonderHenna Herbal Hair Color (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'hair-care'],
                ['name' => 'Hair Care', 'description' => 'Natural herbal remedies and dyes for healthy hair.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'HP-PWD-15',
                'price' => 75.00,
                'sale_price' => 60.00,
                'stock_quantity' => 1000,
                'unit_size' => '15 gram',
                'badge' => '100% Herbal Dye',
                'featured_image' => 'https://yuvann.com/storage/products/b89835ba-f2dd-4c30-a930-c3acdda91486.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 22,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new WonderHenna Herbal Hair Color (#{$product->id}) with full multilingual content.");
        }
    }
}
