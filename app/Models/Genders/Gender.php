<?php

namespace App\Models\Genders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'genders';

    public $translatable = ['Name'];

    protected $fillable = ['Name'];
}