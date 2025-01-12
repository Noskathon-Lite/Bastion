<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\VehicleCategory;


class VehicleCategoryForm extends Component
{
    public $name;
    public $min_price;
    public $max_price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'min_price' => 'required|numeric|min:0',
        'max_price' => 'required|numeric|min:0|gte:min_price', // max price must be greater than or equal to min price
    ];

    public function submit()
    {
        $this->validate();

        VehicleCategory::create([
            'name' => $this->name,
            'min_price' => $this->min_price,
            'max_price' => $this->max_price,
        ]);

        session()->flash('message', 'Vehicle category added successfully.');
        $this->reset(); // Clear the form after submission
    }
    public function render()
    {
        return view('livewire.forms.vehicle-category-form');
    }
}
