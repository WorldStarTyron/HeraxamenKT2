<?php

use App\Http\Controllers\AfsprakenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeurtController;
use App\Http\Controllers\HomepaginaController;
use App\Http\Controllers\KlantenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Homepagina', [HomepaginaController::class, 'index'])->name('Homepagina.index');
Route::get('/KlantenHomepagina', [HomepaginaController::class, 'klantenHomepagina'])->name('KlantenHomepagina.index');

Route::get('/Auth/register', [AuthController::class, 'showRegister'])->name('Auth.Register');
Route::get('/Auth/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/Auth/register', [AuthController::class, 'register'])->name('Store.RigisterPost');
Route::post('/Auth/login', [AuthController::class, 'login'])->name('Store.LoginPost');
Route::post('Auth', [AuthController::class, 'logout'])->name('Auth.Logout');

// Klanten routes
Route::get('/KlantenBeheer', [KlantenController::class, 'index'])->name('KlantenBeheer.index');
Route::get('/KlantenBeheer/create', [KlantenController::class, 'create'])->name('KlantenBeheer.create');
Route::post('/KlantenBeheer', [KlantenController::class, 'store'])->name('klantenBeheer.store');
Route::get('/KlantenBeheer/{id}/edit', [KlantenController::class, 'edit'])->name('klantenBeheer.edit');
Route::put('/KlantenBeheer/{id}', [KlantenController::class, 'update'])->name('klantenBeheer.update');
Route::delete('/KlantenBeheer/{id}', [KlantenController::class, 'destroy'])->name('klantenBeheer.destroy');

// Beurt routes
Route::get('/BeurtBeheren', [BeurtController::class, 'index'])->name('BeurtBeheren.index');
Route::get('/BeurtBeheren/create', [BeurtController::class, 'create'])->name('BeurtBeheren.create');
Route::post('/BeurtBeheren', [BeurtController::class, 'store'])->name('BeurtBeheren.store');
Route::get('/BeurtBeheren/{id}/edit', [BeurtController::class, 'edit'])->name('BeurtBeheren.edit');
Route::put('/BeurtBeheren/{id}', [BeurtController::class, 'update'])->name('BeurtBeheren.update');
Route::delete('/BeurtBeheren/{id}', [BeurtController::class, 'destroy'])->name('BeurtBeheren.destroy');

// Afspraken beheer routes (admin)
Route::get('/AfsprakenBeheer', [AfsprakenController::class, 'index'])->name('AfsprakenBeheer.index');
Route::get('/AfsprakenBeheer/create', [AfsprakenController::class, 'create'])->name('AfsprakenBeheer.create');
Route::post('/AfsprakenBeheer', [AfsprakenController::class, 'store'])->name('AfsprakenBeheer.store');
Route::get('/AfsprakenBeheer/{id}/edit', [AfsprakenController::class, 'edit'])->name('AfsprakenBeheer.edit');
Route::put('/AfsprakenBeheer/{id}', [AfsprakenController::class, 'update'])->name('AfsprakenBeheer.update');
Route::delete('/AfsprakenBeheer/{id}', [AfsprakenController::class, 'destroy'])->name('AfsprakenBeheer.destroy');

// Klanten afspraken routes
Route::get('/MijnAfspraken', [AfsprakenController::class, 'klantIndex'])->name('KlantenAfspraken.index');
Route::post('/MijnAfspraken', [AfsprakenController::class, 'klantStore'])->name('KlantenAfspraken.store');
Route::delete('/MijnAfspraken/{id}', [AfsprakenController::class, 'klantDestroy'])->name('KlantenAfspraken.destroy');
