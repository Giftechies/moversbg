<?php
namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::with('zone')->get();
        return view('managers.index', compact('managers'));
    }

    public function create()
    {
        $zones = Zone::where('status', 1)->get();
        return view('managers.create', compact('zones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:managers,email',
            'password' => 'required',
            'mobile' => 'required',
            'status' => 'required|in:0,1',
            'zone_id' => 'required',
            'img' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('managers');
        }

        Manager::create($data);
        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    public function edit(Manager $manager)
    {
        $zones = Zone::where('status', 1)->get();
        return view('managers.edit', compact('manager', 'zones'));
    }

    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:managers,email,' . $manager->id,
            'mobile' => 'required',
            'status' => 'required|in:0,1',
            'zone_id' => 'required',
            'img' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('managers');
        }
        if ($request->filled('password')) {
            $data['password'] = $request->input('password');
        } else {
            unset($data['password']);
        }

        $manager->update($data);
        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}

