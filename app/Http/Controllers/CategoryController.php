<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
            'cat_img' => 'required|image|mimes:jpg,png,jpeg',
            'status' => 'required',
        ]);

        $imageName = time().'.'.$request->cat_img->extension();
        $request->cat_img->move(public_path('images/category'), $imageName);
        $imagePath = 'images/category/'.$imageName;

        Category::create([
            'cat_name' => $request->cat_name,
            'cat_img' => $imagePath,
            'cat_status' => $request->status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.create_edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'cat_name' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'cat_name' => $request->cat_name,
            'cat_status' => $request->status,
        ];

        if ($request->hasFile('cat_img')) {
            $request->validate([
                'cat_img' => 'image|mimes:jpg,png,jpeg',
            ]);
            if (File::exists(public_path($category->cat_img))) {
                File::delete(public_path($category->cat_img));
            }
            $imageName = time().'.'.$request->cat_img->extension();
            $request->cat_img->move(public_path('images/category'), $imageName);
            $data['cat_img'] = 'images/category/'.$imageName;
        }

        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            if (File::exists(public_path($category->cat_img))) {
                File::delete(public_path($category->cat_img));
            }
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        }
        return redirect()->route('categories.index')->with('error', 'Category not found');
    }
}