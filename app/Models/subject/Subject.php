<?php

namespace App\Models\subject;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Teacher\Teacher;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name', 'grade_id', 'classroom_id', 'teacher_id'];

    // تعريف accessor للحصول على الاسم
    public function getNameAttribute($value)
    {
        return json_decode($value, true)[app()->getLocale()] ?? $value;
    }

    // العلاقات
    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}