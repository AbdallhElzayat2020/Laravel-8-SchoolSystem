<?php

namespace App\Models\StudentAccount;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'student_accounts';


    // public function student()
    // {
    //     return $this->belongsTo(Student::class, 'student_id');
    // }

    // public function feeInvoice()
    // {
    //     return $this->belongsTo(FeeInvoice::class, 'fee_invoice_id');
    // }

    // public function receipt()
    // {
    //     return $this->belongsTo(ReceiptStudent::class, 'receipt_id');
    // }

    // public function processing()
    // {
    //     return $this->belongsTo(ProcessingFee::class, 'processing_id');
    // }

    // public function grade()
    // {
    //     return $this->belongsTo(Grade::class, 'Grade_id');
    // }

    // public function classroom()
    // {
    //     return $this->belongsTo(Classroom::class, 'Classroom_id');
    // }

    // public function section()
    // {
    //     return $this->belongsTo(Section::class, 'section_id');
    // }
}