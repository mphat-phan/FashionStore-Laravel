<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SingleBlogController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Admin;


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


Route::get('/',[HomeController::class,'index']);
Route::get('home',[HomeController::class,'index']);

Route::get('blog',[BlogController::class,'index']);

Route::get('shop',[ShopController::class,'index']);

Route::get('contact',[ContactController::class,'index']);
Route::get('element',[ElementController::class,'index']);
Route::get('feature',[FeatureController::class,'index']);

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'checkLogin'])->name('checkLogin');

Route::get('register',[UserController::class,'register'])->name('register');
Route::post('register',[UserController::class,'checkRegister'])->name('checkRegister');



Route::get('singleblog',[SingleBlogController::class,'index']);
Route::get('product/{product:slug}',[SingleProductController::class,'index']);
Route::get('tracking',[TrackingController::class,'index']);

Route::middleware(['MyMiddle'])->group(function () {
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::get('confirmation',[ConfirmationController::class,'index']);
    Route::get('cart',[CartController::class,'index']);
    Route::get('logout',[UserController::class,'logout'])->name('logout');
    Route::prefix('admin')->group(function () {
    
  
        Route::get('/',[DashboardController::class,'index']);
        
        Route::get('dashboard',[DashboardController::class,'index']);
        
        Route::prefix('form')->group(function () {
    
            Route::prefix('category')->group(function () {
                Route::get('/',[CategoryController::class,'index']);
                Route::post('add',[CategoryController::class,'add']);
                Route::post('update/{id}',[CategoryController::class,'update']);
                Route::post('delete/{id}',[CategoryController::class,'delete']);
            });
            Route::prefix('product')->group(function () {
                Route::get('/',[ProductController::class,'index']);
                Route::post('add',[ProductController::class,'add']);
                Route::get('update/{id}',[ProductController::class,'getUpdate']);
                Route::post('update/{id}',[ProductController::class,'postUpdate']);
                Route::post('delete/{id}',[ProductController::class,'delete']);
                Route::post('deleteSubImage/{id}',[ProductController::class,'deleteSubImage']);
            });
    
            Route::prefix('product/detail')->group(function () {
                Route::get('{id}',[ProductDetailController::class,'index']);
                Route::post('add/{id}',[ProductDetailController::class,'add']);
                Route::post('update/{id}',[ProductDetailController::class,'update']);
                Route::post('delete/{id}',[ProductDetailController::class,'delete']);
            });
            Route::prefix('brand')->group(function () {
                Route::get('/',[BrandController::class,'index']);
                Route::post('add',[BrandController::class,'add']);
                Route::post('update/{id}',[BrandController::class,'update']);
                Route::post('delete/{id}',[BrandController::class,'delete']);
            });
            Route::prefix('color')->group(function () {
                Route::get('/',[ColorController::class,'index']);
                Route::post('add',[ColorController::class,'add']);
                Route::post('update/{id}',[ColorController::class,'update']);
                Route::post('delete/{id}',[ColorController::class,'delete']);
            });
            Route::prefix('size')->group(function () {
                Route::get('/',[SizeController::class,'index']);
                Route::post('add',[SizeController::class,'add']);
                Route::post('update/{id}',[SizeController::class,'update']);
                Route::post('delete/{id}',[SizeController::class,'delete']);
            });
            Route::prefix('payment')->group(function () {
                Route::get('/',[PaymentController::class,'index']);
                Route::post('add',[PaymentController::class,'add']);
                Route::post('update/{id}',[PaymentController::class,'update']);
                Route::post('delete/{id}',[PaymentController::class,'delete']);
            });
        });
        Route::prefix('custom')->group(function () {
    
            Route::prefix('banner')->group(function () {
                Route::get('/',[BannerController::class,'index']);
                Route::post('add',[BannerController::class,'add']);
                Route::post('update/{id}',[BannerController::class,'update']);
                Route::post('delete/{id}',[BannerController::class,'delete']);
            });
        });
    
    });
});


