<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'title',
        'body',
        'image_path',
    ];
}
