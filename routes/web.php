<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlantenController;
use App\Http\Controllers\HomepaginaController;

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