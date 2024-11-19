<?php

namespace App\Models\StudentAccount;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'student_accounts';
}