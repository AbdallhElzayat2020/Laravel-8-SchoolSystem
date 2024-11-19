<?php

namespace Database\Seeders;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['ar' => 'الصف   الاول', 'en' => 'Level 1'],
            ['ar' => 'الصف الثاني', 'en' => 'Level 2'],
            ['ar' => 'الصف الثالث', 'en' => 'Level 3'],
            ['ar' => 'الصف الرابع', 'en' => 'Level 4'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
                'Class_Name' => $classroom,
                'grade_id' => Grade::all()->unique()->random()->id,
            ]);
        }
    }
}