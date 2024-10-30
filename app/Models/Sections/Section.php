<?php

namespace App\Models\Sections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['Section_Name'];

    protected $fillable = ['Section_Name', 'Status', 'class_id', 'grade_id'];

    public $timestamps = true;
}