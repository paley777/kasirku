<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HutangController;

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
//Login-Auth-Logout
Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/hutang', [HutangController::class, 'index'])->middleware('auth');
Route::post('/dashboard/hutangcheck', [HutangController::class, 'check'])->middleware('auth');
Route::resource('/dashboard/goods', GoodController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/customers', CustomerController::class)->middleware('auth');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');
Route::resource('/dashboard/transactions', TransactionController::class)->middleware('auth');

//ORDER BY NOTA
Route::post('/dashboard/orders', [OrderController::class, 'index'])->middleware('auth');
Route::post('/dashboard/orders/create', [OrderController::class, 'create'])->middleware('auth');
Route::post('/dashboard/orders/store', [OrderController::class, 'store'])->middleware('auth');
Route::post('/dashboard/transactions/checkout', [OrderController::class, 'checkout'])->middleware('auth');

//--------------------------KASIR----------------------------------------------------------//
//Cashier INDEX TRANSACTION
Route::get('/dashboard/cashier', [CashierController::class, 'index'])->middleware('auth');
//CREATE TRANSACTION
Route::get('/dashboard/cashier/create', [CashierController::class, 'createtransaction'])->middleware('auth');
//SAVE TRANSACTION
Route::post('/dashboard/cashier/create', [CashierController::class, 'storetransaction'])->middleware('auth');

//CASHIER CREATE ORDERS
Route::post('/dashboard/cashier/createorder', [CashierController::class, 'createorder'])->middleware('auth');
//CASHIER SAVE ORDERS
Route::post('/dashboard/cashier/storeorder', [CashierController::class, 'storeorder'])->middleware('auth');

//CHECKOUT
Route::post('/dashboard/cashiers/checkout', [CashierController::class, 'checkout'])->middleware('auth');
Route::post('/dashboard/cashiers/finishing', [CashierController::class, 'finishing'])->middleware('auth');
//NOTA
Route::post('/dashboard/cashiers/nota', [CashierController::class, 'nota'])->middleware('auth');

//rekapitulasi
Route::get('/dashboard/rekapitulasi', [ReportController::class, 'index'])->middleware('auth');
Route::post('/dashboard/rekapitulasi/goods', [ReportController::class, 'goods'])->middleware('auth');
Route::post('/dashboard/rekapitulasi/transactions', [ReportController::class, 'transactions'])->middleware('auth');
