<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::all();
        return view('Pages.Grades.grades', compact('grades'));
    }



    public function store(GradeRequest $request)
    {
        try {

            $grade = new Grade();

            $grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];

            $grade->Notes = $request->Notes;

            $grade->save();

            toastr()->success(__('messages.success'));

            return redirect()->route('grades.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update(GradeRequest $request, $id)
    {


        try {

            $Grades = Grade::findOrFail($request->id);

            $Grades->update([

                $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],

                $Grades->Notes = $request->Notes,
            ]);
            toastr()->success(trans('messages.Update'));

            return redirect()->route('grades.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        // check if are there any classes in this grade
        $myClass_id = Classroom::where('grade_id', $request->id)->pluck('grade_id');

        // if there are no classes in this grade ==  delete the grade

        if ($myClass_id->count() == 0) {

            $grade = Grade::findOrFail($request->id);

            $grade->delete();

            toastr()->success(__('messages.Delete'));

            return redirect()->route('grades.index');
        }
        // if there are classes in this grade alert error and redirect
        else {

            toastr()->error(__('grades.delete_Grade_Error'));

            return redirect()->route('grades.index');
        }
    }
}
