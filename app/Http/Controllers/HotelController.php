<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Make sure to import your Hotel model

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $hotels = Hotel::all();
    //     return view('hotels.index', compact('hotels'));
    // }
    public function index(Request $request)
    {
        $query = Hotel::query();

        if ($request->has('titre')) {
            $titre = $request->input('titre');
            if (!empty($titre)) {
                $query->where('titre', 'like', "%$titre%");
            }
        }

        $hotels = $query->get();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'titre' => 'required',
            'adresse' => 'required',
            'prix_unitaire' => 'required|numeric',
            'type_chambre' => 'required',
        ]);

        // Create a new Hotel instance
        $hotel = new Hotel();
        $hotel->titre = $request->titre;
        $hotel->adresse = $request->adresse;
        $hotel->prix_unitaire = $request->prix_unitaire;
        $hotel->type_chambre = $request->type_chambre;
        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'titre' => 'required',
            'adresse' => 'required',
            'prix_unitaire' => 'required|numeric',
            'type_chambre' => 'required',
        ]);

        // Find the hotel and update its attributes
        $hotel = Hotel::findOrFail($id);
        $hotel->titre = $request->titre;
        $hotel->adresse = $request->adresse;
        $hotel->prix_unitaire = $request->prix_unitaire;
        $hotel->type_chambre = $request->type_chambre;
        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully!');
    }
}
