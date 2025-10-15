<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pcat;
use App\Models\Subcat;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('Pcat')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Pcat::where('status', 1)->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required', 
            'title' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Pcat::where('status', 1)->get();
        $subcategories = Subcat::where('cat_id', $product->cat_id)->where('status', 1)->get();
        return view('products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'cat_id' => 'required', 
            'title' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function getSubcategories($catId)
    {
        $subcategories = Subcat::where('cat_id', $catId)->where('status', 1)->get();
        return response()->json($subcategories);
    }
}

