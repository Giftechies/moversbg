<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleTypes;
use Illuminate\Http\Request;
use Auth;

class VehicleController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $business_id =  $auth->business_id;
        $vehicles = Vehicle::with('type')->where('business_id', $business_id)->latest()->paginate(15);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $types = VehicleTypes::orderBy('title')->get();
        return view('vehicles.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type_id'        => 'required|exists:tbl_vehicle_types,id',
            'registration_no'=> 'required|string|max:20|unique:vehicles',
            'make'           => 'required|string|max:50',
            'model'          => 'required|string|max:50',
             'year' => 'required|digits:4|integer|between:1901,2155',
            'status'         => 'in:available,in-use,maintenance',
        ]);
        $auth = Auth::user();
        $data['business_id'] =  $auth->business_id; 
        Vehicle::create($data);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle added.');
    }

    public function edit(Vehicle $vehicle)
    {
        $types = VehicleTypes::orderBy('title')->get();
        return view('vehicles.edit', compact('vehicle', 'types'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'type_id'        => 'required|exists:tbl_vehicle_types,id',
            'registration_no'=> 'required|string|max:20|unique:vehicles,registration_no,'.$vehicle->id,
            'make'           => 'required|string|max:50',
            'model'          => 'required|string|max:50',
            'year'           => 'required|digits:4|integer', 
            'status'         => 'in:available,in-use,maintenance',
        ]);

        $vehicle->update($data);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return back()->with('success', 'Vehicle removed.');
    }

    // Returns JSON list of vehicle types for dropdown (useful for AJAX)
    public function types()
    {
        return VehicleTypes::orderBy('title')->get(['id', 'name']);
    }
}

