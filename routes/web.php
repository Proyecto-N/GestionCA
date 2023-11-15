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
use App\Htpp\Controllers\OutputController;

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
Route::post('/register/create', [AuthController::class, 'store'])->name('register.store');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

// Suppliers
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');

// Customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Concepts
Route::get('/concepts', [ConceptController::class, 'index'])->name('concepts.index');
Route::get('/concepts/create', [ConceptController::class, 'create'])->name('concepts.create');
Route::post('/concepts', [ConceptController::class, 'store'])->name('concepts.store');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Sales
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

// Entries
Route::get('/entries', [EntryController::class, 'index'])->name('entries.index');
Route::get('/entries/create', [EntryController::class, 'create'])->name('entries.create');
Route::post('/entries', [EntryController::class, 'store'])->name('entries.store');

// Outputs
Route::get('/outputs', [OutputController::class, 'index'])->name('outputs.index');
// Route::get('/outputs/create', [OutputController::class, 'create'])->name('outputs.create');
Route::post('/outputs', [OutputController::class, 'store'])->name('outputs.store');
