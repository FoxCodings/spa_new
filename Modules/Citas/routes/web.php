<?php

use Illuminate\Support\Facades\Route;
use Modules\Citas\App\Http\Controllers\CitasController;

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

Route::group(['middleware' => ['web', 'auth', 'canAccess'],'prefix' => 'citas', 'namespace' => 'Modules\Citas\App\Http\Controllers'], function()
{

// Route::group([], function () {
  Route::get('/' , [CitasController::class, 'index']);
    // Route::resource('citas', CitasController::class)->names('citas');
});
