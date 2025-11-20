<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\Vehicle;
use App\Models\Zone;
use Illuminate\Http\Request;
use Auth;

class RiderController extends Controller
{
  
    public function index()
    {
        $auth = Auth::user();
        $business_id =  $auth->business_id;
        $riders = Rider::where('business_id', $business_id)->get();
        return view('riders.index', compact('riders'));
    }


    public function create()
    {        
        return view('riders.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'driving_license_number' => 'required', 
            'email' => 'required|email|unique:tbl_rider,email',
            'password' => 'required|string|min:6', 
            'mobile' => 'required|numeric' 
        ]);
        $auth = Auth::user();
        $rider = new Rider();
        $rider->name = $request->input('name');
        if(!empty($request->file('rimg'))){
            $image = $request->file('rimg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/riders'), $imageName);
            $rider->rimg = 'images/riders/' . $imageName;
        }
        if(!empty($request->file('driving_license'))){
            $image = $request->file('driving_license');
            $imageName = time() . 'dl.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/riders'), $imageName);
            $rider->dl = 'images/riders/' . $imageName;
        }
        $rider->dl_exp_date = $request->input('exp_date');   
        $rider->lcode = $request->input('driving_license_number');
        $rider->full_address = $request->input('full_address');
        $rider->pincode = $request->input('pincode'); 
        $rider->email = $request->input('email');

        
        $rider->password = bcrypt($request->input('password'));

        $rider->rstatus = $request->input('rstatus');
        $rider->mobile = $request->input('mobile'); 
        $rider->business_id = $auth->business_id;  
        $rider->save();

       return redirect()->route('riders.index')->with('success', 'Rider created successfully.');
    }

 
    public function edit($id)
    {
        $auth = Auth::user();
        $business_id =  $auth->business_id;
        $rider = Rider::where('id', $id)->where('business_id', $business_id)->first();
        return view('riders.edit', compact('rider'));
    }

 
    public function update(Request $request, $id)
    {
        
      // -------------------
        // Validation rules
        // -------------------
        $request->validate([
             'name' => 'required', 
            'driving_license_number' => 'required', 
            'email' => 'required|email', 
            'mobile' => 'required|numeric',            
            'exp_date'            => 'required|date',
        ]);

        // -------------------
        // Find the rider and update
        // -------------------
        $rider = Rider::find($id); 
        $rider->name = $request->input('name');
        if(!empty($request->file('rimg'))){
            $image = $request->file('rimg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/riders'), $imageName);
            $rider->rimg = 'images/riders/' . $imageName;
        }
        if(!empty($request->file('driving_license'))){
            $image = $request->file('driving_license');
            $imageName = time() . 'dl.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/riders'), $imageName);
            $rider->dl = 'images/riders/' . $imageName;
        }
        $rider->dl_exp_date = $request->input('exp_date');   
        $rider->lcode = $request->input('driving_license_number');
        $rider->full_address = $request->input('full_address');
        $rider->pincode = $request->input('pincode'); 
        $rider->email = $request->input('email'); 

        $rider->rstatus = $request->input('rstatus');
        $rider->mobile = $request->input('mobile'); 

        // Optional password – only hash if provided
        if ($request->filled('password')) {
            $rider->password = bcrypt($request->input('password'));
        }
 
        // Save the changes
        $rider->save();
        return redirect()->route('riders.index')->with('success', 'Rider updated successfully.');
    }

   
    public function destroy($id)
    {
        $auth = Auth::user();
        $business_id =  $auth->business_id;
        $rider = Rider::where('id', $id)->where('business_id', $business_id); 
        $rider->delete();
        return redirect()->route('riders.index')->with('success', 'Rider deleted successfully.');
    }
}
