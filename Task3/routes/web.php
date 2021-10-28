<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('main');
});
Route::get('Index', [ProductController::class,'Index'])->name('Product.Index');
Route::get('Cart', [ProductController::class,'Cart'])->name('Product.Cart');
Route::get('Edit/Product/{id}', [ProductController::class,'Edit']);
Route::post('Update/Product/{id}', [ProductController::class,'Update']);
Route::get('create', [ProductController::class,'create'])->name('Product.create');
Route::post('store', [ProductController::class,'store'])->name('product.store');
Route::get('Delete/product/{id}', [ProductController::class,'Delete']);
Route::get('Add-to-cart/product/{id}', [ProductController::class,'getAddToCard']);