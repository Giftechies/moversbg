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

        PropertyType::create($validated);
        return redirect()->route('property_types.index')->with('success', 'Property Type created successfully');
    }

    public function edit(PropertyType $propertyType)
    {
        return view('property_types.edit', compact('propertyType'));
    }

    public function update(Request $request, PropertyType $propertyType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        $propertyType->update($validated);
        return redirect()->route('property_types.index')->with('success', 'Property Type updated successfully');
    }

    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return redirect()->route('property_types.index')->with('success', 'Property Type deleted successfully');
    }
}
