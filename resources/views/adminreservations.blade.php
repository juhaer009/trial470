<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Reservations request</title>
    <style>
        body {
            background-color: #f4f4f4; /* Light gray background */
            padding: 20px; /* Added padding for better appearance */
        }

        h2 {
            color: #333; /* Dark gray heading color */
            text-align: center;
            margin-bottom: 20px; /* Added margin-bottom for spacing */
        }

        hr {
            border-color: #333; /* Dark gray border color */
            margin-top: 20px; /* Added margin-top for spacing */
            margin-bottom: 20px; /* Added margin-bottom for spacing */
        }

        p {
            color: #333; /* Dark gray text color */
            margin-bottom: 10px; /* Added margin-bottom for spacing */
        }

        form {
            margin-bottom: 20px; /* Added margin-bottom for spacing */
        }

        .btn-primary {
            background-color: #333; /* Dark gray button background color */
            border-color: #333; /* Dark gray button border color */
            width: 100%; /* Make the button full width */
        }

        .btn-primary:hover {
            background-color: #222; /* Slightly darker gray on hover */
            border-color: #222; /* Slightly darker gray on hover */
        }
    </style>
</head>
<body>
    <h2>Reservations request</h2>
    <hr>

    @foreach($reservations as $reservation)
        @if($reservation->accept == null)
            <div>
                <p>Name: {{$reservation->name}}</p>
                <p>Email: {{$reservation->email }}</p>
                <p>Date: {{$reservation->date}}</p>
                <p>Phone: {{$reservation->phone}}</p>
                <p>No. of people: {{$reservation->guests}}</p>
                <p>Request: {{$reservation->description}}</p>
                <form style="display: inline-block;" action="{{ route('reservation', ['id' => $reservation->id])}}" method="post">
                    @csrf
                    @method('put')
                    <button class="btn btn-primary" type="submit">Accept</button>
                </form>
                <form style="display: inline-block;" method="post" action="{{ route('reservations.delete', ['id' => $reservation->id])}}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary" type="submit">Reject</button>
                </form>
            </div>
            <hr>
        @endif
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
