<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\DespachoController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\BarcoController;
use App\Http\Controllers\TrenController;
use App\Http\Controllers\VagonesController;
use App\Http\Controllers\LocomotoraDosHPController;
use App\Http\Controllers\LocomotoraCuatroHPController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\InternacionalController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DemoraController;
use App\Http\Controllers\FlotaActualController;
use App\Http\Controllers\MineralController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\ArchivoController;
use App\Exports\UsersExport;


use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Permission;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('historial', RegistrosController::class)->middleware('auth');
Route::resource('usuarios', UserController::class)->middleware('auth');
Route::resource('actividades', ActividadController::class)->only(['index', 'create', 'edit']);
Route::resource('actividades', ActividadController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('mineral', MineralController::class)->middleware('auth');
Route::resource('despachos', DespachoController::class)->middleware('auth');
Route::resource('camion', CamionController::class)->middleware('auth');
Route::resource('barco', BarcoController::class)->middleware('auth');
Route::resource('tren', TrenController::class)->middleware('auth');
Route::resource('vagones', VagonesController::class)->middleware('auth');
//Route::resource('historial', RegistrosController::class)->middleware('auth');
Route::resource('locomotoradoshp', LocomotoraDosHPController::class)->middleware('auth');
Route::resource('locomotoracuatrohp', LocomotoraCuatroHPController::class)->middleware('auth');
Route::resource('produccion', ProduccionController::class)->middleware('auth');
Route::resource('demoras', DemoraController::class)->middleware('auth');
//Route::resource('internacional', InternacionalController::class)->middleware('auth');
Route::resource('FlotaActual', FlotaActualController::class)->middleware('auth');
Route::resource('descargapdf', ArchivoController::class)->middleware('auth');


//Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Route::resource('transportes', TransporteController::class)->name('admin.transportes');

