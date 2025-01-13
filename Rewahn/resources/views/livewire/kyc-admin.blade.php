<div>
    <h1>KYC Submissions</h1>
    @foreach ($documents as $document)
        <div class="document">
            <p>User: {{ $document->user->name }} ({{ $document->user->email }})</p>
            <p>Type: {{ $document->document_type }}</p>
            <p><a href="{{ Storage::url($document->file_path) }}" target="_blank">View Document</a></p>
            <p>Status: {{ $document->status }}</p>

            <form wire:submit.prevent="updateStatus({{ $document->id }}, 'verified', null)">
                <button type="submit">Verify</button>
            </form>

            <form wire:submit.prevent="updateStatus({{ $document->id }}, 'rejected', 'Invalid document')">
                <button type="submit">Reject</button>
            </form>
        </div>
    @endforeach

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>
