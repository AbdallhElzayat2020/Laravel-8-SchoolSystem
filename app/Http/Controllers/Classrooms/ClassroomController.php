<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRequest;
use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    public function index()
    {
        $grades = Grade::all();

        $classrooms = Classroom::all();

        return view('Pages.Classrooms.classrooms', compact('classrooms', 'grades'));
    }

    public function store(StoreClassRequest $request)
    {

        $listClasses = $request->List_Classes;

        try {

            foreach ($listClasses as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->Class_Name = ['en' => $List_Class['Name_en'], 'ar' => $List_Class['Name_ar']];

                $My_Classes->grade_id = $List_Class['grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));

            return redirect()->route('classrooms.index');

        } catch (\Throwable $th) {

            return redirect()->back()->withErrors(['error' => $th->getMessage()]);

        }
    }


    public function show(Classroom $classroom)
    {
        //
    }

    public function edit(Classroom $classroom)
    {
        //
    }


    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    public function destroy(Classroom $classroom)
    {
        //
    }
}
