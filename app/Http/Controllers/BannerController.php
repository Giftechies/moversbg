<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_img' => 'required|image|mimes:jpg,png,jpeg',
            'status' => 'required',
        ]);

        $banner = new Banner();
        $banner->img = $request->file('cat_img')->store('images/banner');
        $banner->status = $request->input('status');
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner created successfully');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $banner = Banner::find($id);
        if ($request->hasFile('cat_img')) {
            $banner->img = $request->file('cat_img')->store('images/banner');
        }
        $banner->status = $request->input('status');
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    public function destroy($id)
    {
        Banner::destroy($id);
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
    }
}
