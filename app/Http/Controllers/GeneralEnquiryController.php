<?php

namespace App\Http\Controllers;

use App\Models\GeneralEnquiry;
use App\Rules\NoProfanity;
use Illuminate\Http\Request;

class GeneralEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:255', new NoProfanity],
            'email'   => ['required' ,'email', 'max:255', new NoProfanity],
            'message' => ['required', 'string', 'max:2000', new NoProfanity],
        ]);

        GeneralEnquiry::create($request->only([
            'name','email','message'
        ]));

        return redirect()->route('home')->with('success', 'Your enquiry has been sent.');
    }
}