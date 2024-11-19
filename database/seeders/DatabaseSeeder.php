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
        // الجداول الأساسية أولاً (بدون foreign keys)
        $this->call([
            BloodSeeder::class,
            NationalitiesSeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            specializationsSeeder::class,

            // ثم الجداول التي تعتمد على الجداول الأساسية
            GradeSeeder::class,
            ClassroomSeeder::class,
            SectionsSeeder::class,
            ParentsSeeder::class,
            AdminSeeder::class,

            // أخيراً جدول الطلاب لأنه يعتمد على كل الجداول السابقة
            StudentSeeder::class,
        ]);
    }
}
