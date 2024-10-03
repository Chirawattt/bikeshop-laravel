<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

// Import Auth Facade
use Illuminate\Support\Facades\Auth;


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


Route::get('/home', [HomeController::class, 'index']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/search', [ProductController::class, 'search']);
Route::post('/product/search', [ProductController::class, 'search']);
Route::post('/product/insert', [ProductController::class, 'insert']);
Route::get('/product/edit/{id?}', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
Route::get('/product/remove/{id}', [ProductController::class, 'remove']);

// Category
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/search', [CategoryController::class, 'search']);
Route::post('/category/search', [CategoryController::class, 'search']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/edit/{id?}', [CategoryController::class, 'edit']);
Route::post('/category/update', [CategoryController::class, 'update']);
Route::get('/category/remove/{id}', [CategoryController::class, 'remove']);

// Cart
Route::get('/cart/view', [CartController::class, 'viewCart']);
Route::get('/cart/add/{id}', [CartController::class, 'addToCart']);
Route::get('/cart/delete/{id}', [CartController::class, 'deleteCart']);
Route::get('/cart/update/{id}/{qty}', [CartController::class, 'updateCart']);
Route::get('/cart/checkout', [CartController::class, 'checkout']);
Route::get('/cart/complete', [CartController::class, 'complete']);
Route::get('/cart/finish', [CartController::class, 'finish_order']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout']);
