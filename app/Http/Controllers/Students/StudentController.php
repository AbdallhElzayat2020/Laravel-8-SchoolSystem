<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Repository\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    protected $student;
    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    //Get classrooms
    public function Get_classrooms($id)
    {
        return $this->student->Get_classrooms($id);
    }

    //Get Sections
    public function Get_Sections($id)
    {
        return $this->student->Get_Sections($id);
    }

    // Get All Students
    public function index()
    {
        return $this->student->getAllStudents();
    }

    // show student form for Insert
    public function create()
    {
        return $this->student->createStudent();
    }

    //store Student information in DB
    public function store(StoreStudentRequest $request)
    {
        return $this->student->storeStudent($request);
    }

    // Show Edit Page
    public function edit($id)
    {
        return $this->student->editStudent($id);
    }
    // Update Student information in DB
    public function update(StoreStudentRequest $request)
    {
        return $this->student->updateStudent($request);
    }
    // show Student Information in New Page and His Attachments
    public function show($id)
    {
        return $this->student->show_student($id);
    }

    public function destroy(Request $request)
    {
        return $this->student->Delete_Student($request);
    }

    // upload new attachments
    public function upload_attachment(Request $request)
    {
        return $this->student->upload_attachment($request);
    }

    // Download attachments
    public function download_attachment($student_name, $filename)
    {

        return $this->student->download_attachment($student_name, $filename);
    }

    // Show Attachments
    public function show_attachment($student_name, $filename)
    {
        // Return the response from the repository function
        return $this->student->show_attachment($student_name, $filename);
    }

    // Delete attachments
    public function Delete_attachment(Request $request)
    {
        return $this->student->Delete_attachment($request);
    }
}