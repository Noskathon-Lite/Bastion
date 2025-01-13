<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $contacts;
    public $vehicles;
    public $kycStatus;
    public $rentedVehicles;
    public $rentalRequests;

    public function mount()
    {
        $user = Auth::user();

        // Fetch data for the dashboard
        $this->contacts = $user->contacts;
        $this->vehicles = $user->vehicles;
        $this->kycStatus = $user->kycVerification?->status ?? 'Not Submitted';
        $this->rentedVehicles = $user->rentals()->where('status', 'active')->get();
        $this->rentalRequests = \App\Models\Rental::where('vehicle_owner_id', $user->id)->where('status', 'pending')->get();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
