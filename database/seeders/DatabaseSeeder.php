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
        // User::factory(10)->create();

        $this->call([
            UserTableSeeder::class,
            VslaSeeder::class,
            ZamukaSeeder::class,
            MvtcSeeder::class,
            MalnutritionSeeder::class,
            EcdSeeder::class,
            ToolkitsSeeder::class,
            SchoolFeedingSeeder::class,
            /*

            MicrocreditSeeder::class,

            ScholarshipSeeder::class,

            */

        ]);
    }
}
