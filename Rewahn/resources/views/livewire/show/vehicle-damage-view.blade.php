<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
    <h3>Damage Details</h3>

    <p><strong>Vehicle:</strong> {{ $damage->vehicle->title }}</p>
    <p><strong>User:</strong> {{ $damage->user->name }}</p>
    <p><strong>Description:</strong> {{ $damage->description }}</p>
    <p><strong>Status:</strong> {{ $damage->status }}</p>

    <h4>Images</h4>
    @if ($damage->images)
        <ul>
            @foreach ($damage->images as $image)
                <li><a href="{{ asset('storage/' . $image) }}" target="_blank">View Image</a></li>
            @endforeach
        </ul>
    @else
        <p>No images uploaded.</p>
    @endif
</div>
 
</div>