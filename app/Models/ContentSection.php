<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'section_key',
        'content',
    ];
}