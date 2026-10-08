<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaGingerHoneyTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Ginger Honey details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-ginger-honey-digestive-care-immunity-booster-250g';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-GNG-HNY250')
            ->orWhere('slug', 'like', '%ginger-honey%')
            ->orWhere(function ($q) {
                $q->where('id', 58)
                  ->where(function ($sub) {
                      $sub->where('slug', 'like', '%ginger%')
                          ->orWhere('slug', 'like', '%honey%');
                  });
            })
            ->get();

        $enTitle = 'Aliya Ginger Honey (ഇഞ്ചി തേൻ) – Digestive Care & Immunity Booster (250g)';
        $enShortDesc = 'A traditional wellness blend of freshly crushed aromatic ginger steeped in pure natural honey, formulated to promote smooth digestion, relieve bloating, and soothe sore throats.';

        $enBenefits = "• Ignites Digestive Fire (Agni): Stimulates essential gastric enzymes to accelerate nutrient assimilation and prevent sluggish metabolism.\n" .
                      "• Rapid Relief from Gas & Bloating: Carminative properties soothe intestinal spasms, easing flatulence, heavy stomach, and abdominal discomfort after meals.\n" .
                      "• Respiratory Soother & Throat Relief: Natural gingerols in raw honey liquefy accumulated phlegm, soothing persistent coughs, scratchy throats, and bronchial congestion.\n" .
                      "• Antidote to Nausea & Motion Sickness: Gently pacifies morning sickness, travel nausea, and gastric acidity without pharmaceutical drowsiness.\n" .
                      "• Daily Vitality & Circulation Support: Promotes peripheral blood circulation, warms the core physiology, and protects against recurrent seasonal chills.";

        $enIngredients = "• Fresh Crushed Organic Ginger (Zingiber officinale / Sunthi / Ardraka): Rich in active gingerols, shogaols, and volatile aromatic oils.\n" .
                         "• 100% Pure Raw Wild Honey: Natural floral honey loaded with active enzymes and antimicrobial properties.\n" .
                         "• Completely Pure: Free from artificial flavors, refined sugars, synthetic preservatives, and colors.";

        $enUsage = "• Recommended Dosage: Take 1 to 2 teaspoons directly or stirred into warm water 15–20 minutes before meals to stimulate digestion.\n" .
                   "• For Cough & Sore Throat: Slowly sip 1 teaspoon mixed with a squeeze of fresh lemon in warm water 2–3 times a day.\n" .
                   "• Storage: Keep tightly closed in a cool, dry place. Use a clean, dry spoon.";

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
                'name' => 'ആലിയ ഇഞ്ചി തേൻ – ഉദര സംരക്ഷണവും രോഗപ്രതിരോധവും (250g)',
                'short_description' => 'ഔഷധഗുണമുള്ള നാടൻ ഇഞ്ചിയും ശുദ്ധമായ കാട്ടുതേനും സമന്വയിപ്പിച്ച പരമ്പരാഗത കൂട്ടായ്മ. ദഹനക്കേട്, ഗ്യാസ്, വയറു വീർക്കൽ എന്നിവ ശമിപ്പിക്കാനും, തൊണ്ടവേദനയും ജലദോഷവും അകറ്റാനും അത്യുത്തമം.',
                'benefits' => "• ദഹനശേഷിയും വിശപ്പും വർദ്ധിപ്പിക്കുന്നു: ആമാശയത്തിലെ ദഹനരസങ്ങളെ ഉത്തേജിപ്പിച്ച് ഭക്ഷണം വേഗത്തിൽ ദഹിപ്പിക്കാനും അജീർണ്ണം മാറ്റാനും സഹായിക്കുന്നു.\n" .
                              "• ഗ്യാസും വയറു വീർക്കലും ശമിപ്പിക്കുന്നു: ആഹാരത്തിന് ശേഷമുണ്ടാകുന്ന വയറു വീർക്കൽ, പുളിച്ചുതികട്ടൽ, ഗ്യാസ് സംബന്ധമായ അസ്വസ്ഥതകൾ എന്നിവയ്ക്ക് പെട്ടെന്ന് ആശ്വാസം നൽകുന്നു.\n" .
                              "• തൊണ്ടവേദനയ്ക്കും ചുമയ്ക്കും സ്വാഭാവിക ശമനം: ഇഞ്ചിയിലെ ജിഞ്ചറോൾ കഫക്കെട്ടും വിട്ടുമാറാത്ത ചുമയും തൊണ്ടയിലെ കரகരപ്പും മാറ്റി ശ്വാസനാളത്തിന് ആശ്വാസം പകരുന്നു.\n" .
                              "• ഛർദ്ദിലും യാത്രാക്ഷീണവും ഒഴിവാക്കുന്നു: യാത്ര ചെയ്യുമ്പോഴുണ്ടാകുന്ന തലകറക്കം, ഛർദ്ദി, ഛർദ്ദിക്കാനുള്ള തോന്നൽ എന്നിവ ഇല്ലാതാക്കാൻ ഉത്തമം.\n" .
                              "• ശരീരത്തിന് ഉന്മേഷവും രക്തചംക്രമണവും: ശരീരത്തിലെ രക്തചംക്രമണം സുഗമമാക്കുകയും തണുപ്പ് കാലങ്ങളിൽ ശരീരത്തിന് സ്വാഭാവിക ഊഷ്മളത നൽകുകയും ചെയ്യുന്നു.",
                'ingredients' => "• ശുദ്ധമായ നാടൻ ഇഞ്ചി (Zingiber officinale): ഔഷധമൂല്യമുള്ള നാടൻ ഇഞ്ചിയുടെ സത്ത്.\n" .
                                 "• 100% ശുദ്ധമായ പ്രകൃതിദത്ത തേൻ: യാതൊരുവിധ രാസവസ്തുക്കളും ചേർക്കാത്ത ശുദ്ധ കാട്ടുതേൻ.\n" .
                                 "• യാതൊരുവിധ പ്രിസർവേറ്റീവുകളോ പഞ്ചസാരയോ കൃത്രിമ ചേരുവകളോ അടങ്ങിയിട്ടില്ല.",
                'usage' => "• കഴിക്കേണ്ട വിധം: ഭക്ഷണത്തിന് 15 മിനിറ്റ് മുൻപ് 1 മുതൽ 2 ടീസ്പൂൺ നേരിട്ടോ ഇളംചൂടുവെള്ളത്തിൽ ചേർത്തോ കഴിക്കുക.\n" .
                           "• ചുമയ്ക്കും കഫക്കെട്ടിനും: ഒരു ടീസ്പൂൺ ഇഞ്ചി തേൻ ചെറുചൂടുവെള്ളത്തിൽ അൽപം നാരങ്ങാനീരും ചേർത്ത് ദിവസവും 2-3 തവണ കഴിക്കുക.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: ഉണങ്ങിയ സ്പൂൺ ഉപയോഗിക്കുക. ഈർപ്പമില്ലാത്ത സ്ഥലത്ത് സൂക്ഷിക്കുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया अदरक शहद (जिंजर हनी) – पाचन देखभाल और रोग प्रतिरोधक क्षमता (250g)',
                'short_description' => 'ताजा पिसा हुआ सुगंधित अदरक और 100% शुद्ध प्राकृतिक शहद का पारंपरिक मेल। सुचारू पाचन, गैस-अपच से राहत और गले की खराश दूर करने के लिए अत्यंत गुणकारी।',
                'benefits' => "• पाचन अग्नि को प्रदीप्त करता है: पाचक रसों को उत्तेजित कर भोजन को तेजी से पचाता है और अपच की समस्या समाप्त करता है।\n" .
                              "• गैस, पेट फूलने और एसिडिटी में तुरंत आराम: भोजन के बाद होने वाले भारीपन, गैस और पेट की मरोड़ को शांत करता है।\n" .
                              "• खांसी, बलगम और गले की खराश का अचूक उपाय: अदरक का जिंजरोल फेफड़ों में जमा कफ ढीला करता है और गले के संक्रमण को दूर करता है।\n" .
                              "• जी मिचलाना और सफर की उल्टी में राहत: यात्रा के दौरान चक्कर आना या उल्टी का अहसास होने पर तुरंत राहत प्रदान करता है।\n" .
                              "• रक्त संचार और आंतरिक ऊर्जा: शरीर में ताजगी लाता है और बदलते मौसम में ठंड व जुकाम से शरीर की रक्षा करता है।",
                'ingredients' => "• ताजा औषधीय अदरक (Zingiber officinale): प्राकृतिक जिंजरोल्स और तेलों से भरपूर शुद्ध अदरक।\n" .
                                 "• 100% शुद्ध प्राकृतिक शहद: बिना मिलावट का कच्चा प्राकृतिक शहद।\n" .
                                 "• शून्य कृत्रिम तत्व: रंग, प्रिजर्वेटिव या चीनी से पूरी तरह मुक्त।",
                'usage' => "• सेवन विधि: भोजन से 15-20 मिनट पहले 1 से 2 चम्मच सीधे या गुनगुने पानी के साथ लें।\n" .
                           "• खांसी और जुकाम के लिए: 1 चम्मच अदरक शहद गुनगुने पानी में नींबू के रस की कुछ बूंदों के साथ दिन में 2-3 बार लें।\n" .
                           "• भंडारण: सूखे चम्मच का प्रयोग करें और धूप से दूर सामान्य तापमान पर रखें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா இஞ்சி தேன் – செரிமான பாதுகாப்பு மற்றும் நோய் எதிர்ப்பு சக்தி (250g)',
                'short_description' => 'தூய இயற்கை தேனில் நசுக்கிய நாட்டு இஞ்சி சேர்த்து தயாரிக்கப்பட்ட பாரம்பரிய மூலிகை தேன். செரிமான கோளாறுகள், வயிற்று உப்புசம், இருமல் மற்றும் தொண்டை கரகரப்பை நீக்க சிறந்தது.',
                'benefits' => "• செரிமான தீயை தூண்டுகிறது: இரைப்பை அமிலங்களை சீராக்கி சாப்பிட்ட உணவை எளிதில் செரிக்க செய்து மந்தத்தை போக்குகிறது.\n" .
                              "• வாயுத்தொல்லை மற்றும் வயிற்று உப்புசம் நீங்க: உணவுக்கு பின் ஏற்படும் வயிறு உப்புசம், ஏப்பம் மற்றும் வாயுவை உடனடியாக போக்க உதவுகிறது.\n" .
                              "• தொண்டைக்கட்டு மற்றும் இருமல் நிவாரணம்: சளியை கரைத்து வெளியேற்றி விடாத இருமல் மற்றும் தொண்டை கரகரப்புக்கு உடனடி இதமளிக்கிறது.\n" .
                              "• வாந்தி மற்றும் பயண மயக்கம் தீர்வு: கார் அல்லது பேருந்து பயணங்களில் ஏற்படும் குமட்டல் மற்றும் வாந்தியை தவிர்க்க அருமருந்து.\n" .
                              "• ரத்த ஓட்டம் மற்றும் புத்துணர்ச்சி: உடலின் உஷ்ணநிலையை சீராக்கி நரம்புகளுக்கு புத்துணர்ச்சி அளிக்கிறது.",
                'ingredients' => "• தூய நாட்டு இஞ்சி (Zingiber officinale): மருத்துவ குணங்கள் நிறைந்த இயற்கை இஞ்சி.\n" .
                                 "• 100% தூய காட்டுத் தேன்: கலப்படமற்ற சுத்தமான இயற்கை தேன்.\n" .
                                 "• சர்க்கரை, ரசாயனம் அல்லது பதப்படுத்திகள் எதுவுமற்ற இயற்கை தயாரிப்பு.",
                'usage' => "• உட்கொள்ளும் முறை: உணவுக்கு 15 நிமிடங்களுக்கு முன் 1 முதல் 2 தேக்கரண்டி நேரடியாகவோ அல்லது வெந்நீரிலோ உட்கொள்ளவும்.\n" .
                           "• இருமலுக்கு: 1 தேக்கரண்டி இஞ்சி தேனை சிறிது எலுமிச்சை சாறுடன் வெந்நீரில் கலந்து அருந்தவும்.\n" .
                           "• சேமிப்பு முறை: உலர்ந்த ஸ்பூனை பயன்படுத்தவும். ஈரப்பதம் இல்லாத இடத்தில் வைக்கவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['digestion', 'chest', 'whole-body'];
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
                $this->command?->info("Updated Aliya Ginger Honey (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'honey-preserves'],
                ['name' => 'Honey & Preserves', 'description' => 'Pure wild forest honey and herbal berry infusions.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-GNG-HNY250',
                'price' => 300.00,
                'sale_price' => 300.00,
                'stock_quantity' => 100,
                'unit_size' => '250 g',
                'badge' => 'Ginger Infused Wild Honey',
                'featured_image' => 'https://yuvann.com/storage/products/a17bdce0-92e3-4b93-93a7-d656cdb96695.webp',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 18,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Ginger Honey (#{$product->id}) with full multilingual content.");
        }
    }
}
