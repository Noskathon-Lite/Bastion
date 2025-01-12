<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Vehicles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Vehicle List -->
        <div class="container mx-auto">
            <h3 class="text-2xl font-bold mb-4">Vehicles</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($vehicles as $vehicle)
                    <a href="{{ url('vehicle/view/'.$vehicle->id) }}" class="card bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition-shadow duration-300">
                        <h4 class="text-xl font-semibold">{{ $vehicle->title }}</h4>
                        <p><strong>Description:</strong> {{ $vehicle->description }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</p>
                        <p><strong>Category:</strong> {{ $vehicle->category->name }}</p>
                        <p><strong>Daily Rate:</strong> ${{ number_format($vehicle->daily_rate, 2) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
