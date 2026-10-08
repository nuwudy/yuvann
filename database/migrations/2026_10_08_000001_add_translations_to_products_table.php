<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('description');
        });

        // Populate initial 'en' translation for all existing products
        $products = DB::table('products')->get();
        foreach ($products as $p) {
            $desc = json_decode($p->description ?? '', true);
            if (!is_array($desc)) {
                $desc = [];
            }

            $translations = [
                'en' => [
                    'locale' => 'en',
                    'name' => $p->name,
                    'short_description' => $p->short_description ?? '',
                    'benefits' => $desc['benefits'] ?? '',
                    'ingredients' => $desc['ingredients'] ?? '',
                    'usage' => $desc['usage'] ?? '',
                    'audio_url' => null,
                ],
            ];

            DB::table('products')->where('id', $p->id)->update([
                'translations' => json_encode($translations),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('translations');
        });
    }
};
