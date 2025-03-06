<?php

namespace Database\Seeders;

use App\Models\Church;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Church::factory(1000)->hasMasses(5)->create();


        Church::factory(1, [
                'name' => 'Holy Family Basilica',
                'type' => 'Basilica',
                'address' => '02 Koinange St, Nairobi',
                'latitude' => '-1.2872494450175331',
                'longitude' => '36.820591005564744',
            ])
            ->hasMasses(1, ['day' => 'Sunday', 'time' => '0800', 'language' => 'English'])
            ->hasMasses(1, ['day' => 'Sunday', 'time' => '0930', 'language' => 'Kiswahili'])
            ->hasMasses(1, ['day' => 'Sunday', 'time' => '1130', 'language' => 'English'])
            ->hasMasses(1, ['day' => 'Sunday', 'time' => '1730', 'language' => 'English'])
            ->create();

    }
}
