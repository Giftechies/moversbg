<?php

namespace App\Http\Controllers;

use App\Models\ExtraCharge;
use Illuminate\Http\Request;

class ExtraChargeController extends Controller
{
    // Show all charges
    public function index()
    {
        $charges = ExtraCharge::all();
        return view('extra_charges.index', compact('charges'));
    }

    // Show form to create
    public function create()
    {
        return view('extra_charges.create');
    }

    // Store new charge
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0' 
        ]);

        ExtraCharge::create([
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'is_enabled' => $request->is_enabled,
        ]);

        return redirect()->route('extra-charges.index')->with('success', 'Extra charge created successfully.');
    }

    // Edit form
    public function edit(ExtraCharge $extraCharge)
    {
        return view('extra_charges.edit', compact('extraCharge'));
    }

    // Update charge
    public function update(Request $request, ExtraCharge $extraCharge)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0'
        ]);

        $extraCharge->update([
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'is_enabled' => $request->is_enabled,
        ]);

        return redirect()->route('extra-charges.index')->with('success', 'Extra charge updated successfully.');
    }

    // Delete
    public function destroy(ExtraCharge $extraCharge)
    {
        $extraCharge->delete();
        return redirect()->route('extra-charges.index')->with('success', 'Extra charge deleted successfully.');
    }

    // Toggle enable/disable
    public function toggle(ExtraCharge $extraCharge)
    {
        $extraCharge->update(['is_enabled' => !$extraCharge->is_enabled]);
        return redirect()->route('extra-charges.index')->with('success', 'Charge status updated.');
    }
}
