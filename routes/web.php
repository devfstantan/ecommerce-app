<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bo\DashboardController;
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

// Backoffice Routes
Route::prefix('bo')->name('bo.')->middleware('auth')->group(function(){
    Route::get('/',[DashboardController::class, 'index'])->name('index');
});

// Auth Routes
Route::name('auth.')->group(function(){
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'authenticate'])->name('authenticate');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

