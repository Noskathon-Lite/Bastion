<?php

namespace App\Livewire\Forms;

use App\Models\VehicleCategory;
use Livewire\Component;
use App\Models\Vehicle;

class VehicleFormEdit extends Component
{
    public $vehicleId;
    public $user_id;
    public $category_id;
    public $title;
    public $description;
    public $daily_rate;
    public $fuel_capacity;
    public $gps_enabled = true;
    public $gps_type;
    public $status = 'available';
    public $categories=[];

    // Validation rules
    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'category_id' => 'required|exists:vehicle_categories,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'daily_rate' => 'required|numeric|min:0',
        'fuel_capacity' => 'required|numeric|min:0',
        'gps_enabled' => 'boolean',
        'gps_type' => 'nullable|in:mobile,vehicle',
        'status' => 'required|in:available,rented,maintenance,suspended',
    ];

    public function mount($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $this->categories = VehicleCategory::all();
        // Populate properties with vehicle data
        $this->vehicleId = $vehicle->id;
        $this->user_id = $vehicle->user_id;
        $this->category_id = $vehicle->category_id;
        $this->title = $vehicle->title;
        $this->description = $vehicle->description;
        $this->daily_rate = $vehicle->daily_rate;
        $this->fuel_capacity = $vehicle->fuel_capacity;
        $this->gps_enabled = $vehicle->gps_enabled;
        $this->gps_type = $vehicle->gps_type;
        $this->status = $vehicle->status;
    }

    public function update()
    {
        $this->validate();

        $vehicle = Vehicle::findOrFail($this->vehicleId);

        $vehicle->update([
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'daily_rate' => $this->daily_rate,
            'fuel_capacity' => $this->fuel_capacity,
            'gps_enabled' => $this->gps_enabled,
            'gps_type' => $this->gps_type,
            'status' => $this->status,
        ]);

        session()->flash('success', 'vehicle updated successfully.');
    }
    public function render()
    {
        return view('livewire.forms.vehicle-form-edit');
    }
}
