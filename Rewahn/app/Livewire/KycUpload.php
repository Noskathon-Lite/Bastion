<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KycDocument;

class KycUpload extends Component
{
    use WithFileUploads;

    public $documents = [];
    public $documentTypes = [];

    public function submit()
    {
        foreach ($this->documents as $index => $document) {
            $validatedData = $this->validate([
                "documents.$index" => 'required|file|mimes:pdf,jpg,png|max:2048',
                "documentTypes.$index" => 'required|string',
            ]);

            $path = $document->store('kyc-documents', 'public');

            KycDocument::create([
                'user_id' => auth()->id(),
                'document_type' => $this->documentTypes[$index],
                'document_name' => $document->getClientOriginalName(),
                'file_path' => $path,
            ]);
        }

        session()->flash('message', 'KYC documents submitted successfully.');
        return redirect()->route('kyc.upload');
    }

    public function render()
    {
        return view('livewire.kyc-upload');
    }
}
