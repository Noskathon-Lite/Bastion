<?php

use App\Models\Vehicle;
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



Route::view('vehicle/category', 'VehicleCategory.create')->name('vehicle-category');

Route::view('vehicle/rent', 'Rental.create')->name('vehicle-rent');
