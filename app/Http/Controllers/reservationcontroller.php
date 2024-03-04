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
        try {
            //code...
            $validatedData = $request->validate([
                'event_id' => 'required|exists:events,id',
                'email' => 'required|email',
                'ticket_type'=> 'required',
                'no_of_tickets' => 'required|integer|min:1|max:5',
            ]);
    
            $event = Event::findOrFail($validatedData['event_id']);

            $ticket = $event->ticket()->where('ticket_type', $validatedData['ticket_type'])->first();
            if (!$ticket || $ticket->number < $validatedData['no_of_tickets']) {
                return redirect()->back()->with('error', 'Few tickets available or ticket type not found');
            }
        
            // Create a new reservation instance
            $reservation = Reservation::create([
                'event_id' => $validatedData['event_id'],
                'ticket_type'=> $validatedData['ticket_type'],
                'email' => $validatedData['email'],
                'no_of_tickets' => $validatedData['no_of_tickets'],
                'reservation_date' => now(),
            ]);
           
            $ticket->decrement('number', $validatedData['no_of_tickets']);
            
            $data = [
                'event_id' => $reservation->id,
                'ticket_type' => $reservation->ticket_type,
                'event_name'=> $reservation->event->Event_name,
                'holder' => $reservation->email,
                'accompany' => $reservation->no_of_tickets
            ];
            
            Mail::to($reservation->email)->send(new TicketMail($data));
    
            // Redirect back or to a success page
           // return redirect()->back()->with('success', 'Reservation added successfully');
        
        } catch (\Throwable $th) {
            return response()->json([
                $th->getMessage()
            ],500);
        }
       
}
}
