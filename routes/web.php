<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Error fix tom
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [UserController::class, 'login'])->name('userdashboard.store');

Route::get('/userdashboard', [UserController::class, 'userdashboard']) ->name('userdashboard.index');
Route::post('/userdashboard', [UserController::class, 'store']) ->name('userdashboard.store');
Route::get('/userdashboard/{userdashboard}/edit', [UserController::class, 'edit']) ->name('edit');
Route::put('/userdashboard/{userdashboard}/update', [UserController::class, 'update']) ->name('update');
Route::delete('/userdashboard/{userdashboard}/delete', [UserController::class, 'delete']) ->name('delete');
