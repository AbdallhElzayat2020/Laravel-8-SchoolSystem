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
        $this->call(BloodSeeder::class);

        $this->call(NationalitiesSeeder::class);

        $this->call(ReligionSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}