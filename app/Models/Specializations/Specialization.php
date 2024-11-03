<?php

namespace App\Models\Specializations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'specializations';

    public $translatable = ['Name'];

    protected $fillable = ['Name'];
}