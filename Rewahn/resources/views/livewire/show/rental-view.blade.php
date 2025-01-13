<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div>
    <h3>Rental Details</h3>

    <p><strong>Vehicle:</strong> {{ $rental->vehicle->title }}</p>
    <p><strong>User:</strong> {{ $rental->user->name }}</p>
    <p><strong>Start Date:</strong> {{ $rental->start_date }}</p>
    <p><strong>End Date:</strong> {{ $rental->end_date }}</p>
    <p><strong>Status:</strong> {{ $rental->status }}</p>

    <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit Rental</a>
</div>

</div>
