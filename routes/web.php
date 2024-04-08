<?php

use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
//Front-end
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home'); // Home Layout
Route::get('/', [HomeController::class, 'showProducts']);




//Back-end
Route::get('/admin', [AdminController::class, 'index'])->name('admin'); // Admin Login
Route::get('/admin/dashboard', [AdminController::class, 'showDashBoard']); //  Admin  hiện thị DashBoard
Route::post('/admin/dashboard', [AdminController::class, 'DashBoard']);
Route::get('/logout', [AdminController::class, 'Logout']);


//Category Product 
Route::get('/addCategory', [CategoryProduct::class, 'addCat']);
Route::get('/allCategory', [CategoryProduct::class, 'showAllCat']);
Route::post('/save-category-product', [CategoryProduct::class, 'savecategory']);
Route::post('/update-category-product/{id}', [CategoryProduct::class, 'updatecategory']);
Route::get('/edit-category-product/{id}', [CategoryProduct::class, 'editcategory']);
Route::get('/delete-category-product/{id}', [CategoryProduct::class, 'deletecategory']);

//Brand Product
Route::get('/addBrand', [BrandProduct::class, 'addBrand']);
Route::get('/allBrand', [BrandProduct::class, 'showBrand']);
Route::post('/save-brand-product', [BrandProduct::class, 'saveBrand']);
Route::post('/update-brand-product/{id}', [BrandProduct::class, 'updateBrand']);
Route::get('/edit-brand-product/{id}', [BrandProduct::class, 'editBrand']);
Route::get('/delete-brand-product/{id}', [BrandProduct::class, 'deleteBrand']);


//Product
Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::get('/allProduct', [ProductController::class, 'showProduct']);
Route::post('/save-product', [ProductController::class, 'saveProduct']);
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct']);
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/detail/{id}', [ProductController::class, 'detailsProduct']);

// Login & Register 
Route::get('/login', [LoginController::class, 'login']);


// Cart
Route::post('/saveCart', [CartController::class,'saveCart']);