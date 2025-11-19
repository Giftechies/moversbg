<?php
namespace App\Http\Controllers;

use App\Models\VehicleDocument;
use Illuminate\Http\Request;

class VehicleDocumentController extends Controller
{
 
    public function index($id = null)
    {
        $query = VehicleDocument::query();
        if ($id) {
            $query->where('vehicle_id', $id);
        }
        $documents = $query->paginate();
        return view('vehicle_documents.index', compact('documents','id'));
    }

    public function create($vehicle_id = null)
    {
        // If a vehicle_id is passed, we can pre‑select it in the form 
        return view('vehicle_documents.create', [
            'vehicle_id' => $vehicle_id,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'name'       => 'required|string|max:50',
            'file'       => 'required|file|max:2048',
        ]);

        $file = $request->file('file');

        // Build a unique or original name
        $name = time() . '_' . $file->getClientOriginalName();

        // Move the file to the public folder
        $file->move(public_path('vehicle_documents'), $name);

        // Save the path you’ll store in the DB
        $path = 'vehicle_documents/' . $name;

        VehicleDocument::create([
            'vehicle_id' => $request->vehicle_id,
            'name'       => $request->name,
            'file'       => $path,
        ]);

        return redirect()->route('vehicle-documents.index', ['id' => $request->vehicle_id])->with('success', 'Document uploaded.');
    }

    public function edit($id)
    { 
        $vehicleDocument = VehicleDocument::findOrFail($id);
        return view('vehicle_documents.edit', compact('vehicleDocument'));
    }


public function update(Request $request, $id)
{
    $vehicleDocument = VehicleDocument::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:50',
        'file' => 'nullable|file|max:2048',
    ]);

    $data = ['name' => $request->name];

    if ($request->hasFile('file')) {
        // Delete the old file if you want to keep the folder tidy
        // Storage::delete($vehicleDocument->file); // not needed if stored in public

        // Build a unique filename
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the public folder
        $file->move(public_path('vehicle_documents'), $filename);

        // Save the relative path
        $data['file'] = 'vehicle_documents/' . $filename;
    }

    $vehicleDocument->update($data);

    return redirect()
        ->route('vehicle-documents.index', ['id' => $vehicleDocument->vehicle_id])
        ->with('success', 'Document updated.');
}

    public function destroy($id)
    {
        $vehicleDocument = VehicleDocument::findOrFail($id);
        $vehicleDocument->delete();

        return redirect()
        ->route('vehicle-documents.index', ['id' => $vehicleDocument->vehicle_id])
        ->with('success', 'Document updated.');
    }
}
