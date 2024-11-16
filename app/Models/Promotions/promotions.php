<?php

namespace App\Models\Promotions;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Sections\Section;
use App\Models\Students\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class promotions extends Model
{
    use HasFactory;

    //protected $table = 'promotions';

    protected $fillable = [
        'student_id',
        'from_grade',
        'from_Classroom',
        'from_section',
        'to_grade',
        'to_Classroom',
        'to_section',
        'academic_year',
        'academic_year_new'
    ];

    // Relation ships
    public function student_name()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function f_grade()
    {
        return $this->belongsTo(Grade::class, 'from_grade');
    }

    public function f_classroom()
    {
        return $this->belongsTo(Classroom::class, 'from_Classroom');
    }

    public function f_sections()
    {
        return $this->belongsTo(Section::class, 'from_section');
    }

    public function t_grade()
    {
        return $this->belongsTo(Grade::class, 'to_grade');
    }

    public function t_classroom()
    {
        return $this->belongsTo(Classroom::class, 'to_Classroom');
    }

    public function t_sections()
    {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
