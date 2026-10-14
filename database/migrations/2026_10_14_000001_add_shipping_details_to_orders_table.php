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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('alternate_phone', 20)->nullable()->after('customer_phone');
            $table->string('pincode', 10)->nullable()->after('shipping_address');
            $table->string('landmark', 255)->nullable()->after('pincode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['alternate_phone', 'pincode', 'landmark']);
        });
    }
};
