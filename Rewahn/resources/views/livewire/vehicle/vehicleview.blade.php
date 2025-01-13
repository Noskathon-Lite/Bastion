<div class="py-12">
    <!-- Filters Section -->
    <div class="flex flex-wrap justify-between items-center mb-6">
        <!-- Filter Form -->
        <div class="flex flex-wrap items-center space-x-4 mb-4 md:mb-0">
            <select wire:model="selectedCategory" class="form-select border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <input type="date" wire:model="startDate" class="form-input border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            <input type="date" wire:model="endDate" class="form-input border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

            <input type="number" wire:model="minPrice" placeholder="Min Price" class="form-input border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            <input type="number" wire:model="maxPrice" placeholder="Max Price" class="form-input border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-2">
            <button wire:click="applyFilters" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                Apply Filters
            </button>
            <button wire:click="clearFilters" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-gray-300">
                Clear Filters
            </button>
        </div>
    </div>

    <!-- Layout and Create Button -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex space-x-2">
            <button wire:click="setGridLayout" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 {{ $isGridLayout ? 'ring-2 ring-blue-500' : '' }}">
                Grid
            </button>
            <button wire:click="setListLayout" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 {{ !$isGridLayout ? 'ring-2 ring-blue-500' : '' }}">
                List
            </button>
        </div>
        <a href="{{ route('vehicle.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-green-300">
            Create Vehicle
        </a>
    </div>

    <!-- Vehicles List -->
    <div class="container mx-auto">
        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Vehicles</h3>

        <div class="{{ $isGridLayout ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-4' }}">
            @foreach ($vehicles as $vehicle)
                <a href="{{ url('vehicle/view/'.$vehicle->id) }}"
                   class="block bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow duration-300">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $vehicle->title }}</h4>
                    <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Description:</strong> {{ $vehicle->description }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mb-1"><strong>Category:</strong> {{ $vehicle->category->name }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Daily Rate:</strong> ${{ number_format($vehicle->daily_rate, 2) }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
