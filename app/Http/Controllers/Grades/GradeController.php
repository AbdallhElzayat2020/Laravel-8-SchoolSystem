<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\Grades\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::paginate(10);
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



    public function update(Request $request, $id)
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
        try {
            $grade = Grade::findOrFail($request->id);

            $grade->delete();

            toastr()->success(__('messages.Delete'));

            return redirect()->route('grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
