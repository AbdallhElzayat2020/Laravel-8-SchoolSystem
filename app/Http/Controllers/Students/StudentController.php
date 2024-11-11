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


    public function index()
    {
        return $this->student->getAllStudents();
    }


    public function create()
    {
        return $this->student->createStudent();
    }

    public function store(StoreStudentRequest $request)
    {
        return $this->student->storeStudent($request);
    }


    public function edit($id)
    {
        return $this->student->editStudent($id);
    }

    public function update(StoreStudentRequest $request)
    {
        return $this->student->updateStudent($request);
    }
    public function show($id)
    {
        return $this->student->show_student($id);
    }

    public function destroy(Request $request)
    {
        return $this->student->Delete_Student($request);
    }
}