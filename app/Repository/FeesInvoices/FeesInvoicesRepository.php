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

        // return $request->List_Fees;
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();
        try {

            foreach ($List_Fees as $List_Fee) {
                // Fess Invoice
                $Fees = new Fee_invoive();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();

                //student accounts
                $StudentAccount = new StudentAccount();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fees->id;
                $StudentAccount->student_id = $List_Fee['student_id'];
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


    public function edit($id)
    {
        $fee_invoices = Fee_invoive::findOrFail($id);

        $fees = Fees::where('Classroom_id', $fee_invoices->Classroom_id)->get();

        return view('Pages.Fees_Invoices.edit', compact('fee_invoices', 'fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $Fees = Fee_invoive::findOrFail($request->id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            $StudentAccount = StudentAccount::where('fee_invoice_id', $request->id)->first();
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fee_invoive::destroy($request->id);
            toastr()->success(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}