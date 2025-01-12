<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class RentalForm extends Component
{
    public $vehicle_id;
    public $user_id;
    public $start_date;
    public $end_date;
    public $status = 'pending';

    public $vehicles = [];
    public $users = [];

    protected $rules = [
        'vehicle_id' => 'required|exists:vehicles,id',
        'user_id' => 'required|exists:users,id',
        'start_date' => 'required|date|before:end_date',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:pending,confirmed,active,completed,cancelled,disputed',
    ];

    public function mount()
    {
        $this->vehicles = Vehicle::all();
        $this->users = User::all();
    }

    public function submit()
    {
        $this->validate();

        Rental::create([
            'vehicle_id' => $this->vehicle_id,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Rental created successfully.');
        $this->reset(); // Clear the form after submission
    }

    public function render()
    {
        return view('livewire.forms.rental-form');
    }
}
