<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    protected $fillable = [
        'title',
        'event_name',
        'event_date',
        'file_path',
    ];
}
