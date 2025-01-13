<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicle View') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2>Vehicle Details</h2>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $vehicle->title }}</p>
            <p><strong>Description:</strong> {{ $vehicle->description }}</p>
            <p><strong>Base Price:</strong> ${{ number_format($vehicle->base_price, 2) }}</p>
            <p><strong>Daily Rate:</strong> ${{ number_format($vehicle->daily_rate, 2) }}</p>
            <p><strong>Fuel Capacity:</strong> {{ number_format($vehicle->fuel_capacity, 2) }} liters</p>
            <p><strong>GPS Enabled:</strong> {{ $vehicle->gps_enabled ? 'Yes' : 'No' }}</p>
            <p><strong>GPS Type:</strong> {{ $vehicle->gps_type ?? 'N/A' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</p>
            <p><strong>Category:</strong> {{ $vehicle->category->name }}</p>
            <p><strong>User ID:</strong> {{ $vehicle->user_id }}</p>
            <p><strong>Created At:</strong> {{ $vehicle->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Updated At:</strong> {{ $vehicle->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <!-- Vehicle Images Section -->
        <div class="card-body">
            <h3>Vehicle Images</h3>
            @if($vehicle->images)
                <div class="row">
                    @foreach(json_decode($vehicle->images) as $image)
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $image) }}" alt="Vehicle Image" class="img-fluid rounded mb-3">
                        </div>
                    @endforeach
                </div>
            @else
                <p>No images available for this vehicle.</p>
            @endif
        </div>

        <!-- Vehicle Damages Section -->
        <div class="card-body">
            <h3>Vehicle Damages</h3>
            @if($vehicle->damages->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Reported By</th>
                            <th>Images</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicle->damages as $damage)
                            <tr>
                                <td>{{ $damage->id }}</td>
                                <td>{{ $damage->description }}</td>
                                <td>{{ ucfirst($damage->status) }}</td>
                                <td>{{ $damage->user->name ?? 'N/A' }}</td>
                                <td>
                                    @if($damage->images)
                                        @foreach(json_decode($damage->images) as $damageImage)
                                            <img src="{{ asset('storage/' . $damageImage) }}" alt="Damage Image" class="img-thumbnail" width="50">
                                        @endforeach
                                    @else
                                        <p>No images</p>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('damage.delete', $damage->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No damages reported for this vehicle.</p>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>

            <!-- Delete Button -->
            <form action="{{ route('vehicle.delete', $vehicle->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <!-- Edit Button -->
            <form action="{{ route('vehicle.edit', $vehicle->id) }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</x-app-layout>

    </div>

</x-app-layout>
