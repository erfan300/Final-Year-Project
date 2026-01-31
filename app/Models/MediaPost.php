<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPost extends Model
{
    protected $fillable = [
        'title',
        'caption',
        'event_name',
        'event_date',
    ];

    public function items()
    {
        return $this->hasMany(MediaItem::class)->orderBy('sort_order');
    }
}