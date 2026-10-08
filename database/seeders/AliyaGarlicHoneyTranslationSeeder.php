<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaGarlicHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Garlic Honey details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-garlic-honey-natural-blood-pressure-cholesterol-support-250g';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-GLC-HNY250')
            ->orWhere('slug', 'like', '%garlic-honey%')
            ->orWhere(function ($q) {
                $q->where('id', 56)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%garlic%')
                          ->orWhere('slug', 'like', '%honey%');
                  });
            })
            ->get();

        $enTitle = 'Aliya Garlic Honey (വെളുത്തുള്ളി തേൻ) – Natural Blood Pressure & Cholesterol Support (250g)';
        $enShortDesc = 'A traditional wellness blend of whole peeled garlic cloves steeped in pure natural honey, formulated to support healthy blood pressure, dissolve stubborn cholesterol, and enhance daily immunity.';

        $enBenefits = "• Blood Pressure & Vascular Health: Allicin and nitric oxide precursors in steeped garlic dilate constricted blood vessels, supporting smooth arterial circulation and balanced blood pressure.\n" .
                      "• Dissolves Arterial Plaque & Cholesterol: Works synergistically to reduce elevated LDL cholesterol, inhibit lipid peroxidation, and safeguard arterial endothelial walls.\n" .
                      "• Heart Strength & Cardiac Tonic: Nourishes heart muscles (Hridya rasayana), eases cardiac workload, and promotes longevity and vascular flexibility.\n" .
                      "• Immune Shield & Antimicrobial Power: Garlic's natural sulfur compounds bonded with honey enzymes provide an unbeatable defense against stubborn bacterial and viral infections.\n" .
                      "• Digestive Detox & Gut Health: Eliminates harmful intestinal parasites, relieves stomach cramping, and nurtures healthy gut microbiome balance without burning the stomach.";

        $enIngredients = "• Whole Hill Garlic Cloves (Allium sativum / Lasuna): Mountain-grown single/clove garlic rich in active allicin, ajoene, and organic sulfur compounds.\n" .
                         "• 100% Pure Raw Wild Honey: Raw unheated honey that naturally cures the raw pungency of garlic into a palatable, therapeutic elixir.\n" .
                         "• Clean Composition: 100% natural with zero artificial preservatives, additives, or refined sugars.";

        $enUsage = "• Recommended Dosage: Consume 1 to 2 honey-steeped garlic cloves along with 1 teaspoon of honey daily in the morning on an empty stomach.\n" .
                   "• Administration Tip: Chew the garlic clove thoroughly for maximum allicin activation, followed by a glass of lukewarm water.\n" .
                   "• Storage: Keep sealed in a cool, dry place. Use a clean, dry spoon. Do not refrigerate.";

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
                'name' => 'ആലിയ വെളുത്തുള്ളി തേൻ – രക്തസമ്മർദ്ദത്തിനും കൊളസ്ട്രോൾ നിയന്ത്രണത്തിനും (250g)',
                'short_description' => 'ഔഷധഗുണമുള്ള നാടൻ വെളുത്തുള്ളി ശുദ്ധമായ കാട്ടുതേനിൽ പാകപ്പെടുത്തിയ വിശിഷ്ട ആയുർവേദ രസായനം. രക്തസമ്മർദ്ദം (BP) നിയന്ത്രിക്കാനും, കൊളസ്ട്രോൾ കുറയ്ക്കാനും, ഹൃദയത്തെ സംരക്ഷിക്കാനും അത്യുത്തമം.',
                'benefits' => "• രക്തസമ്മർദ്ദം നിയന്ത്രിക്കുന്നു: വെളുത്തുള്ളിയിലെ അലിസിൻ (Allicin) രക്തക്കുഴലുകളെ വികസിപ്പിച്ച് രക്തയോട്ടം സുഗമമാക്കുകയും ഉയർന്ന രക്തസമ്മർദ്ദം നിയന്ത്രിക്കാൻ സഹായിക്കുകയും ചെയ്യുന്നു.\n" .
                              "• കൊളസ്ട്രോളും രക്തത്തിലെ കൊഴുപ്പും കുറയ്ക്കുന്നു: ധമനികളിൽ അടിഞ്ഞുകൂടുന്ന ചീത്ത കൊളസ്ട്രോളും (LDL) ട്രൈഗ്ലിസറൈഡുകളും നീക്കം ചെയ്ത് രക്തക്കുഴലുകളിലെ ബ്ലോക്കുകൾ തടയുന്നു.\n" .
                              "• ഹൃദയാരോഗ്യം മെച്ചപ്പെടുത്തുന്നു (ഹൃദ്യ രസായനം): ഹൃദയപേശികളെ ബലപ്പെടുത്തുകയും ഹൃദയസ്തംഭന സാധ്യതകൾ കുറയ്ക്കുകയും ചെയ്യുന്ന ഉത്തമ ആയുർവേദ ഹൃദയ ടോണിക്.\n" .
                              "• ശക്തമായ രോഗപ്രതിരോധശേഷി: വെളുത്തുള്ളിയിലെ സൾഫർ സംയുക്തങ്ങളും തേനിന്റെ ആൻറി ബാക്ടീരിയൽ ഗുണങ്ങളും ചേർന്ന് വിട്ടുമാറാത്ത അണുബാധകൾക്കും രോഗങ്ങൾക്കുമെതിരെ ശക്തമായ പ്രതിരോധം തീർക്കുന്നു.\n" .
                              "• ഉദര ശുദ്ധീകരണവും ഗ്യാസ് ശമനവും: ഉദരത്തിലെ കൃമികളെയും ഹാനികരമായ ബാക്ടീരിയകളെയും നശിപ്പിക്കുകയും ഗ്യാസ്, വായുക്ഷോഭം എന്നിവ ഇല്ലാതാക്കുകയും ചെയ്യുന്നു.",
                'ingredients' => "• മലനാടൻ വെളുത്തുള്ളി (Allium sativum): ഗുണമേന്മയുള്ള നാടൻ വെളുത്തുള്ളി അല്ലികൾ.\n" .
                                 "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത തേൻ: യാതൊരുവിധ മായവുമില്ലാത്ത ശുദ്ധമായ നാടൻ തേൻ.\n" .
                                 "• യാതൊരുവിധ പ്രിസർവേറ്റീവുകളോ പഞ്ചസാരയോ കൃത്രിമ ചേരുവകളോ ചേർക്കാത്തത്.",
                'usage' => "• കഴിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിൽ തേനിൽ കുതിർത്ത 1-2 വെളുത്തുള്ളി അല്ലി 1 ടീസ്പൂൺ തേനോടൊപ്പം നന്നായി ചവച്ചരച്ച് കഴിക്കുക. ശേഷം ഒരു ഗ്ലാസ് ഇളംചൂടുവെള്ളം കുടിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: ദിവസവും കൃത്യമായി ഉപയോഗിക്കുന്നത് രക്തസമ്മർദ്ദവും കൊളസ്ട്രോളും നിയന്ത്രിക്കാൻ സഹായിക്കും.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: ഉണങ്ങിയ സ്പൂൺ ഉപയോഗിക്കുക. സാധാരണ ഊഷ്മാവിൽ സൂക്ഷിക്കുക. ഫ്രിഡ്ജിൽ വെക്കേണ്ടതില്ല.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया लहसुन शहद (गार्लिक हनी) – ब्लड प्रेशर और कोलेस्ट्रॉल सपोर्ट (250g)',
                'short_description' => 'शुद्ध शहद में डूबी हुई संपूर्ण लहसुन की कलियों का पारंपरिक योग। रक्तचाप (BP) को नियंत्रित करने, नसों से कोलेस्ट्रॉल हटाने और हृदय को स्वस्थ रखने के लिए रामबाण औषधि।',
                'benefits' => "• रक्तचाप (BP) नियंत्रण: लहसुन का एलिसिन रक्त वाहिकाओं को लचीला बनाकर रक्त संचार को सामान्य करता है और हाई बीपी को नियंत्रित रखने में मदद करता है।\n" .
                              "• कोलेस्ट्रॉल और ब्लॉकेज से मुक्ति: नसों में जमे ट्राइग्लिसराइड्स और बैड कोलेस्ट्रॉल को पिघलाकर आर्टरीज को साफ और स्वस्थ रखता है।\n" .
                              "• हृदय की मजबूती (हृदय टॉनिक): हृदय की मांसपेशियों को पोषण देकर रक्त के थक्के जमने की आशंका को कम करता है।\n" .
                              "• शक्तिशाली प्राकृतिक एंटीबायोटिक: मौसमी संक्रमणों, वायरल और फ्लू से लड़ने के लिए शरीर को मजबूत प्राकृतिक प्रतिरक्षा प्रदान करता है।\n" .
                              "• पेट के कीड़े और गैस से राहत: आंतों के हानिकारक बैक्टीरिया को समाप्त कर पाचन तंत्र को बिना जलन के स्वस्थ रखता है।",
                'ingredients' => "• शुद्ध पहाड़ी लहसुन (Allium sativum): औषधीय गुणों व एलिसिन से भरपूर उच्च गुणवत्ता वाला लहसुन।\n" .
                                 "• 100% शुद्ध प्राकृतिक शहद: अनप्रोसेस्ड शुद्ध शहद जो लहसुन के तीखेपन को कम कर उसके गुणों को कई गुना बढ़ाता है।\n" .
                                 "• शून्य रसायन: किसी भी प्रकार के प्रिजर्वेटिव्स या मिलावट से मुक्त।",
                'usage' => "• सेवन विधि: प्रतिदिन सुबह खाली पेट 1 से 2 शहद में डूबी लहसुन की कलियां 1 चम्मच शहद के साथ खूब चबाकर खाएं और ऊपर से गुनगुना पानी पिएं।\n" .
                           "• निरंतरता: हृदय और बीपी स्वास्थ्य के लिए नियमित रूप से सेवन करें।\n" .
                           "• भंडारण: सूखे चम्मच का प्रयोग करें और धूप से दूर सामान्य तापमान पर रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா பூண்டு தேன் – ரத்த அழுத்தம் மற்றும் கொலஸ்ட்ரால் பாதுகாப்பு (250g)',
                'short_description' => 'தூய இயற்கை தேனில் ஊறிய மலைப்பூண்டு பற்களின் பாரம்பரிய ஆரோக்கிய மருந்து. ரத்த அழுத்தத்தை (BP) சீராக்கவும், கெட்ட கொழுப்பை குறைக்கவும், இதய நலம் காக்கவும் சிறந்தது.',
                'benefits' => "• உயர் ரத்த அழுத்தம் (BP) சீராக்கம்: பூண்டிலுள்ள அல்லிசின் ரத்த நாளங்களை தளர்த்தி ரத்த ஓட்டத்தை சீராக்குவதால் உயர் ரத்த அழுத்தத்தை கட்டுப்பாட்டில் வைக்க உதவுகிறது.\n" .
                              "• ரத்த கொழுப்பு மற்றும் கொலஸ்ட்ரால் நீக்கம்: ரத்த நாளங்களில் படியும் கொழுப்பை கரைத்து அடைப்புகள் ஏற்படுவதை தடுத்து இதயத்தை பாதுகாக்கிறது.\n" .
                              "• இதய பலம் (இதய டானிக்): இதய தசைகளை வலுப்படுத்தி மாரடைப்பு அபாயத்தை குறைக்கும் அற்புத ஆயுர்வேத கலவை.\n" .
                              "• இயற்கை ஆன்டி-பயாடிக் அரண்: பூண்டின் சல்பர் சத்துக்களும் தேனும் இணைந்து உடலில் நோய் கிருமிகள் அண்டாமல் பாதுகாக்கிறது.\n" .
                              "• வயிற்று பூச்சிகள் மற்றும் வாயுத்தொல்லை நிவாரணம்: குடலிலுள்ள கெட்ட கிருமிகளை அழித்து செரிமானத்தை சீராக்குகிறது.\n" .
                              "• உட்கொள்ளும் முறை: தினமும் காலையில் வெறும் வயிற்றில் தேனில் ஊறிய 1 முதல் 2 பூண்டு பற்களை 1 தேக்கரண்டி தேனுடன் நன்றாக மென்று தின்று, பின் ஒரு டம்ளர் வெந்நீர் குடிக்கவும்.",
                'ingredients' => "• தூய மலைப்பூண்டு (Allium sativum): அல்லிசின் சத்துக்கள் நிறைந்த நாட்டு மலைப்பூண்டு.\n" .
                                 "• 100% தூய இயற்கை தேன்: இயற்கையான காடுகளிலிருந்து பெறப்பட்ட சுத்தமான தேன்.\n" .
                                 "• ரசாயனம் அல்லது சர்க்கரை கலக்காத 100% இயற்கை தயாரிப்பு.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் காலையில் வெறும் வயிற்றில் தேனில் ஊறிய 1 முதல் 2 பூண்டு பற்களை 1 தேக்கரண்டி தேனுடன் நன்றாக மென்று தின்று, பின் ஒரு டம்ளர் வெந்நீர் குடிக்கவும்.\n" .
                           "• சிறந்த பலனுக்கு: தொடர்ந்து உட்கொள்வது இதய ஆரோக்கியத்தையும் ரத்த அழுத்தத்தையும் சீராக வைக்க உதவும்.\n" .
                           "• சேமிப்பு முறை: உலர்ந்த ஸ்பூனை பயன்படுத்தவும். அறை வெப்பநிலையில் வைக்கவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'chest', 'digestion'];
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
                $this->command?->info("Updated Aliya Garlic Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'honey-preserves'],
                ['name' => 'Honey & Preserves', 'description' => 'Pure wild forest honey and herbal berry infusions.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-GLC-HNY250',
                'price' => 300.00,
                'sale_price' => 300.00,
                'stock_quantity' => 100,
                'unit_size' => '250 g',
                'badge' => 'Garlic Infused Wild Honey',
                'featured_image' => 'https://yuvann.com/storage/products/99be2b3d-503e-4f77-94da-3f9b6465fa67.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 20,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Garlic Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
