<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function create()
    {
        return view('admin.updates.form', ['update' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:2000',
            'image' => 'nullable|image|max:2048',
        ]);

        $update = new Update();
        $update->title = $data['title'];
        $update->body = $data['body'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('updates', 'public');
            $update->image_path = $path;
        }

        $update->save();

        return redirect()->route('updates')->with('success', 'Update added successfully');
    }

    public function edit($id)
    {
        $update = Update::findOrFail($id);
        return view('admin.updates.form', compact('update'));
    }

    public function update(Request $request, $id)
    {
        $update = Update::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:2000',
            'image' => 'nullable|image|max:2048',
            'remove_image' => 'nullable|boolean',
        ]);

        $update->title = $data['title'];
        $update->body = $data['body'];

        if ($request->boolean('remove_image') && $update->image_path) {
            if (Storage::disk('public')->exists($update->image_path)) {
                Storage::disk('public')->delete($update->image_path);
            }
            $update->image_path = null;
        }

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

    public function destroy($id)
    {
        $update = Update::findOrFail($id);

        if ($update->image_path && Storage::disk('public')->exists($update->image_path)) {
            Storage::disk('public')->delete($update->image_path);
        }

        $update->delete();

        return redirect()->route('updates')->with('success', 'Deleted successfully');
    }
}
