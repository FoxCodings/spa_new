<?php

use Illuminate\Support\Facades\Route;
use Modules\Clientes\App\Http\Controllers\ClientesController;

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

Route::group(['middleware' => ['web', 'auth', 'canAccess'],'prefix' => 'clientes', 'namespace' => 'Modules\Clientes\App\Http\Controllers'], function()
{
    Route::get('/' , [ClientesController::class, 'index']);
    Route::get('/tablaclientes' , [ClientesController::class, 'tablaclientes']);
    Route::get('/create' , [ClientesController::class, 'create']);

    Route::post('/borrarcontacto' , [ClientesController::class, 'destroy']);
    Route::post('/editarcontacto' , [ClientesController::class, 'editar']);

    Route::get('/{id}/edit' , [ClientesController::class, 'edit']);
    Route::get('/traerDatos' , [ClientesController::class, 'traerDatos']);
    Route::post('/guardarcontacto' , [ClientesController::class, 'store']);
    Route::post('/updatecontacto' , [ClientesController::class, 'update']);



});
