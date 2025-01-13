<?php

namespace App\Livewire\Forms;

use App\Models\Rental;
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
$this->user_id = Auth::id();
}

public function updatedVehicleId($vehicleId)
{
$vehicle = Vehicle::find($vehicleId);

if ($vehicle) {
// Prevent users from renting their own vehicle
if ($vehicle->user_id === auth()->id()) {
session()->flash('error', 'You cannot rent your own vehicle.');
$this->vehicle_id = null;
}
}
}

public function submit()
{
$vehicle = Vehicle::find($this->vehicle_id);

// Check if the vehicle exists and isn't owned by the authenticated user
if (!$vehicle || $vehicle->user_id === $this->user_id) {
session()->flash('error', 'Invalid rental. You cannot rent your own vehicle.');
return;
}

// Allow only pending status for non-owners
if ($vehicle->user_id !== auth()->id() && $this->status !== 'pending') {
session()->flash('error', 'Only the vehicle owner can change the rental status.');
return;
}

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
