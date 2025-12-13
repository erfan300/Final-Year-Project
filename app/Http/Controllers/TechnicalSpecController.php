<?php

namespace App\Http\Controllers;

use App\Models\TechnicalSpec;
use Illuminate\Http\Request;

class TechnicalSpecController extends Controller
{
    public function create()
    {
        return view('admin.specs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'spec_name' => 'required|string|max:255',
            'spec_value' => 'required|string',
        ]);

        TechnicalSpec::create($request->only(['spec_name', 'spec_value']));
        return back()->with('success', 'Spec added.');
    }

    public function edit($id)
    {
        $spec = TechnicalSpec::findOrFail($id);
        return view('admin.specs.edit', compact('spec'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'spec_name' => 'required|string|max:255',
            'spec_value' => 'required|string',
        ]);

        $spec = TechnicalSpec::findOrFail($id);
        $spec->update($request->only(['spec_name', 'spec_value']));

        return back()->with('success', 'Spec updated.');
    }

    public function destroy($id)
    {
        TechnicalSpec::findOrFail($id)->delete();
        return back()->with('success', 'Spec deleted.');
    }
}
