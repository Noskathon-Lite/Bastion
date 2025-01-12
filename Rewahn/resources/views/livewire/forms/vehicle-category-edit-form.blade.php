<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" wire:model="name" class="form-control">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="min_price">Minimum Price</label>
            <input type="number" step="0.01" id="min_price" wire:model="min_price" class="form-control">
            @error('min_price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="max_price">Maximum Price</label>
            <input type="number" step="0.01" id="max_price" wire:model="max_price" class="form-control">
            @error('max_price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</div>
