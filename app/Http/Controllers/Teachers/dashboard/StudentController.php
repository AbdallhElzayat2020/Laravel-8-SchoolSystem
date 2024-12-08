<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Students\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getStudents()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');

        $students = Student::whereIn('section_id', $ids)->get();

        return view('Pages.Teachers.dashboard.students.index', compact('students'));
    }
}
