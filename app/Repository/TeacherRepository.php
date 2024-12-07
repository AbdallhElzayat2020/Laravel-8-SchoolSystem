<?php


namespace App\Repository;

use App\Models\Genders\Gender;
use App\Models\Specializations\Specialization;
use App\Models\Teacher\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

    public function getAllTeachers()
    {
        return Teacher::with('genders', 'specializations')->get();
    }

    public function GetSpecializations()
    {
        return Specialization::all();
    }

    public function GetGenders()
    {
        return Gender::all();
    }

    public function StoreTeachers($request)
    {
        // dd($request->all());

        try {
            $Teachers = new Teacher();

            $Teachers->email = $request->Email;

            $Teachers->password = Hash::make($request->Password);

            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];

            $Teachers->Specialization_id = $request->Specialization_id;

            $Teachers->Gender_id = $request->Gender_id;

            $Teachers->Joining_Date = $request->Joining_Date;

            $Teachers->Address = $request->Address;

            $Teachers->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function EditTeachers($id)
    {
        return Teacher::findOrFail($id);
    }

    public function updateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);

            $Teachers->email = $request->Email;

            $Teachers->password = Hash::make($request->Password);

            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];

            $Teachers->Specialization_id = $request->Specialization_id;

            $Teachers->Gender_id = $request->Gender_id;

            $Teachers->Joining_Date = $request->Joining_Date;

            $Teachers->Address = $request->Address;

            $Teachers->save();

            toastr()->success(trans('messages.Update'));

            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.Delete'));

        return redirect()->route('Teachers.index');
    }
}
