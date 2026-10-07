<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| El Viejo Hogar - Web Routes
|--------------------------------------------------------------------------
*/

// Página de inicio (index.html -> index.php)
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/index', [AuthController::class, 'index']);
Route::get('/index.html', [AuthController::class, 'index']);
Route::get('/index.php', [AuthController::class, 'index']);

// Autenticación (login.html -> login.php)
Route::get('/login',      [AuthController::class, 'showLogin'])->name('login');
Route::get('/login.html', [AuthController::class, 'showLogin']);
Route::get('/login.php',  [AuthController::class, 'showLogin']);
Route::post('/login',     [AuthController::class, 'login'])->name('login.post');
Route::post('/login.php', [AuthController::class, 'login']);

// Registro de usuario (crear_usuario.html -> crear_usuario.php)
Route::get('/registro',           [AuthController::class, 'showRegistro'])->name('registro');
Route::get('/crear_usuario',      [AuthController::class, 'showRegistro'])->name('crear_usuario');
Route::get('/crear_usuario.html', [AuthController::class, 'showRegistro']);
Route::get('/crear_usuario.php',  [AuthController::class, 'showRegistro']);
Route::get('/crear-usuario',      [AuthController::class, 'showRegistro']);
Route::post('/registro',          [AuthController::class, 'registro'])->name('registro.post');
Route::post('/crear_usuario',     [AuthController::class, 'registro']);
Route::post('/crear_usuario.php', [AuthController::class, 'registro']);
Route::get('/logout',             [AuthController::class, 'logout'])->name('logout');

// Menú del cliente (menu_usuario.html -> menu_usuario.php)
Route::get('/menu',              [MenuController::class, 'index'])->name('menu');
Route::get('/menu_usuario',      [MenuController::class, 'index'])->name('menu_usuario');
Route::get('/menu_usuario.html', [MenuController::class, 'index']);
Route::get('/menu_usuario.php',  [MenuController::class, 'index']);
Route::get('/menu-usuario',      [MenuController::class, 'index']);
Route::post('/pedido',           [MenuController::class, 'confirmarPedido'])->name('pedido.confirmar');

// Pruebas de usuario (Pruebas_usuario.html -> Pruebas_usuario.php)
Route::get('/pruebas_usuario',      [MenuController::class, 'pruebasUsuario'])->name('pruebas_usuario');
Route::get('/pruebas_usuario.html', [MenuController::class, 'pruebasUsuario']);
Route::get('/pruebas_usuario.php',  [MenuController::class, 'pruebasUsuario']);
Route::get('/Pruebas_usuario',      [MenuController::class, 'pruebasUsuario']);
Route::get('/Pruebas_usuario.html', [MenuController::class, 'pruebasUsuario']);
Route::get('/Pruebas_usuario.php',  [MenuController::class, 'pruebasUsuario']);
Route::get('/pruebas-usuario',      [MenuController::class, 'pruebasUsuario']);

// Panel de Administración (Pruebas_add.html -> Pruebas_add.php)
Route::get('/admin',            [AdminController::class, 'index'])->name('admin');
Route::get('/pruebas_add',      [AdminController::class, 'index'])->name('pruebas_add');
Route::get('/pruebas_add.html', [AdminController::class, 'index']);
Route::get('/pruebas_add.php',  [AdminController::class, 'index']);
Route::get('/Pruebas_add',      [AdminController::class, 'index']);
Route::get('/Pruebas_add.html', [AdminController::class, 'index']);
Route::get('/Pruebas_add.php',  [AdminController::class, 'index']);
Route::get('/pruebas-add',      [AdminController::class, 'index']);

// API JSON para admin (AJAX)
Route::get('/admin/platillos',           [AdminController::class, 'getPlatillos']);
Route::post('/admin/platillos',          [AdminController::class, 'storePlatillo']);
Route::put('/admin/platillos/{id}',      [AdminController::class, 'updatePlatillo']);
Route::delete('/admin/platillos/{id}',   [AdminController::class, 'destroyPlatillo']);

Route::get('/admin/locales',             [AdminController::class, 'getLocales']);
Route::post('/admin/locales',            [AdminController::class, 'storeLocal']);
Route::put('/admin/locales/{id}',        [AdminController::class, 'updateLocal']);
Route::delete('/admin/locales/{id}',     [AdminController::class, 'destroyLocal']);

Route::get('/admin/pedidos',             [AdminController::class, 'getPedidos']);
Route::put('/admin/pedidos/{id}/estado', [AdminController::class, 'updateEstadoPedido']);

