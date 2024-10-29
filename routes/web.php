<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
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
        // Grades
        Route::resource('grades', GradeController::class);

        // Classrooms
        Route::resource('classrooms', ClassroomController::class);
        // Filter Classes
        Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');

        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        // add_parent
        Route::view('add_parent', 'livewire.show_Form');
    }
);