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
        // Skipping profanity detection if the value is not text
        if (!is_string($value) || trim($value) === '') {
            return;
        }
        
        // Checking text using Blasp profanity detection library 
        $result = Blasp::check($value);

        // Admins are trusted users, they bypass profanity detection
        if (Session::has('admin_id')) {
            return;
        }

        // If profanity is detected the submission is rejected
        if ($result->hasProfanity()) {
            $fail("The {$attribute} contains inappropriate language.");
        }
    }
}