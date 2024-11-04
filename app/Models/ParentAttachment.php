<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    use HasFactory;

    protected $table = 'parent_attachments';

    protected $fillable = ['parent_id', 'file_name'];
}