<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'teachers';

    public $translatable = ['Name'];

    protected $fillable = [
        'Email',
        'Password',
        'Name',
        'Specialization_id',
        'Gender_id',
        'Joining_Date',
        'Address',
    ];
    // protected $guarded = [];
}