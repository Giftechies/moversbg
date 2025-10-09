<?php
namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::all();
        return view('property_types.index', compact('propertyTypes'));
    }

    public function create()
    {
        return view('property_types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            
            'status' => 'required|boolean',
        ]);

        PropertyType::create($request->all());
        return redirect()->route('property_types.index')->with('success', 'Property Type created successfully');
    }

    // public function edit($id)
    // {
    //     $propertyType = PropertyType::find($id);
    //     return view('property_types.edit', compact('propertyType'));
    // }
    public function edit($id)
    {
        // Find the property type by ID or throw 404
        $propertyType = PropertyType::findOrFail($id);

        // Pass the model to the Blade view
        return view('property_types.edit', compact('propertyType'));
    }

    // public function update(Request $request, $id)
    // {
    //     $propertyType = $request->validate([
    //         'name' => 'required|string|max:100',
    //         'status' => 'required|boolean',
    //     ]);
    //       $propertyType= PropertyTypes::find($id);
    //     $propertyType->update($request->all());
    //     return redirect()->route('property_types.index')->with('success', 'Property Type updated successfully');
    // }
     public function update(Request $request, $id)
    {
    
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|boolean',
            'icon' => 'nullable|string|max:255',
        ]);


        $propertyType = PropertyType::find($id);
        $propertyType->update($validated);
        return redirect()->route('property_types.index')->with('success', 'Property Type updated successfully');
    }



    public function destroy($id)
    {
        PropertyType::destroy($id);
        return redirect()->route('property_types.index')->with('success', 'Property Type deleted successfully');
    }
}
