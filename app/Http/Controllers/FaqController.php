<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Show all FAQs
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('faqs.index', compact('faqs'));
    }

    // Show create form
    public function create()
    {
        return view('faqs.create');
    }

    // Store new FAQ
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        Faq::create($request->only(['question', 'answer']));

        return redirect()->route('faqs.index')->with('success', 'FAQ added successfully.');
    }

    // Show edit form
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    // Update FAQ
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq->update($request->only(['question', 'answer']));

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    // Delete FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
