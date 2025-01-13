<?php

use App\Livewire\Show\VehicleView;
use App\Models\Vehicle;

Route::view('vehicle/create', 'Vehicle.create')->name('vehicle.create');
Route::view('vehicle/edit/{id}', 'vehicle.edit')->name('vehicle.edit');
Route::get('vehicle/view/{id}', function ($id) {
    // Find the vehicle by ID or show a 404 page if not found
    $vehicle = Vehicle::findOrFail($id);

    // Pass the vehicle data to the view
    return view('Vehicle.vehicle-view', compact('vehicle'));
})->name('vehicle.view');
Route::delete('vehicle/delete/{id}', function ($id) {
    // Find the vehicle by ID or show a 404 page if not found
    $vehicle = Vehicle::findOrFail($id);

    // Delete the vehicle
    $vehicle->delete();

    // Redirect back with a success message
    return redirect()->route('vehicle', $id)->with('success', 'vehicle deleted successfully.');
})->name('vehicle.delete');
/*Route::get('vehicle/view', function () {
    // Fetch all vehicles
    $vehicles = Vehicle::all();

    // Pass vehicles to the view
    return view('vehicle.view', compact('vehicles'));
})->name('vehicle.viewall');*/

Route::get('vehicle', VehicleView::class)->name('vehicle.index');
