<?php

namespace App\Models\Images;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function imageable()
    {
        return $this->morphTo();
    }
}