<?php

    namespace App\Http\Livewire;

    use Auth;
    use Livewire\Component;
    use App\Models\Vehicle;
    use App\Models\Rental;

    class RentedVehicles extends Component
    {
        public $vehicles = []; // Array to store vehicles
        public $status; // Variable for rental status
        public $rentalId; // Rental ID for status update

        public function mount()
        {
            // Retrieve vehicles rented out by the logged-in user
            $this->vehicles = Vehicle::where('user_id', Auth::user()->id) // Only show vehicles owned by the user
            ->whereHas('rentals', function ($query) {
                $query->whereIn('status', ['pending', 'confirmed', 'active', 'disputed']); // Only rented vehicles
            })
                ->with(['rentals.user', 'category']) // Load rentals with renter and category info
                ->get();
        }


        public function updateRentalStatus($rentalId, $status)
        {
            // Find the rental by ID
            $rental = Rental::findOrFail($rentalId);

            // Ensure the user is the owner of the vehicle
            if ($rental->vehicle->user_id !== auth()->id()) {
                session()->flash('error', 'You are not authorized to update this rental status.');
                return;
            }

            // Update the rental status
            $rental->update(['status' => $status]);

            // Refresh vehicles to reflect the updated rental status
            $this->refreshVehicles();

            session()->flash('message', 'Rental status updated successfully.');
        }

        public function render()
        {
            return view('livewire.rented-vehicles');
        }
    }
