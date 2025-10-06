<?php
namespace App\Http\Controllers;

use App\Models\MoveType;
use Illuminate\Http\Request;

class MoveTypeController extends Controller
{
    public function index()
    {
        $moveTypes = MoveType::all();
        return view('move_types.index', compact('moveTypes'));
    }

    public function create()
    {
        return view('move_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        MoveType::create($request->all());
        return redirect()->route('move_types.index')->with('success', 'Move Type created successfully');
    }

    public function edit($id)
    {
        $moveType = MoveType::find($id);
        return view('move_types.edit', compact('moveType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        $moveType = MoveType::find($id);
        $moveType->update($request->all());
        return redirect()->route('move_types.index')->with('success', 'Move Type updated successfully');
    }

    public function destroy($id)
    {
        MoveType::destroy($id);
        return redirect()->route('move_types.index')->with('success', 'Move Type deleted successfully');
    }
}


