<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
    <h2 class="text-lg font-bold">Vehicle Damages</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if ($showForm)
        <form wire:submit.prevent="store">
            <div>
                <label for="vehicle_id">Vehicle</label>
                <input type="text" wire:model="vehicle_id" placeholder="Vehicle ID">
                @error('vehicle_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="user_id">User</label>
                <input type="text" wire:model="user_id" placeholder="User ID">
                @error('user_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea wire:model="description" placeholder="Describe the damage"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="status">Status</label>
                <select wire:model="status">
                    <option value="pending">Pending</option>
                    <option value="verified">Verified</option>
                    <option value="resolved">Resolved</option>
                </select>
                @error('status') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="images">Upload Images</label>
                <input type="file" wire:model="images" multiple>
                @error('images.*') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" wire:click="resetForm" class="btn btn-secondary">Cancel</button>
        </form>
    @else
        <button wire:click="create" class="btn btn-primary">Add New Damage</button>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehicle</th>
                <th>User</th>
                <th>Description</th>
                <th>Status</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicleDamages as $damage)
                <tr>
                    <td>{{ $damage->id }}</td>
                    <td>{{ $damage->vehicle_id }}</td>
                    <td>{{ $damage->user_id }}</td>
                    <td>{{ $damage->description }}</td>
                    <td>{{ $damage->status }}</td>
                    <td>
                        @if ($damage->images)
                            @foreach (json_decode($damage->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" width="50">
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <button wire:click="edit({{ $damage->id }})">Edit</button>
                        <button wire:click="delete({{ $damage->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
