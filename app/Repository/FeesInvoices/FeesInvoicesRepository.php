<?php

namespace App\Repository\FeesInvoices;

use App\Models\Fee_invoive\Fee_invoive;
use App\Models\Fees\Fees;
use App\Models\Grades\Grade;
use App\Models\StudentAccount\StudentAccount;
use App\Models\Students\Student;
use Illuminate\Support\Facades\DB;

class FeesInvoicesRepository implements FeesInvoicesRepositoryInterface
{

    public function index()
    {
        $Fee_invoices = Fee_invoive::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index', compact('Fee_invoices', 'Grades'));
    }


    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();
        try {

            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new Fee_invoive();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();

                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentAccount();
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->Grade_id = $request->Grade_id;
                $StudentAccount->Classroom_id = $request->Classroom_id;
                $StudentAccount->Debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }

            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);

        $fees = Fees::where('Classroom_id', $student->Classroom_id)->get();

        return view('Pages.Fees_Invoices.add', compact('student', 'fees'));
    }
}
