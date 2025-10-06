<?php

namespace App\Http\Controllers;

use App\Models\ComplicationRate;
use Illuminate\Http\Request;

class ComplicationRateController extends Controller
{
    public function index()
    {
        $complicationRates = ComplicationRate::all();
        return view('complication_rates.index', compact('complicationRates'));
    }

    public function create()
    {
        return view('complication_rates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'rate' => 'required|numeric',
            'type' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        ComplicationRate::create($validated);
        return redirect()->route('complication_rates.index')->with('success', 'Complication Rate created successfully');
    }

    public function edit(ComplicationRate $complicationRate)
    {
        return view('complication_rates.edit', compact('complicationRate'));
    }

    public function update(Request $request, ComplicationRate $complicationRate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'rate' => 'required|numeric',
            'type' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        $complicationRate->update($validated);
        return redirect()->route('complication_rates.index')->with('success', 'Complication Rate updated successfully');
    }

    public function destroy(ComplicationRate $complicationRate)
    {
        $complicationRate->delete();
        return redirect()->route('complication_rates.index')->with('success', 'Complication Rate deleted successfully');
    }
}



