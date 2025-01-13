<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
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
            <label for="images">Upload Images</label>
            <input type="file" id="images" wire:model="images" multiple class="form-control">
            @error('images.*') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        @if ($images)
            <h4>Preview</h4>
            <div class="d-flex">
                @foreach ($images as $image)
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail" style="width: 100px; margin-right: 10px;">
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn btn-primary mt-3">Upload Images</button>
    </form>
</div>
</div>
