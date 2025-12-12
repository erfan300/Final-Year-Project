<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $fillable = [
        'username',
        'password',
    ];  

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        if (!\Illuminate\Support\Facades\Hash::needsRehash($value)) {
            $this->attributes['password'] = $value;
        } else {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
