<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Grades\Grade;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use App\Models\Sections\Section;
use App\Models\Students\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Classrooms\Classroom;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationality_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id = Type_Blood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id = Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year = '2024';
        $students->save();
    }
}
