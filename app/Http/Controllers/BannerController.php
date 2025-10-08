<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

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
        // Upload image to public/images/banner
        $uploadedFile = $request->file('cat_img');
        // Generate a unique file name
        $fileName = Str::uuid() . '.webp';
        // Define destination path inside /public/images
        $destinationPath = public_path('images/banner/' . $fileName);
         Image::read($uploadedFile)
        ->encodeByExtension('webp', quality: 90)
        ->save($destinationPath);
        // Read, convert, and save as WebP (quality 90)   
        // Get public URL
        $url = asset('images/banner/' . $fileName); 
        $banner->img =  $url;
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
            // Delete old image
            if ($banner->img && file_exists(public_path($banner->img))) {
                unlink(public_path($banner->img));
            }

            // Upload new image
            $image = $request->file('cat_img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/banner'), $imageName);
            $banner->img = 'images/banner/'.$imageName;
        }

        $banner->status = $request->input('status');
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        // Delete image file
        if ($banner->img && file_exists(public_path($banner->img))) {
            unlink(public_path($banner->img));
        }

        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
    }
}
