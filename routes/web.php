<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaraController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOfferController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;

#-----------frontend route----------------
Route::get('/', [EvaraController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [EvaraController::class, 'category'])->name('product-category');
Route::get('/product-details/{id}', [EvaraController::class, 'product'])->name('product-details');

Route::resources(['cart'=>CartController::class]);
Route::get('/cart/delete-product/{rowId}',[CartController::class,'delete'])->name('cart.delete');
Route::POST('/cart/update-product',[CartController::class,'updateProduct'])->name('cart.update-product');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::POST('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

Route::get('/login-register',[CustomerAuthController::class,'login'])->name('login-register');
Route::post('/login-check',[CustomerAuthController::class,'loginCheck'])->name('login-check');
Route::post('/new-customer',[CustomerAuthController::class,'newCustomer'])->name('new-customer');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');

#------------backend route----------------
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function ()
    { Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // category controller------------------------------------
    Route::get('/createCategory', [CategoryController::class, 'create'])->name('create');
    Route::POST('/storeCategory', [CategoryController::class, 'store'])->name('store');
    Route::get('/indexCtegory', [CategoryController::class, 'index'])->name('index');
    Route::get('/deleteCategory/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::POST('/updateCategory/{id}', [CategoryController::class, 'update'])->name('update');

    // brand controller------------------------------------
    Route::get('/createBrand', [BrandController::class, 'create'])->name('createBrand');
    Route::POST('/storeBrand', [BrandController::class, 'store'])->name('storeBrand');
    Route::get('/indexBrand', [BrandController::class, 'index'])->name('indexBrand');
    Route::get('/deleteBrand/{id}', [BrandController::class, 'destroy'])->name('destroyBrand');
    Route::get('/editBrand/{id}', [BrandController::class, 'edit'])->name('editBrand');
    Route::POST('/updateBrand/{id}', [BrandController::class, 'update'])->name('updateBrand');

    //sub Category controller--------------------------------
    Route::resource('sub-category', SubCategoryController::class);

    //product controller---------------------
    Route::resource('product',ProductController::class);

    //unit controller---------------------
    Route::resource('unit',UnitController::class);

    //color controller---------------------
    Route::resource('color',ColorController::class);

    //size controller---------------------
    Route::resource('size',SizeController::class);

    //call sub category by category using by ajax request
    Route::get('/get-sub-category-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category');

    //product offer controller-------------------
    Route::resource('productOffer',ProductOfferController::class);




});
