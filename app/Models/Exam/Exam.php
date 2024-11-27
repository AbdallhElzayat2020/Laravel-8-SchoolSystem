<?php

namespace App\Models\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $table = 'exams';
    protected $guarded = [];
}
