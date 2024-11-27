<?php

namespace App\Repository\Attendance;

use App\Models\Attendance\Attendance;
use App\Models\Grades\Grade;
use App\Models\Students\Student;
use App\Models\Teacher\Teacher;
use App\Repository\Attendance\AttendanceRepositoryInterface;
use Exception;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('Pages.Attendance.sections', compact('Grades', 'list_Grades', 'teachers'));
    }

    public function show($id)
    {
        $students = Student::with(['gender', 'grade', 'classroom', 'section'])->where('section_id', $id)->get();
        // return $student;
        return view('Pages.Attendance.show', compact('students'));
    }

    public function store($request)
    {
        try {
            foreach ($request->attendences as $studentId => $attendance) {

                if ($attendance == 'presence') {
                    $attendance_status = true; //1
                } elseif ($attendance == 'absence') {
                    $attendance_status = false;//0
                }
                Attendance::create([
                    'student_id' => $studentId,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendance_date' => date('Y-m-d'),
                    'attendance_status' => $attendance_status,
                ]);

            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}
