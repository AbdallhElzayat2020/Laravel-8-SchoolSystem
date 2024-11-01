<?php

namespace App\Models\ParentAttchments;

use App\Models\My_Parent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttchment extends Model
{
    use HasFactory;
    protected $table = 'parent_attchments';

    protected $fillable = ['file_name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(My_Parent::class);
    }
}