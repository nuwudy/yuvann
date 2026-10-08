<?php

namespace Database\Seeders;

use App\Models\BodyPart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AliyaRoyalJellyCapsulesTranslationSeeder extends Seeder
{
    /**
     * Seed Aliya Royal Jelly Premium Capsules details and 4-language translations.
     */
    public function run(): void
    {
        $slug = 'aliya-royal-jelly-premium-capsules-25mg-per-capsule-30-capsules-jar';

        $matchingProducts = Product::where('slug', $slug)
            ->orWhere('sku', 'ALY-RYL-JLY30')
            ->orWhere('slug', 'like', '%royal-jelly%')
            ->orWhere(function ($q) {
                $q->where('id', 55)
                  ->where('slug', 'like', '%capsule%');
            })
            ->get();

        $enTitle = 'Aliya Royal Jelly Premium Capsules (25mg per Capsule) – 30 Capsules Jar';
        $enShortDesc = '100% pure, premium freeze-dried Royal Jelly capsules delivering nature\'s most concentrated queen bee superfood. Rich in rare 10-HDA, essential B-vitamins, and royal proteins to promote radiant youthful skin, boost cellular vitality, and fortify immune resilience.';

        $enBenefits = "• Rare Bioactive 10-HDA Superfood: Formulated with lyophilized royal jelly standardized for active 10-hydroxy-2-decenoic acid (10-HDA)—a unique fatty acid found nowhere else in nature that promotes cellular longevity.\n" .
                      "• Dermal Collagen Synthesis & Youthful Skin: Stimulates fibroblast activity to naturally boost collagen production, fade signs of oxidative aging, and restore hydrated skin elasticity.\n" .
                      "• Superior Immune Defense & Vitality: Major Royal Jelly Proteins (MRJPs) strengthen the body's natural immunological barrier, warding off seasonal pathogens and chronic exhaustion.\n" .
                      "• Brain Alertness & Mental Focus: Naturally rich in acetylcholine, amino acids, and Vitamin B-complex that support neurotransmitter function, sharpen memory, and ease mental stress.\n" .
                      "• Hormonal Balance & Energy Recovery: Deeply nourishes the endocrine system, supporting reproductive vigor, stamina, and smooth hormonal transitions in both men and women.";

        $enIngredients = "• 100% Pure Lyophilized Royal Jelly Powder (25mg pure active extract per vegetarian capsule): Standardized for high natural 10-HDA, B-complex vitamins, enzymes, and essential amino acids.\n" .
                         "• Plant-Based Vegetarian Capsule Shell (HPMC): Pure, clean capsule shell with zero gelatin, chemical preservatives, or synthetic fillers.";

        $enUsage = "• Recommended Dosage: Take 1 capsule daily in the morning with a glass of water, preferably on an empty stomach or 20 minutes before breakfast.\n" .
                   "• Rejuvenation Regimen: Consume consistently for 60 to 90 days for peak collagen synthesis, vibrant skin vitality, and sustained systemic endurance.\n" .
                   "• Caution: Individuals with known allergies to bee stings, bee pollen, or honey should consult a physician prior to use. Not recommended for pregnant or lactating women without medical advice.";

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
                'name' => 'ആലിയ റോയൽ ജെല്ലി പ്രീമിയം ക്യാപ്‌സ്യൂൾസ് (ക്യാപ്‌സ്യൂളിന് 25mg) – 30 ക്യാപ്‌സ്യൂളുകൾ',
                'short_description' => 'തേനീച്ച റാണിക്ക് മാത്രം പ്രകൃതി നൽകുന്ന അതീവ പോഷക സമ്പുഷ്ടമായ റോയൽ ജെല്ലി ക്യാപ്‌സ്യൂളുകൾ. അപൂർവ്വമായ 10-HDA, വിറ്റാമിൻ ബി കോംപ്ലക്സ്, ആന്റിഓക്‌സിഡന്റുകൾ എന്നിവയാൽ സമ്പന്നമായ ഇത് ചർമ്മത്തിന്റെ യൗവനത്തിനും, പ്രതിരോധശേഷിക്കും, ഉന്മേഷത്തിനും ഉത്തമം.',
                'benefits' => "• അത്യപൂർവ്വ 10-HDA സൂപ്പർഫുഡ്: പ്രകൃതിയിൽ റോയൽ ജെല്ലിയിൽ മാത്രം കാണപ്പെടുന്ന 10-HDA ഫാറ്റി ആസിഡുകൾ അടങ്ങിയിരിക്കുന്നതിനാൽ കോശങ്ങളുടെ ആയുസ്സും ആരോഗ്യവും നിലനിർത്തുന്നു.\n" .
                              "• ചർമ്മത്തിന് യൗവനവും കൊളാജൻ വർദ്ധനവും: ചർമ്മത്തിലെ കൊളാജൻ ഉത്പാദനം വേഗത്തിലാക്കി ചുളിവുകൾ മാറ്റി യുവത്വവും സ്വാഭാവിക തിളക്കവും പ്രദാനം ചെയ്യുന്നു.\n" .
                              "• അതീവ രോഗപ്രതിരോധശേഷി: റോയൽ ജെല്ലിയിലെ സവിശേഷ പ്രോട്ടീനുകൾ ശരീരത്തിന്റെ പ്രതിരോധശേഷി വർദ്ധിപ്പിക്കുകയും വിട്ടുമാറാത്ത ക്ഷീണവും തളർച്ചയും അകറ്റുകയും ചെയ്യുന്നു.\n" .
                              "• തലച്ചോറിന്റെ പ്രവർത്തനവും ഓർമ്മശക്തിയും: സ്വാഭാവിക അസറ്റൈൽകോളിനും ബി-വിറ്റാമിനുകളും മസ്തിഷ്ക ഞരമ്പുകളെ ഉത്തേജിപ്പിക്കുകയും ഓർമ്മശക്തിയും ഏകാഗ്രതയും വർദ്ധിപ്പിക്കുകയും ചെയ്യുന്നു.\n" .
                              "• ഹോർമോൺ സന്തുലിതാവസ്ഥയും ഊർജ്ജവും: സ്ത്രീകളിലും പുരുഷന്മാരിലും ഹോർമോൺ നില ആരോഗ്യകരമായി നിലനിർത്താനും ഉന്മേഷം പകരാനും സഹായകം.",
                'ingredients' => "• 100% ശുദ്ധ ലയോഫിലൈസ്ഡ് റോയൽ ജെല്ലി (25mg ശുദ്ധ റോയൽ ജെല്ലി സത്ത് ഓരോ വെജിറ്റേറിയൻ ക്യാപ്‌സ്യൂളിലും): പ്രകൃതിദത്ത പ്രോട്ടീനുകളും എൻസൈമുകളും ബി-വിറ്റാമിനുകളും അടങ്ങിയത്.\n" .
                                 "• വെജിറ്റേറിയൻ ക്യാപ്‌സ്യൂൾ ഷെൽ: ജലാറ്റിനോ രാസവസ്തുക്കളോ ഇല്ലാത്ത സസ്യജന്യ ക്യാപ്‌സ്യൂൾ.",
                'usage' => "• കഴിക്കേണ്ട വിധം: ദിവസവും രാവിലെ വെറുംവയറ്റിലോ പ്രാതലിന് 20 മിനിറ്റ് മുൻപോ 1 ക്യാപ്‌സ്യൂൾ വെള്ളത്തോടൊപ്പം കഴിക്കുക.\n" .
                           "• മികച്ച ഫലത്തിനായി: ചർമ്മത്തിന്റെ ഭംഗിക്കും പ്രതിരോധശേഷിക്കും 2 മുതൽ 3 മാസം വരെ തുടർച്ചയായി ഉപയോഗിക്കുക.\n" .
                           "• ശ്രദ്ധിക്കുക: തേനീച്ച കുത്തുമ്പോഴോ തേൻ കഴിക്കുമ്പോഴോ അലർജിയുള്ളവർ ഉപയോഗിക്കുന്നതിന് മുൻപ് ഡോക്ടറുടെ ഉപദേശം തേടുക.",
                'audio_url' => null,
            ],
            'hi' => [
                'locale' => 'hi',
                'name' => 'आलिया रॉयल जेली प्रीमियम कैप्सूल्स (25mg प्रति कैप्सूल) – 30 कैप्सूल्स जार',
                'short_description' => 'रानी मधुमक्खी का दिव्य आहार - 100% शुद्ध और केंद्रित रॉयल जेली कैप्सूल्स। दुर्लभ 10-HDA, विटामिन बी-कॉम्प्लेक्स और प्राकृतिक एंटीऑक्सीडेंट्स से भरपूर, जो त्वचा को जवां बनाए रखने, रोग प्रतिरोधक क्षमता बढ़ाने और ऊर्जा का संचार करने में सर्वोत्तम है।',
                'benefits' => "• दुर्लभ और शक्तिशाली 10-HDA सुपरफूड: प्रकृति में केवल रॉयल जेली में पाए जाने वाले 10-HDA से समृद्ध, जो कोशिकाओं के पुनर्जनन और दीर्घायु को बढ़ावा देता है।\n" .
                              "• त्वचा का प्राकृतिक निखार और कोलेजन निर्माण: त्वचा में फाइब्रोब्लास्ट को सक्रिय कर प्राकृतिक कोलेजन बढ़ाता है, जिससे झुर्रियां कम होती हैं और त्वचा में कसाव आता है।\n" .
                              "• सर्वोच्च रोग प्रतिरोधक क्षमता (Immunity): शरीर की रक्षा प्रणाली को सशक्त बनाकर मौसमी संक्रमणों और लगातार रहने वाली थकान को दूर करता है।\n" .
                              "• मानसिक सतर्कता और तेज याददाश्त: प्राकृतिक एसिटाइलकोलाइन और आवश्यक अमीनो एसिड्स दिमाग की नसों को पोषण देकर फोकस और एकाग्रता बढ़ाते हैं।\n" .
                              "• हार्मोनल संतुलन और संपूर्ण जीवन शक्ति: अंतःस्रावी तंत्र को पोषण देकर पुरुषों और महिलाओं दोनों में ऊर्जा, सहनशक्ति और हार्मोनल संतुलन बनाए रखता है।",
                'ingredients' => "• 100% शुद्ध फ्रीज-ड्राइड रॉयल जेली (प्रत्येक वेज कैप्सूल में 25mg शुद्ध अर्क): प्राकृतिक 10-HDA, बी-विटामिन और प्रोटीन से भरपूर।\n" .
                                 "• 100% शाकाहारी कैप्सूल शेल (HPMC): जिलेटिन या रसायनों से पूरी तरह मुक्त।",
                'usage' => "• सेवन विधि: प्रतिदिन सुबह 1 कैप्सूल पानी के साथ लें, खाली पेट या नाश्ते से 20 मिनट पहले।\n" .
                           "• श्रेष्ठ परिणामों के लिए: निरंतर 60 से 90 दिनों तक सेवन करें।\n" .
                           "• सावधानी: मधुमक्खी के डंक या पराग से एलर्जी वाले व्यक्ति उपयोग से पूर्व चिकित्सक से परामर्श लें।",
                'audio_url' => null,
            ],
            'ta' => [
                'locale' => 'ta',
                'name' => 'ஆலியா ராயல் ஜெல்லி பிரீமியம் காப்ஸ்யூல்கள் (காப்ஸ்யூலுக்கு 25mg) – 30 காப்ஸ்யூல்கள் ஜாடி',
                'short_description' => 'ராணி தேனீயின் பிரத்யேக ஊட்டச்சத்து அமுதம் - 100% தூய ராயல் ஜெல்லி காப்ஸ்யூல்கள். அரிய 10-HDA, பி-வைட்டமின்கள் மற்றும் புரதங்கள் நிறைந்து இளமையான சருமம், அபார நோய் எதிர்ப்பு சக்தி மற்றும் புத்துணர்ச்சியை தருகிறது.',
                'benefits' => "• அரிய 10-HDA ஊட்டச்சத்து சூப்பர்ஃபுட்: இயற்கை ராயல் ஜெல்லியில் மட்டுமே காணப்படும் 10-HDA அமிலம் செல்கள் விரைவாக புதுப்பிக்கப்படவும் ஆயுளை கூட்டவும் உதவுகிறது.\n" .
                              "• இளமையான சருமம் மற்றும் கொலாஜன் உற்பத்தி: சருமத்தில் கொலாஜன் உற்பத்தியை அதிகரித்து சுருக்கங்களை போக்கி சருமத்திற்கு பளபளப்பையும் இளமையையும் அளிக்கிறது.\n" .
                              "• உச்சகட்ட நோய் எதிர்ப்பு அரண்: உடலின் நோய் எதிர்ப்பு சக்தியை பன்மடங்கு பெருக்கி நாள் முழுவதும் சுறுசுறுப்பாகவும் புத்துணர்ச்சியாகவும் வைக்கிறது.\n" .
                              "• மூளை சுறுசுறுப்பு மற்றும் நினைவாற்றல்: இயற்கை அசிடைல்கொலின் நரம்புகளை பலப்படுத்தி கவனத்தையும் நினைவாற்றலையும் உயர்த்துகிறது.\n" .
                              "• ஹார்மோன் சமநிலை மற்றும் உடல்பலம்: ஆண், பெண் இருபாலருக்கும் ஹார்மோன்களை சீராக்கி உடலுக்கு அபரிமிதமான வலிமையையும் ஸ்டேமினாவையும் தருகிறது.",
                'ingredients' => "• 100% தூய லயோபிலைஸ்டு ராயல் ஜெல்லி (ஒவ்வொரு சைவ காப்ஸ்யூலிலும் 25mg தூய சாறு): இயற்கை புரதங்கள், என்சைம்கள் மற்றும் அமினோ அமிலங்கள் நிறைந்த வடிவம்.\n" .
                                 "• தாவர வழி சைவ காப்ஸ்யூல்: ஜெலட்டின் அல்லது ரசாயனங்கள் எதுவுமற்ற சுத்தமான வடிவம்.",
                'usage' => "• உட்கொள்ளும் முறை: தினமும் காலையில் வெறும் வயிற்றில் அல்லது காலை உணவுக்கு 20 நிமிடங்களுக்கு முன்பு 1 காப்ஸ்யூல் தண்ணீருடன் உட்கொள்ளவும்.\n" .
                           "• சிறந்த பலன்களுக்கு: தொடர்ந்து 60 முதல் 90 நாட்கள் உட்கொள்வது முழுமையான புத்துணர்ச்சியை அளிக்கும்.\n" .
                           "• எச்சரிக்கை: தேனீ அல்லது மகரந்த ஒவ்வாமை (Allergy) உள்ளவர்கள் பயன்படுத்துவதற்கு முன் மருத்துவரிடம் ஆலோசனை பெறவும்.",
                'audio_url' => null,
            ],
        ];

        $descriptionData = [
            'benefits' => $enBenefits,
            'ingredients' => $enIngredients,
            'usage' => $enUsage,
        ];

        $bodyPartSlugs = ['whole-body', 'skin', 'digestion'];
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
                $this->command?->info("Updated Aliya Royal Jelly Capsules (#{$product->id}, slug: {$product->slug}) with full multilingual content.");
            }
        } else {
            $cat = Category::firstOrCreate(
                ['slug' => 'superfoods'],
                ['name' => 'Superfoods', 'description' => 'Nutrient-rich natural products and vitality mixes.', 'is_active' => true]
            );

            $product = Product::create([
                'name' => $enTitle,
                'slug' => $slug,
                'sku' => 'ALY-RYL-JLY30',
                'price' => 5800.00,
                'sale_price' => 5800.00,
                'stock_quantity' => 50,
                'unit_size' => '30 capsules',
                'badge' => 'Pure Royal Jelly Superfood',
                'featured_image' => 'https://yuvann.com/storage/products/e2e44561-13d3-454a-98ca-4462c8da46e1.jpg',
                'short_description' => $enShortDesc,
                'description' => json_encode($descriptionData),
                'is_active' => true,
                'is_featured' => true,
                'featured_order' => 15,
                'translations' => $translations,
            ]);

            $product->categories()->syncWithoutDetaching([$cat->id]);
            if (!empty($bodyPartIds)) {
                $product->bodyParts()->syncWithoutDetaching($bodyPartIds);
            }
            $this->command?->info("Created new Aliya Royal Jelly Capsules (#{$product->id}) with full multilingual content.");
        }
    }
}
