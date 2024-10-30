<?php

namespace App\Models\Sections;

use App\Models\Classrooms\Classroom;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['Section_Name'];

    protected $fillable = ['Section_Name', 'class_id', 'grade_id'];

    public $timestamps = true;

    public function Classes()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}