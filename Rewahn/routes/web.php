<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\RentalForm;
use App\Http\Livewire\RentalEditForm;
use App\Http\Livewire\RentalView;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::view('vehicle', 'vehicle.create')->name('vehicle');
Route::view('vehicle/{vehicleID}/view', 'vehicle.vehicle-view')->name('vehicle.view');                                  


Route::get('/rentals/create', RentalForm::class)->name('rentals.create');
Route::get('/rentals/{rentalId}/edit', RentalEditForm::class)->name('rentals.edit');
Route::get('/rentals/{rentalId}', RentalView::class)->name('rentals.view');