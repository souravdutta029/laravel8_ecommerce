<?php

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeBannerController;

//Front Controllers
use App\Http\Controllers\Front\FrontController;

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

    // Front Routes
    Route::get('/',[FrontController::class,'index']);
    Route::get('category/{id}',[FrontController::class,'category']);
    Route::get('product/{id}',[FrontController::class,'product']);
    Route::post('add_to_cart',[FrontController::class,'add_to_cart']);
    Route::get('cart',[FrontController::class,'cart']);
    Route::get('search/{str}',[FrontController::class,'search']);
    Route::get('registration',[FrontController::class,'registration']);
    Route::post('registration_process',[FrontController::class,'registration_process'])->name('registration.registration_process');
    Route::post('login_process',[FrontController::class,'login_process'])->name('login.login_process');

    // Front Logout Route
    Route::get('/logout', function () {
        session()->forget('FRONT_USER_LOGIN');
        session()->forget('FRONT_USER_ID');
        session()->forget('FRONT_USER_NAME');
        // session()->flash('error','You have been logged out successfully.');
        return redirect('/');
    });

    // Admin Panel Routes
    Route::get('admin',[AdminController::class,'index']);
    Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

    // Routes with middleware
    Route::group(['middleware' => 'admin_auth'], function(){
        Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    // Category Routes
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    // Coupon Routes
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);

    // Size Routes
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);

    // Color Routes
    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);

    // Tax Routes
    Route::get('admin/tax',[TaxController::class,'index']);
    Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);
    Route::get('admin/tax/manage_tax/{id}',[TaxController::class,'manage_tax']);
    Route::post('admin/tax/manage_tax_process',[TaxController::class,'manage_tax_process'])->name('tax.manage_tax_process');
    Route::get('admin/tax/delete/{id}',[TaxController::class,'delete']);
    Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);

    // Brand Routes
    Route::get('admin/brand',[BrandController::class,'index']);
    Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
    Route::get('admin/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
    Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
    Route::get('admin/brand/delete/{id}',[BrandController::class,'delete']);
    Route::get('admin/brand/status/{status}/{id}',[BrandController::class,'status']);

    // Home Banner Routes
    Route::get('admin/home_banner',[HomeBannerController::class,'index']);
    Route::get('admin/home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
    Route::get('admin/home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);
    Route::post('admin/home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
    Route::get('admin/home_banner/delete/{id}',[HomeBannerController::class,'delete']);
    Route::get('admin/home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);

    // Product Routes
    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);

    // Customer Routes
    Route::get('admin/customer',[CustomerController::class,'index']);
    Route::get('admin/customer/show/{id}',[CustomerController::class,'show']);
    Route::get('admin/customer/status/{status}/{id}',[CustomerController::class,'status']);

    // Product multiple images delete
    Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);

    // Product Attr Delete
    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);

    // Admin Logout Route
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','You have been logged out successfully.');
        return redirect('admin');
    });
});
