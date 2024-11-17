<?php

namespace App\Repository\GraduatedStudent;

use App\Models\Grades\Grade;
use App\Models\Students\Student;

class GraduatedStudentRepository implements GraduatedStudentRepositoryInterface
{
    public function index()
    {
        $students = Student::with(['gender', 'grade', 'classroom', 'section'])->onlyTrashed()->get();

        return view('Pages.Students.GraduatedStudent.index', compact('students'));
        // return response()->json($students);
    }

    public function create()
    {
        $Grades = Grade::all();

        return view('Pages.Students.GraduatedStudent.create', compact('Grades'));
    }

    public function softDelete($request)
    {
        $students = Student::where('Grade_id', $request->Grade_id)->where('section_id', $request->section_id)->where('Classroom_id', $request->Classroom_id)->get();

        if ($students->count() < 1) {
            return redirect()->back()->with('error', __('messages.no_students'));
        }

        foreach ($students as $student) {

            $ids = explode(',', $student->id);

            Student::whereIn('id', $ids)->delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Graduated.index');
    }

    public function returnData($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();

        toastr()->success(trans('messages.success'));

        return redirect()->back();
    }

    public function delete($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();

        toastr()->success(trans('messages.Delete'));

        return redirect()->route('Graduated.index');
    }
}