<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\My_Parent\My_ParentController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Teachers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],

    function () {
        // Dashboard
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        // Grades Route
        Route::resource('grades', GradeController::class);

        // start  Classrooms Route
        Route::resource('classrooms', ClassroomController::class);
        // Filter Classes
        Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');

        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        // End Classrooms Route

        // Sections Route
        Route::resource('sections', SectionController::class);

        Route::get("classes/{id}", [SectionController::class, 'getClasses'])->name('getClasses');

        // Parents Routes

        // add_parent
        Route::view('add_parent', 'livewire.show_Form');
        Route::resource('parents', My_ParentController::class);

        // Teacher Routes
        Route::resource('Teachers', TeacherController::class);
    }
);