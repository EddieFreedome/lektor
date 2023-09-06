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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
