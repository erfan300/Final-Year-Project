<?php

namespace App\Http\Controllers;

use App\Models\GeneralEnquiry;
use Illuminate\Http\Request;

class GeneralEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        GeneralEnquiry::create($request->only([
            'name','email','message'
        ]));

        return back()->with('success', 'Your enquiry has been sent.');
    }
}