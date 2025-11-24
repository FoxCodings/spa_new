<?php

use Illuminate\Support\Facades\Route;
use Modules\Grupos\App\Http\Controllers\GruposController;

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

Route::group([], function () {
    Route::resource('grupos', GruposController::class)->names('grupos');
});
