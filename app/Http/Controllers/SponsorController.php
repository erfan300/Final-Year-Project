<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SponsorController extends Controller
{
    // Displaying create form
    public function create()
    {
        return view('admin.sponsors.form');
    }

    // Storing record
    public function store(Request $request)
    {
        // Validating inputs
        $request->validate([
            'website' => 'required|url|max:255',
            'logo' => 'required|image|max:5120',
        ]);

        // Saving logo
        $path = $request->file('logo')->store('sponsors', 'public');

        Sponsor::create([
            'website' => $request->website,
            'logo' => $path,
        ]);

        return redirect()->route('sponsors')->with('success', 'Sponsor added successfully.');

    }

    // Displaying edit form
    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsors.form', compact('sponsor'));
    }

    // Updating record
    public function update(Request $request, $id)
    {
        $request->validate([
            'website' => 'required|url|max:255',
            'logo' => 'nullable|image|max:5120',
        ]);

        $sponsor = Sponsor::findOrFail($id);

        $data = ['website' => $request->website];

        // If logo is selected, replace existing one and clean up storage
        if ($request->hasFile('logo')) {
            if ($sponsor->logo) Storage::disk('public')->delete($sponsor->logo);
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return redirect()->route('sponsors')->with('success', 'Sponsor updated successfully.');
    }

    // Deleting record
    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        // Storage clean up
        if ($sponsor->logo) Storage::disk('public')->delete($sponsor->logo);
        $sponsor->delete();

        return  redirect()->route('sponsors')->with('success', 'Sponsor deleted.');
    }
}
