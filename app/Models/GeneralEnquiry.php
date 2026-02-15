<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralEnquiry extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}