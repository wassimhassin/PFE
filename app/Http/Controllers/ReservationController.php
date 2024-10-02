<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'cin_number' => 'required|string',
            'matricule' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservation.index')->with('success', 'Reservation created successfully.');
    }

    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'username' => 'required|string',
            'cin_number' => 'required|string',
            'matricule' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservation.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success', 'Reservation deleted successfully.');
    }
}

