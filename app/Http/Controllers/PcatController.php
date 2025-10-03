<?php
namespace App\Http\Controllers;

use App\Models\Pcat;
use Illuminate\Http\Request;

class PcatController extends Controller
{
    public function index()
    {
        $pcats = Pcat::all();
        return view('pcats.index', compact('pcats'));
    }

    public function create()
    {
        return view('pcats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
        ]);

        Pcat::create($request->all());
        return redirect()->route('pcats.index')->with('success', 'Category created successfully.');
    }

    public function edit(Pcat $pcat)
    {
        return view('pcats.edit', compact('pcat'));
    }

    public function update(Request $request, Pcat $pcat)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $pcat->update($request->all());
        return redirect()->route('pcats.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Pcat $pcat)
    {
        $pcat->delete();
        return redirect()->route('pcats.index')->with('success', 'Category deleted successfully.');
    }
}
