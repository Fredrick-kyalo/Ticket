<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    // Method to display registered events
    public function registered()
    {
        $events = Event::all();
        return view('admin.register')->with('events', $events);

        $events = Event::with('tickets')->get(); // Eager load tickets relationship
    return view('admin.register')->with('events', $events);
    }

    // Method to store a new event
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Event_name' => 'required',
            'Event_id' => 'required|unique:events',
            'Event_date' => 'required|date',
            'Max_attendees' => 'required|integer|min:1',
        ]);

        // Create a new event instance
        $event = Event::create([
            'Event_name' => $validatedData['Event_name'],
            'Event_id' => $validatedData['Event_id'],
            'Event_date' => $validatedData['Event_date'],
            'Max_attendees' => $validatedData['Max_attendees'],

        ]);
       
        $event->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Event added successfully');
    }

    public function edit(Request $request ,string $id)
    {
        $event = Event::findOrFail($id);
        $validateData = $request->validate([
            'Event_name' =>'sometimes',
            
            'Event_date'=>'sometimes',
            'Max_attendees'=>'sometimes',
        ]);

        $event->Event_name = $validateData['Event_name'];
        $event->Event_date = $validateData['Event_date'];
        $event->Max_attendees = $validateData['Max_attendees'];

        $event->save();
       
    }

    public function index()
{
    $events = Event::all();
    return view('homepage', compact('events'));
}

public function bookTicket($id)
{
    // You can retrieve the event with the given ID from the database
    $event = Event::findOrFail($id);

    // You can then return a view where users can book tickets for this event
    return view('book_ticket', compact('event'));
}
public function delete(string $id){
//delete event 
    $event = Event::findOrfail($id);
    $event->delete();

}

    

}
