<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\Vehicle;
use App\Models\Zone;
use Illuminate\Http\Request;

class RiderController extends Controller
{
  
    public function index()
    {
        $riders = Rider::with(['vehicle', 'zone'])->get();
        return view('riders.index', compact('riders'));
    }


    public function create()
    {
        $vehicles = Vehicle::all();
        $zones = Zone::all();
        return view('riders.create', compact('vehicles', 'zones'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'rimg' => 'required|image|mimes:jpg,png,jpeg',
            // 'status' => 'required',
            // 'rate' => 'required',
            // 'lcode' => 'required',
            // 'full_address' => 'required',
            // 'pincode' => 'required',
            // 'landmark' => 'nullable',
            // 'commission' => 'required',
            // 'bank_name' => 'nullable',
            // 'ifsc' => 'nullable',
            // 'receipt_name' => 'nullable',
            // 'acc_number' => 'nullable',
            // 'paypal_id' => 'nullable',
            // 'upi_id' => 'nullable',
            // 'email' => 'required|email|unique:tbl_rider,email',
            // 'password' => 'required|string|min:6',
            // 'rstatus' => 'required',
            // 'mobile' => 'required|numeric|max:10',
            // 'dzone' => 'required|numeric',
            // 'vehiid' => 'required|numeric',
        ]);

        $rider = new Rider();
        $rider->title = $request->input('title');
        $image = $request->file('rimg');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/riders'), $imageName);
        $rider->rimg = 'images/riders/' . $imageName;

        $rider->status = $request->input('status');
        $rider->rate = $request->input('rate');
        $rider->lcode = $request->input('lcode');
        $rider->full_address = $request->input('full_address');
        $rider->pincode = $request->input('pincode');
        $rider->landmark = $request->input('landmark');
        $rider->commission = $request->input('commission');
        $rider->bank_name = $request->input('bank_name');
        $rider->ifsc = $request->input('ifsc');
        $rider->receipt_name = $request->input('receipt_name');
        $rider->acc_number = $request->input('acc_number');
        $rider->paypal_id = $request->input('paypal_id');
        $rider->upi_id = $request->input('upi_id');
        $rider->email = $request->input('email');

        
        $rider->password = bcrypt($request->input('password'));

        $rider->rstatus = $request->input('rstatus');
        $rider->mobile = $request->input('mobile');
    
        $rider->dzone = $request->input('dzone');
        $rider->vehiid = $request->input('vehiid');

        $rider->save();

       return redirect()->route('riders.index')->with('success', 'Rider created successfully.');
    }

 
    public function edit($id)
    {
        $rider = Rider::find($id);
        $vehicles = Vehicle::all();
        $zones = Zone::all();
        return view('riders.edit', compact('rider', 'vehicles', 'zones'));
    }

 
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required',
            // 'status' => 'required',
            // 'rate' => 'required',
            // 'lcode' => 'required',
            // 'full_address' => 'required',
            // 'pincode' => 'required',
            // 'landmark' => 'nullable',
            // 'commission' => 'required',
            // 'bank_name' => 'nullable',
            // 'ifsc' => 'required',
            // 'receipt_name' => 'nullable|string',
            // 'acc_number' => 'nullable|string',
            // 'paypal_id' => 'nullable|string',
            // 'upi_id' => 'nullable|string',
            // 'email' => 'required',
            // 'rstatus' => 'required',
            // 'mobile' => 'required|numeric|max:10',
            
            // 'dzone' => 'required',
            // 'vehiid' => 'required',
        ]);

        $rider = Rider::find($id);
        $rider->title = $request->input('title');
        if ($request->hasFile('rimg')) 
            {
            $image = $request->file('rimg');
            $imageName = time(). '.'. $image->getClientOriginalExtension();
            $image->move(public_path('images/riders'), $imageName);
            $rider->rimg = 'images/riders/'. $imageName;
        }

        $rider->status = $request->input('status');
        $rider->rate = $request->input('rate');
        $rider->lcode = $request->input('lcode');
        $rider->full_address = $request->input('full_address');
        $rider->pincode = $request->input('pincode');
        $rider->landmark = $request->input('landmark');
        $rider->commission = $request->input('commission');
        $rider->bank_name = $request->input('bank_name');
        $rider->ifsc = $request->input('ifsc');
        $rider->receipt_name = $request->input('receipt_name');
        $rider->acc_number = $request->input('acc_number');
        $rider->paypal_id = $request->input('paypal_id');
        $rider->upi_id = $request->input('upi_id');
        $rider->email = $request->input('email');

        if ($request->filled('password')) {
            $rider->password = bcrypt($request->input('password'));
        }

        $rider->rstatus = $request->input('rstatus');
        $rider->mobile = $request->input('mobile');
        $rider->accept = $request->input('accept');
        $rider->reject = $request->input('reject');
        $rider->complete = $request->input('complete');
        $rider->dzone = $request->input('dzone');
        $rider->vehiid = $request->input('vehiid');

        $rider->save();

        return redirect()->route('riders.index')->with('success', 'Rider updated successfully.');
    }

   
    public function destroy($id)
    {
        $rider = Rider::find($id);
        $rider->delete();
        return redirect()->route('riders.index')->with('success', 'Rider deleted successfully.');
    }
}
