<?php



namespace App\Repository\Student;


interface StudentRepositoryInterface
{
    //Get All Form Students
    public function getAllStudents();
    //Create Student
    public function createStudent();

    // store student
    public function storeStudent($request);

    // Edit Students
    public function editStudent($id);

    // Update Student
    public function updateStudent($request);

    //Delete_Student
    public function Delete_Student($request);
    // Get Classes
    public function Get_classrooms($id);

    // show student
    public function show_student($id);

    // Get Sections
    public function Get_Sections($id);
}