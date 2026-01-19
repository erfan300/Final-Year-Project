<?php

namespace App\Http\Controllers;

use App\Models\SponsorshipSubmission;
use App\Rules\NoProfanity;
use Illuminate\Http\Request;

class SponsorshipSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required', 'string' , 'max:255', new NoProfanity],
            'contact_person' => ['required', 'string' , 'max:255', new NoProfanity],
            'email'        => ['required', 'email' , 'max:255', new NoProfanity],
            'phone' => ['required','string','max:30','regex:/^[0-9+\s()-]+$/'],
            'message'       => ['nullable', 'string', 'max:2000', new NoProfanity],
        ]);

        SponsorshipSubmission::create($request->only([
            'company_name','contact_person','email','phone','message'
        ]));

        return redirect()->route('home')->with('success', 'Thank you for your sponsorship enquiry.');
    }
}