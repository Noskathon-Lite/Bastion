<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KycDocument;

class KycAdmin extends Component
{
    public $documents;

    public function mount()
    {
        $this->documents = KycDocument::with('user')->where('status', 'pending')->get();
    }

    public function updateStatus($documentId, $status, $notes = null)
    {
        $document = KycDocument::findOrFail($documentId);
        $document->update([
            'status' => $status,
            'admin_notes' => $notes,
        ]);

        session()->flash('message', 'KYC status updated successfully.');
        $this->documents = KycDocument::with('user')->where('status', 'pending')->get();
    }

    public function render()
    {
        return view('livewire.kyc-admin', ['documents' => $this->documents]);
    }
}

