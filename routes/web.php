<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\userController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/product',[ProductController::class,'index'])->name('productList');


Route::get('/category',[CategoryController::class,'index'])->name('categoryList');


Route::get('/customer',[CustomerController::class,'index'])->name('customerList');

Route::get('/order',[OrderController::class,'index'])->name('orderList');

Route::get('/user',[UserController::class,'index'])->name('userList');


require __DIR__.'/auth.php';
