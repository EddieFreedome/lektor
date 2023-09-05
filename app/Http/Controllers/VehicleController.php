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

        dd($request->all());

        $request->validate([
            'plate' => ['required', 'string', 'max:255'],
            'immatricolation' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        // $vehicle = Vehicle::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // return redirect()->route('vehicles.index', $vehicle->id, compact($vehicle->id))->with('success', 'Vehicle created successfully.');

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
        return view('vehicles.edit');
        
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
        $vehicle = Vehicle::find($id);
	    $vehicle->delete();
	    return redirect()->route('vehicles.index')->with('success', 'vehicle deleted successfully');

    }
}
