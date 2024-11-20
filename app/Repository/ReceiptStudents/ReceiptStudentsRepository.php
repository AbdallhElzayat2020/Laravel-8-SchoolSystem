<?php

namespace App\Repository\ReceiptStudents;

use App\Models\FundAccount\FundAccount;
use App\Models\ReceiptStudents\ReceiptStudent;
use App\Models\StudentAccount\StudentAccount;
use App\Models\Students\Student;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{
    public function index()
    {
        $receipt_students = ReceiptStudent::all();
        return view('Pages.Receipt_Students.index', compact('receipt_students'));
    }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('Pages.Receipt_Students.add', compact('student'));
    }
    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findOrfail($id);
        return view('Pages.Receipt_Students.edit', compact('receipt_student'));
    }
    public function store($request)
    {
        DB::beginTransaction();

        try {
            // حفظ البيانات في جدول سندات القبض
            $receipt_students = new ReceiptStudent();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطالب
            $student_accounts = new StudentAccount();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'receipt';
            $student_accounts->receipt_id = $receipt_students->id;
            $student_accounts->student_id = $request->student_id;
            $student_accounts->Debit = 0.00;
            $student_accounts->credit = $request->Debit;
            $student_accounts->description = $request->description;
            $student_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('receipt_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {
        DB::beginTransaction();

        try {
            $receipt_students = ReceiptStudent::findorfail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            $fund_accounts = FundAccount::where('receipt_id', $request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();


            $fund_accounts = StudentAccount::where('receipt_id', $request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('receipt_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        try {
            ReceiptStudent::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}