@extends('layouts.master')

@section('title')
   Dashboard
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Events Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Title</th>
                            <th>Date</th>
                            <th class="text-right">Attendance</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->Event_name }}</td>
                                <td>{{ $event->Event_date}}</td>
                                <td>{{ $event->Max_attendees}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary create-ticket-btn" data-event-id="{{ $event->id }}">Create Tickets</button>
                                    <form id="createTicketForm{{ $event->id }}" class="hidden-form" method="POST" action="{{ route('create.tickets', ['id' => $event->id]) }}" style="display: none;">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="ticket_type" class="form-label" style="color: blue;">Ticket Type</label>
                                            <input type="text" class="form-control" id="ticket_type" name="ticket_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ticket_price" class="form-label" style="color: blue;">Ticket Price</label>
                                            <input type="number" class="form-control" id="ticket_price" name="ticket_price" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="number" class="form-label" style="color: blue;">Number of Tickets</label>
                                            <input type="number" class="form-control" id="number" name="number" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="background-color: orange; border-color: orange;">Create</button>
                                    </form>
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

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
    $('.create-ticket-btn').click(function() {
        console.log('Button clicked');
        var eventId = $(this).data('event-id');
        $('#createTicketForm'+eventId).toggle();
    });
});

</script>
@endsection












{{-- <head>

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
<link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
  

  
     <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
       
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav d-flex justify-items-between">
           
           
          
          </div>
        </div>
      </div>
    </nav>


</head>



@if(session()->has('message'))
<div class="alert alert-warning" role="alert">
  {{ session()->get('message') }}
</div>


@endif

@if(session()->has('update_message'))
<div class="alert alert-warning" role="alert">
  {{ session()->get('update_message') }}
</div>


@endif

<div class="container mt-5">
  <table id="table_id" class="display">
      <thead>
          <tr>
              
              
          </tr>
      </thead>
      <tbody>
          @foreach ($events  as $event)
          <tr>
             
              
              
              <td class="spacing">
                  
                  <a href="{{ Route('create.tickets', $event->id )}}"> <ion-icon class="btn btn-success " name="create"></ion-icon></a>

                 
               
                  

                  <form action="{{ Route('create.tickets',$event->id) }}" method="POST"> 
                      @csrf
                      <button type="submit" class="btn btn-danger">
                          <ion-icon   name="trash"></ion-icon>
                      </button>
             
          </form>
              
              </td>
              

            
          </tr>

         
      </tbody>
  </table>

</div>

  



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> </script>
<script >$(document).ready( function () {
  $('#table_id').DataTable();
} );</script>

<script
type="module"
src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
></script>
<script
nomodule
src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
></script> --}}