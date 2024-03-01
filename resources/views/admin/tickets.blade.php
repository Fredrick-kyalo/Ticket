@extends('layouts.master')

@section('title')
   Register Events
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Events Registered</h4>
            </div>
            <a href="#" class="btn btn-success" onclick="toggleAddForm()">ADD</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Event Name</th>
                            <th>Event ID</th>
                            <th>Event Date</th>
                            <th class="text-right">Max Attendees</th>
                            <th>EDIT</th>
                            <th>ADD</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>
                            @foreach($events as $row)
                            <tr>
                            <td>{{$row->Event_name}}</td>
        <td>{{$row->Event_id}}</td>
        <td>{{$row->Event_date}}</td>
        <td>{{$row->Max_attendees}}</td>
        <td>
    @if($row->tickets->isNotEmpty())
        {{ $row->tickets->first()->ticket_type }}
    @else
        No ticket type available
    @endif
</td>
                                <td>
                                <a href="#" class="btn btn-warning" onclick="toggleEditForm({{ $row->Event_id }})">EDIT</a>


                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger"> DELETE</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form to add a new event (hidden by default) -->
<div class="row mt-3" id="addEventForm" style="display: none;">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Tickets</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('create.tickets') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="events" class="form-label">Events:</label>
                        <select id="events" name="events[]" class="form-control" multiple>
                            @foreach ($events as $event)
                                <option value="{{ $event->Event_id }}">{{ $event->Event_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Event_name">Ticket Type</label>
                        <input type="text" class="form-control" id="Event_name" name="Event_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Event_date">Ticket Price</label>
                        <input type="date" class="form-control" id="Event_date" name="Event_date" required>
                    </div>
                    <div class="form-group">
                        <label for="Max_attendees">Ticket Number</label>
                        <input type="number" class="form-control" id="Max_attendees" name="Max_attendees" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <div class="mb-3">
                        <label for="tickets" class="form-label">Tickets:</label>
                        <select id="tickets" name="tickets[]" class="form-control" multiple>
                            @foreach ($event->events as $event)
                                <option value="{{ $event->event_id }}">{{ $event->event_id }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function toggleAddForm() {
        var addForm = document.getElementById('addEventForm');
        addForm.style.display = addForm.style.display === 'none' ? 'block' : 'none';
    }


    function toggleEditForm(Event_id) {
    console.log('Toggle edit form called for event ID:', Event_id); // Add this line for debugging
    var editForm = document.getElementById('editFormContainer' + Event_id);
    if (editForm) {
        editForm.style.display = (editForm.style.display === 'none') ? 'block' : 'none';
    }
}

</script>



@endsection
