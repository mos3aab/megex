<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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
// Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/', [AdminController::class,'index']);
Route::get('/admin', [AdminController::class,'setHome']);
Route::post('/admin', [AdminController::class,'updateHome']);


Route::resource('products', ProductController::class);
