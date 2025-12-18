<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentSubmission;
use Illuminate\Http\Request;

class RecruitmentSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'course' => 'required|string|max:255',
            'year_of_study' => 'required|string|max:50',
            'message'=> 'nullable|string',
        ]);

        RecruitmentSubmission::create($request->only([
            'name','email','course','year_of_study','message'
        ]));

        return back()->with('success', 'Your application has been submitted.');
    }
}