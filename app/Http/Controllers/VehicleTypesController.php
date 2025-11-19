<?php
namespace App\Http\Controllers;

use App\Models\VehicleTypes;
use Illuminate\Http\Request;

class VehicleTypesController extends Controller
{
    public function index()
    {
        $vehicles = VehicleTypes::all();
        return view('vehicle_types.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicle_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vtitle' => 'required',
            'cat_img' => 'required|image|mimes:jpg,png,jpeg',
            'ukms' => 'required',
            'uprice' => 'required',
            'aprice' => 'required',
            'ttime' => 'required',
            'status' => 'required',
            'capcity' => 'required',
            'size' => 'required',
            'cdesc' => 'required',
        ]);

        $vehicle = new VehicleTypes();
        $vehicle->title = $request->input('vtitle');
        $image = $request->file('cat_img');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/vehicles'), $imageName);
        $vehicle->img = 'images/vehicles/'.$imageName;
        
        $vehicle->ukms = $request->input('ukms');
        $vehicle->uprice = $request->input('uprice');
        $vehicle->aprice = $request->input('aprice');
        $vehicle->ttime = $request->input('ttime');
        $vehicle->status = $request->input('status');
        $vehicle->capcity = $request->input('capcity');
        $vehicle->size = $request->input('size');
        $vehicle->description = $request->input('cdesc');
        $vehicle->save();

        return redirect()->route('vehicleTypes.index')->with('success', 'Vehicle created successfully');
    }

    public function edit($id)
    {
        $vehicle = VehicleTypes::find($id);
        return view('vehicle_types.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vtitle' => 'required',
            'ukms' => 'required',
            'uprice' => 'required',
            'aprice' => 'required',
            'ttime' => 'required',
            'status' => 'required',
            'capcity' => 'required',
            'size' => 'required',
            'cdesc' => 'required',
        ]);

        $vehicle = VehicleTypes::find($id);
        $vehicle->title = $request->input('vtitle');
        if ($request->hasFile('cat_img')) 
            {
            $image = $request->file('cat_img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/vehicles'), $imageName);
            $vehicle->img = 'images/vehicles/'.$imageName;
        }
        $vehicle->ukms = $request->input('ukms');
        $vehicle->uprice = $request->input('uprice');
        $vehicle->aprice = $request->input('aprice');
        $vehicle->ttime = $request->input('ttime');
        $vehicle->status = $request->input('status');
        $vehicle->capcity = $request->input('capcity');
        $vehicle->size = $request->input('size');
        $vehicle->description = $request->input('cdesc');
        $vehicle->save();
        return redirect()->route('vehicleTypes.index')->with('success', 'Vehicle updated successfully');
    }

    public function destroy(VehicleTypes $vehicleType)
    {
        if ($vehicleType->vehicles()->exists()) {
            return back()->with('error', 'Cannot delete a type that still has vehicles.');
        }

        $vehicleType->delete();
        return back()->with('success', 'Vehicle type removed.');
    }
} 