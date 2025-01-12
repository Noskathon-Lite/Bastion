<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class RentalFormEdit extends Component
{

    public $rental;
    public $vehicle_id;
    public $user_id;
    public $start_date;
    public $end_date;
    public $status;

    public $vehicles = [];
    public $users = [];

    protected $rules = [
        'vehicle_id' => 'required|exists:vehicles,id',
        'user_id' => 'required|exists:users,id',
        'start_date' => 'required|date|before:end_date',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:pending,confirmed,active,completed,cancelled,disputed',
    ];

    public function mount($rentalId)
    {
        $this->rental = Rental::findOrFail($rentalId);
        $this->vehicle_id = $this->rental->vehicle_id;
        $this->user_id = $this->rental->user_id;
        $this->start_date = $this->rental->start_date;
        $this->end_date = $this->rental->end_date;
        $this->status = $this->rental->status;

        $this->vehicles = Vehicle::all();
        $this->users = User::all();
    }

    public function update()
    {
        $this->validate();

        $this->rental->update([
            'vehicle_id' => $this->vehicle_id,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Rental updated successfully.');
    }
    public function render()
    {
        return view('livewire.forms.rental-form-edit');
    }
}
