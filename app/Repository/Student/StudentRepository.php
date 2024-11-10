<?php


namespace App\Repository\Student;

use App\Models\Classrooms\Classroom;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Grades\Grade;
use App\Models\Nationalitie;
use App\Models\Genders\Gender;
use App\Models\Sections\Section;
use App\Repository\Student\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{


    public function createStudent()
    {
        $data['my_classes'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();

        return view('Pages.Students.add', $data);
    }


    //Get_classrooms
    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("Class_Name", "id");
        return json_encode($list_classes);
    }

    // Get Sections
    public function Get_Sections($id)
    {
        $list_sections = Section::where('class_id', $id)->pluck('Section_Name', 'id');
        // return $list_sections;
        return ($list_sections);
    }
}