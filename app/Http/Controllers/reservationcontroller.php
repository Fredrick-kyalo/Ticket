<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class reservationcontroller extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the incoming request data
        $useremail = Auth()->email;
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'email' => 'required|email',
            'no_of_tickets' => 'required|integer|min:1|max:5',
            // Add more validation rules if needed
        ]);

        // Create a new reservation instance
        $reservation = ::create([
            'event_id' => $validatedData['event_id'],
        'email' => $validatedData['email'],
        'no_of_tickets' => $validatedData['no_of_tickets'],
        ]);
        
         $data = [
   
         ]
        // Save the reservation
        $reservation->save();

        Mail::to($useremail)->send(new MailableClass($data));

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Reservation added successfully');
    }


}