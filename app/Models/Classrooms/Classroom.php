<?php

namespace App\Models\Classrooms;

use App\Models\Grades\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;

    public $table = 'classrooms';

    // public $translatable = ['name'];
    public $translatable = ['Class_Name'];
    protected $fillable = ['Class_Name', 'grade_id'];
    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
