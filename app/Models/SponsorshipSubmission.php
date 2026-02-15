<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorshipSubmission extends Model
{
    // Fields that can be mass assigned
    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'message',
    ];
}