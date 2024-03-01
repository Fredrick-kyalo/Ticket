<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles can be added here */
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="card-title">Reservation Details</h4>
                        <p>Dear Client,</p>
                        <p><strong>Event Name:</strong> {{ $data['event_name'] }}</p>
                        <p><strong>Ticket Type:</strong> {{$data['ticket_type']}}</p>
                        <p><strong>Number of Tickets:</strong> {{$data ['no_of_tickets']}}</p>
                        <p><strong>Email:</strong> {{$data['email']}}</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
