<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SponsorController extends Controller
{
    public function create()
    {
        return view('admin.sponsors.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'website' => 'required|url|max:255',
            'logo' => 'required|image|max:5120',
        ]);

        $path = $request->file('logo')->store('sponsors', 'public');

        Sponsor::create([
            'website' => $request->website,
            'logo' => $path,
        ]);

        return redirect()->route('sponsors')->with('success', 'Sponsor added successfully.');

    }

    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsors.form', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'website' => 'required|url|max:255',
            'logo' => 'nullable|image|max:5120',
        ]);

        $sponsor = Sponsor::findOrFail($id);

        $data = ['website' => $request->website];

        if ($request->hasFile('logo')) {
            if ($sponsor->logo) Storage::disk('public')->delete($sponsor->logo);
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return redirect()->route('sponsors')->with('success', 'Sponsor updated successfully.');
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        if ($sponsor->logo) Storage::disk('public')->delete($sponsor->logo);
        $sponsor->delete();

        return  redirect()->route('sponsors')->with('success', 'Sponsor deleted.');
    }
}
