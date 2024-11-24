<?php

namespace App\Models\Payment;

use App\Models\Students\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
