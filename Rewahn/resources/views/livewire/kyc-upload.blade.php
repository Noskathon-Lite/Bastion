<div>
    <form wire:submit.prevent="submit">
        @foreach ($documents as $index => $document)
            <div class="mb-4">
                <label for="documentType{{ $index }}">Document Type</label>
                <input type="text" wire:model="documentTypes.{{ $index }}" id="documentType{{ $index }}" required>

                <input type="file" wire:model="documents.{{ $index }}" required>

                @error("documents.$index") <span class="error">{{ $message }}</span> @enderror
                @error("documentTypes.$index") <span class="error">{{ $message }}</span> @enderror
            </div>
        @endforeach

        <button type="button" wire:click="documents[] = ''">Add Another Document</button>
        <button type="submit">Submit</button>
    </form>

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>

