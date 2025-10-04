<?php
namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\Vehicle;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riders = Rider::all();
        return view('riders.index', compact('riders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        $zones = Zone::all();
        return view('riders.create', compact('vehicles', 'zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation and store logic here
        $rider = new Rider();
        // ...
        $rider->save();
        return redirect()->route('riders.index')->with('success', 'Rider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Not needed for this example
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rider = Rider::find($id);
        $vehicles = Vehicle::all();
        $zones = Zone::all();
        return view('riders.edit', compact('rider', 'vehicles', 'zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation and update logic here
        $rider = Rider::find($id);
        // ...
        $rider->save();
        return redirect()->route('riders.index')->with('success', 'Rider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rider::destroy($id);
        return redirect()->route('riders.index')->with('success', 'Rider deleted successfully');
    }
}