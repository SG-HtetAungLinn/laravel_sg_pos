<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('login', [AuthController::class, 'loginPage'])->name('auth.loginPage');

Route::get('register', [AuthController::class, 'registerPage'])->name('auth.registerPage');
// Route::
Route::get('/', [AuthController::class, 'checkRole'])->name('auth.checkRole');
Route::middleware(['authCheck'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('user')->group(function () {
        Route::get('home', [UserController::class, 'home'])->name('user.home');
    });
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Category
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'categoryList'])->name('category.list');
            // create
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            // delete
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            // Edit
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        });

        // Discount
        Route::resource('discount', DiscountController::class);
        Route::prefix('discount')->group(function () {
            Route::get('add_item/{id}', [DiscountController::class, 'addItem'])->name('discount.addItem');
            Route::post('storeItem/{id}', [DiscountController::class, 'storeItem'])->name('discount.storeItem');
        });

        // payment_type
        Route::prefix('payment_type')->group(function () {
            Route::get('/', [PaymentTypeController::class, 'list'])->name('paymentType.list');
            // create
            Route::get('/create', [PaymentTypeController::class, 'create'])->name('paymentType.create');
            Route::post('/store', [PaymentTypeController::class, 'store'])->name('paymentType.store');
            // delete
            Route::get('delete/{id}', [PaymentTypeController::class, 'delete'])->name('paymentType.delete');
            // Edit
            Route::get('edit/{id}', [PaymentTypeController::class, 'edit'])->name('paymentType.edit');
            Route::post('update/{id}', [PaymentTypeController::class, 'update'])->name('paymentType.update');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'list'])->name('product.list');
            Route::post('/list', [ProductController::class, 'discountProduct'])->name('product.discountProduct');

            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('image/{id}', [ProductController::class, 'imageCreate'])->name('product.imageCreate');
            Route::post('image/{id}', [ProductController::class, 'imageStore'])->name('product.imageStore');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('details/{id}', [ProductController::class, 'details'])->name('product.details');
        });
    });
});
