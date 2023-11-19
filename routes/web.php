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
Route::get('/', function () {
    return view('index');
});

// Auth
Route::get('/register', [AuthController::class, 'create'])->name('register.create');
Route::post('/register/create', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Users
Route::resource('users', UserController::class)->except(['store', 'create']);

// Roles
Route::resource('roles', RoleController::class);

// Suppliers
Route::resource('suppliers', SupplierController::class);

// Customers
Route::resource('customers', CustomerController::class);

// Concepts
Route::resource('concepts', ConceptController::class);

// Products
Route::resource('products', ProductController::class);

// Sales
Route::resource('sales', SaleController::class);

// Entries
Route::resource('entries', EntryController::class);

// Outputs
Route::resource('outputs', OutputController::class);
