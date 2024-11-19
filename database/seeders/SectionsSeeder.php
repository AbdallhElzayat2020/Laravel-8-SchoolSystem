<?php

namespace Database\Seeders;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Sections\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $sections = [
            ['ar' => 'أ', 'en' => 'a'],
            ['ar' => 'ب', 'en' => 'b'],
            ['ar' => 'ج', 'en' => 'c'],
            ['ar' => 'د', 'en' => 'd'],
        ];

        foreach ($sections as $section) {
            Section::create([
                'Section_Name' => $section,
                'Status' => 1,
                'grade_id' => Grade::all()->unique()->random()->id,
                'class_id' => Classroom::all()->unique()->random()->id,
            ]);
        }
    }
}
