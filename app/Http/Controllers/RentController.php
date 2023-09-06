<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::all();
        // dd($users);
        
        return view('rents.index', compact('rents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $vehicles = Vehicle::all();
        return view('rents.create', compact('users', 'vehicles'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'user' => ['required', 'string', 'max:255'],
            'vehicle' => ['required', 'integer'],
            'rent_description' => ['nullable', 'string', 'max:255'],
            'start_date_rent' => ['required', 'date', 'max:255'],
            'end_date_rent' => ['nullable', 'date', 'max:255'],
            'rent_cost' => ['nullable', 'string', 'max:255'],
        ]);
        
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $random_string_length = 7;

        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        } //potrebbe generare stringhe gia' esistenti... aggiungere controlli e gestire casi

        $practice_number = $string; 


        // dd($request->all());
        $rent = Rent::create([
            'user_id' => $request->user,
            'vehicle_id' => $request->vehicle,
            'practice_number' => $practice_number,
            'rent_type' => $request->rent_description,
            'start_date_rent' => $request->start_date_rent,
            'end_date_rent' => $request->end_date_rent,
            'cost' => $request->rent_cost,
        ]);

        

        return redirect()->route('rents.index')->with('success', 'Rent created successfully.');
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
        
        $rent = Rent::findOrFail($id);
        
        $ass_user = User::where('id', $rent->user_id)->first();
        $ass_vehicle = Vehicle::where('id', $rent->vehicle_id)->first();

        return view('rents.edit', compact('rent', 'users', 'vehicles', 'ass_user', 'ass_vehicle'));
        
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
