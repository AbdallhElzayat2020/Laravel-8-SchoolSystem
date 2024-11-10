<?php



namespace App\Repository\Student;


interface StudentRepositoryInterface
{
    //Get All Form Students
    public function createStudent();

    // Get Classes
    public function Get_classrooms($id);

    // public function Get_Sections($id);
}