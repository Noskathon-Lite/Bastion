<?php

use App\Http\Livewire\KycAdmin;
use App\Http\Livewire\KycUpload;
use App\Http\Livewire\RentedVehicles;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


require __DIR__.'/vehicle.php';



Route::view('category', 'VehicleCategory.view')->name('vehicle-category.view');
Route::view('category/create', 'VehicleCategory.create')->name('vehicle-category.create');
Route::get('category/view', function () {
    // Fetch all vehicles
    $categories = VehicleCategory::all();
    // Pass vehicles to the view
    return view('VehicleCategory.view', compact('categories'));
    })->name('vehicle-category.viewall');


Route::delete('vehicleDamage/delete/{id}', function ($id) {
    // Find the vehicle by ID or show a 404 page if not found
    $vehicle = Vehicle::findOrFail($id);

    // Delete the vehicle
    $vehicle->delete();

    // Redirect back with a success message
    return redirect()->route('vehicle', $id)->with('success', 'vehicle deleted successfully.');
})->name('damage.delete');


Route::view('rent', 'Rental.create')->name('rent.index');


 //   Route::get('/kyc/upload', KycUpload::class)->name('kyc.upload');
   // Route::get('/admin/kyc', KycAdmin::class)->name('admin.kyc');
