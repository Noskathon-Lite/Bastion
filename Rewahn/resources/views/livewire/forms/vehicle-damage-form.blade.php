<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
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
            <label for="description">Description</label>
            <textarea id="description" wire:model="description" class="form-control"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" wire:model="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="verified">Verified</option>
                <option value="resolved">Resolved</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="images">Upload Images</label>
            <input type="file" id="images" wire:model="images" multiple class="form-control">
            @error('images.*') <span class="text-danger">{{ $message }}</span> @enderror

            @if ($uploadedImages)
                <p>Uploaded Images:</p>
                <ul>
                    @foreach ($uploadedImages as $image)
                        <li>
                            <a href="{{ asset('storage/' . $image) }}" target="_blank">View Image</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ $damageId ? 'Update' : 'Create' }} Damage</button>
    </form>
</div>

</div>
