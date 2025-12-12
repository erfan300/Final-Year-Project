<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentSubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'course',
        'year_of_study',
        'message',
    ];
}
