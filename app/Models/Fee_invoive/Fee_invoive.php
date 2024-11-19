<?php

namespace App\Models\Fee_invoive;

use App\Models\Classrooms\Classroom;
use App\Models\Fees\Fees;
use App\Models\Grades\Grade;
use App\Models\Students\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_invoive extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'fee_invoives';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function fees()
    {
        return $this->belongsTo(Fees::class, 'fee_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
}
