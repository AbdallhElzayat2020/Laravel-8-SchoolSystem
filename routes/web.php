<?php

use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Fees\FeesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\GraduatedStudent\GraduatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\My_Parent\My_ParentController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\ProcessingFee\ProcessingFeeController;
use App\Http\Controllers\Promotions\PromotionsController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Quizes\QuizzeController;
use App\Http\Controllers\ReceiptStudents\ReceiptStudentController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\StudentFeesInvoices\FeesInvoicesController;
use App\Http\Controllers\Students\OnlineClasseController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\subject\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//Auth::routes();


// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/', function () {
//         return view('auth.login');
//     });
// });


// Login routes
Route::get('/', [HomeController::class, 'index'])->name('selection');

Route::get('/login/{type}', [LoginController::class, 'LoginForm'])->middleware('guest')->name('login.show');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        // Dashboard Home
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


        // Grades Route
        Route::resource('grades', GradeController::class);

        // Classrooms Route
        Route::resource('classrooms', ClassroomController::class);
        Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');
        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');

        // Sections Route
        Route::resource('sections', SectionController::class);
        Route::get("classes/{id}", [SectionController::class, 'getClasses'])->name('getClasses');

        // Parents Routes
        Route::view('add_parent', 'livewire.show_Form');
        Route::resource('parents', My_ParentController::class);

        // Teacher Routes
        Route::resource('Teachers', TeacherController::class);


        // Students Route
        Route::resource('Students', StudentController::class);
        Route::get('Get_classrooms/{id}', [StudentController::class, 'Get_classrooms']);
        Route::get('Get_Sections/{id}', [StudentController::class, 'Get_Sections']);
        Route::post('Upload_attachment', [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{student_name}/{file_name}', [StudentController::class, 'Download_attachment']);
        Route::post('Delete_attachment', [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');
        Route::get('show_attachment/{student_name}/{filename}', [StudentController::class, 'show_attachment'])->name('show_attachment');

        // Promotions for students
        Route::resource('Promotions', PromotionsController::class);

        // Graduated Student
        Route::resource('Graduated', GraduatedController::class);

        // Students Fees
        Route::resource('Fees', FeesController::class);

        // StudentsFeesInvoices
        Route::resource('Fees_Invoices', FeesInvoicesController::class);

        // StudentsFeesInvoices
        Route::resource('receipt_students', ReceiptStudentController::class);

        // ProcessingFee
        Route::resource('ProcessingFee', ProcessingFeeController::class);

        // Student Payment
        Route::resource('Payment_students', PaymentController::class);

        // attendances Student
        Route::resource('Attendance', AttendanceController::class);

        // subjects
        Route::resource('subjects', SubjectController::class);

        // subjects
        Route::resource('Quizzes', QuizzeController::class);

        // questions
        Route::resource('questions', QuestionController::class);

        // online_classes Zoom
        Route::resource('online_classes', OnlineClasseController::class);
        Route::get('indirect', [OnlineClasseController::class, 'indirectCreate'])->name('indirect.create');
        Route::post('indirect', [OnlineClasseController::class, 'indirectStore'])->name('indirect.store');

        // Library
        Route::resource('library', LibraryController::class);
        Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');

        // Settings
        Route::resource('settings', SettingController::class);
    }
);