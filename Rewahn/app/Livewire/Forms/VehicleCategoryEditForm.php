<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
class VehicleCategoryEditForm extends Component
{
    public $category;
    public $name;
    public $min_price;
    public $max_price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'min_price' => 'required|numeric|min:0',
        'max_price' => 'required|numeric|min:0|gte:min_price',
    ];

    public function mount($categoryId)
    {
        $this->category = VehicleCategory::find($categoryId);
        $this->name = $this->category->name;
        $this->min_price = $this->category->min_price;
        $this->max_price = $this->category->max_price;
    }

    public function update()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'min_price' => $this->min_price,
            'max_price' => $this->max_price,
        ]); 

        session()->flash('message', 'Vehicle category updated successfully.');
    }

    public function render()
    {
        return view('livewire.forms.vehicle-category-edit-form');
    }
}
