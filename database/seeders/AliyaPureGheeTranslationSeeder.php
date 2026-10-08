<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaPureGheeTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Pure Ghee details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-pure-ghee-smn-nky-premium-quality-traditional-clarified-butter';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-GHE-PURE')
            ->orWhere('slug', 'like', '%ghee%')
            ->orWhere(function ($q) {
                $q->where('id', 61)
                  ->where('slug', 'like', '%clarified-butter%');
            })
            ->get();

        $enTitle = 'Aliya Pure Ghee (നറുനെയ്യ് / سمن نقي) – Traditional Granular Clarified Butter (500ml)';
        $enShortDesc = '100% pure, golden clarified butter slow-cooked to artisanal granular perfection with an authentic nostalgic aroma. Promotes smooth digestion, lubricates joints, strengthens bone density, and enhances mental clarity.';

        $enBenefits = "• Traditional Granular Quality: Slow-simmered according to timeless traditional methods to produce a golden, aromatic, granular (Danedar) clarified butter rich in authentic flavor.\n" .
                      "• Digestive Harmony & Gut Healing: Rich in short-chain butyric acid that nourishes the intestinal lining, reduces inflammation, and stimulates healthy metabolic digestion (Agni).\n" .
                      "• Bone Strength & Joint Lubrication: Loaded with fat-soluble Vitamin K2, Vitamin D, and essential fatty acids that facilitate calcium absorption and soothe stiff joints.\n" .
                      "• Memory & Cognitive Alertness (Medhya): Celebrated in classical Ayurveda as an exceptional brain tonic that crosses the blood-brain barrier to nourish neural tissues and enhance focus.\n" .
                      "• High Heat Cooking & Lactose-Free: Naturally clarified with milk solids removed; lactose-friendly with a high smoke point (250°C), making it ideal for daily culinary and Ayurvedic recipes.";

        $enIngredients = "• 100% Pure Milk Fat (Clarified Butter / Desi Butterfat): Slow-rendered, unadulterated pure clarified butter with no artificial color, essence, or palm oil adulteration.";

        $enUsage = "• Daily Morning Tonic: Consume 1 teaspoon (5ml) of warm melted ghee on an empty stomach with a cup of warm water to lubricate tissues and stimulate digestion.\n" .
                   "• Culinary Nourishment: Drizzle 1 to 2 teaspoons over warm rice, dosas, dal, rotis, or khichdi to enhance nutritional absorption.\n" .
                   "• Ayurvedic Anupana: Acts as the classic therapeutic carrier (Yogavahi) for consuming medicated herbal powders (churnas) and rasayanas.\n" .
                   "• Storage Note: Store at room temperature in a dry container. Does not require refrigeration. Always use a clean, dry spoon.";

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
                'name' => 'ആലിയ നറുനെയ്യ് – പരമ്പരാഗത തനി തങ്കനെയ്യ് / പ്യുവർ ഘീ (500ml)',
                'short_description' => 'പരമ്പരാഗത രീതിയിൽ പതുക്കെ ഉരുക്കിയെടുത്ത 100% ശുദ്ധമായ മണമുള്ള നറുനെയ്യ് (നല്ല തരിപ്പൻ നെയ്യ്). ദഹനശക്തി വർദ്ധിപ്പിക്കാനും, സന്ധികൾക്ക് വഴക്കം നൽകാനും, ഓർമ്മശക്തിയും പ്രതിരോധശേഷിയും മെച്ചപ്പെടുത്താനും ഉത്തമം.',
                'benefits' => "• തനത് തരിപ്പൻ നറുനെയ്യ് (Danedar Ghee): കൃത്രിമ ചേരുവകളോ എസൻസോ ഇല്ലാതെ പാരമ്പര്യമായി കാച്ചിയെടുത്ത തനി തങ്കനിറവും കൊതിയൂറും മണവും നൽകുന്ന നറുനെയ്യ്.\n" .
                              "• ദഹനശക്തിയും കുടലാരോഗ്യവും (അഗ്നി വർദ്ധകം): ബ്യൂട്ടിറിക് ആസിഡ് ധാരാളമായി അടങ്ങിയിരിക്കുന്നതിനാൽ കുടലിലെ വ്രണങ്ങൾ മാറ്റാനും ദഹനക്കേട് അകറ്റി മെറ്റബോളിസം ഉയർത്താനും സഹായിക്കുന്നു.\n" .
                              "• അസ്ഥിബലവും സന്ധി വഴക്കവും: വിറ്റാമിൻ ഡി, കെ2 എന്നിവ കാൽസ്യം ആഗിരണം സുഗമമാക്കുകയും സന്ധികളിലെ തേയ്മാനവും വേദനയും കുറയ്ക്കുകയും ചെയ്യുന്നു.\n" .
                              "• ബുദ്ധിശക്തിയും ഓർമ്മയും (മേധ്യ രസായനം): ആയുർവേദപ്രകാരം മസ്തിഷ്ക കോശങ്ങൾക്ക് ഉണർവും ഏകാഗ്രതയും ഓർമ്മശക്തിയും നൽകുന്ന ഉത്തമ ഔഷധം.\n" .
                              "• ഉയർന്ന ചൂടിൽ പാകം ചെയ്യാം: ലാക്ടോസ് ഘടകങ്ങൾ നീക്കം ചെയ്തതിനാൽ പാലുല്പന്നങ്ങൾ അലർജിയുള്ളവർക്കും ഉപയോഗിക്കാം; ഉയർന്ന സ്മോക്ക് പോയിന്റ് ഉള്ളതിനാൽ നിത്യേനയുള്ള പാചകത്തിന് സുരക്ഷിതം.",
                'ingredients' => "• 100% ശുദ്ധ പാൽക്കൊഴുപ്പ് (Pure Clarified Butter): കൃത്രിമ എണ്ണകളോ എസൻസുകളോ പ്രിസർവേറ്റീവുകളോ ഒട്ടും ചേർക്കാത്ത ശുദ്ധമായ വെണ്ണ നെയ്യ്.",
                'usage' => "• നിത്യേന ഉപയോഗിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിൽ 1 ടീസ്പൂൺ ഇളംചൂടുള്ള നറുനെയ്യ് കുടിക്കുന്നത് ശരീരകോശങ്ങൾക്ക് നവോന്മേഷം നൽകും.\n" .
                           "• ഭക്ഷണത്തോടൊപ്പം: ചൂടുചോറിലോ പരിപ്പിലോ കഞ്ഞികളിലോ ദോശയിലോ 1-2 ടീസ്പൂൺ നെയ്യ് ചേർത്ത് കഴിക്കുക.\n" .
                           "• ആയുർവേദ മരുന്നുകൾക്ക്: ഔഷധപ്പൊടികൾ (ചൂർണ്ണങ്ങൾ) തേച്ചു കഴിക്കാൻ ഏറ്റവും അനുയോജ്യമായ അനുപാനം.\n" .
                           "• സൂക്ഷിക്കേണ്ട വിധം: സാധാരണ ഊഷ്മാവിൽ അടച്ചു സൂക്ഷിക്കുക. ഈർപ്പമുള്ള സ്പൂൺ ഉപയോഗിക്കരുത്.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया शुद्ध देसी घी (समन नकी) – पारंपरिक दानेदार शुद्ध घी (500ml)',
                'short_description' => 'पारंपरिक विधि से धीमी आंच पर पकाया गया 100% शुद्ध और सुगंधित दानेदार देसी घी। पाचन अग्नि को प्रदीप्त करने, हड्डियों व जोड़ों को मजबूत बनाने, याददाश्त तेज करने और शारीरिक बल बढ़ाने में सर्वोत्तम।',
                'benefits' => "• शुद्ध दानेदार बनावट और मनमोहक सुगंध: बिना किसी रसायन या मिलावट के पारंपरिक तरीके से निर्मित, असली देसी घी का सुनहरा रंग और बेमिसाल दानेदार स्वाद।\n" .
                              "• पाचन शक्ति और आंतों का पोषण: ब्यूटिरिक एसिड से भरपूर जो आंतों की अंदरूनी परत को स्वस्थ रखता है, कब्ज दूर करता है और पाचन अग्नि (Agni) को बढ़ाता है।\n" .
                              "• हड्डियों की मजबूती और जोड़ों का लचीलापन: प्राकृतिक विटामिन K2 और D हड्डियों में कैल्शियम को सोखने में मदद करते हैं तथा जोड़ों के दर्द को शांत करते हैं।\n" .
                              "• मेध्य रसायन (याददाश्त और एकाग्रता): आयुर्वेद में बुद्धि, स्मरण शक्ति और मानसिक शांति को बढ़ाने वाला सर्वोत्तम सात्विक आहार।\n" .
                              "• लैक्टोज-मुक्त और उच्च स्मोक पॉइंट: दूध के ठोस कण अलग होने के कारण सुपाच्य और उच्च तापमान पर खाना पकाने के लिए सबसे सुरक्षित।",
                'ingredients' => "• 100% शुद्ध क्लेरिफाइड बटर (Pure Milk Fat): वनस्पति तेल, रंग या कृत्रिम सुगंध से पूरी तरह मुक्त विशुद्ध घी।",
                'usage' => "• दैनिक सेवन विधि: रोज सुबह खाली पेट 1 चम्मच हल्का गुनगुना घी गर्म पानी के साथ लें।\n" .
                           "• भोजन के साथ: गरम रोटी, दाल, चावल या खिचड़ी पर 1-2 चम्मच घी डालकर स्वाद और पोषण बढ़ाएं।\n" .
                           "• आयुर्वेदिक अनुपान: चूर्ण और भस्मों के साथ सेवन के लिए सर्वश्रेष्ठ माध्यम।\n" .
                           "• सावधानी: सूखी चम्मच का प्रयोग करें। फ्रिज में रखने की आवश्यकता नहीं है।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா பியூர் நெய் (நறுநெய்) – பாரம்பரிய மணமணக்கும் மணல் நெய் (500ml)',
                'short_description' => 'பாரம்பரிய முறையில் பக்குவமாக காய்ச்சப்பட்ட 100% தூய மணல் மணலான நறுநெய். ஜீரண சக்தியை அதிகரிக்கவும், மூட்டு எலும்புகளை பலப்படுத்தவும், நினைவாற்றல் மற்றும் உடல்பலத்தை பெருக்கவும் சிறந்தது.',
                'benefits' => "• பாரம்பரிய மணல் மணலான பக்குவம் (Granular Texture): எந்தவித செயற்கை எசென்ஸும் இன்றி இயற்கை முறையில் காய்ச்சப்பட்ட பொன்னிறமான, மணமணக்கும் மணல் நெய்.\n" .
                              "• ஜீரண பலம் மற்றும் குடல் ஆரோக்கியம்: ப்யூட்ரிக் அமிலம் நிறைந்ததால் குடல் புண்களை ஆற்றி, மலச்சிக்கலை போக்கி ஜீரண சக்தியை தூண்டுகிறது.\n" .
                              "• மூட்டு பலம் மற்றும் எலும்பு உறுதி: வைட்டமின் கே2 மற்றும் வைட்டமின் டி எலும்புகளில் கால்சியம் சேர்வதை உறுதிசெய்து மூட்டுகளுக்கு நற்பிசின் அளிக்கிறது.\n" .
                              "• மூளை வளர்ச்சி மற்றும் நினைவாற்றல் (Medhya): மூளை நரம்புகளுக்கு ஊட்டமளித்து கவனத்தையும் நினைவாற்றலையும் பெருக்கும் சிறந்த ஆயுர்வேத நெய்.\n" .
                              "• லாக்டோஸ் இல்லாதது மற்றும் சமையலுக்கு உகந்தது: பால் துகள்கள் முழுமையாக நீக்கப்பட்டதால் பால் ஒவ்வாமை உள்ளவர்களுக்கும் ஏற்றது; அதிக வெப்பநிலையில் சமைக்க சிறந்தது.",
                'ingredients' => "• 100% தூய பசும் வெண்ணெய் கொழுப்பு (Pure Clarified Butter): பாமாயில், நிறமூட்டிகள் அல்லது ரசாயனங்கள் எதுவுமற்ற தூய நறுநெய்.",
                'usage' => "• அன்றாட பயன்பாடு: தினமும் காலையில் வெறும் வயிற்றில் 1 தேக்கரண்டி மிதமான நெய்யை வெந்நீருடன் பருகலாம்.\n" .
                           "• உணவோடு: சுடச்சுட சாதம், பருப்பு, தோசை அல்லது இட்லியில் 1-2 தேக்கரண்டி சேர்த்து சாப்பிடலாம்.\n" .
                           "• ஆயுர்வேத மருந்துகளுக்கு: மூலிகை சூரணங்களை உட்கொள்ளும் உன்னத யோகவாஹி நெய்.\n" .
                           "• சேமிப்பு: சாதாரண அறை வெப்பநிலையில் வைக்கவும். ஈரமில்லாத உலர்ந்த கரண்டியை பயன்படுத்தவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'digestion', 'joints'];
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
                $this->command?->info("Updated Aliya Pure Ghee (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-GHE-PURE',
                'price' => 600.00,
                'sale_price' => 600.00,
                'stock_quantity' => 50,
                'unit_size' => '500 ml',
                'badge' => '100% Pure Clarified Butter',
                'featured_image' => 'https://yuvann.com/storage/products/cfcee7ae-997e-4f99-bac7-70946f9f2399.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 14,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Pure Ghee (#{$product->id}) with full multilingual content.");
        }
    }
}
