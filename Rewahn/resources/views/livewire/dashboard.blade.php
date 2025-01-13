<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">User Dashboard</h1>

    <!-- KYC Verification Status -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold">KYC Status</h2>
        <p class="text-gray-600">
            <strong>Status:</strong> {{ ucfirst($kycStatus) }}
            @if($kycStatus === 'pending')
                <a href="{{ route('kyc.submit') }}" class="text-blue-500 underline">Submit Now</a>
            @endif
        </p>
    </div>

    <!-- User's Contacts -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold">Contacts</h2>
        <ul class="list-disc ml-5">
            @forelse($contacts as $contact)
                <li>{{ $contact->name }} ({{ $contact->email }})</li>
            @empty
                <p>No contacts available.</p>
            @endforelse
        </ul>
    </div>

    <!-- User's Vehicles -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold">My Vehicles</h2>
        <ul class="list-disc ml-5">
            @forelse($vehicles as $vehicle)
                <li>{{ $vehicle->title }} - ${{ number_format($vehicle->daily_rate, 2) }}/day</li>
            @empty
                <p>No vehicles added yet.</p>
            @endforelse
        </ul>
    </div>

    <!-- Rented Vehicles -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold">Vehicles Currently Rented</h2>
        <ul class="list-disc ml-5">
            @forelse($rentedVehicles as $rentedVehicle)
                <li>{{ $rentedVehicle->vehicle->title }} - Rented by {{ $rentedVehicle->user->name }} (Until {{ $rentedVehicle->end_date }})</li>
            @empty
                <p>No vehicles currently rented.</p>
            @endforelse
        </ul>
    </div>

    <!-- Rental Requests -->
    <div>
        <h2 class="text-xl font-semibold">Rental Requests</h2>
        <ul class="list-disc ml-5">
            @forelse($rentalRequests as $request)
                <li>
                    {{ $request->user->name }} requested to rent {{ $request->vehicle->title }}.
                    <button wire:click="approveRequest({{ $request->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Approve</button>
                    <button wire:click="declineRequest({{ $request->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Decline</button>
                </li>
            @empty
                <p>No rental requests.</p>
            @endforelse
        </ul>
    </div>
</div>

</div>
