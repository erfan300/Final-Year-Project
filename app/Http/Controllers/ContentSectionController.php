<?php

namespace App\Http\Controllers;

use App\Models\ContentSection;
use Illuminate\Http\Request;

class ContentSectionController extends Controller
{
    // Displaying edit form
    public function edit($id)
    {
        $content = ContentSection::findOrFail($id);

        return view('admin.content.form', [
            'content' => $content,
            'section_key' => $content->section_key,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validating inputs
        $request->validate([
            'content' => ['required', 'string'],
        ]);

        // Updating only required field from said section
        $section = ContentSection::findOrFail($id);
        $section->update([
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Content updated successfully.');
    }

    // Displaying create form
    public function create(Request $request)
    {
        return view('admin.content.form', [
            'section_key' => $request->get('section'),
            'content' => null
        ]);
    }

    // Storing a new entry in DB
    public function store(Request $request)
    {
        $request->validate([
            'section_key' => ['required', 'string'],
            'content'     => ['required', 'string', 'max:2000'],
        ]);

        ContentSection::create([
            'section_key' => $request->section_key,
            'content'     => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Content created successfully.');
    }
}