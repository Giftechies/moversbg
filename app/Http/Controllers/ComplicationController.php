<?php

namespace App\Http\Controllers;

use App\Models\Complication;
use Illuminate\Http\Request;

class ComplicationController extends Controller
{
    public function index()
    {
        $complications = Complication::all();
        return view('variations.index', compact('complications'));
    }

    public function create()
    {
        return view('variations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        Complication::create($request->all());
        return redirect()->route('variations.index')->with('success', 'variations created successfully');
    }

    public function edit($id)
    {
        $complication = Complication::find($id);
        return view('variations.edit', compact('complications'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        $complication = Complication::find($id);
        $complication->update($request->all());
        return redirect()->route('variations.index')->with('success', 'variations updated successfully');
    }

    public function destroy($id)
    {
        Complication::destroy($id);
        return redirect()->route('variations.index')->with('success', 'variations deleted successfully');
    }
}

