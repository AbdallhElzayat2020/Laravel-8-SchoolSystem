<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
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
        //
    }


    public function create()
    {
        return $this->student->createStudent();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}