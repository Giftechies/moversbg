<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    // List all pages
    public function index()
    {
        $pages = Page::with("parentPage")->orderBy('id', 'desc')->get();
        return view('pages.index', compact('pages'));
    }

    // Show create form
    public function create()
    {
        $parents = \App\Models\Page::orderBy('title', 'asc')->get();
        return view('pages.create', compact('parents'));
    }

    // Store new page
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string', 
            'status' => 'required|integer',
        ]);

        Page::create([
            'title' => $request->title,
            'description' => $request->description, 
            'status' => $request->status,
            'summary' => $request->summary,
            'show_map' => $request->has('show_map'),
            'show_process' => $request->has('show_process'),
            'show_faq' => $request->has('show_faq'),
            'parent' => $request->parent,
            'slug' => $this->generateUniqueSlug($request->title),
        ]);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $page = \App\Models\Page::findOrFail($id);
        $parents = \App\Models\Page::where('id', '!=', $id)
            ->orderBy('title', 'asc')
            ->get();
        return view('pages.edit', compact('page', 'parents'));
    }

    // Update page
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string', 
            'status' => 'required|integer',
        ]);

        $page->update([
            'title' => $request->title,
            'description' => $request->description, 
            'status' => $request->status,
            'summary' => $request->summary,
            'show_map' => $request->has('show_map'),
            'show_process' => $request->has('show_process'),
            'show_faq' => $request->has('show_faq'),
            'parent' => $request->parent,
            'slug' => $this->generateUniqueSlug($request->title, $id),
        ]);

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    // Delete page
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }

    private function generateUniqueSlug($title, $id = null)
    {
        // Convert title to basic slug
        $slug = \Str::slug($title);

        // Check if slug already exists
        $count = \App\Models\Page::where('slug', $slug)
            ->when($id, function ($query, $id) {
                return $query->where('id', '!=', $id);
            })
            ->count();

        // If duplicate exists, append a number
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        return $slug;
    }
}
