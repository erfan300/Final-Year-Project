<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Blaspsoft\Blasp\Facades\Blasp;
use Illuminate\Support\Facades\Session;


class NoProfanity implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value) || trim($value) === '') {
            return;
        }

        $result = Blasp::check($value);

        if (Session::has('admin_id')) {
            return;
    }

        if ($result->hasProfanity()) {
            $fail("The {$attribute} contains inappropriate language.");
        }
    }
}