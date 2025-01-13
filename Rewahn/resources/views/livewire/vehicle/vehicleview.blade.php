<div class="py-12">
    <!-- Filters Section -->
    <div class="flex justify-between items-center mb-6">
        <!-- Filter Form -->
        <div class="flex space-x-4">
            <select wire:model="selectedCategory" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <input type="date" wire:model="startDate" class="form-input" />
            <input type="date" wire:model="endDate" class="form-input" />

            <input type="number" wire:model="minPrice" placeholder="Min Price" class="form-input" />
            <input type="number" wire:model="maxPrice" placeholder="Max Price" class="form-input" />
        </div>

        <!-- Filter Button -->
        <button wire:click="applyFilters" class="btn btn-primary px-4 py-2 mr-2">
            Apply Filters
        </button>

        <!-- Clear Filters Button -->
        <button wire:click="clearFilters" class="btn btn-secondary px-4 py-2">
            Clear Filters
        </button>

        <!-- Layout Toggle Buttons -->
        <div>
            <button wire:click="setGridLayout" class="btn btn-primary px-4 py-2 mr-2">
                Grid
            </button>
            <button wire:click="setListLayout" class="btn btn-primary px-4 py-2">
                List
            </button>
        </div>
    </div>

    <!-- vehicle List -->
    <div class="container mx-auto">
        <a href="{{ route('vehicle.create') }}" class="btn btn-primary mb-4">
            Create Vehicle
        </a>
        <h3 class="text-2xl font-bold mb-4">Vehicles</h3>

        <!-- Dynamic Layout -->
        <div class="{{ $isGridLayout ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-4' }}">
            @foreach ($vehicles as $vehicle)
                <a href="{{ url('vehicle/view/'.$vehicle->id) }}"
                   class="card bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 hover:shadow-lg transition-shadow duration-300">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $vehicle->title }}</h4>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Description:</strong> {{ $vehicle->description }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Category:</strong> {{ $vehicle->category->name }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Daily Rate:</strong> ${{ number_format($vehicle->daily_rate, 2) }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
