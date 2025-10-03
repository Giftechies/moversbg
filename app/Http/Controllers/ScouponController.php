<?php
namespace App\Http\Controllers;

use App\Models\Scoupon;
use Illuminate\Http\Request;

class ScouponController extends Controller
{
    public function index()
    {
        $scoupons = Scoupon::all();
        return view('scoupons.index', compact('scoupons'));
    }

    public function create()
    {
        return view('scoupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'c_title' => 'required',
            'c_value' => 'required',
            'status' => 'required|in:0,1',
            'c_img' => 'nullable|image',
            // Add other validation rules as needed
        ]);

        $data = $request->all();
        if ($request->hasFile('c_img')) {
            $data['c_img'] = $request->file('c_img')->store('scoupons');
        }

        Scoupon::create($data);
        return redirect()->route('scoupons.index')->with('success', 'Scoupon created successfully.');
    }

    public function edit(Scoupon $scoupon)
    {
        return view('scoupons.edit', compact('scoupon'));
    }

    public function update(Request $request, Scoupon $scoupon)
    {
        $request->validate([
            'c_title' => 'required',
            'c_value' => 'required',
            'status' => 'required|in:0,1',
            'c_img' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('c_img')) {
            $data['c_img'] = $request->file('c_img')->store('scoupons');
        }

        $scoupon->update($data);
        return redirect()->route('scoupons.index')->with('success', 'Scoupon updated successfully.');
    }

    public function destroy(Scoupon $scoupon)
    {
        $scoupon->delete();
        return redirect()->route('scoupons.index')->with('success', 'Scoupon deleted successfully.');
    }
} 