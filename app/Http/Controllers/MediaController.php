<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'event_name' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'file' => 'required|image|max:4096',
        ]);

        $path = $request->file('file')->store('media', 'public');

        MediaItem::create([
            'title' => $request->title,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'file_path' => $path,
        ]);

        return back()->with('success', 'Media added.');
    }

    public function edit($id)
    {
        $item = MediaItem::findOrFail($id);
        return view('admin.media.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'event_name' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'file' => 'nullable|image|max:4096',
        ]);

        $item = MediaItem::findOrFail($id);

        $data = $request->only(['title', 'event_name', 'event_date']);

        if ($request->hasFile('file')) {
            if ($item->file_path) Storage::disk('public')->delete($item->file_path);
            $data['file_path'] = $request->file('file')->store('media', 'public');
        }

        $item->update($data);

        return back()->with('success', 'Media updated.');
    }

    public function destroy($id)
    {
        $item = MediaItem::findOrFail($id);
        if ($item->file_path) Storage::disk('public')->delete($item->file_path);
        $item->delete();

        return back()->with('success', 'Media deleted.');
    }
}
