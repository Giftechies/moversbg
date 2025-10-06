<?php

namespace App\Http\Controllers;

use App\Models\Complication;
use Illuminate\Http\Request;

class ComplicationController extends Controller
{
    public function index()
    {
        $complications = Complication::all();
        return view('complications.index', compact('complications'));
    }

    public function create()
    {
        return view('complications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        Complication::create($request->all());
        return redirect()->route('complications.index')->with('success', 'Complication created successfully');
    }

    public function edit($id)
    {
        $complication = Complication::find($id);
        return view('complications.edit', compact('complication'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        $complication = Complication::find($id);
        $complication->update($request->all());
        return redirect()->route('complications.index')->with('success', 'Complication updated successfully');
    }

    public function destroy($id)
    {
        Complication::destroy($id);
        return redirect()->route('complications.index')->with('success', 'Complication deleted successfully');
    }
}

