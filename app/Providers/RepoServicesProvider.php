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