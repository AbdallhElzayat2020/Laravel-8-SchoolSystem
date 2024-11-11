<?php

namespace App\Models\Students;

use App\Models\Classrooms\Classroom;
use App\Models\Genders\Gender;
use App\Models\Grades\Grade;
use App\Models\Images\Image;
use App\Models\Sections\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $table = 'students';


    public $translatable = ['name'];

    protected $guarded = [];


    // Student belongs to Gender
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    // Student belongs to Grade
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    // Student belongs to Classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
    // Student belongs to Section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }



    // Morph to Relationship
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}