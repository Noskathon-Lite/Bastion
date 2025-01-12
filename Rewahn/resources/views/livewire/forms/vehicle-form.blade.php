<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save">
{{--        <div>--}}
{{--            <label for="user_id">User ID</label>--}}
{{--            <input type="text" id="user_id" wire:model="user_id">--}}
{{--            @error('user_id') <span class="error">{{ $message }}</span> @enderror--}}
{{--        </div>--}}

        <div>
            <label for="category_id">Category</label>
            <select id="category_id" wire:model="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" wire:model="description"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="base_price">Base Price</label>
            <input type="text" id="base_price" wire:model="base_price">
            @error('base_price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="daily_rate">Daily Rate</label>
            <input type="text" id="daily_rate" wire:model="daily_rate">
            @error('daily_rate') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="fuel_capacity">Fuel Capacity</label>
            <input type="text" id="fuel_capacity" wire:model="fuel_capacity">
            @error('fuel_capacity') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="gps_enabled">GPS Enabled</label>
            <input type="checkbox" id="gps_enabled" wire:model="gps_enabled">
        </div>

        <div>
            <label for="gps_type">GPS Type</label>
            <select id="gps_type" wire:model="gps_type">
                <option value="">Select Type</option>
                <option value="mobile">Mobile</option>
                <option value="vehicle">Vehicle</option>
            </select>
            @error('gps_type') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select id="status" wire:model="status">
                <option value="available">Available</option>
                <option value="rented">Rented</option>
                <option value="maintenance">Maintenance</option>
                <option value="suspended">Suspended</option>
            </select>
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Save Vehicle</button>
    </form>
</div>
