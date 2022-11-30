<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;

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

Route::get('/', [loginController::class, 'show'])->name('login');
Route::get('/login', [loginController::class, 'show'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [logoutController::class, 'logout']);
Route::get('/home', [homeController::class, 'index'])->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
Route::get('/users/new', [UserController::class, 'create'])->middleware('auth')->middleware('canAccess');;
Route::post('/teachers', [TeacherController::class, 'store'])->middleware('auth');
