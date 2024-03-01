<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'email' => 'required|email',
            'ticket_type'=> 'required',
            'no_of_tickets' => 'required|integer|min:1|max:5',
        ]);

        $event = Event::findOrFail($validatedData['event_id']);
        $availableTickets = $event->tickets->number;
        if ($availableTickets < $validatedData['no_of_tickets']) {
            return redirect()->back()->with('error', 'Few tickets available');
        }
    
        // Create a new reservation instance
        $reservation = Reservation::create([
            'event_id' => $validatedData['event_id'],
            'ticket_type'=> $validatedData['ticket_type'],
            'email' => $validatedData['email'],
            'no_of_tickets' => $validatedData['no_of_tickets'],
        ]);
       
        $event->tickets->number -= $validatedData['no_of_tickets'];
        $event->tickets->save();
        $reservationEmail = $reservation->email;
        $data = [
            'event_id' => $reservation->id,
            'holder' => $reservation->email,
            'accompny' => $reservation->no_of_tickets
        ];
        
        Mail::to($reservationEmail)->send(new TicketMail($data));

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Reservation added successfully');
    }
}
