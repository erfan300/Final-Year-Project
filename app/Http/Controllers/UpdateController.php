<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function create()
    {
        return view('admin.updates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
        ]);

        Update::create($request->all());
        return redirect()->back()->with('success', 'Added');
    }

    public function edit($id)
    {
        $update = Update::findOrFail($id);
        return view('admin.updates.edit', compact('update'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Update::findOrFail($id)->update($request->all());
        return back()->with('success', 'Updated');
    }

    public function destroy($id)
    {
        Update::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }
}
