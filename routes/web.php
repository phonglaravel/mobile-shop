<?php

use App\Http\Controllers\CateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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
Auth::routes();
Route::get('/admincp/login', [App\Http\Controllers\HomeController::class, 'login'])->name('admin.login');
Route::prefix('admincp')->middleware('auth','is_admin')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('category',CategoryController::class);
    Route::resource('cate',CateController::class);
    Route::resource('product',ProductController::class);
    Route::resource('coupon',CouponController::class);
    Route::resource('order',OrderController::class);
    Route::delete('delete-image/{id}',[ProductController::class,'delete_image'])->name('delete_image');
});
Route::get('danhmuccon',[ProductController::class,'danhmuccon']);
Route::get('',[IndexController::class,'index'])->name('page.index');
Route::get('danh-muc/{slug}',[IndexController::class,'category'])->name('page.category');
Route::post('danh-muc/{slug}/filter',[IndexController::class,'filter'])->name('page.filter');
Route::get('danh-muc/{slug_category}/{slug_cate}',[IndexController::class,'cate'])->name('page.cate');
Route::get('san-pham/{slug_category}/{slug_product}/{slug_dungluong}',[IndexController::class,'product'])->name('page.product');
Route::get('san-pham/{slug_category}/{slug_product}',[IndexController::class,'product1'])->name('page.product1');
Route::get('gio-hang',[IndexController::class,'cart'])->name('page.cart');
Route::post('save-cart/{id}',[IndexController::class,'save_cart'])->name('save_cart');
Route::get('delete-cart/{id}',[IndexController::class,'delete_cart'])->name('delete_cart');
Route::get('qtydown/{id}/{qty}',[IndexController::class,'qty_down'])->name('qty_down');
Route::get('qtyup/{id}/{qty}',[IndexController::class,'qty_up'])->name('qty_up');
Route::post('check-coupon',[IndexController::class,'check_coupon'])->name('check_coupon');
Route::get('delete-coupon',[IndexController::class,'delete_coupon'])->name('delete_coupon');
Route::get('thanh-toan',[IndexController::class,'checkout'])->name('page.checkout');
Route::post('checkout',[IndexController::class,'send_checkout'])->name('send_checkout');
Route::post('tim-kiem',[IndexController::class,'search'])->name('page.search');
Route::get('search',[IndexController::class,'search_ajax']);
Route::get('search1',[IndexController::class,'search_ajax1']);
Route::post('send-comment/{id}',[IndexController::class,'comment'])->name('comment');
Route::get('so-sanh-2/{id0}-vs-{id1}',[IndexController::class,'compare2'])->name('page.compare2');
Route::get('so-sanh-3/{id0}-vs-{id1}-vs-{id2}',[IndexController::class,'compare3'])->name('page.compare3');




