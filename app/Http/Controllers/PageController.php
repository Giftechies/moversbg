<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    
    public function index()
    {
        $pages = Page::with("parentPage")->orderBy('id', 'desc')->get();
        return view('pages.index', compact('pages'));
    }

    // Show create form
    public function create()
    {
        $parents = Page::orderBy('title', 'asc')->get();
        return view('pages.create', compact('parents'));
    }

    // Store new page
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string', 
            'status' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $content = $request->input('description');
        $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $allowedTags = '<p><strong><em><ul><ol><li><br><h1><h2><h3>';
        $content = strip_tags($content, $allowedTags);
        $content = trim($content); 

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pages'), $imageName);
            $imagePath = 'uploads/pages/' . $imageName;
        }

        Page::create([
            'title' => $request->title,
            'description' => $content, 
            'status' => $request->status,
            'summary' => $request->summary,
            'show_map' => $request->has('show_map'),
            'show_process' => $request->has('show_process'),
            'show_faq' => $request->has('show_faq'),
            'parent' => $request->parent,
              'image' => $imagePath,
            'slug' => $this->generateUniqueSlug($request->title),
        ]);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $parents = Page::where('id', '!=', $id)
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
            'summary' => 'nullable|string',
            'parent' => 'nullable|integer',
          'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);
             $content = html_entity_decode($request->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $allowedTags = '<p><strong><em><ul><ol><li><br><h1><h2><h3>';
        $content = strip_tags($content, $allowedTags);
        $content = trim($content);

        $imagePath = $page->image;
        if ($request->hasFile('image')) {
            if ($page->image && file_exists(public_path($page->image))) {
                unlink(public_path($page->image)); // delete old image
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pages'), $imageName);
            $imagePath = 'uploads/pages/' . $imageName;
        }
        
        $page->update([
            'title' => $request->title,
            'description' => $request->description, 
            'status' => $request->status,
            'summary' => $request->summary,
            'show_map' => $request->has('show_map'),
            'show_process' => $request->has('show_process'),
            'show_faq' => $request->has('show_faq'),
            'parent' => $request->parent,
                'image' => $imagePath,
            'slug' => $this->generateUniqueSlug($request->title, $id),
        ]);

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    // Delete page
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
           if ($page->image && file_exists(public_path($page->image))) {
            unlink(public_path($page->image)); 
        }

        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }

       private function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $count = Page::where('slug', $slug)
            ->when($id, fn($query) => $query->where('id', '!=', $id))
            ->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        return $slug;
    }

}
