<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(PersonaController::class)->group(function () {
    Route::get('personas', 'index');
    Route::post('personas', 'store');
    Route::get('personas/{id}', 'show');
    Route::put('personas/{id}', 'update');
    Route::delete('personas/{id}', 'destroy');
}); 

