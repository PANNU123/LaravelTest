<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class,'loginDashboard'])->name('login.post');

//Route::middleware(['auth:admin'])->group(function (){
    Route::group(['prefix' => 'admin','middleware' => ['auth:admin','prevent-back-history'],'as' =>'admin.'],function(){
        Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');


        // Category Route
        Route::group(['prefix' => 'product'],function (){
            Route::get('', [ProductController::class, 'product'])->name('product');
            Route::post('/create', [ProductController::class, 'productStore'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
            Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
            Route::get('/product/inactive', [ProductController::class, 'productInactive'])->name('product.inactive');
            Route::get('/product/active', [ProductController::class, 'productActive'])->name('product.active');
        });
    });
