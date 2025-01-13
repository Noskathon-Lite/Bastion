<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class VehicleDamageForm extends Component
{
    use WithFileUploads;

    public $vehicleDamages, $vehicle_id, $user_id, $description, $status = 'pending', $images = [];
    public $damageId; // For edit mode
    public $showForm = false;

    protected $rules = [
        'vehicle_id' => 'required|exists:vehicles,id',
        'user_id' => 'required|exists:users,id',
        'description' => 'required|string',
        'status' => 'required|in:pending,verified,resolved',
        'images.*' => 'image|max:2048', // Validate images
    ];

    public function render()
    {
        $this->vehicleDamages = VehicleDamage::with('vehicle')->latest()->get();
        return view('livewire.vehicle-damage');
    }

    public function resetForm()
    {
        $this->vehicle_id = '';
        $this->user_id = '';
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
            $path = $image->storeAs(
                'images/vehicle_damages/' . auth()->id(),
                time() . '_' . $image->getClientOriginalName(),
                'public'
            );
            $storedImages[] = $path;
        }

        VehicleDamage::updateOrCreate(
            ['id' => $this->damageId],
            [
                'vehicle_id' => $this->vehicle_id,
                'user_id' => $this->user_id,
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
        $this->vehicle_id = $damage->vehicle_id;
        $this->user_id = $damage->user_id;
        $this->description = $damage->description;
        $this->status = $damage->status;
        $this->images = []; // New uploads only
        $this->showForm = true;
    }

    public function delete($id)
    {
        $damage = VehicleDamage::findOrFail($id);
        $damage->delete();

        session()->flash('message', 'Vehicle Damage Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.forms.vehicle-damage-form');
    }
}
