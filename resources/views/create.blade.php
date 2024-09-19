<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Ticket</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                Create New Ticket
            </div>
            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Ticket Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="creator_id">Created By</label>
                    <select class="form-control @error('creator_id') is-invalid @enderror" id="creator_id"
                        name="creator_id" required>
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('creator_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('creator_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="assigned_user_id">Assigned To</label>
                    <select class="form-control @error('assigned_user_id') is-invalid @enderror" id="assigned_user_id"
                        name="assigned_user_id">
                        <option value="">Select User (Optional)</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('assigned_user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('assigned_user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                        required>
                        <option value="">Select Status</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="OnGoing" {{ old('status') == 'OnGoing' ? 'selected' : '' }}>OnGoing</option>
                        <option value="finished" {{ old('status') == 'finished' ? 'selected' : '' }}>Finished</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dead_line">Deadline</label>
                    <input type="date" class="form-control @error('dead_line') is-invalid @enderror" id="dead_line"
                        name="dead_line" value="{{ old('dead_line') }}" required>
                    @error('dead_line')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-submit">Create Ticket</button>
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back to List</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
