<?php

namespace App\Livewire\Show;

use Livewire\Component;

class RentalView extends Component
{

    public $rental;

    public function mount($rentalId)
    {
        $this->rental = Rental::findOrFail($rentalId);
    }
    public function render()
    {
        return view('livewire.show.rental-view');
    }
}
