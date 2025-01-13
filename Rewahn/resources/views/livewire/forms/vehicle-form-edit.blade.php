<div>
    {{-- Be like water. --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div>
            <input type="hidden" id="user_id" wire:model="user_id">
            @error('user_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select id="category_id" wire:model="category_id" class="form-control">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" wire:model="title" class="form-control">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" wire:model="description" class="form-control"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="mb-3">
            <label for="daily_rate" class="form-label">Daily Rate</label>
            <input type="number" step="0.01" id="daily_rate" wire:model="daily_rate" class="form-control">
            @error('daily_rate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="fuel_capacity" class="form-label">Fuel Capacity</label>
            <input type="number" step="0.01" id="fuel_capacity" wire:model="fuel_capacity" class="form-control">
            @error('fuel_capacity') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="gps_enabled" class="form-label">GPS Enabled</label>
            <input type="checkbox" id="gps_enabled" wire:model="gps_enabled">
            @error('gps_enabled') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="gps_type" class="form-label">GPS Type</label>
            <select id="gps_type" wire:model="gps_type" class="form-control">
                <option value="">Select GPS Type</option>
                <option value="mobile">Mobile</option>
                <option value="vehicle">Vehicle</option>
            </select>
            @error('gps_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" wire:model="status" class="form-control">
                <option value="available">Available</option>
                <option value="rented">Rented</option>
                <option value="maintenance">Maintenance</option>
                <option value="suspended">Suspended</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
