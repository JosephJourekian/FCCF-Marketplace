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

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/admin', 'App\Http\Controllers\AdminController@show')->middleware('is_admin')->name('admin');  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/products', 'App\Http\Controllers\ProductsController@index')->name('products.index'); 
    Route::post('/products', 'App\Http\Controllers\ProductsController@store')->name('products.store');
    Route::delete('/products', 'App\Http\Controllers\ProductsController@delete')->name('products.delete');
    Route::get('/products/inventory', 'App\Http\Controllers\ProductsController@inventoryView')->name('products.inventory.view'); 
    Route::patch('/products/inventory', 'App\Http\Controllers\ProductsController@inventoryUpdate')->name('products.inventory.update'); 
    Route::get('/products/add', 'App\Http\Controllers\ProductsController@add')->name('products.add'); //fixed ones


    Route::get('/products.edit/{id}', 'App\Http\Controllers\ProductsController@edit')->name('products.edit');
    Route::patch('/products.updateDB/{id}', 'App\Http\Controllers\ProductsController@updateDB')->name('products.updateDB');
    Route::get('/products.show/{id}', 'App\Http\Controllers\ProductsController@show')->name('products.show'); //Laravel 8
 

    Route::get('/myCart', 'App\Http\Controllers\CartsController@index')->name('carts.index'); //Laravel 8
    Route::get('/myCart.add/{id}', 'App\Http\Controllers\CartsController@add')->name('carts.add'); //Laravel 8
    Route::get('/myCart.remove/{id}', 'App\Http\Controllers\CartsController@remove')->name('carts.remove'); //Laravel 8
    Route::post('/myCart.update/{id}', 'App\Http\Controllers\CartsController@update')->name('carts.update'); //Laravel 8

    Route::get('/checkout', 'App\Http\Controllers\CheckoutsController@index')->name('checkout.index'); //Laravel 8
    Route::get('/checkout.confirm', 'App\Http\Controllers\CheckoutsController@confirm')->name('checkout.confirm'); //Laravel 8

    Route::get('/profiles.edit/{id}', 'App\Http\Controllers\ProfilesController@edit')->name('profiles.edit');
    Route::patch('/profiles.update/{id}', 'App\Http\Controllers\ProfilesController@update')->name('profiles.update');

    Route::get('/purchaseHistory/{id}', 'App\Http\Controllers\PurchaseHistoryController@index')->name('purchaseHistory'); //Laravel 8


    Route::get('/viewUsers', 'App\Http\Controllers\ViewUsersController@index')->middleware('is_admin')->name('viewUsers');  
    Route::patch('/viewUsers', 'App\Http\Controllers\ViewUsersController@edit')->middleware('is_admin')->name('viewUsers');  
});