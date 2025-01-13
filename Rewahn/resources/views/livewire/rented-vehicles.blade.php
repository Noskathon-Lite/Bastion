<div class="vehicle-list">
    <h2 class="text-2xl font-semibold mb-6">Rented Vehicles</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @foreach ($vehicles as $vehicle)
        <div class="vehicle-item p-4 mb-6 rounded-lg bg-gray-100 shadow-md">
            <div class="flex justify-between items-center">
                <div class="vehicle-info">
                    <h3 class="font-semibold text-lg">{{ $vehicle->title }}</h3>
                    <p class="text-gray-600">Category: {{ $vehicle->category->name }}</p>
                    <p class="text-gray-600">Status: {{ ucfirst($vehicle->status) }}</p>
                </div>
            </div>

            <!-- Rental Details -->
            @foreach ($vehicle->rentals as $rental)
                @if ($rental->status !== 'completed' && $rental->status !== 'cancelled')
                    <div class="rental-info mt-4">
                        <p>Rented by: {{ $rental->user->name }} ({{ $rental->user->email }})</p>
                        <p>Rental Status: {{ ucfirst($rental->status) }}</p>
                        <p>Start Date: {{ $rental->start_date->format('Y-m-d H:i') }}</p>
                        <p>End Date: {{ $rental->end_date->format('Y-m-d H:i') }}</p>

                        <div class="mt-4">
                            <label for="rental_status" class="block">Update Rental Status</label>
                            <select
                                wire:model="status"
                                wire:change="updateRentalStatus({{ $rental->id }}, $event.target.value)"
                                class="form-control mt-2 p-2 border border-gray-300 rounded-lg"
                            >
                                <option value="pending" {{ $rental->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $rental->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="active" {{ $rental->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="disputed" {{ $rental->status === 'disputed' ? 'selected' : '' }}>Disputed</option>
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</div>
