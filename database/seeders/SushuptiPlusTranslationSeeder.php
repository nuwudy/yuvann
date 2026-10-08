<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class SushuptiPlusTranslationSeeder extends Seeder
{
    /**
     * Seed Sushupti Plus product details and full 4-language translations.
     */
    public function run(): void
    {
        // 1. Locate product by common slugs or create it
        $product = Product::where('slug', 'sushupti-plus-pure-herbal-sleep-support-oil-30ml')
            ->orWhere('slug', 'like', '%sushupti%')
            ->first();

        $enTitle = 'Sushupti Plus Pure Herbal Sleep Support Oil – 30ml';
        $enShortDesc = '100% natural, non-habit-forming Ayurvedic topical sleep oil designed to calm the nervous system, induce deep sleep, and help you wake up refreshed.';
        
        $enBenefits = "• Promotes Natural Deep Sleep: Formulated with calming botanical extracts to quiet mental chatter, relax overworked nerves, and induce natural, restorative sleep without synthetic sedatives.\n" .
                      "• Non-Habit Forming & Safe: A gentle, non-addictive natural alternative to chemical sleeping pills and sleep aids.\n" .
                      "• Wake Up Refreshed: Helps reset natural sleep-wake cycles without causing morning grogginess, brain fog, or sluggishness.\n" .
                      "• Dual-Point Topical Therapy: Utilizes classical Ayurvedic application points (scalp vertex and reflexology points on foot soles) for rapid nervous system relaxation.\n" .
                      "• Support for Chronic Sleeplessness: Designed for both occasional sleep disturbances and long-standing chronic restlessness.";

        $enIngredients = "• Calming Herbal Medicated Oil Base (Nidrajanaka Dravyas): Classical Ayurvedic formulation infused with cooling, soothing herbs that pacify aggravated Prana Vata and Sadhaka Pitta, gently cooling the head, easing scalp tension, and grounding the nervous system through transdermal absorption.";

        $enUsage = "• Head Application: Apply 2 drops directly onto the center of the head (crown/vertex) and massage gently in circular motions for 1–2 minutes before bedtime.\n" .
                   "• Foot Soles Application (Padabhyanga): Alternatively, apply 2 drops onto the soles of both feet and massage thoroughly until absorbed.\n" .
                   "• For Chronic Conditions: For long-standing sleep issues, use consistently for 2 to 3 consecutive days to experience noticeable results.";

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
                'name' => 'സുഷുപ്തി പ്ലസ് ഹെർബൽ സ്ലീപ് സപ്പോർട്ട് ഓയിൽ – 30ml',
                'short_description' => 'നാഡീവ്യൂഹത്തെ ശാന്തമാക്കി ഗാഢനിദ്ര സമ്മാനിക്കുന്നതിനും ഉന്മേഷത്തോടെ ഉണരുന്നതിനും സഹായിക്കുന്ന 100% പ്രകൃതിദത്ത ആയുർവേദ തൈലം.',
                'benefits' => "• സ്വാഭാവിക ഗാഢനിദ്ര പ്രധാനം ചെയ്യുന്നു: അമിത ചിന്തകളെ നിയന്ത്രിക്കാനും മാനസിക സമ്മർദ്ദവും ക്ഷീണവും അകറ്റി കൃത്രിമ മരുന്നുകളില്ലാതെ സ്വാഭാവിക ഉറക്കം നൽകാനും സഹായിക്കുന്നു.\n" .
                              "• പാർശ്വഫലങ്ങളോ ശീലമോ ഉണ്ടാക്കുന്നില്ല: രാസവസ്തുക്കളടങ്ങിയ ഉറക്കഗുളികകൾക്ക് പകരമുള്ള തികച്ചും സുരക്ഷിതമായ പ്രകൃതിദത്ത ആയുർവേദ പരിഹാരം.\n" .
                              "• ഉന്മേഷത്തോടെയുള്ള പ്രഭാതം: പ്രഭാതത്തിലെ ക്ഷീണമോ മന്ദതയോ തലവേദനയോ ഇല്ലാതെ ഉന്മേഷത്തോടെ ഉണരാൻ സഹായിക്കുന്നു.\n" .
                              "• ഇരട്ട പോയിന്റ് ബാഹ്യപ്രയോഗം: ശിരസ്സിലും പാദങ്ങളിലും (പാദാഭ്യംഗം) പുരട്ടുന്നത് നാഡീവ്യൂഹത്തിന് ഉടനടി ആശ്വാസം നൽകുന്നു.\n" .
                              "• വിട്ടുമാറാത്ത ഉറക്കമില്ലായ്മയ്ക്ക് ആശ്വാസം: സാധാരണ ഉറക്കക്കുറവിനും ദീർഘകാല ഉറക്കമില്ലായ്മയ്ക്കും (Insomnia) ഫലപ്രദം.",
                'ingredients' => "• നിദ്രാജനക ഔഷധ തൈലക്കൂട്ട് (Nidrajanaka Dravyas): പ്രാണവാതത്തെയും സാധകപിത്തത്തെയും ശമിപ്പിക്കുന്ന ശീതള ഗുണമുള്ള ആയുർവേദ ഔഷധങ്ങൾ. ശിരോഭാഗത്തെ ചൂടും പിരിമുറുക്കവും കുറച്ച് നാഡികളെ തണുപ്പിക്കുന്നു.",
                'usage' => "• ശിരസ്സിൽ പുരട്ടാൻ: രാത്രി ഉറങ്ങുന്നതിന് തൊട്ടുമുമ്പ് തലയുടെ മധ്യഭാഗത്ത് (നെറുകയിൽ) 2 തുള്ളി ഒഴിച്ച് 1-2 മിനിറ്റ് മൃദുവായി വൃത്താകൃതിയിൽ മസാജ് ചെയ്യുക.\n" .
                           "• പാദങ്ങളിൽ പുരട്ടാൻ (പാദാഭ്യംഗം): അല്ലെങ്കിൽ ഇരു പാദങ്ങളുടെയും അടിഭാഗത്ത് 2 തുള്ളി വീതം പുരട്ടി നന്നായി മസാജ് ചെയ്യുക.\n" .
                           "• വിട്ടുമാറാത്ത ഉറക്കക്കുറവിന്: ദീർഘകാല ഉറക്കമില്ലായ്മയുള്ളവർ മികച്ച ഫലത്തിനായി തുടർച്ചയായി 2 മുതൽ 3 ദിവസം വരെ ഉപയോഗിക്കുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'सुषुप्ति प्लस हर्बल स्लीप सपोर्ट ऑयल – 30ml',
                'short_description' => 'तंत्रिका तंत्र को शांत कर गहरी और आरामदायक नींद लाने वाला 100% प्राकृतिक और सुरक्षित आयुर्वेदिक तेल।',
                'benefits' => "• प्राकृतिक गहरी नींद को बढ़ावा: दिमाग के अनचाहे विचारों और तनाव को शांत कर बिना किसी कृत्रिम दवा के आरामदायक नींद लाता है।\n" .
                              "• आदत नहीं पड़ती और पूरी तरह सुरक्षित: रासायनिक नींद की गोलियों का एक कोमल, सुरक्षित और प्राकृतिक आयुर्वेदिक विकल्प।\n" .
                              "• ताजगी भरी सुबह: सुबह उठने पर किसी भी प्रकार का भारीपन, सुस्ती या सिरदर्द नहीं होता।\n" .
                              "• दोहरी बिंदु थेरेपी (Dual-Point Therapy): सिर के मध्य भाग (तालु) और पैरों के तलवों पर लगाने से तुरंत तंत्रिका तंत्र को शांति मिलती है।\n" .
                              "• पुरानी अनिद्रा में मददगार: कभी-कभार होने वाली नींद की परेशानी और पुरानी अनिद्रा (Insomnia) दोनों में अत्यंत लाभकारी।",
                'ingredients' => "• निद्राजनक औषधीय तेल आधार (Nidrajanaka Dravyas): प्राण वात और साधक पित्त को शांत करने वाली शीतलक औषधियां, जो सिर की गर्मी और तनाव को दूर करती हैं।",
                'usage' => "• सिर पर प्रयोग: सोने से पहले सिर के मध्य भाग (तालु/शिखर) पर केवल 2 बूंदें डालें और 1-2 मिनट हल्के हाथों से गोलाकार मालिश करें।\n" .
                           "• पैरों के तलवों पर (पादाभ्यंग): वैकल्पिक रूप से दोनों पैरों के तलवों पर 2-2 बूंदें लगाकर अच्छी तरह मालिश करें।\n" .
                           "• गंभीर अनिद्रा के लिए: पुरानी नींद की समस्या में लगातार 2 से 3 दिनों तक नियमित रूप से उपयोग करें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'சுஷுப்தி பிளஸ் மூலிகை ஸ்லீப் சப்போர்ட் தைலம் – 30ml',
                'short_description' => 'நரம்பு மண்டலத்தை அமைதிப்படுத்தி ஆழ்ந்த தூக்கத்தை வரவழைக்கும் 100% இயற்கையான ஆயுர்வேத வெளிப்புற தைலம்.',
                'benefits' => "• இயற்கை ஆழ்ந்த உறக்கத்தை தூண்டுகிறது: மன அழுத்தத்தையும் தேவையற்ற சிந்தனைகளையும் போக்கி, செயற்கை மயக்க மருந்துகளின்றி நிம்மதியான தூக்கத்தை அளிக்கிறது.\n" .
                              "• பழக்கமாகாது, முற்றிலும் பாதுகாப்பானது: ரசாயன தூக்க மாத்திரைகளுக்கு மாற்றாக அமையும் இயற்கையான, பாதுகாப்பான ஆயுர்வேத தீர்வு.\n" .
                              "• புத்துணர்ச்சியூட்டும் காலை விடியல்: காலையில் எழும்போது தலைபாரமோ அல்லது மந்தநிலையோ இன்றி முழு புத்துணர்ச்சியை அளிக்கிறது.\n" .
                              "• இரட்டை புள்ளி பயன்பாட்டு முறை: உச்சி தலை மற்றும் உள்ளங்கால்களில் (பாதாப்யங்கம்) தடவுவதன் மூலம் நரம்புகளுக்கு உடனடி அமைதியை தருகிறது.\n" .
                              "• நாள்பட்ட தூக்கமின்மைக்கு நிவாரணம்: சாதாரண தூக்கக் கோளாறுகள் மற்றும் நாள்பட்ட தூக்கமின்மை (Insomnia) இரண்டிற்கும் சிறந்தது.",
                'ingredients' => "• நித்ராஜனக மூலிகை தைலக் கூட்டு (Nidrajanaka Dravyas): பிராண வாதம் மற்றும் சாதக பித்தத்தை தணிக்கும் குளிர்ச்சியான மூலிகைகள். உச்சந்தலையின் சூட்டை குறைத்து நரம்புகளை ஆசுவாசப்படுத்துகிறது.",
                'usage' => "• தலையில் தடவும் முறை: படுக்கைக்குச் செல்லும் முன் தலையின் நடுப்பகுதியில் (உச்சி) 2 துளிகள் விட்டு 1-2 நிமிடங்கள் மென்மையாக வட்ட வடிவில் மசாஜ் செய்யவும்.\n" .
                           "• உள்ளங்கால்களில் தடவும் முறை (பாதாப்யங்கம்): அல்லது இரு கால்களின் பாதங்களிலும் தலா 2 துளிகள் விட்டு நன்றாக உறிஞ்சும் வரை மசாஜ் செய்யவும்.\n" .
                           "• நாள்பட்ட தூக்கமின்மைக்கு: தொடர் தூக்கக் குறைபாடு உள்ளவர்கள் சிறந்த பலனுக்கு தொடர்ந்து 2 முதல் 3 நாட்கள் பயன்படுத்தவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        if ($product) {
            $product->update([
                'name' => $enTitle,
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'translations' => $translations,
            ]);
            $this->command?->info("Updated existing Sushupti Plus product (#{$product->id}) with full multilingual content.");
        } else {
            $category = Category::where('slug', 'womens-care')->first() ?? Category::first();
            
            $product = Product::create([
                'name' => $enTitle,
                'slug' => 'sushupti-plus-pure-herbal-sleep-support-oil-30ml',
                'sku' => 'SHP-SLP-30ML',
                'price' => 350.00,
                'sale_price' => 299.00,
                'stock_quantity' => 45,
                'unit_size' => '30 ml',
                'badge' => 'Deep Sleep Formula',
                'featured_image' => 'https://yuvann.com/storage/products/aed3e434-3ecf-46ec-a4d6-e07ad67782ac.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 2,
                'translations' => $translations,
            ]);

            if ($category) {
                $product->categories()->syncWithoutDetaching([$category->id]);
            }
            $this->command?->info("Created new Sushupti Plus product (#{$product->id}) with full multilingual content.");
        }

        // Attach targeted body part: Head & Mind
        $headPart = BodyPart::where('slug', 'head')->first();
        if ($headPart) {
            $product->bodyParts()->syncWithoutDetaching([$headPart->id]);
        }
    }
}
