<?php

namespace Database\Seeders;

use App\Models\Grades\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('grades')->delete();
        // $grades = [
        //     ['ar' => 'المرحلة الابتدائية', 'en' => 'Elementary Level'],
        //     ['ar' => 'المرحلة الاعدادية', 'en' => 'Middle School Level'],
        //     ['ar' => 'المرحلة الثانوية', 'en' => 'High School Level'],
        //     ['ar' => 'المرحلة الجامعية', 'en' => 'University Level'],
        // ];

        // foreach ($grades as $grade) {
        //     Grade::create([
        //         'grade' => $grade,
        //     ]);
        // }
    }
}