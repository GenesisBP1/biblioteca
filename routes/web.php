<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login'); // Esta ruta faltaba
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Ruta home (protegida)
Route::post('/home', [HomeController::class, 'index'])->name('home');

// Ruta para logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');