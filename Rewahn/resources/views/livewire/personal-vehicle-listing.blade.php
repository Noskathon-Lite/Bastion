<div class="py-12">
    <h3 class="text-2xl font-bold mb-4">My Vehicle Listings</h3>

    <!-- Vehicle List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($vehicles as $vehicle)
            <a href="{{ url('vehicle/view/'.$vehicle->id) }}"
               class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow duration-300">
                <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $vehicle->title }}</h4>
                <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Description:</strong> {{ $vehicle->description }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Category:</strong> {{ $vehicle->category->name }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Daily Rate:</strong> ${{ number_format($vehicle->daily_rate, 2) }}</p>
            </a>
        @empty
            <p class="text-gray-700 dark:text-gray-300">You haven't listed any vehicles yet.</p>
        @endforelse
    </div>
</div>
