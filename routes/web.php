<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/mastershop', [ShopController::class, 'index'])->name('shop');

Route::get('/showsanpham/{id}', [ShopController::class, 'show'])->name('showsanpham');














Route::get('master', function () {
    return view('master');
});
Route::get('/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('handdle-login', [UserController::class, 'login'])->name('handdle-login');
Route::get('/register', [UserController::class, 'viewRegister'])->name('viewRegister');
Route::post('handdle-register', [UserController::class, 'register'])->name('handdle-register');
Route::middleware(['auth'])->group(function () {

    Route::get('page', function () {return view('dasboar');})->name('dasboar');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    
});
