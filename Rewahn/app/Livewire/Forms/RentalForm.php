<?php

namespace App\Livewire\Forms;

use App\Models\Rental;
use App\Models\User;
use App\Models\Vehicle;
use Auth;
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
        'user_id' => 'required|exists:users,id|different:user_id_for_vehicle',
        'start_date' => 'required|date|before:end_date',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:pending,confirmed,active,completed,cancelled,disputed',
    ];

    public function mount()
    {
        $this->vehicles = Vehicle::all();
        $this->user_id = Auth::id();

    }

    public function updatedVehicleId($vehicleId)
    {
        $vehicle = Vehicle::find($vehicleId);

        if ($vehicle) {
            // If the selected vehicle is not owned by the current user, set user_id to the authenticated user.
            if ($vehicle->user_id !== auth()->id()) {
                $this->user_id = auth()->id();
            } else {
                // If the vehicle is owned by the current user, clear the user_id
                $this->user_id = null;
            }
        }
    }

    public function submit()
    {
        // Check if user is not renting their own vehicle
        $vehicle = Vehicle::find($this->vehicle_id);
        if ($vehicle && $this->user_id === $vehicle->user_id) {
            session()->flash('error', 'You cannot rent your own vehicle.');
            return;
        }

        $this->validate();

        // Only allow the vehicle owner to change the rental status
        if ($vehicle && $vehicle->user_id !== auth()->id() && $this->status !== 'pending') {
            session()->flash('error', 'Only the vehicle owner can change the rental status.');
            return;
        }

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
