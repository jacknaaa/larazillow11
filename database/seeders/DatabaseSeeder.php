<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();
        // Listing::factory(20)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@example.com',
            'password' => 'password',
        ]);
        \App\Models\Listing::factory(20)->create([
            'by_user_id' => 1
        ]);
    }
}
