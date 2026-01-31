<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    protected $fillable = [
        'media_post_id',
        'file_path',
        'sort_order',
    ];

    public function post()
    {
        return $this->belongsTo(MediaPost::class, 'media_post_id');
    }
}