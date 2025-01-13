<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class PersonalVehicleListing extends Component
{
    public function render()
    {
        $vehicles = Vehicle::where('user_id', auth()->id())->get();

        return view('livewire.personal-vehicle-listing', compact('vehicles'));
    }
}
