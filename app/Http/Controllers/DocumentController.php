<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $vehicles = Vehicle::all();
        
        return view('documents.create', compact('users', 'vehicles'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'document_type' => ['required', 'string', 'max:255'],
            'user' => ['required', 'string', 'max:255'],
            'vehicle' => ['required', 'integer'],
            'document_description' => ['nullable', 'string', 'max:255'],
            'expiry_date' => ['nullable', 'string', 'max:255'],
        ]);
        
        // dd($request->all());
        $document = Document::create([
            'type' => $request->document_type,
            'user_id' => $request->user,
            'vehicle_id' => $request->vehicle,
            'description' => $request->document_description,
            'expiry_date' => $request->expiry_date,
        ]);

        

        return redirect()->route('documents.index')->with('success', 'Document created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $vehicles = Vehicle::all();
        $document = Document::findOrFail($id);
        $ass_user = User::where('id', $document->user_id)->first();
        $ass_vehicle = Vehicle::where('id', $document->vehicle_id)->first();
        return view('documents.edit', compact('users', 'vehicles', 'document', 'ass_user', 'ass_vehicle'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'document_type' => ['required', 'string', 'max:255'],
            'user' => ['required', 'string', 'max:255'],
            'vehicle' => ['required', 'integer'],
            'document_description' => ['nullable', 'string', 'max:255'],
            'expiry_date' => ['nullable', 'string', 'max:255'],
        ]);

        $document = Document::findOrFail($id);
        // dd($request->all());


        $document->type = $request->document_type;
        $document->user_id = $request->user;
        $document->vehicle_id = $request->vehicle;
        $document->description = $request->document_description;
        $document->expiry_date = $request->expiry_date;

        $document->update();
        
        return redirect()->back()->with('success', 'vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);
	    $document->delete();

	    return redirect()->route('documents.index')->with('success', 'vehicle deleted successfully');
    }
}
