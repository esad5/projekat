<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UslugaController;
use App\Http\Controllers\MaterijalUslugeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/', function(){
    return view('cars.index');
})->name('cars');
*/

Route::middleware(['auth:sanctum', 'verified'])->get('cars', [CarController::class, 'index'])->name('cars');
Route::middleware(['auth:sanctum', 'verified'])->get('add_car', [CarController::class, 'create'])->name('add_car');
Route::middleware(['auth:sanctum', 'verified'])->post('store_car', [CarController::class, 'store'])->name('store_car');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_car', [CarController::class, 'delete'])->name('delete_car');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_car', [CarController::class, 'edit'])->name('edit_car');
Route::middleware(['auth:sanctum', 'verified'])->post('update_car', [CarController::class, 'update'])->name('update_car');

Route::middleware(['auth:sanctum', 'verified'])->get('brands', [BrandController::class, 'index'])->name('brands');

Route::middleware(['auth:sanctum', 'verified'])->get('uslugas', [UslugaController::class, 'index'])->name('uslugas');
Route::middleware(['auth:sanctum', 'verified'])->get('materijal_usluges', [MaterijalUslugeController::class, 'index'])->name('materijal_usluges');



