<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class VehicleDamageForm extends Component
{
    use WithFileUploads;

    public $damageId;
    public $vehicle_id;
    public $user_id;
    public $description;
    public $status = 'pending';
    public $images = [];
    public $uploadedImages = [];

    public $vehicles = [];
    public $users = [];

    protected $rules = [
        'vehicle_id' => 'required|exists:vehicles,id',
        'user_id' => 'required|exists:users,id',
        'description' => 'required|string|max:1000',
        'status' => 'required|in:pending,verified,resolved',
        'images.*' => 'image|max:2048', // Each image must be less than 2MB
    ];

    public function mount($damageId = null)
    {
        $this->vehicles = Vehicle::all();
        $this->users = User::all();

        if ($damageId) {
            $damage = VehicleDamage::findOrFail($damageId);
            $this->damageId = $damage->id;
            $this->vehicle_id = $damage->vehicle_id;
            $this->user_id = $damage->user_id;
            $this->description = $damage->description;
            $this->status = $damage->status;
            $this->uploadedImages = $damage->images ?? [];
        }
    }

    public function submit()
    {
        $this->validate();

        $uploadedPaths = [];
        foreach ($this->images as $image) {
            $uploadedPaths[] = $image->store('vehicle-damages', 'public');
        }

        $data = [
            'vehicle_id' => $this->vehicle_id,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'status' => $this->status,
            'images' => array_merge($this->uploadedImages, $uploadedPaths),
        ];

        if ($this->damageId) {
            $damage = VehicleDamage::findOrFail($this->damageId);
            $damage->update($data);
            session()->flash('message', 'Vehicle damage updated successfully.');
        } else {
            VehicleDamage::create($data);
            session()->flash('message', 'Vehicle damage created successfully.');
            $this->resetExcept(['vehicles', 'users']);
        }
    }

    public function render()
    {
        return view('livewire.forms.vehicle-damage-form');
    }
}
