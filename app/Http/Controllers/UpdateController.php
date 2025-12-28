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
        return redirect()->route('updates')->with('success', 'Update added successfully');
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
        return redirect()->route('updates')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        Update::findOrFail($id)->delete();
        return redirect()->route('updates')->with('success', 'Deleted successfully');
    }
}
