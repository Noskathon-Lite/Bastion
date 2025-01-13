<div class="space-y-6">
    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Vehicle Damages</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-4 rounded shadow">{{ session('message') }}</div>
    @endif

    @if ($showForm)
        <form wire:submit.prevent="store" class="space-y-4 bg-white dark:bg-gray-800 p-6 shadow rounded">
            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea wire:model="description" id="description" placeholder="Describe the damage"
                          class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600"></textarea>
                @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="status" class="block font-medium">Status</label>
                <select wire:model="status" id="status"
                        class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
                    <option value="pending">Pending</option>
                    <option value="verified">Verified</option>
                    <option value="resolved">Resolved</option>
                </select>
                @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="images" class="block font-medium">Upload Images</label>
                <input type="file" wire:model="images" multiple
                       class="block w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
                @error('images.*') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Save</button>
                <button type="button" wire:click="resetForm"
                        class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700">Cancel</button>
            </div>
        </form>
    @else
        <button wire:click="create"
                class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Add New Damage</button>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-left">
            <th class="border p-2">ID</th>
            <th class="border p-2">Description</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Images</th>
            <th class="border p-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vehicleDamages as $damage)
            <tr class="border-t">
                <td class="border p-2">{{ $damage->id }}</td>
                <td class="border p-2">{{ $damage->description }}</td>
                <td class="border p-2">{{ $damage->status }}</td>
                <td class="border p-2">
                    @if ($damage->images)
                        @foreach (json_decode($damage->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Damage Image" class="h-12">
                        @endforeach
                    @endif
                </td>
                <td class="border p-2 space-x-2">
                    <button wire:click="edit({{ $damage->id }})"
                            class="bg-yellow-600 text-white px-2 py-1 rounded hover:bg-yellow-700">Edit</button>
                    <button wire:click="delete({{ $damage->id }})"
                            class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
