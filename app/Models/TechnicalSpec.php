<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalSpec extends Model
{
    protected $fillable = [
        'spec_name',
        'spec_value',
    ];
}
