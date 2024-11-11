<?php

namespace App\Models\Images;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'imageable_id',
        'imageable_type',
    ];

    // Morph to Relationship Model
    public function imageable()
    {
        return $this->morphTo();
    }
}