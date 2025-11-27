<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\VirementController;

Route::get('/', function () {
    return view('home');
})->name('home');

// === GESTION DES CLIENT ===
Route::resource('clients', ClientController::class);

// === GESTION DES COMPTES ===
Route::resource('comptes', CompteController::class);

// === GESTION DES VIREMENT ===
Route::get('/virement', [VirementController::class, 'create'])->name('virement.create');
Route::post('/virement', [VirementController::class,'store'])->name('virement.store');