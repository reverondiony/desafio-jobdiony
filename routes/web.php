<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*Route::get('/', function () {
    return view('welcome');
});*/

//RUTAS DE LOGIN
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/custom-login', [AuthController::class, 'login'])->name('custom-login');
Route::get('/logados', [AuthController::class, 'logados'])->name('logados');

//RUTAS DE USUARIO
Route::resource('users', UserController::class);