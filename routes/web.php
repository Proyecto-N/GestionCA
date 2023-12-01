<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\OutputController;

// Index
Route::get('/', fn() => view('index'))->middleware('auth');

// Auth
Route::middleware(['auth'])->group(function() {
    Route::get('/register', [AuthController::class, 'create'])->name('register.create');
    Route::post('/register/create', [AuthController::class, 'store'])->name('register.store');
});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Users
Route::resource('users', UserController::class)->middleware('auth')->except(['store', 'create']);

// Roles
Route::resource('roles', RoleController::class)->middleware('auth');

// Suppliers
Route::resource('suppliers', SupplierController::class)->middleware('auth');

// Customers
Route::resource('customers', CustomerController::class)->middleware('auth');

// Concepts
Route::resource('concepts', ConceptController::class)->middleware('auth');

// Products
Route::resource('products', ProductController::class)->middleware('auth');

// Sales
Route::resource('sales', SaleController::class)->middleware('auth');

// Entries
Route::resource('entries', EntryController::class)->middleware('auth');

// Outputs
Route::resource('outputs', OutputController::class)->middleware('auth');
