<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminPagesController;
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



Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('/products',[PagesController::class,'products'])->name('products');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');



Route::group(['prefix' => 'admin'], function () {
Route::get('/',[AdminPagesController::class,'index'])->name('admin.index');


Route::get('/product/create',[AdminPagesController::class,'create'])->name('admin.product.create');
Route::post('/product/store',[AdminPagesController::class,'product_store'])->name('admin.product.store');

Route::post('/product/edit/{id}',[AdminPagesController::class,'product_update'])->name('admin.product.update');
Route::get('/products',[AdminPagesController::class,'manage_products'])->name('admin.products');
Route::get('/product/edit/{id}',[AdminPagesController::class,'product_edit'])->name('admin.product.edit');

Route::post('/product/delete/{id}',[AdminPagesController::class,'product_delete'])->name('admin.product.delete');

});