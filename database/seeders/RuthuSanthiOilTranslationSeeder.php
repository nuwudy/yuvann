<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class RuthuSanthiOilTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matchingProducts = Product::where('slug', 'ruthu-santhi-oil')
            ->orWhere('sku', 'RS-OIL-100')
            ->orWhere('slug', 'like', '%ruthu%')
            ->orWhere('name', 'like', '%Ruthu%')
            ->get();

        $enTitle = 'Ruthu Santhi Oil';
        $enShortDesc = 'Premium Ayurvedic pain relief oil formulated for menstrual cramps, muscle soreness, and joint aches.';

        $enBenefits = "• Relieves severe abdominal cramps during menstruation.\n" .
                      "• Soothes muscular spasm and backaches.\n" .
                      "• Formulated with 100% natural herbs with zero artificial fragrances.\n" .
                      "• Safe for long-term topical application.";

        $enIngredients = "• Sesame Oil base (Tila Taila): Pure nourishing base that penetrates deep into abdominal muscle tissue.\n" .
                         "• Shatavari (Asparagus racemosus): Classic Ayurvedic rejuvenator for feminine hormonal health and pelvic relaxation.\n" .
                         "• Ashwagandha (Withania somnifera): Relieves nerve tension, eases muscular spasm, and calms soreness.\n" .
                         "• Devadaru (Cedrus deodara): Celebrated anti-inflammatory herb that relieves persistent pain.\n" .
                         "• Camphor (Karpoora): Provides instant cooling sensations followed by deep warming relief.";

        $enUsage = "• Application & Massage: Gently and thoroughly massage Ruthu Santhi Oil on the lower abdomen in downward strokes (from top to bottom) for 3 to 5 minutes.\n" .
                   "• Post-Application Care: After 30 minutes, you may take a bath with lukewarm water if desired (or leave it on overnight for sustained comfort).\n" .
                   "• Best Results: For optimal relief, start using it 2–3 days prior to the onset of your menstrual period.";

        $mlTitle = 'ഋതു ശാന്തി തൈലം (Ruthu Santhi Oil)';
        $mlShortDesc = 'ആർത്തവവേദന, അടിവയറ്റിലെ കോച്ചിപ്പിടുത്തം, നടുവേദന എന്നിവയ്ക്ക് ആശ്വാസം നൽകുന്ന പാരമ്പര്യ ആയുർവേദ തൈലം.';

        $mlBenefits = "• ആർത്തവസമയത്തെ അടിവയറ്റിലെ കഠിനമായ വേദനയ്ക്കും കോച്ചിപ്പിടുത്തത്തിനും പെട്ടെന്ന് ആശ്വാസം നൽകുന്നു.\n" .
                      "• നടുവേദന, പേശിവലിവ്, ഇടുപ്പ് വേദന എന്നിവ ശമിപ്പിക്കുന്നു.\n" .
                      "• 100% സ്വാഭാവിക ഔഷധക്കൂട്ടുകൾ; കൃത്രിമ സുഗന്ധങ്ങളോ രാസവസ്തുക്കളോ അടങ്ങിയിട്ടില്ല.\n" .
                      "• യാതൊരു പാർശ്വഫലങ്ങളുമില്ലാതെ സ്ഥിരമായി ഉപയോഗിക്കാൻ തികച്ചും സുരക്ഷിതം.";

        $mlIngredients = "• ശുദ്ധമായ എള്ളെണ്ണ (Tila Taila): പേശികളിലേക്ക് ആഴത്തിൽ ഇറങ്ങിച്ചെന്ന് വേദന ശമിപ്പിക്കുന്ന ഔഷധ തൈലക്കൂട്ട്.\n" .
                         "• ശതാവരി (Asparagus racemosus): സ്ത്രീകളുടെ ഹോർമോൺ ആരോഗ്യത്തിനും പെൽവിക് പേശികളുടെ അയവിനും ഉത്തമം.\n" .
                         "• അശ്വഗന്ധ (Withania somnifera): പേശികളുടെ ബലഹീനതയും നാഡീവലിവുകളും കുറയ്ക്കുന്നു.\n" .
                         "• ദേവദാരം (Cedrus deodara): നീർക്കെട്ടും അസഹ്യമായ വേദനയും ശമിപ്പിക്കുന്ന ഔഷധം.\n" .
                         "• കർപ്പൂരം (Karpoora): തണുപ്പും ആശ്വാസവും നൽകി വേദന അകറ്റുന്നു.";

        $mlUsage = "• ഉപയോഗിക്കേണ്ട വിധം: ഋതുശാന്തി തൈലം അടിവയറ്റിൽ മുകളിൽ നിന്നും താഴേക്ക് 3 മുതൽ 5 മിനിറ്റ് വരെ മൃദുവായി നന്നായി മസാജ് ചെയ്യുക.\n" .
                   "• കുളിക്കുന്ന വിധം: 30 മിനിറ്റിനു ശേഷം ഇളം ചൂടുവെള്ളത്തിൽ വേണമെങ്കിൽ കുളിക്കാം. (അല്ലെങ്കിൽ രാത്രി മുഴുവൻ നിലനിർത്താം.)\n" .
                   "• മികച്ച ഫലത്തിനായി: ആർത്തവം ആരംഭിക്കുന്നതിന് 2–3 ദിവസം മുമ്പ് മുതൽ ഇത് ഉപയോഗിച്ചു തുടങ്ങുക.";

        $hiTitle = 'ऋतु शांति तेल (Ruthu Santhi Oil)';
        $hiShortDesc = 'मासिक धर्म के दर्द, ऐंठन और कमर दर्द से प्राकृतिक राहत दिलाने वाला पारंपरिक आयुर्वेदिक तेल।';

        $hiBenefits = "• मासिक धर्म (पीरियड्स) के दौरान पेट के निचले हिस्से के तेज दर्द और ऐंठन से तुरंत राहत।\n" .
                      "• कमर दर्द, मांसपेशियों की जकड़न और पेल्विक खिंचाव को शांत करता है।\n" .
                      "• 100% प्राकृतिक जड़ी-बूटियों से निर्मित; कृत्रिम सुगंध या रसायनों से पूरी तरह मुक्त।\n" .
                      "• सुरक्षित और दुष्प्रभाव रहित बाह्य उपयोग के लिए प्रमाणित।";

        $hiIngredients = "• तिल का तेल (Tila Taila): गहराई तक जाकर मांसपेशियों को पोषण और राहत देने वाला शुद्ध आधार।\n" .
                         "• शतावरी (Asparagus racemosus): महिलाओं के स्वास्थ्य और मांसपेशियों के तनाव को शांत करने के लिए प्रसिद्ध।\n" .
                         "• अश्वगंधा (Withania somnifera): नसों के तनाव को दूर कर मांसपेशियों को आराम पहुंचाता है।\n" .
                         "• देवदारु (Cedrus deodara): सूजन और दर्द निवारक शक्तिशाली पारंपरिक औषधि।\n" .
                         "• कपूर (Karpoora): त्वरित शीतलता और दर्द से राहत प्रदान करने वाला तत्व।";

        $hiUsage = "• लगाने की विधि: ऋतु शांति तेल को पेट के निचले हिस्से पर ऊपर से नीचे की ओर 3 से 5 मिनट तक हल्के हाथों से अच्छी तरह मालिश करें।\n" .
                   "• बाद की देखभाल: 30 मिनट बाद यदि चाहें तो गुनगुने पानी से स्नान कर सकते हैं (अथवा इसे रात भर लगा रहने दें)।\n" .
                   "• सर्वोत्तम परिणामों के लिए: मासिक धर्म (पीरियड्स) शुरू होने से 2-3 दिन पहले से इसका उपयोग शुरू करें।";

        $taTitle = 'ருது சாந்தி தைலம் (Ruthu Santhi Oil)';
        $taShortDesc = 'மாதவிடாய் வலி, வயிற்றுப் பிடிப்பு மற்றும் இடுப்பு வலிக்கு உடனடி நிவாரணம் தரும் பாரம்பரிய ஆயுர்வேத தைலம்.';

        $taBenefits = "• மாதவிடாய் கால கடுமையான அடிவயிற்று வலி மற்றும் தசைப்பிடிப்புகளுக்கு உடனடி நிவாரணம் அளிக்கிறது.\n" .
                      "• இடுப்பு வலி, முதுகுத்தண்டு பிடிப்பு மற்றும் உடல் சோர்வை தணிக்கிறது.\n" .
                      "• 100% தூய மூலிகைகளால் ஆனது; செயற்கை வாசனை திரவியங்கள் அல்லது ரசாயனங்கள் இல்லை.\n" .
                      "• பக்கவிளைவுகள் அற்ற, வெளிப்புற பயன்பாட்டிற்கு பாதுகாப்பான பாரம்பரிய தைலம்.";

        $taIngredients = "• நல்லெண்ணெய் (Tila Taila): தசைகளுக்குள் ஆழமாக ஊடுருவி வலியைப் போக்கும் இயற்கை தைல அடிப்படை.\n" .
                         "• சதாவரி (Asparagus racemosus): பெண்களின் நலம் மற்றும் இடுப்புத் தசைகளை ஆசுவாசப்படுத்தும் அமிர்தம்.\n" .
                         "• அஸ்வகந்தா (Withania somnifera): நரம்பு தளர்ச்சி மற்றும் தசைப்பிடிப்பை நீக்கி புத்துணர்ச்சி தரும் மூலிகை.\n" .
                         "• தேவதாரு (Cedrus deodara): வீக்கம் மற்றும் நாள்பட்ட வலியை நீக்கும் சிறந்த நிவாரணி.\n" .
                         "• கற்பூரம் (Karpoora): உடனடி குளிர்ச்சியும் இதமான வலி நிவாரணமும் அளிக்கும் இயற்கை மூலப்பொருள்.";

        $taUsage = "• பயன்படுத்தும் முறை: ருது சாந்தி தைலத்தை அடிவயிற்றில் மேலிருந்து கீழ்நோக்கி 3 முதல் 5 நிமிடங்கள் வரை மென்மையாக நன்றாக மசாஜ் செய்யவும்.\n" .
                   "• குளிக்கும் முறை: 30 நிமிடங்களுக்குப் பிறகு விருப்பப்பட்டால் வெதுவெதுப்பான நீரில் குளிக்கலாம் (அல்லது இரவு முழுவதும் அப்படியே விட்டுவிடலாம்).\n" .
                   "• சிறந்த பலன்களைப் பெற: மாதவிடாய் தொடங்குவதற்கு 2–3 நாட்களுக்கு முன்பிருந்தே இதனைப் பயன்படுத்தத் தொடங்குங்கள்.";

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

        if ($matchingProducts->isNotEmpty()) {
            foreach ($matchingProducts as $product) {
                $product->update([
                    'description' => json_encode($descriptionData),
                    'translations' => $translations,
                ]);
                $this->command?->info("Updated Ruthu Santhi Oil (#{$product->id}, slug: {$product->slug}) with updated directions in all 4 languages.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'womens-care'],
                ['name' => "Women's Care", 'description' => "Ayurvedic formulations customized for women's health.", 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => 'ruthu-santhi-oil',
                'sku' => 'RS-OIL-100',
                'price' => 290.00,
                'sale_price' => 285.00,
                'stock_quantity' => 50,
                'unit_size' => '30 ml',
                'badge' => "Women's Care",
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 1,
                'is_free_shipping' => false,
                'featured_image' => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?q=80&w=600&auto=format&fit=crop',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            $this->command?->info("Created new Ruthu Santhi Oil (#{$product->id}) with updated directions.");
        }
    }
}
