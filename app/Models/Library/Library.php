<?php

namespace App\Models\Library;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Sections\Section;
use App\Models\Teacher\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'library';
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
