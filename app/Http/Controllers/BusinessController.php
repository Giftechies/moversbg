<?php
namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
    public function index()
    {
        $business = Business::with('zone')->get();
        return view('business.index', compact('business'));
    }

    public function create()
    {
        $zones = Zone::where('status', 1)->get();
        return view('business.create', compact('zones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tbl_business,email',
            'password' => 'required',
            'mobile' => 'required',
            'status' => 'required|in:0,1',
           // 'zone_id' => 'required',
            'img' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('business');
        }

        Business::create($data);
        return redirect()->route('business.index')->with('success', 'Business Created Successfully.');
    }

    public function edit(Business $business)
    {
        $zones = Zone::where('status', 1)->get();
        return view('business.edit', compact('business', 'zones'));
    }

    public function update(Request $request, Business $business)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tbl_business,email,' . $business->id,
            'mobile' => 'required',
            'status' => 'required|in:0,1',
           //'zone_id' => 'required',
            'img' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('business');
        }
        if ($request->filled('password')) {
            $data['password'] = $request->input('password');
        } else {
            unset($data['password']);
        }

        $business->update($data);
        return redirect()->route('business.index')->with('success', 'Business Updated Successfully.');
    }

    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('business.index')->with('success', 'Business Deleted Successfully.');
    }
}

