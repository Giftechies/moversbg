<?php
namespace App\Http\Controllers\Api; 

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('Pcat')->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('Pcat')->find($id);
        return response()->json($product);
    }
}
