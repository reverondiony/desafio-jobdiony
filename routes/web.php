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
use App\Http\Controllers\NoticiaController;

/*Route::get('/', function () {
    return view('welcome');
});*/

//RUTAS DE LOGIN
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/custom-login', [AuthController::class, 'login'])->name('custom-login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/logados', [AuthController::class, 'logados'])->name('logados');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//RUTAS DE USUARIO
Route::resource('users', UserController::class);

// RUTAS DE NOTICIA
Route::resource('noticias', NoticiaController::class);