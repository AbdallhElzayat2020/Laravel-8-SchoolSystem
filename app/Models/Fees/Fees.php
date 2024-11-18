<?php

namespace App\Models\Fees;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fees extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    protected $fillable = [
        'title',
        'amount',
        'year',
        'description',
        'Grade_id',
        'Classroom_id'
    ];

    protected $table = 'fees';



    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
}