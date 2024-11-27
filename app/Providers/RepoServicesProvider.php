<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository',
        );


        $this->app->bind(
            'App\Repository\Student\StudentRepositoryInterface',
            'App\Repository\Student\StudentRepository',
        );


        $this->app->bind(
            'App\Repository\StudentPromotions\studentPromotionRepositoryInterface',
            'App\Repository\StudentPromotions\studentPromotionRepository',
        );

        $this->app->bind(
            'App\Repository\GraduatedStudent\GraduatedStudentRepositoryInterface',
            'App\Repository\GraduatedStudent\GraduatedStudentRepository',
        );

        $this->app->bind(
            'App\Repository\StudentFees\FeesStudentRepositoryinterface',
            'App\Repository\StudentFees\FeesStudentRepository',
        );


        $this->app->bind(
            'App\Repository\FeesInvoices\FeesInvoicesRepositoryInterface',
            'App\Repository\FeesInvoices\FeesInvoicesRepository',
        );


        $this->app->bind(
            'App\Repository\ReceiptStudents\ReceiptStudentsRepositoryInterface',
            'App\Repository\ReceiptStudents\ReceiptStudentsRepository',
        );


        $this->app->bind(
            'App\Repository\ProcessingFees\ProcessingFeeRepositoryInterface',
            'App\Repository\ProcessingFees\ProcessingFeeRepository',
        );
        $this->app->bind(
            'App\Repository\Payments\PaymentRepositoryInterface',
            'App\Repository\Payments\PaymentRepository',
        );
        $this->app->bind(
            'App\Repository\Attendance\AttendanceRepositoryInterface',
            'App\Repository\Attendance\AttendanceRepository',
        );

        $this->app->bind(
            'App\Repository\Subjects\SubjectRepositoryInterface',
            'App\Repository\Subjects\SubjectRepository',
        );

        $this->app->bind(
            'App\Repository\Quizze\QuizzeRepositoryInterface',
            'App\Repository\Quizze\QuizzeRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
