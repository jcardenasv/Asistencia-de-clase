<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logoutController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'show'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [logoutController::class, 'logout']);
Route::get('/home', [homeController::class, 'index'])->middleware('auth');
