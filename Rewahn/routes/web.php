<?php

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


Route::view('vehicle/rent', 'Rental.create')->name('vehicle-rent');
