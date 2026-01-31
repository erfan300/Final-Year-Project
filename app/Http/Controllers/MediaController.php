<?php

namespace App\Http\Controllers;

use App\Models\MediaPost;
use App\Models\MediaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function create()
    {
        return view('admin.media.form', ['post' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:5000',
            'event_name' => 'nullable|string|max:255',
            'event_date' => 'nullable|date|after_or_equal:'.now()->subYears(10)->toDateString().'|before_or_equal:today',
            'files' => 'required|array|min:1',
            'files.*' => 'mimetypes:image/jpeg,image/png,image/webp,video/mp4,video/webm|max:20480',
        ]);

        $post = MediaPost::create([
            'title' => $data['title'] ?? null,
            'caption' => $data['caption'] ?? null,
            'event_name' => $data['event_name'] ?? null,
            'event_date' => $data['event_date'] ?? null,
        ]);

        foreach ($request->file('files') as $i => $file) {
            $path = $file->store('media', 'public');

            MediaItem::create([
                'media_post_id' => $post->id,
                'file_path' => $path,
                'sort_order' => $i,
            ]);
        }

        return redirect()->route('media')->with('success', 'Media post created.');
    }

    public function edit(MediaPost $post)
    {
        $post->load('items');
        return view('admin.media.form', compact('post'));
    }

    public function update(Request $request, MediaPost $post)
    {
        $data = $request->validate([
            'title'      => 'nullable|string|max:255',
            'caption'    => 'nullable|string|max:2000',
            'event_name' => 'nullable|string|max:255',
            'event_date' => 'nullable|date|after_or_equal:'.now()->subYears(10)->toDateString().'|before_or_equal:today',
            'file'     => 'nullable|array',
            'files.*' => 'mimetypes:image/jpeg,image/png,image/webp,video/mp4,video/webm|max:20480',
            'remove_items'   => 'nullable|array',
            'remove_items.*' => 'integer',
        ]);

        $post->update([
            'title'      => $data['title'] ?? null,
            'caption'    => $data['caption'] ?? null,
            'event_name' => $data['event_name'] ?? null,
            'event_date' => $data['event_date'] ?? null,
        ]);

        if (!empty($data['remove_items'])) {
            $items = $post->items()->whereIn('id', $data['remove_items'])->get();

            foreach ($items as $item) {
                if ($item->file_path && Storage::disk('public')->exists($item->file_path)) {
                    Storage::disk('public')->delete($item->file_path);
                }
                $item->delete();
            }
        }

        if ($request->hasFile('files')) {
            $currentMax = (int) $post->items()->max('sort_order');

            foreach ($request->file('files') as $i => $file) {
                $path = $file->store('media', 'public');

                MediaItem::create([
                    'media_post_id' => $post->id,
                    'file_path'     => $path,
                    'sort_order'    => $currentMax + 1 + $i,
                ]);
            }
        }

        return redirect()->route('media')->with('success', 'Media post updated.');
    }

    public function destroy(MediaPost $post)
    {
        $post->load('items');

        foreach ($post->items as $item) {
            if ($item->file_path && Storage::disk('public')->exists($item->file_path)) {
                Storage::disk('public')->delete($item->file_path);
            }
        }

        $post->delete();

        return redirect()->route('media')->with('success', 'Media post deleted.');
    }
}
