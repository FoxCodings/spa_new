<?php

use Illuminate\Support\Facades\Route;
use Modules\Grupos\App\Http\Controllers\GruposController;
use Modules\Grupos\App\Http\Controllers\ComisionadosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web', 'auth', 'canAccess'],'prefix' => 'grupos', 'namespace' => 'Modules\Grupos\App\Http\Controllers'], function()
{
    //Route::resource('grupos', GruposController::class)->names('grupos');

    Route::get('/', [ComisionadosController::class, 'index']);
    Route::get('/create', [ComisionadosController::class, 'create']);
    Route::post('/store', [ComisionadosController::class, 'store']);
    Route::get('/{id}/edit', [ComisionadosController::class, 'edit']);
    Route::put('/{id}/reactivar', [ComisionadosController::class, 'reactivar']);
    Route::put('/{id}', [ComisionadosController::class, 'update']);
    Route::get('/tablaEstatus', [ComisionadosController::class, 'tablaEstatus']);
    Route::get('buscarPersonas/{query}', [ComisionadosController::class, 'buscarPersonas']);
    Route::get('/datos_area/{id}', [ComisionadosController::class, 'datos_area']);
    Route::get('/buscaAreas/{id}/{filtra_roles}/{tipo}', [ComisionadosController::class, 'buscaAreas']);

    Route::post('/create_area', [ComisionadosController::class, 'create_area']);
    Route::post('/update_area/{id}', [ComisionadosController::class, 'update_area']);
    Route::delete('/borrar', [ComisionadosController::class, 'delete_area']);
    Route::post('/TraerPersonal', [ComisionadosController::class, 'TraerPersonal']);
    Route::post('/NivelEstructura', [ComisionadosController::class, 'NivelEstructura']);
    Route::get('/tablaPersonal', [ComisionadosController::class, 'tablaPersonal']);
    Route::get('/tablaPersonalFirmantes', [ComisionadosController::class, 'tablaPersonalFirmantes']);
    Route::post('/ExistePersonal', [ComisionadosController::class, 'ExistePersonal']);
    Route::post('/ExistePersonalFirmante', [ComisionadosController::class, 'ExistePersonalFirmante']);
    Route::post('/AltaPersonal', [ComisionadosController::class, 'AltaPersonal']);

    Route::post('/AltaPersonalFirmante', [ComisionadosController::class, 'AltaPersonalFirmante']);
    Route::delete('/destroy', [ComisionadosController::class, 'destroy']);
    Route::delete('/destroyFirmante', [ComisionadosController::class, 'destroyFirmante']);
    Route::post('/BuscarAreaExistente', [ComisionadosController::class, 'BuscarAreaExistente']);
    Route::post('/importar', [ComisionadosController::class, 'articulosimp']);
    Route::get('/create', [ComisionadosController::class, 'create']);
    Route::get('/show', [ComisionadosController::class, 'show']);
    Route::post('/TraerDatosPersonal', [ComisionadosController::class, 'TraerDatosPersonal']);
    Route::post('/editarEmpleado', [ComisionadosController::class, 'editarEmpleado']);
    Route::post('/UpdatePersonal', [ComisionadosController::class, 'UpdatePersonal']);

    Route::post('/editarFirmantes', [ComisionadosController::class, 'editarFirmantes']);
    Route::post('/UpdatePersonalFirmante', [ComisionadosController::class, 'UpdatePersonalFirmante']);


});
