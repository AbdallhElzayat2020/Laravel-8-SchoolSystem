<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Sections\Section;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with(['Sections'])->get();

        $teachers = Teacher::all();

        $list_Grades = Grade::all();

        return view('Pages.Sections.sections', compact('grades', 'list_Grades', 'teachers'));
    }

    public function store(StoreSectionRequest $request)
    {

        try {
            $sections = new Section();

            $sections->Section_Name = ['en' => $request->Name_Section_En, 'ar' => $request->Name_Section_Ar];

            $sections->grade_id = $request->grade_id;

            $sections->class_id = $request->class_id;

            $sections->Status = 1;

            $sections->save();
            // insert in pivot Table
            $sections->teachers()->attach($request->teacher_id);

            toastr()->success(trans('messages.success'));

            return redirect()->route('sections.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }


    public function update(StoreSectionRequest $request)
    {
        try {
            $Sections = Section::findOrFail($request->id);

            $Sections->Section_Name = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->grade_id = $request->grade_id;
            $Sections->class_id = $request->class_id;

            if (isset($request->Status)) {
                $Sections->Status = 1;
            } else {
                $Sections->Status = 2;
            }

            // update pivot table
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array());
            }

            $Sections->save();
            toastr()->success(trans('messages.Update'));

            return redirect()->route('sections.index');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.Delete'));

        return redirect()->route('sections.index');
    }
    public function getClasses($id)
    {

        $list_classes = Classroom::where('grade_id', $id)->pluck('Class_Name', 'id');

        return $list_classes;
    }
}
