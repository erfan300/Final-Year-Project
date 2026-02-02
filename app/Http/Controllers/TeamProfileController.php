<?php

namespace App\Http\Controllers;

use App\Models\TeamProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamProfileController extends Controller
{
    public function create()
    {
        return view('admin.team.form', ['profile' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'role'        => 'required|string|max:255',
            'bio'         => 'nullable|string|max:500',
            'testimonial' => 'nullable|string|max:1000',
            'photo'       => 'required|image|max:2048', 
        ]);

        $data['photo'] = $request->file('photo')->store('team', 'public');

        TeamProfile::create($data);

        return redirect()->route('team')->with('success', 'Team member added.');
    }

    public function edit(TeamProfile $profile)
    {
        return view('admin.team.form', compact('profile'));
    }

    public function update(Request $request, TeamProfile $profile)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'role'        => 'required|string|max:255',
            'bio'         => 'nullable|string|max:500',
            'testimonial' => 'nullable|string|max:1000',
            'photo'       => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $profile->update($data);

        return redirect()->route('team')->with('success', 'Team member updated.');
    }

    public function destroy(TeamProfile $profile)
    {
        if ($profile->photo) {
            Storage::disk('public')->delete($profile->photo);
        }

        $profile->delete();

        return back()->with('success', 'Team member removed.');
    }
}
