<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VanatheeramRawForestHoneyTranslationSeeder extends Seeder
{
    /**
     * Re-route raw forest honey seed to Vanatheeram Cheruthen (Stingless Bee Honey) Seeder.
     */
    public function run(): void
    {
        $this->call(VanatheeramCheruthenTranslationSeeder::class);
    }
}
