<?php

use App\Http\Controllers\Teachers\dashboard\StudentController as DashboardStudentController;
use App\Models\Students\Student;
use App\Models\Teacher\Teacher;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {

        //==============================dashboard============================
        Route::get('/teacher/dashboard', function () {

            $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['count_sections'] = $ids->count();
            $data['count_students'] = Student::where('section_id', $ids)->count();

            return view('Pages.Teachers.dashboard.dashboard', $data);
        });

        Route::get('students', [DashboardStudentController::class, 'getStudents'])->name('getStudents');
    }
    
);
