<?php

namespace App\Livewire\Forms;

use App\Models\VehicleDamage;
use Livewire\Component;
use Livewire\WithFileUploads;

class VehicleDamageForm extends Component
{
    use WithFileUploads;

    public $vehicleDamages, $vehicle_id, $description, $status = 'pending', $images = [];
    public $damageId; // For edit mode
    public $showForm = false;

    protected $rules = [
        'description' => 'required|string',
        'status' => 'required|in:pending,verified,resolved',
        'images.*' => 'image|max:2048', // Validate images
    ];

    public function mount($vehicle_id)
    {
        $this->vehicle_id = $vehicle_id; // Assign vehicle ID on initialization
    }

    public function render()
    {
        $this->vehicleDamages = VehicleDamage::where('vehicle_id', $this->vehicle_id)->latest()->get();
        return view('livewire.forms.vehicle-damage-form');
    }

    public function resetForm()
    {
        $this->description = '';
        $this->status = 'pending';
        $this->images = [];
        $this->damageId = null;
        $this->showForm = false;
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function store()
    {
        $this->validate();

        // Handle image upload
        $storedImages = [];
        foreach ($this->images as $image) {
            $path = $image->store('images/vehicle_damages/' . auth()->id(), 'public');
            $storedImages[] = $path;
        }

        VehicleDamage::updateOrCreate(
            ['id' => $this->damageId],
            [
                'vehicle_id' => $this->vehicle_id,
                'user_id' => auth()->id(),
                'description' => $this->description,
                'status' => $this->status,
                'images' => json_encode($storedImages),
            ]
        );

        $this->resetForm();
        session()->flash('message', $this->damageId ? 'Vehicle Damage Updated Successfully.' : 'Vehicle Damage Created Successfully.');
    }

    public function edit($id)
    {
        $damage = VehicleDamage::findOrFail($id);
        $this->damageId = $damage->id;
        $this->description = $damage->description;
        $this->status = $damage->status;
        $this->images = []; // Clear image input for new uploads
        $this->showForm = true;
    }

    public function delete($id)
    {
        $damage = VehicleDamage::findOrFail($id);
        $damage->delete();

        session()->flash('message', 'Vehicle Damage Deleted Successfully.');
    }
}
