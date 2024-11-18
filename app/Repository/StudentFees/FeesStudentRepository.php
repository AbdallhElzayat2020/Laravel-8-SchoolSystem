<?php

namespace App\Repository\StudentFees;

use App\Models\Fees\Fees;
use App\Models\Grades\Grade;

class FeesStudentRepository implements FeesStudentRepositoryinterface
{
    public function index()
    {
        $fees = Fees::with('grade', 'classroom')->get();

        $Grades = Grade::all();

        return view('Pages.Fees.index', compact('fees', 'Grades'));
    }


    // public function show($id)
    // {
    //     //
    // }


    public function create()
    {
        $Grades = Grade::all();
        return view('Pages.Fees.add', compact('Grades'));
    }


    public function store($request)
    {
        try {

            $fees = new Fees();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  = $request->amount;
            $fees->Grade_id  = $request->Grade_id;
            $fees->Classroom_id  = $request->Classroom_id;
            $fees->description  = $request->description;
            $fees->year  = $request->year;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {

        $fee = Fees::findorfail($id);
        $Grades = Grade::all();
        return view('Pages.Fees.edit', compact('fee', 'Grades'));
    }

    public function update($request)
    {
        try {
            $fees = Fees::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  = $request->amount;
            $fees->Grade_id  = $request->Grade_id;
            $fees->Classroom_id  = $request->Classroom_id;
            $fees->description  = $request->description;
            $fees->year  = $request->year;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {

        // Fees::destroy($request->id);
        //or
        $fee = Fees::findorfail($request->id);
        $fee->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
}