<?php

namespace App\Livewire\Show;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\VehicleCategory;

class VehicleCategoryView extends Component
{
    public $category;

    public function mount($categoryId)
    {
        $this->category = VehicleCategory::findOrFail($categoryId);
    }

    public function render()
    {
        return view('livewire.show.vehicle-category-view');
    }
}
