<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Listing::factory(20)->create();
    }
}
