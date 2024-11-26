<?php

namespace App\Repository\ProcessingFees;

use App\Models\ProcessingFee\ProcessingFee;
use App\Models\StudentAccount\StudentAccount;
use App\Models\Students\Student;
use App\Repository\ProcessingFees\ProcessingFeeRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{
    public function index()
    {
        $ProcessingFees = ProcessingFee::all();
        // return response()->json($ProcessingFees);
        return view('Pages.ProcessingFee.index', compact('ProcessingFees'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('Pages.ProcessingFee.add', compact('student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findOrFail($id);
        return view('Pages.ProcessingFee.edit', compact('ProcessingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            //            insert in processing fee
            $processingFee = new ProcessingFee();
            $processingFee->date = date('Y-m-d');
            $processingFee->student_id = $request->student_id;
            $processingFee->amount = $request->Debit;
            $processingFee->description = $request->description;
            $processingFee->save();

            $student_account = new StudentAccount();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'processingFee';
            $student_account->student_id = $request->student_id;
            $student_account->processing_id = $processingFee->id;
            $student_account->Debit = 0.00;
            $student_account->credit = $request->Debit;
            $student_account->description = $request->description;
            $student_account->save();

            DB::commit();
            return redirect()->route('ProcessingFee.index')->with('success', 'تم اضافة بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to add processing fee');
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProcessingFee::findorfail($request->id);;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $students_accounts = StudentAccount::where('processing_id', $request->id)->first();;
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('ProcessingFee.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ProcessingFee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
