<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBuild extends Model
{
    protected $fillable = [
        'name',
        'year',
        'image_path',
        'top_speed',
        'weight',
        'power',
        'engine',
        'chassis',
        'highlights',
    ];
}
