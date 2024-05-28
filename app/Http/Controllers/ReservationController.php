<?php

namespace App\Http\Controllers;

use App\Models\Internaute;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Reservation; // Make sure to import your Reservation model

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $reservations = Reservation::all();
    //     return view('reservations.index', compact('reservations'));
    // }
    public function index(Request $request)
    {
        // Start building the query
        $query = Reservation::query();

        // Check if date_debut_sejour is provided in the request
        if ($request->has('date_debut_sejour')) {
            $dateDebut = $request->input('date_debut_sejour');

            // If date_debut_sejour is not empty, filter by it
            if (!empty($dateDebut)) {
                $query->where('date_debut_sejour', '=', $dateDebut);
            }
        }

        // Retrieve the reservations based on the query
        $reservations = $query->get();

        // Pass the reservations to the view
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Assuming Internaute is another model containing internaute data
        $internautes = Internaute::all(); // Replace with your actual model name and logic
        $hotels = Hotel::all(); // Replace with your actual model name and logic
        return view('reservations.create', compact('internautes','hotels')); // we fix it
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'id_internaute' => 'required',
            'id_hotel' => 'required',
            'date_debut_sejour' => 'required|date',
            'date_fin_sejour' => 'required|date',
            'titre' => 'required',
        ]);

        // Create a new Reservation instance
        $reservation = new Reservation();
        $reservation->id_internaute = $request->id_internaute;
        $reservation->id_hotel = $request->id_hotel;
        $reservation->date_debut_sejour = $request->date_debut_sejour;
        $reservation->date_fin_sejour = $request->date_fin_sejour;
        $reservation->titre = $request->titre;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // Assuming Internaute is another model containing internaute data
        $internautes = Internaute::all(); // Replace with your actual model name and logic
        $hotels = Hotel::all(); // Replace with your actual model name and logic
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation','internautes','hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'id_internaute' => 'required',
            'id_hotel' => 'required',
            'date_debut_sejour' => 'required|date',
            'date_fin_sejour' => 'required|date',
            'titre' => 'required',
        ]);

        // Find the reservation and update its attributes
        $reservation = Reservation::findOrFail($id);
        $reservation->id_internaute = $request->id_internaute;
        $reservation->id_hotel = $request->id_hotel;
        $reservation->date_debut_sejour = $request->date_debut_sejour;
        $reservation->date_fin_sejour = $request->date_fin_sejour;
        $reservation->titre = $request->titre;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
    }
}
