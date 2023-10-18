<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['entradas.api'])->group(function () {
    Route::post('/save',[EntradaController::class,"save"]);
});

Route::get('/list',[EntradaController::class,"get"]);
Route::get('/find',[EntradaController::class,"find"]);
Route::get('/list/{id}',[EntradaController::class,"select"])->where('id', '[0-9]+');
