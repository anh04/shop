<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RelativeProductController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\StateController;

use App\Http\Middleware\AdminLogin;

use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::controller(RegisterController::class)->group(function() {
    Route::post('/create_user', 'createUser')->name('register.create');
});


Route::get('/logout', [LoginController::class, 'logout']);



Auth::routes();


Route::get('/checklogin', [App\Http\Controllers\HomeController::class, 'checkLogin']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/female-polo-shirt', [ProductController::class, 'femalePoloShirt'])->name('femalePoloShirt');
Route::get('/female-no-neck-t-shirt', [ProductController::class, 'femaleNoNeckTShirt'])->name('femaleNoNeckTShirt');
Route::get('/male-polo-shirt', [ProductController::class, 'malePoloShirt'])->name('malePoloShirt');
Route::get('/male-no-neck-t-shirt', [ProductController::class, 'maleNoNeckTShirt'])->name('maleNoNeckTShirt');

//error member array  Route::post('search_product_type', [ProductController::class, 'searchProductType']->name('search.productType'));
Route::post('search_product_type', [ProductController::class, 'searchProductType']);

Route::get('aothun/{prd_id}', [ProductController::class, 'aothun'])->name('product.aothun');
/************Library**************/
Route::get('create/', [LibraryController::class, 'create']);
Route::post('create/',[LibraryController::class, 'store']);
Route::get('edit/{id}', [LibraryController::class, 'edit'])->name('file.edit');
Route::post('edit/', [LibraryController::class, 'update']);

Route::post('add_image_library/',[LibraryController::class, 'add_image_library']);

Route::post('libraries/', [LibraryController::class, 'libraries']);
/********************************************************/
Route::get('checkout/cart/', [ProductController::class, 'cart'])->name('checkout.cart');
Route::get('checkout/payment/', [ProductController::class, 'payment'])->name('checkout.payment');
Route::post('check_discount', [DiscountController::class, 'getDiscount']);

Route::group(['middleware' => 'is_login'], function () {
    Route::get('checkout/payment/', [ProductController::class, 'payment'])->name('checkout.payment');
    Route::post('checkout/payment/', [OrderController::class, 'createOrder']);
    Route::get('orders/', [OrderController::class, 'orderList'])->name('review.orders');
});
Route::group(['middleware' => 'is_valid_access_order'], function () {
    Route::get('order/{order_id}', [OrderController::class, 'orderDetail'])->name('review.order');
});
//admin
Route::group(['middleware' => 'is_admin_login'], function() {
    Route::get('admin/product', [ProductController::class, 'product'])->name('product.add');
    Route::post('admin/product', [ProductController::class, 'saveProduct'])->name('saveProduct');
    Route::get('admin/product-list', [ProductController::class, 'productList'])->name('products.list');
    Route::get('admin/product/{prd_id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('admin/product/{prd_id}', [ProductController::class, 'updateproduct'])->name('product.update');
    });
/*
 City, ward,district
 */
Route::get('get_districts/', [DistrictController::class, 'districtsByCity']);
Route::get('get_wards/', [DistrictController::class, 'wardsByDistrict']);

Route::get('get_cities/', [StateController::class, 'getcityState']);
Route::get('get_zips/', [StateController::class, 'getZip']);
