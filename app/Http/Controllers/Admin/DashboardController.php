<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class DashboardController extends Controller
{
    // Method to display registered events
    public function registered()
    {
        $events = Event::get();
        return view('admin.register')->with('events', $events);

        $events = Event::with('tickets')->get(); // Eager load tickets relationship
    return view('admin.register')->with('events', $events);
    }

    // Method to store a new event
    public function store(Request $request)
    {
        try {
            //code...
            $validatedData = $request->validate([
                'Event_name' => 'required',
                'Event_date' => 'required|date',
                'Max_attendees' => 'required|integer|min:1',
                'owner_id' => 'required',
                'Images'=> 'image|mimes:jpeg,jpg,png,bmp|max:4080'
            ]);
        
            // Check if file is present in the request
            if ($request->hasFile('Images')) {
                // Store the file in the public folder
                $imagePath = $request->file('Images')->store('public');
                // Get the filename
                $imageName = basename($imagePath);
            } else {
                // If no file is uploaded, set $imageName to null or a default value
                $imageName = null;
            }
        
            // Create a new event instance
            $event = Event::create([
                'Event_name' => $validatedData['Event_name'],
                'Event_date' => $validatedData['Event_date'],
                'Max_attendees' => $validatedData['Max_attendees'],
                'owner_id'=>  $validatedData['owner_id'],
                'Image' => $imageName // Store the image filename in the database
            ]);
            return response()->json([
                'Message'=>'Successful',
                'event'=> $event,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            
        }
        // Validate the incoming request data
        
    
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
 
public function createTickets(Request $request,string $id)
{
    $event = Event::findOrfail($id);

    $validateData = $request->validate([
        'ticket_type' => 'required',
        'ticket_price'=> 'required',
        'number' => 'required',
    ]);

    $ticket = Ticket::create([
        'event_id' => $event->id,
        'ticket_type' => $validateData['ticket_type'],
        'ticket_price'=>$validateData['ticket_price'],
        'number'=>$validateData['number'],
    ]);

    return redirect()->back()->with('success', 'Tickets added successfully');
    

}

}
