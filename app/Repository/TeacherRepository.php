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
        return Teacher::all();
    }

    public function GetSpecializations()
    {
        return Specialization::all();
    }

    public function GetGenders()
    {
        return Gender::all();
    }

    public function storeTeachers($request)
    {
        try {
            $Teachers = new Teacher();
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function updateTeachers($request)
    {
        //
    }
    public function destroyTeachers($request)
    {
        //
    }
}