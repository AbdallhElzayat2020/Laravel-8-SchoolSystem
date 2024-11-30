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
        $this->call([
            BloodSeeder::class,
            NationalitiesSeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            specializationsSeeder::class,

            GradeSeeder::class,
            ClassroomSeeder::class,
            SectionsSeeder::class,
            ParentsSeeder::class,
            AdminSeeder::class,

//            StudentSeeder::class,
            SettingSchoolSeeder::class,
        ]);
    }
}
