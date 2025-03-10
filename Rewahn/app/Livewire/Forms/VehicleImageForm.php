<?php

namespace App\Livewire\Forms;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class VehicleImageForm extends Component
{

    use WithFileUploads;

    public $vehicle_id;
    public $images = [];

    public $vehicles = [];

    protected $rules = [
        'vehicle_id' => 'required|exists:vehicles,id',
        'images.*' => 'image|max:2048', // Each image must be less than 2MB
    ];

    public function mount()
    {
        $this->vehicles = Vehicle::all();
    }

    public function submit()
    {
        $this->validate();

        $uploadedPaths = [];
        foreach ($this->images as $image) {
            $path = $image->storeAs(
                'Images/vehicles/' . $this->vehicle_id,
                uniqid() . '.' . $image->getClientOriginalExtension(),
                'public'
            );
            $uploadedPaths[] = $path;
        }

        VehicleImage::create([
            'vehicle_id' => $this->vehicle_id,
            'image_path' => json_encode($uploadedPaths),
        ]);

        session()->flash('message', 'Images uploaded successfully.');
        $this->reset('images'); // Reset file input after submission
    }
    public function render()
    {
        return view('livewire.forms.vehicle-image-form');
    }
}
