<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the statuses first as they're required for auction items
        $this->call([
            ItemStatusSeeder::class
        ]);

        // Create test user
        User::factory()->create([
            'name' => 'Mike Casto',
            'email' => 'castoware@gmail.com',
            'password' => bcrypt('lovemeg0524'), // Use a secure password in production
        ]);
    }
}
