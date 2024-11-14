<?php

namespace App\Repository\StudentPromotions;

use App\Models\Grades\Grade;
use App\Models\Promotions\promotions;
use App\Models\Students\Student;
use Illuminate\Support\Facades\DB;

class studentPromotionRepository implements studentPromotionRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::all();

        return view('Pages.Students.Promotions.index', compact('Grades'));
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            // get students where grade and classroom and section is the same from request
            $students = Student::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)->get();

            if ($students->count() < 1) {

                return redirect()->back()->with('error', __('messages.no_students'));
            }

            // Update in student table
            foreach ($students as $student) {

                $ids = explode(',', $student->id);

                Student::whereIn('id', $ids)->update([
                    'Grade_id' => $request->Grade_id_new,
                    'Classroom_id' => $request->Classroom_id_new,
                    'section_id' => $request->section_id_new,
                ]);

                // insert in student_promotions table

                promotions::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->Grade_id,
                    'from_Classroom' => $request->Classroom_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->Grade_id_new,
                    'to_Classroom' => $request->Classroom_id_new,
                    'to_section' => $request->section_id_new,
                ]);
                DB::commit();
            }



            return redirect()->back()->with('success', __('messages.success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function create()
    {
        //
    }

    // update function
    public function update()
    {
        //
    }

    // public edit
    public function edit()
    {
        //
    }
}
