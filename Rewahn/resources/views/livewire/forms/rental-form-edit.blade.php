<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
    @if (session()->has('message'))
        <div class="alert alert-success mb-4 p-4 rounded bg-green-500 text-white">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mb-4 p-4 rounded bg-red-500 text-white">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <!-- Vehicle Selection -->
        <div class="form-group mb-4">
            <label for="vehicle_id" class="text-lg font-semibold text-gray-700 dark:text-gray-300">Vehicle</label>
            <select id="vehicle_id" wire:model="vehicle_id" class="form-control mt-2 p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Vehicle</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                @endforeach
            </select>
            @error('vehicle_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- User ID (Hidden) -->
        <div class="hidden">
            <input type="hidden" id="user_id" wire:model="user_id">
            @error('user_id')
            <span class="error text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Start Date -->
        <div class="form-group mb-4">
            <label for="start_date" class="text-lg font-semibold text-gray-700 dark:text-gray-300">Start Date</label>
            <input type="datetime-local" id="start_date" wire:model="start_date" class="form-control mt-2 p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('start_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- End Date -->
        <div class="form-group mb-4">
            <label for="end_date" class="text-lg font-semibold text-gray-700 dark:text-gray-300">End Date</label>
            <input type="datetime-local" id="end_date" wire:model="end_date" class="form-control mt-2 p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('end_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div class="form-group mb-4">
            <label for="status" class="text-lg font-semibold text-gray-700 dark:text-gray-300">Status</label>
            <select id="status" wire:model="status" class="form-control mt-2 p-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" @if($vehicle && $vehicle->user_id !== auth()->id()) disabled @endif>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
                <option value="disputed">Disputed</option>
            </select>
            @error('status')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Create Rental
            </button>
        </div>
    </form>
</div>

