<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Auth (Login/Logout) — giriş yapmamış kullanıcı
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('giris', [AuthController::class, 'login'])->name('login');
    Route::post('giris', [AuthController::class, 'loginPost'])->name('login.post');
});

/*
|--------------------------------------------------------------------------
| Korumalı Rotalar — isAdmin middleware (giriş zorunlu)
|--------------------------------------------------------------------------
*/
Route::middleware('isAdmin')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('panel');
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Siparişler
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
    });

    // Ürünler
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('/barcode', [ProductController::class, 'GetBarcodes'])->name('barcode');
    });

    // Kategoriler
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    // Tedarikçiler
    Route::prefix('suppliers')->name('suppliers.')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('/create', [SupplierController::class, 'create'])->name('create');
        Route::post('/store', [SupplierController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [SupplierController::class, 'delete'])->name('delete');
    });

    // Kullanıcılar
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });

    // Şirketler
    Route::prefix('companies')->name('companies.')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::get('/create', [CompanyController::class, 'create'])->name('create');
        Route::post('/store', [CompanyController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CompanyController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [CompanyController::class, 'delete'])->name('delete');
    });

    // İşlemler (Ödemeler)
    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/create', [TransactionController::class, 'create'])->name('create');
        Route::post('/store', [TransactionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TransactionController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [TransactionController::class, 'delete'])->name('delete');
    });

});
