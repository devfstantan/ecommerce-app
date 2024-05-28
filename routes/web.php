<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bo\CategoryController;
use App\Http\Controllers\Bo\DashboardController as BoDashboardController;
use App\Http\Controllers\Bo\ProductController as BoProductController;
use App\Http\Controllers\Bo\StoreController;

use App\Http\Controllers\Manager\DashboardController as ManagerDashboardController;
use App\Http\Controllers\Manager\StoreController as ManagerStoreController;
use App\Http\Controllers\Manager\ProductController as ManagerProductController;

use App\Http\Controllers\Front\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;

/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// FrontOffice Routes
Route::name('front.')->group(function(){
    Route::get('/', [FrontProductController::class,'index'])->name('index');
    Route::get('/products/{product}', [FrontProductController::class,'show'])->name('products.show');
});

// Admin Routes
Route::prefix('bo')->name('bo.')->middleware('auth')->group(function(){
    Route::get('/',[BoDashboardController::class, 'index'])->name('index');
    Route::resource('stores',StoreController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('products',BoProductController::class);
});

// Manager Routes
Route::prefix('manager')->name('manager.')->middleware('auth')->group(function(){
    Route::get('/',[ManagerDashboardController::class, 'index'])->name('index');
    Route::resource('products',ManagerProductController::class);
    Route::get('store',[ManagerStoreController::class,'show'])->name('store.show');
    Route::get('store/edit',[ManagerStoreController::class,'edit'])->name('store.edit');
    Route::put('store',[ManagerStoreController::class,'update'])->name('store.update');
});

// Auth Routes
Route::name('auth.')->group(function(){
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'authenticate'])->name('authenticate');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

