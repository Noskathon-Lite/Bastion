<?php

namespace App\Livewire\Forms;

use App\Models\VehicleCategory;
use Auth;
use Livewire\Component;
use App\Models\Vehicle;

class VehicleForm extends Component
{
    public $user_id;
    public $category_id;
    public $title;
    public $description;
    public $daily_rate;
    public $fuel_capacity;
    public $gps_enabled = true;
    public $gps_type;
    public $status = 'available';
    public $categories = [];

    public function mount()
    {
        // Fetch the categories and populate the $categories property
        $this->categories = VehicleCategory::all();
        $this->user_id = Auth::id(); // Automatically retrieve the authenticated user's ID
    }

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


    public function save()
    {
        $this->validate();

        Vehicle::create([
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

        session()->flash('success', 'vehicle added successfully!');
        $this->reset();
        return redirect()->route('vehicle.view');
    }
    public function render()
    {
        return view('livewire.forms.vehicle-form');
    }
}
