<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Displaying FAQs in order by ID
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->orderBy('id')->get();
        return view('public.faq', compact('faqs'));
    }

    // Displaying create form
    public function create()
    {
        return view('admin.faqs.form', ['faq' => null]);
    }

    // Storing a new entry in DB
    public function store(Request $request)
    {
        // Validating inputs
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:5000',
            'sort_order' => 'nullable|integer|min:0|max:100000',
        ]);

        // Saving to DB, default sort order to 0 if not set previously
        Faq::create([
            'question' => $data['question'],
            'answer' => $data['answer'],
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('faq')->with('success', 'FAQ added.');
    }

    // Displaying edit form
    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', compact('faq'));
    }

    // Updating existing record
    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000',
            'sort_order' => 'nullable|integer|min:0|max:20',
        ]);

        $faq->update([
            'question' => $data['question'],
            'answer' => $data['answer'],
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('faq')->with('success', 'FAQ updated.');
    }

    // Deleting existing record
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq')->with('success', 'FAQ deleted.');
    }
}