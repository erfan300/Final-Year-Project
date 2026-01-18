<?php

namespace App\Http\Controllers;

use App\Models\SponsorshipSubmission;
use Illuminate\Http\Request;

class SponsorshipSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:30',
            'message'      => 'nullable|string',
        ]);

        SponsorshipSubmission::create($request->only([
            'company_name','contact_person','email','phone','message'
        ]));

        return redirect()->route('home')->with('success', 'Thank you for your sponsorship enquiry.');
    }
}