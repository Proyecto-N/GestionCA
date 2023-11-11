<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;

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
    return view('index');
});


// Registration
Route::get('/register', [AuthController::class, 'createRegister'])->name('register.create');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Roles
Route::post('/roles', [RoleController::class, 'store']);
