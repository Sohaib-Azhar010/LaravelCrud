<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class,'index'])->name('products.index');
Route::get('/Product/Create', [ProductController::class,'create'])->name('products.create');
Route::post('/Product/Store', [ProductController::class,'store'])->name('products.store');
Route::get('/Product/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('/Product/{id}/update', [ProductController::class,'update'])->name('products.update');
Route::delete('/Product/{id}/delete', [ProductController::class,'destroy'])->name('products.delete');
Route::get('Product/{id}/view', [ProductController::class,'show'])->name('products.show');


