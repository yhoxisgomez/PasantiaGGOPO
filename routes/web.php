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
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlotaActualController;
use App\Http\Controllers\MineralController;
use App\Http\Controllers\RegistrosController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ArchivoController;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


//RECORDAR IMPORTAR EL CONTROLADOR
Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','roles:1,2,3,4']],function(){

    Route::resource('usuarios', UserController::class);
    Route::resource('actividades', ActividadController::class)->only(['index', 'create', 'edit']);
    Route::resource('actividades', ActividadController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('mineral', MineralController::class);
    Route::resource('despachos', DespachoController::class);
    Route::get('/despachos/{fecha_inicio}/{fecha_fin}', [DespachoController::class, 'consultaFechasDespacho'])->name('BuscarDespacho');
    Route::resource('camion', CamionController::class);
    Route::get('/camion/{fecha_inicio}/{fecha_fin}', [CamionController::class, 'consultaFechasCamion'])->name('BuscarCamion');
    Route::resource('barco', BarcoController::class);
    Route::get('/barco/{fecha_inicio}/{fecha_fin}', [BarcoController::class, 'consultaFechasBarco'])->name('BuscarBarco');
    Route::resource('tren', TrenController::class);

    Route::resource('vagones', VagonesController::class);
    Route::get('/vagones/{fecha_inicio}/{fecha_fin}', [VagonesController::class, 'consultaFechas'])->name('BuscarFechas');
    Route::resource('historial', RegistrosController::class);


    Route::resource('locomotoradoshp', LocomotoraDosHPController::class);
    Route::resource('locomotoracuatrohp', LocomotoraCuatroHPController::class);
    Route::resource('produccion', ProduccionController::class);
    Route::resource('demoras', DemoraController::class);

    Route::resource('FlotaActual', FlotaActualController::class);

    Route::get('descargapdf', [ArchivoController::class, 'PDF'])->name('descargarPDF');






});






Route::get('/excel', function(){
	return Excel::download(new UsersExport, 'Resumen.xlsx');
});

