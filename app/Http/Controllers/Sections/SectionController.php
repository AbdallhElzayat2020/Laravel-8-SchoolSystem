<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Sections\Section;
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

        $list_Grades = Grade::all();

        return view('Pages.Sections.sections', compact('grades', 'list_Grades'));
        // return view('Pages.Sections.sections');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {

        try {
            $sections = new Section();
            $sections->Section_Name = ['en' => $request->Name_Section_En, 'ar' => $request->Name_Section_Ar];
            $sections->grade_id = $request->grade_id;
            $sections->class_id = $request->class_id;
            $sections->Status = 1;
            $sections->save();

            toastr()->success(trans('messages.success'));

            return redirect()->route('sections.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSectionRequest $request)
    {
        try {
            $section = Section::findOrFail($request->id);
            $section->Section_Name = ['en' => $request->Name_Section_En, 'ar' => $request->Name_Section_Ar];
            $section->grade_id = $request->grade_id;
            $section->class_id = $request->class_id;
            if (isset($request->status)) {
                $section->Status = 1;
            } else {
                $section->Status = 2;
            }
            $section->save();

            toastr()->success(trans('messages.Update'));

            return redirect()->route('sections.index');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
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