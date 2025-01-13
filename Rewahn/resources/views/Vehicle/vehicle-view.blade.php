<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicle View') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Flex container for Vehicle Details and Rental Form -->
        <div class="flex flex-wrap gap-6">

            <!-- Vehicle Details Card -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg w-full lg:w-2/3 mb-6">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Vehicle Details</h2>
                    <p><strong>Name:</strong> {{ $vehicle->title }}</p>
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
            </div>

            <!-- Livewire Rental Form Section (Right of Vehicle Details) -->
            <div class="w-full lg:w-1/3 mb-6">
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Rent This Vehicle</h3>
                    <livewire:forms.rental-form :vehicle_id="$vehicle->id" />
                </div>
            </div>
        </div>

        <!-- Vehicle Images Section -->
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg mb-6">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Vehicle Images</h3>
                @if($vehicle->image_path)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach(json_decode($vehicle->images, true) ?? [] as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Vehicle Image" class="w-full h-40 object-cover rounded">
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600 dark:text-gray-400">No images available for this vehicle.</p>
                @endif
            </div>
        </div>

        <!-- Vehicle Damages Section -->
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg mb-6">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Vehicle Damages</h3>
                @if($vehicle->damages->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Reported By</th>
                                <th class="px-4 py-2">Images</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicle->damages as $damage)
                                <tr class="border-b dark:border-gray-600">
                                    <td class="px-4 py-2">{{ $damage->id }}</td>
                                    <td class="px-4 py-2">{{ $damage->description }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($damage->status) }}</td>
                                    <td class="px-4 py-2">{{ $damage->user->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 flex gap-2">
                                        @foreach(json_decode($damage->images, true) ?? [] as $damageImage)
                                            <img src="{{ asset('storage/' . $damageImage) }}" alt="Damage Image" class="w-10 h-10 object-cover rounded">
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('damage.delete', $damage->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600 dark:text-gray-400">No damages reported for this vehicle.</p>
                @endif
            </div>
        </div>

        <!-- Footer Buttons -->
        <div class="flex justify-between items-center mt-6">
            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded hover:bg-gray-300 dark:hover:bg-gray-600">
                Back
            </a>
            <div class="flex gap-2">
                <form action="{{ route('vehicle.delete', $vehicle->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Delete
                    </button>
                </form>
                <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
