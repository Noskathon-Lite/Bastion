<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select id="vehicle_id" wire:model="vehicle_id" class="form-control">
                <option value="">Select Vehicle</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                @endforeach
            </select>
            @error('vehicle_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="user_id">User</label>
            <select id="user_id" wire:model="user_id" class="form-control">
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" id="start_date" wire:model="start_date" class="form-control">
            @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" id="end_date" wire:model="end_date" class="form-control">
            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" wire:model="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
                <option value="disputed">Disputed</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Rental</button>
    </form>
</div>

</div>
