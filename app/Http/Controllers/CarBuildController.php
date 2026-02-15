<?php

namespace App\Http\Controllers;

use App\Models\CarBuild;
use Illuminate\Http\Request;

class CarBuildController extends Controller
{
    // Displaying create form
    public function create()
    {
        return view('admin.builds.form', ['build' => null]);
    }

    // Storing a new entry in DB
    public function store(Request $request)
    {
        // Validating inputs
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'image' => 'required|image|max:5120',
            'top_speed' => 'required|integer|min:0|max:999',
            'weight'    => 'required|integer|min:0|max:999',
            'power'     => 'required|integer|min:0|max:999',
            'engine' => 'required|string|max:255',
            'chassis' => 'required|string|max:255',
            'highlights' => 'nullable|string|max:2000',
        ]);

        // Creating a new model instance using the validated inputs
        $build = new CarBuild();
        $build->fill($data);

        // Storing the image file to be displayed
        $path = $request->file('image')->store('car_builds', 'public');
        $build->image_path = $path;

        // Removing image from data to avoid saving the raw file upload to the DB
        unset($data['image']);
        
        // Filling the (nullable/required) fields to save to DB
        $build->fill($data);
        $build->save();

        return redirect()->route('specs')->with('success', 'Build created.');
    }

    // Dispalying edit form with existing record
    public function edit(CarBuild $build)
    {
        return view('admin.builds.form', compact('build'));
    }

    public function update(Request $request, CarBuild $build)
    {
        // Validating inputs
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2026',
            'image' => 'nullable|image|max:5120',
            'top_speed' => 'required|integer|min:0|max:999',
            'weight'    => 'required|integer|min:0|max:999',
            'power'     => 'required|integer|min:0|max:999',
            'engine' => 'required|string|max:255',
            'chassis' => 'required|string|max:255',
            'highlights' => 'nullable|string|max:2000',
        ]);

        // If new image selected, store it and update path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('car_builds', 'public');
            $build->image_path = $path;
        }

        unset($data['image']);
        $build->fill($data);
        $build->save();

        return redirect()->route('specs')->with('success', 'Build updated.');
    }

    // Deleting record
    public function destroy(CarBuild $build)
    {
        $build->delete();
        return redirect()->route('specs')->with('success', 'Build deleted.');
    }
}
