<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SeguridadUsuarioController;
use App\Http\Controllers\DashboardController;

// Rutas para el login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware(['auth', 'role:administrador'])->group(function () {
  // Rutas para usuarios
  Route::resource('usuarios', UsuarioController::class);
  // Rutas para Seguridad Usuarios
  Route::resource('seguridadUsuarios', SeguridadUsuarioController::class);
  // Rutas para estadisticas
  /* Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index'); */
  // Rutas para Usuarios
  Route::get('/lectores', [UsuarioController::class, 'lectores'])->name('usuarios.lectores');
  Route::get('/bibliotecarios', [UsuarioController::class, 'bibliotecarios'])->name('usuarios.bibliotecarios');
  Route::get('/administradores', [UsuarioController::class, 'index'])->name('usuarios.administradores');
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:bibliotecario,administrador'])->group(function (){
  // Rutas para Autores
  Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
  Route::get('/autores/create', [AutorController::class, 'create'])->name('autores.create');
  Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
  Route::get('/autores/{autor}/edit', [AutorController::class, 'edit'])->name('autores.edit');
  Route::put('/autores/{autor}', [AutorController::class, 'update'])->name('autores.update');
  Route::delete('/autores/{autor}', [AutorController::class, 'destroy'])->name('autores.destroy');

  // Rutas para Categorías
  Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
  Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
  Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
  Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
  Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
  Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

  // Rutas para Libros
  Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
  Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
  Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
  Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
  Route::get('/libros/{libro}/show', [LibroController::class, 'show'])->name('libros.show');
  Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
  Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
  Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');
   Route::get('/libros/pdf', [LibroController::class, 'pdf'])->name('libros.pdf');

  // Rutas para Préstamos Libros
  Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
  Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
  Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
  Route::get('/prestamos/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit');
  Route::put('/prestamos/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update');
  Route::delete('/prestamos/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');
});

Route::middleware(['auth', 'role:lector,bibliotecario,administrador'])->group(function (){
  // Rutas para Autores
  Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
  // Rutas para Categorías
  Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
  // Rutas para Libros
  Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
  Route::resource('usuarios', UsuarioController::class);
  Route::get('/mis-prestamos', [PrestamoController::class, 'misPrestamos'])->name('mis-prestamos');
});