<?php
namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
class BusinessDocController extends Controller
{
    // Show the “add more” form for a given business
    public function create()
    {
        $business = Business::with('docs')->findOrFail(auth()->user()->business_id);
        //echo "<pre>"; print_r($business);
        return view('business_docs.create', compact('business')); 
    }

    public function show(BusinessDoc $doc)
    {
        return view('business_docs.show', compact('doc'));
    }
    // Store one or many documents
    public function store(Request $request, Business $business)
    {
        $request->validate([
            'name.*'     => 'required|string',
            'doc_file.*' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $auth = Auth::user();
        foreach ($request->name as $key => $name) {
            // Skip empty rows (just in case)
            if (!isset($request->file('doc_file')[$key]) || !$request->file('doc_file')[$key]->isValid()) {
                continue;
            }

            $file     = $request->file('doc_file')[$key];
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move the file into public/business_docs/
            $file->move(public_path('business_docs'), $filename);

            // Store the *relative* path (so you can use asset() later)
            $path = 'business_docs/' . $filename;

            BusinessDoc::create([
                'name'        => $name,
                'doc_file'    => $path,
                'business_id' => $auth->business_id,   // or $business->id if you have the Business model injected
            ]);
        }

        return back()->with('status', 'Documents uploaded!');
    }

    // Edit a single document
    public function edit($id)
    {
        $doc = BusinessDoc::findOrFail($id); 
        return view('business_docs.edit', compact('doc'));
    }

    // Update a single document
    public function update(Request $request, $docId)
    {
        $request->validate([
            'name'     => 'required|string',
            'doc_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);
       // Get the authenticated user (shortcut)
        $auth = auth()->user();

        // Fetch the document belonging to this business – 404 if it doesn’t exist
        $doc = BusinessDoc::where('id', $docId)
                          ->where('business_id', $auth->business_id)
                          ->firstOrFail();

        // Update the name
        $doc->name = $request->name;

        // Handle a new file upload, if any
        if ($request->hasFile('doc_file')) {
            // Delete the old file first
            if ($doc->doc_file) {
                $oldPath = public_path($doc->doc_file);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Move the new file into public/business_docs/
            $file     = $request->file('doc_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('business_docs'), $filename);

            // Store the relative path for later use with asset()
            $doc->doc_file = 'business_docs/' . $filename;
        }

        // Save the changes
        $doc->save();

        return redirect()->route('business-docs.create')->with('status', 'Document updated!');
    }

    // Delete a document
    public function destroy($docId)
    {
        // Delete the file from public/business_docs/
         // Get the authenticated user (shortcut)
        $auth = auth()->user();
        // Fetch the document belonging to this business – 404 if it doesn’t exist
        $doc = BusinessDoc::where('id', $docId)->where('business_id', $auth->business_id)->firstOrFail();
        if ($doc->doc_file) {
            $filePath = public_path($doc->doc_file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Now delete the record
        $doc->delete();

        return back()->with('status', 'Document removed!');
    }
}
