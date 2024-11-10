<?php


namespace App\Repository\Student;

use App\Models\Classrooms\Classroom;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Grades\Grade;
use App\Models\Nationalitie;
use App\Models\Genders\Gender;
use App\Models\Sections\Section;
use App\Models\Students\Student;
use App\Repository\Student\StudentRepositoryInterface;
use Illuminate\Support\Facades\Hash;

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

    // store student
    public function storeStudent($request)
    {

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationality_id = $request->nationality_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('Students.create');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}