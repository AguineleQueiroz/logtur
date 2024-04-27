<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Client\ClientList;
use App\Livewire\Passenger\PassengerList;
use App\Livewire\Travel\TravelPackages;
use App\Livewire\Travel\TravelPaymentDetails;
use App\Livewire\Prospect\Prospect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clients', ClientList::class)->name('clients');
    Route::get('/travels', TravelPackages::class)->name('travels');
    Route::get('/travel/payment-details', TravelPaymentDetails::class)->name('payment_details');
    Route::get('/lists', PassengerList::class)->name('lists');
    Route::get('/prospect', Prospect::class)->name('prospect');
});

require __DIR__.'/auth.php';
