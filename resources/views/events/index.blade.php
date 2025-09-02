<!DOCTYPE html>
<html>

<head>
    <title>Event Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h1 class="mb-4">Available Events</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Event</th>
                <th>Capacity</th>
                <th>Registered</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->capacity }}</td>
                    <td>{{ $event->registrations->count() }}</td>
                    <td>
                        <form method="POST" action="{{ route('events.register', $event->id) }}">
                            @csrf
                            <input type="hidden" name="user_id" value="1"> {{-- Test user --}}
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
