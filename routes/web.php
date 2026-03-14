<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Container\Attributes\Auth;


Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware(['auth', 'user_type:admin'])->group(function () {
    // Rutas de categorías - COMPLETAS
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store'); // Cambiado a /categorias
    Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update'); // NUEVA
    Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy'); // NUEVA
    
    
    // Rutas de libros - COMPLETAS
    Route::get('/libros', [LibrosController::class, 'index'])->name('libros.index');
    Route::get('/libros/create', [LibrosController::class, 'create'])->name('libros.create');
    Route::post('/libros', [LibrosController::class, 'store'])->name('libros.store'); // Cambiado de /libros/store a /libros
    Route::get('/libros/{id}/edit', [LibrosController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{id}', [LibrosController::class, 'update'])->name('libros.update');
    Route::delete('/libros/{id}', [LibrosController::class, 'destroy'])->name('libros.destroy');

    // Rutas de usuarios (CRUD completo)
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::get('/usuarios/{id}/delete',[UsuariosController::class,'delete_confirm'])->name('usuarios.delete-confirm');
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');});

    Route::get('/prestamos', [PrestamosController::class, 'index'])->name('prestamos.index');
    Route::get('/prestamos/create',[PrestamosController::class,'create'])->name('prestamos.create');
    Route::post('/prestamos/buscar_usuario', [PrestamosController::class, 'buscar_usuario'])->name('prestamos.buscar_usuario');
    Route::post('/prestamos/select_libro', [PrestamosController::class, 'select_libro'])->name('prestamos.select_libro');
    Route::post('/prestamos/store', [PrestamosController::class, 'store'])->name('prestamos.store');


Route::middleware(['auth', 'user_type:user'])->group(function () {
    
});
