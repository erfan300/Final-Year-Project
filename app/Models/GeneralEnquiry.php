<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralEnquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}