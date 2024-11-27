<?php

namespace App\Repository\Exams;

use App\Models\Exam\Exam;
use App\Repository\Exams\ExamRepositoryInterface;
use Exception;

class ExamRepository implements ExamRepositoryInterface
{
    public function index()
    {
        $exams = Exam::all();
        return view('Pages.Exams.index', compact('exams'));
    }

    public function create()
    {
        return view('Pages.Exams.add');
    }

    public function store($request)
    {
        try {
            $exam = new Exam();
            $exam->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $exam->term = $request->term;
            $exam->academic_year = $request->academic_year;
            $exam->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('Pages.Exams.edit', compact('exam'));
    }

    public function update($request)
    {
        try {
            $id = $request->id;
            $exam = Exam::findOrFail($id);
            $exam->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $exam->term = $request->term;
            $exam->academic_year = $request->academic_year;
            $exam->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $exam = Exam::destroy($request->id);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
