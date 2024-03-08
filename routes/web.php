<?php

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
Route::name('bo.')->group(function(){
    
});



// BackOffice Routes
