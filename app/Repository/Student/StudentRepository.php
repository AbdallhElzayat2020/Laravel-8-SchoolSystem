<?php


namespace App\Repository\Student;

use App\Models\Classrooms\Classroom;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Grades\Grade;
use App\Models\Nationalitie;
use App\Models\Genders\Gender;
use App\Models\Images\Image;
use App\Models\Sections\Section;
use App\Models\Students\Student;
use App\Repository\Student\StudentRepositoryInterface;
use http\Client\Curl\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{

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

    public function getAllStudents()
    {
        //relations ship with student
        $students = Student::with('gender', 'grade', 'classroom', 'section')->get();

        return view('Pages.Students.index', compact('students'));
    }
    public function show_student($id)
    {
        $Student = Student::findOrFail($id);
        return view('Pages.Students.show', compact('Student'));
    }

    public function createStudent()
    {
        $data['my_classes'] = Grade::all();

        $data['parents'] = My_Parent::all();

        $data['genders'] = Gender::all();

        $data['nationalities'] = Nationalitie::all();

        $data['bloods'] = Type_Blood::all();

        return view('Pages.Students.add', $data);
    }



    // store student
    public function storeStudent($request)
    {
        //to check if any tables has error when inserting student
        DB::beginTransaction();
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

            // Upload Images
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {

                    // $img_extension = $photo->getClientOriginalExtension();

                    // $new_name_img = rand() . '.' . $img_extension;

                    // $photo->storeAs('attachments/students/' . $students->name, $new_name_img, 'upload_attachments');

                    // I can use this way with same imgName withOut Random name
                    $img_name = $photo->getClientOriginalName();

                    $photo->storeAs('attachments/students/' . $students->name, $img_name, 'upload_attachments');

                    // insert Images into DB
                    $image = new Image();
                    $image->filename = $img_name;
                    $image->imageable_id = $students->id;
                    $image->imageable_type = 'App\Models\Students\Student';
                    $image->save();
                }
            }
            DB::commit();

            toastr()->success(trans('messages.success'));

            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // Edit student
    public function editStudent($id)
    {
        // $data['my_classes'] same as compact
        $data['Grades'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        $Students =  Student::findOrFail($id);
        return view('Pages.Students.edit', $data, compact('Students'));
    }


    public function updateStudent($request)
    {
        try {
            $students = Student::findOrFail($request->id);
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
            toastr()->success(trans('messages.Update'));

            return redirect()->route('Students.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // upload_attachment
    public function upload_attachment($request)
    {
        //
        foreach ($request->file('photos') as $photo) {
            $img_name = $photo->getClientOriginalName();
            $photo->storeAs('attachments/students/' . $request->student_name, $img_name, 'upload_attachments');
            // Insert Images In DB
            $image = new Image();
            $image->filename = $img_name;
            $image->imageable_id = $request->student_id;
            $image->imageable_type = 'App\Models\Students\Student';
            $image->save();
        }
        toastr()->success(trans('messages.success'));

        return redirect()->back();
        // return redirect()->route('Students.show', $request->student_id);
    }

    // download_attachment
    public function download_attachment($student_name, $filename)
    {
        // return Storage::disk('upload_attachments')->download('attachments/students/' . $student_name . '/' . $filename);

        return response()->download(public_path('attachments/students/' . $student_name . '/' . $filename));
    }

    //Delete Attachment
    public function Delete_attachment($request)
    {
        Storage::disk('upload_attachments')->delete('attachments/students/' . $request->student_name . '/' . $request->filename);

        Image::where('filename', $request->filename)->where('imageable_id', $request->student_id)->where('imageable_type', 'App\Models\Students\Student')->delete();

        toastr()->success(trans('messages.Delete'));

        return redirect()->back();
    }


    // show_attachments
    public function show_attachment($student_name, $filename)
    {
        $filePath = "attachments/students/{$student_name}/{$filename}";

        // Check if the file exists in the storage directory
        if (Storage::disk('upload_attachments')->exists($filePath)) {
            // Use `public_path()` to access the file location
            return response()->file(public_path($filePath));
        } else {
            // If the file doesn't exist, return a 404 error
            return abort(404, 'File not found');
        }
    }

    // Delete Students
    public function Delete_Student($request)

    {

        Student::destroy($request->id);

        toastr()->success(trans('messages.Delete'));

        return redirect()->route('Students.index');
    }
}
