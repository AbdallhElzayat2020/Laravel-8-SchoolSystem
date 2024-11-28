<?php

namespace App\Models\Questions;

use App\Models\Quizzes\Quizze;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $guarded = [];


    public function quizze()
    {
        return $this->belongsTo(Quizze::class);
    }
}
