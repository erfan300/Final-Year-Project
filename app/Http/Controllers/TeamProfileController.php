<?php

namespace App\Http\Controllers;

use App\Models\TeamProfile;
use Illuminate\Http\Request;

class TeamProfileController extends Controller
{
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'testimonial' => 'nullable|string',
        ]);

        TeamProfile::create($request->only(['name','role','bio','testimonial']));
        return back()->with('success', 'Team profile added.');
    }

    public function edit($id)
    {
        $profile = TeamProfile::findOrFail($id);
        return view('admin.team.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'testimonial' => 'nullable|string',
        ]);

        $profile = TeamProfile::findOrFail($id);
        $profile->update($request->only(['name','role','bio','testimonial']));

        return back()->with('success', 'Team profile updated.');
    }

    public function destroy($id)
    {
        TeamProfile::findOrFail($id)->delete();
        return back()->with('success', 'Team profile deleted.');
    }
}