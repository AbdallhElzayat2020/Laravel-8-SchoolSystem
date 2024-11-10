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


    //Get Classes
    public function Get_classrooms($id)
    {
        $this->student->Get_classrooms($id);
    }



    public function index()
    {
        //
    }


    public function create()
    {
        return $this->student->createStudent();
    }

    // Get_Sections
    // public function Get_Sections($id)
    // {
    //     $this->student->Get_Sections($id);
    // }





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