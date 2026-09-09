<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('product_variants') && !Schema::hasColumn('product_variants', 'is_active')) {
            Schema::table('product_variants', function (Blueprint $table) {
                $table->boolean('is_active')->default(true)->after('stock_quantity');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('product_variants') && Schema::hasColumn('product_variants', 'is_active')) {
            Schema::table('product_variants', function (Blueprint $table) {
                $table->dropColumn('is_active');
            });
        }
    }
};
