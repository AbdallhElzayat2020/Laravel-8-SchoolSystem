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

        $classes = Classroom::all();

        return view('Pages.Classrooms.classrooms', compact('classes', 'grades'));
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


    public function update(Request $request)
    {
        try {
            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([
                'Class_Name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
                'grade_id' => $request->grade_id,
            ]);
            toastr()->success(trans('messages.Update'));

            return redirect()->route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {

        $Classrooms = Classroom::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.Delete'));

        return redirect()->route('classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->delete();

        toastr()->success(__('messages.Delete'));

        return redirect()->route('classrooms.index');
    }

    public function Filter_Classes(Request $request)
    {
        $grades = Grade::all();

        $Search = Classroom::select('*')->where('grade_id', '=', $request->grade_id)->get();

        return view('Pages.Classrooms.classrooms', compact('grades'))->withDetails($Search);
    }
}