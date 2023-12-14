<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EstadoReservasController;
use App\Http\Controllers\MetodoPagosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\TipoServiciosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\DetalleFacturasController;
use App\Http\Controllers\CamasController;
use App\Http\Controllers\EstadoHabitacionesController;
use App\Http\Controllers\TipoHabitacionesController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaHabitacionesController;
use App\Http\Controllers\MobiliariosController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\ServiciosAdicionalesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


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
    return view('welcome');
});


Route::resource('roles', RolesController::class);
Route::resource('usuarios', UsuariosController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('empleados', EmpleadosController::class);
Route::resource('estado_reservas', EstadoReservasController::class);
Route::resource('metodo_pagos', MetodoPagosController::class);
Route::resource('reservas', ReservasController::class);
Route::resource('facturas', FacturasController::class);
Route::resource('tipo_servicios', TipoServiciosController::class);
Route::resource('productos', ProductosController::class);
Route::resource('detalle_facturas', DetalleFacturasController::class);
Route::resource('camas', CamasController::class);
Route::resource('estado_habitaciones', EstadoHabitacionesController::class);
Route::resource('tipo_habitaciones', TipoHabitacionesController::class);
Route::resource('habitaciones', HabitacionesController::class);
Route::resource('reserva_habitaciones', ReservaHabitacionesController::class);
Route::resource('mobiliarios', MobiliariosController::class);
Route::resource('inventarios', InventariosController::class);
Route::resource('servicios_adicionales', ServiciosAdicionalesController::class);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
