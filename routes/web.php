<?php
use App\Exports\OrderExport;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
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
Route::get('master', function () {
    return view('master');});
// đáng nhập admin
Route::get('/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('handdle-login', [UserController::class, 'login'])->name('handdle-login');
//chặn quay lại ...
Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::get('page', function () {
        return view('dasboar'); })->name('dasboar');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
//tìm kiếm admin
    Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    // Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    //Thêm sửa xóa admin
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
        Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
        Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
    });
});
//đăng nhập shop
Route::get('/viewlogin', [ShopController::class, 'viewlogin'])->name('viewlogin');
Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
//đăng kí shop
Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
//đăng xuất shop
Route::post('/shoplogout', [ShopController::class, 'logout'])->name('shoplogout');
//shop
Route::get('/mastershop', [ShopController::class, 'index'])->name('shop');
Route::get('/showsanpham/{id}', [ShopController::class, 'show'])->name('showsanpham');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');
Route::delete('/remove-from-cart/{id}', [ShopController::class, 'remove'])->name('remove.from.cart');
Route::patch('/update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
Route::post('/order', [ShopController::class, 'order'])->name('order');
//khách hàng
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
});
//đơn hàng
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
});
//xuất exports
Route::get('/xuat', [OrderController::class, 'exportOrder'])->name('xuat');
//gửi email
Route::post('/email', [ShopController::class, 'quenmatkhau'])->name('quenmatkhau');
Route::get('/form', [ShopController::class, 'viewquenmatkhau'])->name('view.quenmatkhau');


   //Chức vụ
   Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');

    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    // trao quyền
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
   });
   Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
    Route::put('/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');
    Route::get('/adminpass/{id}', [UserController::class, 'adminpass'])->name('user.adminpass');
    Route::put('/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');
    // Route::get('/admin', [UserController::class, 'showAdmin'])->name('user.admin');

});
