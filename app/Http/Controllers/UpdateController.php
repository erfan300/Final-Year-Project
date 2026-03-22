<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    // Displaying create form
    public function create()
    {
        return view('admin.updates.form', ['update' => null]);
    }

    // Storing record
    public function store(Request $request)
    {
        // Validating inputs
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:2000',
            'image' => 'nullable|image|max:5120',
        ]);

        $update = new Update();
        $update->title = $data['title'];
        $update->body = $data['body'];

        // Storing the optional image and saving its path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('updates', 'public');
            $update->image_path = $path;
        }

        $update->save();

        return redirect()->route('updates')->with('success', 'Update added successfully');
    }

    // Displaying edit form
    public function edit($id)
    {
        $update = Update::findOrFail($id);
        return view('admin.updates.form', compact('update'));
    }

    // Updating record with optional image removal 
    public function update(Request $request, $id)
    {
        $update = Update::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:2000',
            'image' => 'nullable|image|max:5120',
            'remove_image' => 'nullable|boolean',
        ]);

        $update->title = $data['title'];
        $update->body = $data['body'];

        // If image selected to be removed - clean up storage and clear DB column
        if ($request->boolean('remove_image') && $update->image_path) {
            if (Storage::disk('public')->exists($update->image_path)) {
                Storage::disk('public')->delete($update->image_path);
            }
            $update->image_path = null;
        }

        // If new image selected, replace the existing one
        if ($request->hasFile('image')) {
            if ($update->image_path && Storage::disk('public')->exists($update->image_path)) {
                Storage::disk('public')->delete($update->image_path);
            }

            $path = $request->file('image')->store('updates', 'public');
            $update->image_path = $path;
        }

        $update->save();

        return redirect()->route('updates')->with('success', 'Updated successfully');
    }

    // Deleting record
    public function destroy($id)
    {
        $update = Update::findOrFail($id);

        // Storage clean up
        if ($update->image_path && Storage::disk('public')->exists($update->image_path)) {
            Storage::disk('public')->delete($update->image_path);
        }

        $update->delete();

        return redirect()->route('updates')->with('success', 'Deleted successfully');
    }
}
