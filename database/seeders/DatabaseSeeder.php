<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create 5 fake stars to populate database
         */
        Star::factory(5)->create();
    }
}
