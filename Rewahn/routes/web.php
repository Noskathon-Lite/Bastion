<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::view('vehicle', 'Vehicle.create')->name('vehicle');
Route::view('vehicle/view', 'vehicle.vehicle-view')->name('vehicle.view');

Route::view('vehicle/category', 'VehicleCategory.create')->name('vehicle-category');

Route::view('vehicle/rent', 'Rental.create')->name('vehicle-');
