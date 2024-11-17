<?php

namespace App\Models\Students;

use App\Models\Classrooms\Classroom;
use App\Models\Genders\Gender;
use App\Models\Grades\Grade;
use App\Models\Images\Image;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Sections\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\App;

class Student extends Model
{
    use HasFactory, SoftDeletes;

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


    // student belongs to Nationality
    public function Nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'nationality_id');
    }

    // student belongs to Nationality
    public function myparent()
    {
        return $this->belongsTo(My_Parent::class, 'parent_id');
    }

    // Student belongs to Section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }



    // Morph to Relationship => [student has many images]
    public function images()
    {
        // in model Image => imageable
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getNationalityNameAttribute()
    {
        $name = json_decode($this->nationality->Name, true);
        return $name[App::getLocale()] ?? '';
    }
}