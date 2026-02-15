<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    // Fields that can be mass assigned 
    protected $fillable = [
        'media_post_id',
        'file_path',
        'sort_order',
    ];

    // Each media item belongs to a media post (media_post_id)
    public function post()
    {
        return $this->belongsTo(MediaPost::class, 'media_post_id');
    }
}