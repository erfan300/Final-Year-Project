<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentSubmission;
use Illuminate\Http\Request;
use App\Rules\NoProfanity;

class RecruitmentSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255', new NoProfanity],
            'email'         => ['required', 'email', 'max:255'],
            'course'        => ['required', 'string', 'max:255', new NoProfanity],
            'year_of_study' => ['required', 'in:1,2,3,masters,phd'],
            'message'       => ['nullable', 'string', 'max:2000', new NoProfanity],
        ]);

        RecruitmentSubmission::create($request->only([
            'name','email','course','year_of_study','message'
        ]));

        return redirect()->route('home')->with('success', 'Your application has been submitted.');
    }
}