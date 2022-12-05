<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\classeController;
use App\Http\Controllers\attendanceController;

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

#LOGIN
Route::get('/', [loginController::class, 'show'])->name('login');
Route::get('/login', [loginController::class, 'show'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [logoutController::class, 'logout']);
Route::get('/home', [homeController::class, 'index'])->middleware('auth');

#USERS
Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
Route::get('/users/new', [UserController::class, 'create'])->middleware('auth')->middleware('canAccess');
Route::get('/users/edit', [UserController::class, 'edit'])->middleware('auth')->middleware('canAccess');
Route::post('/users/edit', [UserController::class, 'search'])->middleware('auth')->middleware('canAccess');
Route::put('/users/edit', [UserController::class, 'update'])->middleware('auth')->middleware('canAccess')->name('users.update');
Route::get('/users/delete', [UserController::class, 'delete'])->middleware('auth')->middleware('canAccess');
Route::delete('/users/delete', [UserController::class, 'destroy'])->middleware('auth')->middleware('canAccess');

#COURSES
Route::get('/courses', [CourseController::class, 'index'])->middleware('auth');
Route::post('/courses', [CourseController::class, 'store'])->middleware('auth');
Route::get('/courses/new', [CourseController::class, 'create'])->middleware('auth')->middleware('canAccess');
Route::get('/courses/edit', [CourseController::class, 'edit'])->middleware('auth')->middleware('canAccess');
Route::post('/courses/edit', [CourseController::class, 'search'])->middleware('auth')->middleware('canAccess');
Route::put('/courses/edit', [CourseController::class, 'update'])->middleware('auth')->middleware('canAccess')->name('courses.update');
Route::get('/courses/delete', [CourseController::class, 'delete'])->middleware('auth')->middleware('canAccess');
Route::delete('/courses/delete', [CourseController::class, 'destroy'])->middleware('auth')->middleware('canAccess');

#CLASSES
Route::get('/classes', [classeController::class, 'index'])->middleware('auth');
Route::post('/classes', [classeController::class, 'store'])->middleware('auth');
Route::get('/classes/new', [classeController::class, 'create'])->middleware('auth')->middleware('teacherAccess');
Route::get('/classes/edit', [classeController::class, 'edit'])->middleware('auth')->middleware('teacherAccess');
Route::post('/classes/edit', [classeController::class, 'search'])->middleware('auth')->middleware('teacherAccess');
Route::put('/classes/edit', [classeController::class, 'update'])->middleware('auth')->middleware('teacherAccess')->name('classes.update');
Route::get('/classes/delete', [classeController::class, 'delete'])->middleware('auth')->middleware('teacherAccess');
Route::delete('/classes/delete', [classeController::class, 'destroy'])->middleware('auth')->middleware('teacherAccess');

#ATTENDANCES
Route::get('/attendances', [attendanceController::class, 'index'])->middleware('auth');
Route::post('/attendances', [attendanceController::class, 'store'])->middleware('auth');
Route::get('/attendances/new', [attendanceController::class, 'create'])->middleware('auth')->middleware('teacherAccess');
Route::get('/attendances/edit', [attendanceController::class, 'edit'])->middleware('auth')->middleware('teacherAccess');
Route::post('/attendances/edit', [attendanceController::class, 'search'])->middleware('auth')->middleware('teacherAccess');
Route::put('/attendances/edit', [attendanceController::class, 'update'])->middleware('auth')->middleware('teacherAccess')->name('attendances.update');
Route::get('/attendances/delete', [attendanceController::class, 'delete'])->middleware('auth')->middleware('teacherAccess');
Route::delete('/attendances/delete', [attendanceController::class, 'destroy'])->middleware('auth')->middleware('teacherAccess');
Route::get('/attendances/students', [attendanceController::class, 'searchStudent'])->middleware('auth');
Route::get('/attendances/student', [attendanceController::class, 'indexStudent'])->middleware('auth');

#TEACHER ASSIGN
Route::get('/courses/teacher_assign', [CourseController::class, 'teacherAssign'])->middleware('auth')->middleware('canAccess');
Route::post('/courses/teacher_assign/search_course', [CourseController::class, 'searchCourse'])->middleware('auth')->middleware('canAccess');
Route::post('/courses/teacher_assign/assign', [CourseController::class, 'assign'])->middleware('auth')->middleware('canAccess');

#ENROLL STUDENT
Route::get('/enroll', [CourseController::class, 'enrollStudent'])->middleware('auth')->middleware('canAccess');
Route::post('/enroll', [CourseController::class, 'enroll'])->middleware('auth')->middleware('canAccess');
Route::post('/enroll/search_course', [CourseController::class, 'searchCourseEnroll'])->middleware('auth')->middleware('canAccess');

