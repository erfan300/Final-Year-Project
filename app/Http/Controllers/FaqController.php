<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->orderBy('id')->get();
        return view('public.faq', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.form', ['faq' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:5000',
            'sort_order' => 'nullable|integer|min:0|max:100000',
        ]);

        Faq::create([
            'question' => $data['question'],
            'answer' => $data['answer'],
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('faq')->with('success', 'FAQ added.');
    }

    public function edit(Faq $faq)
    {
        abort_unless(session()->has('admin_id'), 403);
        return view('admin.faqs.form', compact('faq'));
    }

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

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq')->with('success', 'FAQ deleted.');
    }
}