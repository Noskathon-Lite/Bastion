<?php
 
namespace App\Livewire\Show;

use App\Models\VehicleCategory;
use Livewire\Component;
use App\Models\Vehicle;
use Carbon\Carbon;

class VehicleView extends Component
{
    public $selectedCategory = '';
    public $startDate = '';
    public $endDate = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $isGridLayout = true; // Default layout

    public $categories = [];

    public function mount()
    {
        // Load categories once during mounting
        $this->categories = VehicleCategory::all();
    }

    public function applyFilters()
    {
        // This method is optional if no custom logic is needed for filters
    }

    public function clearFilters()
    {
        // Reset all filter properties
        $this->selectedCategory = '';
        $this->startDate = '';
        $this->endDate = '';
        $this->minPrice = '';
        $this->maxPrice = '';
    }

    public function setGridLayout()
    {
        $this->isGridLayout = true;
    }

    public function setListLayout()
    {
        $this->isGridLayout = false;
    }

    public function render()
    {
        // Initialize the query
        $query = Vehicle::query();

        // Apply filters if they are set
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }
        if ($this->startDate) {
            $query->whereDate('created_at', '>=', Carbon::parse($this->startDate));
        }
        if ($this->endDate) {
            $query->whereDate('created_at', '<=', Carbon::parse($this->endDate));
        }
        if ($this->minPrice) {
            $query->where('daily_rate', '>=', $this->minPrice);
        }
        if ($this->maxPrice) {
            $query->where('daily_rate', '<=', $this->maxPrice);
        }

        // Fetch the vehicles based on the filtered query
        $vehicles = $query->get();

        // Return the view with the filtered vehicles and categories
        return view('livewire.vehicle.vehicleview', [
            'vehicles' => $vehicles,
            'categories' => $this->categories,  // Ensure categories are passed to the view
        ])->layout('layouts.app');
    }
}
