<?php



namespace App\Repository;


interface TeacherRepositoryInterface
{
    // Get All Teachers
    public function getAllTeachers();
    // GetSpecializations
    public function GetSpecializations();
    // GetGenders
    public function GetGenders();
    // storeTeachers
    public function storeTeachers($request);
    //Edit Teachers
    public function EditTeachers($id);
    //UpdateTeachers
    public function UpdateTeachers($request);

    // DeleteTeachers
    public function DeleteTeachers($request);
}