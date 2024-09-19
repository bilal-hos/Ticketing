<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .section-title {
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 1.5em;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-weight: bold;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .status-pending .card-header {
            background-color: #e67e22;
            color: white;
        }

        .status-ongoing .card-header {
            background-color: #3498db;
            color: white;
        }

        .status-finished .card-header {
            background-color: #2ecc71;
            color: white;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            text-align: center;
            padding: 10px 0;
        }

        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Tickets List</h1>

        <!-- Create Button -->
        <div class="text-right mb-3">
            <a href="{{ route('tickets.create') }}" class="btn btn-success">Create Ticket</a>
        </div>

        <div class="row">
            <!-- Pending Tickets Column -->
            <div class="col-md-4">
                <div class="section-title">Pending Tickets</div>
                @foreach ($tickets->where('status', 'pending') as $ticket)
                    <div class="card status-pending">
                        <div class="card-header">
                            {{ $ticket->name }}
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Description:</strong> {{ $ticket->description }}</p>
                            <p class="card-text"><strong>Status:</strong> Pending</p>
                            <a href="{{ route('tickets.show', $ticket->id) }}"
                                class="btn btn-primary btn-action">Description</a>

                            <!-- Delete Form -->
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action"
                                    onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Deadline: {{ $ticket->dead_line }}</small>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- OnGoing Tickets Column -->
            <div class="col-md-4">
                <div class="section-title">OnGoing Tickets</div>
                @foreach ($tickets->where('status', 'OnGoing') as $ticket)
                    <div class="card status-ongoing">
                        <div class="card-header">
                            {{ $ticket->name }}
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Description:</strong> {{ $ticket->description }}</p>
                            <p class="card-text"><strong>Status:</strong> OnGoing</p>
                            <a href="{{ route('tickets.show', $ticket->id) }}"
                                class="btn btn-primary btn-action">Description</a>

                            <!-- Delete Form -->
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action"
                                    onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Deadline: {{ $ticket->dead_line }}</small>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Finished Tickets Column -->
            <div class="col-md-4">
                <div class="section-title">Finished Tickets</div>
                @foreach ($tickets->where('status', 'finished') as $ticket)
                    <div class="card status-finished">
                        <div class="card-header">
                            {{ $ticket->name }}
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Description:</strong> {{ $ticket->description }}</p>
                            <p class="card-text"><strong>Status:</strong> Finished</p>
                            <a href="{{ route('tickets.show', $ticket->id) }}"
                                class="btn btn-primary btn-action">Description</a>

                            <!-- Delete Form -->
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action"
                                    onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Deadline: {{ $ticket->dead_line }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
