<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/search', [ProductController::class, 'search']);
Route::post('/product/search', [ProductController::class, 'search']);
Route::post('/product/insert', [ProductController::class, 'insert']);
Route::get('/product/edit/{id?}', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
