<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index()
    {
        $codes = Code::all();
        return view('codes.index', compact('codes'));
    }

    public function create()
    {
        return view('codes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ccode' => 'required',
            'status' => 'required|in:0,1',
        ]);

        Code::create($request->all());
        return redirect()->route('codes.index')->with('success', 'Country Code created successfully.');
    }

    public function edit(Code $code)
    {
        return view('codes.edit', compact('code'));
    }

    public function update(Request $request, Code $code)
    {
        $request->validate([
            'ccode' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $code->update($request->all());
        return redirect()->route('codes.index')->with('success', 'Country Code updated successfully.');
    }

    public function destroy(Code $code)
    {
        $code->delete();
        return redirect()->route('codes.index')->with('success', 'Country Code deleted successfully.');
    }
}