<?php



namespace App\Repository\Student;


interface StudentRepositoryInterface
{
    //Get All Form Students
    public function createStudent();

    // Get Classes
    public function Get_classrooms($id);

    // Get Sections
    public function Get_Sections($id);

    // store student
    public function storeStudent($request);
}