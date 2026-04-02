<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessVehicleController extends Controller
{
   
 public function index()
{
    $vehicles = BusinessVehicle::all();
    return view('business_vehicle.index', compact('vehicles'));
}

    public function create()
    {
        return view('business_vechiles.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $vehicles= BusniessVehicles::find($id);
      return view( 'busniess_vehicles.edit',compact('vehicle '));
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business->delete();
        return redirect()->route('busniess.index')->with('sucess','Business Deleted Successfully.');
    }
  
}
