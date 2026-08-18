<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Create pivot table
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // 2. Migrate existing data
        $products = DB::table('products')->whereNotNull('category_id')->get();
        foreach ($products as $product) {
            DB::table('category_product')->insert([
                'category_id' => $product->category_id,
                'product_id' => $product->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. Drop category_id from products
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Add back category_id
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
        });

        // 2. Restore data (take the first category for each product)
        $pivotData = DB::table('category_product')->get();
        foreach ($pivotData as $data) {
            DB::table('products')
                ->where('id', $data->product_id)
                ->whereNull('category_id') // Only set if not already set (keep first)
                ->update(['category_id' => $data->category_id]);
        }

        // 3. Drop pivot table
        Schema::dropIfExists('category_product');
    }
};
