<?php

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





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.layouts.home');
})->middleware(['auth']);



  Route::group(['middleware'=>'auth'],function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('suppliers')->group(function(){

Route::get('/view', [App\Http\Controllers\Backend\SupplierController::class, 'view'])->name('suppliers.view');
Route::get('/add', [App\Http\Controllers\Backend\SupplierController::class, 'add'])->name('suppliers.add');
Route::post('/store', [App\Http\Controllers\Backend\SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'edit'])->name('suppliers.edit');
Route::post('/update/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'update'])->name('suppliers.update');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'delete'])->name('suppliers.delete');

});


Route::prefix('customers')->group(function(){

Route::get('/view', [App\Http\Controllers\Backend\CustomerController::class, 'view'])->name('customers.view');
Route::get('/add', [App\Http\Controllers\Backend\CustomerController::class, 'add'])->name('customers.add');
Route::post('/store', [App\Http\Controllers\Backend\CustomerController::class, 'store'])->name('customers.store');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/update/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'update'])->name('customers.update');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'delete'])->name('customers.delete');

});

Route::prefix('units')->group(function(){

Route::get('/view', [App\Http\Controllers\Backend\UnitController::class, 'view'])->name('units.view');
Route::get('/add', [App\Http\Controllers\Backend\UnitController::class, 'add'])->name('units.add');
Route::post('/store', [App\Http\Controllers\Backend\UnitController::class, 'store'])->name('units.store');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\UnitController::class, 'edit'])->name('units.edit');
Route::post('/update/{id}', [App\Http\Controllers\Backend\UnitController::class, 'update'])->name('units.update');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\UnitController::class, 'delete'])->name('units.delete');

});


Route::prefix('categories')->group(function(){

Route::get('/view', [App\Http\Controllers\Backend\CategoryController::class, 'view'])->name('categories.view');
Route::get('/add', [App\Http\Controllers\Backend\CategoryController::class, 'add'])->name('categories.add');
Route::post('/store', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('categories.store');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/update/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('categories.update');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'delete'])->name('categories.delete');

});

Route::prefix('products')->group(function(){

Route::get('/view', [App\Http\Controllers\Backend\ProductController::class, 'view'])->name('products.view');
Route::get('/add', [App\Http\Controllers\Backend\ProductController::class, 'add'])->name('products.add');
Route::post('/store', [App\Http\Controllers\Backend\ProductController::class, 'store'])->name('products.store');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('products.edit');
Route::post('/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'update'])->name('products.update');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('products.delete');

});


Route::prefix('purchases')->group(function(){

Route::get('/view', [App\Http\Controllers\Backend\PurchaseController::class, 'view'])->name('purchases.view');
Route::get('/add', [App\Http\Controllers\Backend\PurchaseController::class, 'add'])->name('purchases.add');
Route::post('/store', [App\Http\Controllers\Backend\PurchaseController::class, 'store'])->name('purchases.store');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\PurchaseController::class, 'edit'])->name('purchases.edit');
Route::post('/update/{id}', [App\Http\Controllers\Backend\PurchaseController::class, 'update'])->name('purchases.update');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\PurchaseController::class, 'delete'])->name('purchases.delete');

});

Route::get('/get-category', [App\Http\Controllers\Backend\DefaultController::class, 'getCategory'])->name('get-category');



Route::get('/get-product', [App\Http\Controllers\Backend\DefaultController::class, 'getProduct'])->name('get-product');


});

require __DIR__.'/auth.php';
