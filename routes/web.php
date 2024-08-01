<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('locale/{lang}', [LocaleController::class, 'setLocale']);

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/search', [WelcomeController::class, 'search']);
Route::patch('/', [WelcomeController::class, 'setSettings'])->name('welcome.settings');
Route::patch('/search', [WelcomeController::class, 'setSettings'])->name('welcome.settings');

Route::resource('driver', DriverController::class)
    ->only(['index', 'store', 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('garage', GarageController::class)
    ->only(['index', 'store', 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('route', RouteController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('route', RouteController::class)
    ->only('show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/garage', [GarageController::class, 'settings'])->name('garage.settings');
});

require __DIR__.'/auth.php';
