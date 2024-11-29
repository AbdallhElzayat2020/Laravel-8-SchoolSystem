<?php

namespace App\Models\online_classe;

use App\Models\Classrooms\Classroom;
use App\Models\Grades\Grade;
use App\Models\Sections\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_classe extends Model
{
    use HasFactory;

    protected $table = 'online_classes';
    protected $guarded = [];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
