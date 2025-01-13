<?php

namespace App\Livewire\Show;

use Livewire\Component;

class VehicleDamageView extends Component
{

    public $damage;

    public function mount($damageId)
    {
        $this->damage = VehicleDamage::with('vehicle', 'user')->findOrFail($damageId);
    }
    public function render()
    {
        return view('livewire.show.vehicle-damage-view');
    }
}
