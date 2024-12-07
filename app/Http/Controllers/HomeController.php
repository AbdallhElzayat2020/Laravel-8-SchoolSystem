<?php

namespace App\Http\Controllers;

use App\Models\My_Parent;
use App\Models\Sections\Section;
use App\Models\Students\Student;
use App\Models\Teacher\Teacher;

class HomeController extends Controller
{



    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        $students_count = Student::count();
        $teachers_count = Teacher::count();
        $parents_count = My_Parent::count();
        $sections_count = Section::count();
        return view('dashboard', compact(
            'students_count',
            'teachers_count',
            'parents_count',
            'sections_count',
        ));
    }
}