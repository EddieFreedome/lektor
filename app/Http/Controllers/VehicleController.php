<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        // dd($users);
        
        return view('vehicles.index', compact('vehicles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'plate' => ['required', 'string', 'max:255'],
            'date_matriculation' => ['required', 'string', 'max:255', 'unique:'.Vehicle::class],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
        
        // dd($request->all());
        $vehicle = Vehicle::create([
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
        $vehicle = Vehicle::findOrFail($id);

        // $vehicle = Vehicle::where('id', $id)->first();

        return view('vehicles.edit', compact('vehicle'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'plate' => ['required', 'string', 'max:255'],
            'date_matriculation' => ['required', 'string', 'max:255', ], // check for unique plate -> set unique here will not work at update:(plate is already saved and throws an error)
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        
        return redirect()->back()->with('success', 'vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
	    $vehicle->delete();
	    return redirect()->route('vehicles.index')->with('success', 'vehicle deleted successfully');

    }
}
