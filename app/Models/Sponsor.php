<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'logo', 
        'website'
    ];
}
