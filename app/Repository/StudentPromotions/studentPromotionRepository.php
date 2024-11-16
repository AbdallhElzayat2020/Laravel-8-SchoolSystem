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
            $students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id', $request->Classroom_id)
                ->where('section_id', $request->section_id)
                ->where('academic_year', $request->academic_year)->get();

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
                    'academic_year' => $request->academic_year_new,
                ]);

                // insert in promotions table
                promotions::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->Grade_id,
                    'from_Classroom' => $request->Classroom_id,
                    'from_section' => $request->section_id,
                    'academic_year' => $request->academic_year,

                    // new in promotions
                    'to_grade' => $request->Grade_id_new,
                    'to_Classroom' => $request->Classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year_new' => $request->academic_year_new,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', __('messages.success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // Show Promotions Table
    public function create()
    {

        $promotions = promotions::with(['student_name', 'f_grade', 'f_classroom', 'f_sections', 't_grade', 't_classroom', 't_sections'])->get();

        return view('Pages.Students.Promotions.management', compact('promotions'));
    }

    //Back from Update Student
    public function destroy($request)
    {
        try {

            if ($request->page_id == 1) {

                $Promotions = promotions::all();
                foreach ($Promotions as $Promotion) {
                    $ids = explode(',', $Promotion->student_id);
                    Student::whereIn('id', $ids)
                        ->update([
                            'Grade_id' => $Promotion->from_grade,
                            'Classroom_id' => $Promotion->from_Classroom,
                            'section_id' => $Promotion->from_section,
                            'academic_year' => $Promotion->academic_year,
                        ]);
                }
                promotions::truncate();
                return redirect()->back()->with('success', __('messages.success'));

                //or
            } else {

                $Promotion = promotions::findOrFail($request->id);

                Student::where('id', $Promotion->student_id)
                    ->update([
                        'Grade_id' => $Promotion->from_grade,
                        'Classroom_id' => $Promotion->from_Classroom,
                        'section_id' => $Promotion->from_section,
                        'academic_year' => $Promotion->academic_year,
                    ]);

                promotions::destroy($request->id);
                return redirect()->back()->with('success', __('messages.success'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    // Using beginTransaction for Tables

    /////////////////////////////////////////////////////////
    // public function destroy($request)
    // {
    //     try {
    //         // Ensure the transaction is started
    //         DB::beginTransaction();

    //         if ($request->page_id == 1) {
    //             $Promotions = promotions::all();
    //             foreach ($Promotions as $Promotion) {
    //                 $ids = explode(',', $Promotion->student_id);
    //                 Student::whereIn('id', $ids)
    //                     ->update([
    //                         'Grade_id' => $Promotion->from_grade,
    //                         'Classroom_id' => $Promotion->from_Classroom,
    //                         'section_id' => $Promotion->from_section,
    //                         'academic_year' => $Promotion->academic_year,
    //                     ]);
    //             }
    //             promotions::truncate();
    //         } else {
    //             // Rollback if the condition is not met
    //             DB::rollBack();
    //             return "error";
    //         }

    //         // Commit the transaction
    //         DB::commit();
    //         return redirect()->back()->with('success', __('messages.success'));
    //     } catch (\Exception $e) {
    //         // Rollback in case of an exception
    //         DB::rollBack();
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }
}
