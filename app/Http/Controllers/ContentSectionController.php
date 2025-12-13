<?php

namespace App\Http\Controllers;

use App\Models\ContentSection;
use Illuminate\Http\Request;

class ContentSectionController extends Controller
{
    public function edit($id)
    {
        $section = ContentSection::findOrFail($id);
        return view('admin.content.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $section = ContentSection::findOrFail($id);
        $section->update([
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Content updated successfully.');
    }
}
