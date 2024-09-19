<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            padding: 20px;
        }

        .ticket-details {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .ticket-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 1.5em;
        }

        .ticket-info {
            border-left: 5px solid #007bff;
            padding-left: 15px;
        }

        .ticket-info p {
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .btn-back {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #218838;
        }

        .text-muted {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="ticket-details">
            <div class="ticket-header">
                Ticket Details
            </div>
            <div class="ticket-info">
                <h3 class="text-primary">{{ $ticket->name }}</h3>
                <p><strong>Description:</strong> {{ $ticket->description }}</p>
                <p><strong>Status:</strong> <span
                        class="badge badge-{{ $ticket->status == 'pending' ? 'warning' : ($ticket->status == 'OnGoing' ? 'info' : 'success') }}">{{ ucfirst($ticket->status) }}</span>
                </p>
                <p><strong>Created by:</strong> <span class="font-weight-bold">{{ $ticket->creator->name }}</span></p>
                <p><strong>Assigned to:</strong> <span
                        class="font-weight-bold">{{ $ticket->assignedUser->name ?? 'Unassigned' }}</span></p>
                <p><strong>Deadline:</strong> <span class="text-muted">{{ $ticket->dead_line }}</span></p>

                <a href="{{ route('tickets.index') }}" class="btn btn-back">Back to List</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
