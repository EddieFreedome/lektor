<?php

namespace App\Http\Controllers;

use App\Models\Document;
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
        return view('documents.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'plate' => ['required', 'string', 'max:255'],
            // 'date_matriculation' => ['required', 'string', 'max:255', 'unique:'.Vehicle::class],
            // 'description' => ['nullable', 'string', 'max:255'],
        ]);
        
        // dd($request->all());
        $document = Document::create([
            'plate' => $request->plate,
            'date_matriculation' => $request->date_matriculation,
            'description' => $request->description,
        ]);

        

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');

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
        //
    }
}
