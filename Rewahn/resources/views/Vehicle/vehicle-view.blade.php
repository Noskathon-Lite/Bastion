<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('vehicle view') }}
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
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>

            <!-- Delete Button -->
            <form action="{{ route('vehicle.delete', $vehicle->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <form action="{{ route('vehicle.edit', $vehicle->id) }}"  style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">EDIT</button>
            </form>
        </div>
    </div>

</x-app-layout>
