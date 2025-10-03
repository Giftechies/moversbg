<?php


namespace App\Http\Controllers;

use App\Models\Subcat;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcat::with('category')->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('cat_status', 1)->get();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required',
            'title' => 'required',
            'status' => 'required|in:0,1',
        ]);

        Subcat::create($request->all());
        return redirect()->route('subcategories.index')->with('success', 'SubCategory created successfully.');
    }

    public function edit(Subcat $subcategory)
    {
        $categories = Category::where('cat_status', 1)->get();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcat $subcategory)
    {
        $request->validate([
            'cat_id' => 'required',
            'title' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $subcategory->update($request->all());
        return redirect()->route('subcategories.index')->with('success', 'SubCategory updated successfully.');
    }

    public function destroy(Subcat $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'SubCategory deleted successfully.');
    }
}