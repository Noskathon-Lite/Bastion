<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class VehicleForm extends Component
{
    public $user_id;
    public $category_id;
    public $title;
    public $description;
    public $base_price;
    public $daily_rate;
    public $fuel_capacity;
    public $gps_enabled = true;
    public $gps_type;
    public $status = 'available';
    public $categories = [];

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'category_id' => 'required|exists:vehicle_categories,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'base_price' => 'required|numeric|min:0',
        'daily_rate' => 'required|numeric|min:0',
        'fuel_capacity' => 'required|numeric|min:0',
        'gps_enabled' => 'boolean',
        'gps_type' => 'nullable|in:mobile,vehicle',
        'status' => 'required|in:available,rented,maintenance,suspended',
    ];

    // public function mount()
    // {
    //     $this->categories = VehicleCategory::all();
    // }

    public function save()
    {
        $this->validate();

        Vehicle::create([
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'base_price' => $this->base_price,
            'daily_rate' => $this->daily_rate,
            'fuel_capacity' => $this->fuel_capacity,
            'gps_enabled' => $this->gps_enabled,
            'gps_type' => $this->gps_type,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Vehicle added successfully!');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.forms.vehicle-form');
    }
}
