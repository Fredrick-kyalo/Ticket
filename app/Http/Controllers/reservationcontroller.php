<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reservationcontroller extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'email' => 'required|email',
            'no_of_tickets' => 'required|integer|min:1|max:5',
            // Add more validation rules if needed
        ]);

        // Create a new reservation instance
        $reservation = new Reservation();
        $reservation->event_id = $validatedData['event_id'];
        $reservation->email = $validatedData['email'];
        $reservation->no_of_tickets = $validatedData['no_of_tickets'];

        // Save the reservation
        $reservation->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Reservation added successfully');
    }
}