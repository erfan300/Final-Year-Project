<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    // Fields that can be mass assigned 
    protected $fillable = [
        'username',
        'password',
    ];  

    // Security, ensuring that password remains hidden in JSON/API responses
    protected $hidden = [
        'password',
    ];

    // Ensuring that password is hashed before saving to DB
    public function setPasswordAttribute($value)
    {
        // If password is hashed store as is, else hash it
        if (!Hash::needsRehash($value)) {
            $this->attributes['password'] = $value;
        } else {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
