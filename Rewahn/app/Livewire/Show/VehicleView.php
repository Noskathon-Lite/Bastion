<?php

namespace App\Livewire\Show;

use Livewire\Component;
use App\Models\Vehicle;

class VehicleView extends Component
{
    public $vehicle;

    public function mount($id)
    {
        $this->vehicle = Vehicle::with('category', 'user')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.show.vehicle-view');
    }
}
