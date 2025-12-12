<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image',
        'type',
        'event_name',
        'position',
    ];
}
