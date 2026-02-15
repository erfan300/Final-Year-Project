<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'question', 
        'answer', 
        'sort_order'
    ];
}
