<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPost extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'title',
        'caption',
        'event_name',
        'event_date',
    ];

    // Media post can have many media items which are displayed in order of sort_order
    public function items()
    {
        return $this->hasMany(MediaItem::class)->orderBy('sort_order');
    }
}