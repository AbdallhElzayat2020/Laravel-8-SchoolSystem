<?php

namespace Database\Seeders;

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
        // Create Seeder Blood and Nationalities

        $this->call(GenderSeeder::class);
        $this->call(NationalitiesSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(specializationsSeeder::class);
        $this->call(BloodSeeder::class);
        $this->call(AdminSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}