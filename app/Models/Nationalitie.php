<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    use HasFactory;
    // use Has Translations;
    use HasTranslations;

    protected $table = 'nationalities';

    public $translatable = ['Name'];
}