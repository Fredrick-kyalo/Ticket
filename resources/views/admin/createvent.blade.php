@extends('layouts.master')

@section('title')
   Create Event
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<div class="container mt-5">
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Event_name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="Event_name" name="Event_name" required>
        </div>
        <div class="mb-3">
            <label for="Event_date" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="Event_date" name="Event_date" required>
        </div>
        <div class="mb-3">
            <label for="Max_attendees" class="form-label">Max Attendees</label>
            <input type="number" class="form-control" id="Max_attendees" name="Max_attendees" required>
        </div>
        <div class="mb-3">
            <label for="owner_id" class="form-label">Owner ID</label>
            <input type="text" class="form-control" id="owner_id" name="owner_id" required>
        </div>
        <div class="mb-3">
            <label for="Image" class="form-label">Image</label>
            <input type="file" class="form-control" id="Image" name="Image" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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