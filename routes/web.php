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
    Route::middleware('is_admin')->group(function () {
        Route::post('/products', 'App\Http\Controllers\ProductsController@store')->name('products.store');
        Route::delete('/products', 'App\Http\Controllers\ProductsController@delete')->name('products.delete');
        Route::get('/products/inventory', 'App\Http\Controllers\ProductsController@inventoryView')->name('products.inventory.view'); 
        Route::patch('/products/inventory', 'App\Http\Controllers\ProductsController@inventoryUpdate')->name('products.inventory.update'); 
        Route::post('/products/inventory', 'App\Http\Controllers\ProductsController@addCategory')->name('products.addCategory');
        Route::delete('/products/inventory', 'App\Http\Controllers\ProductsController@deleteCategory')->name('products.deleteCategory');
        Route::get('/products/add', 'App\Http\Controllers\ProductsController@add')->name('products.add'); 
        Route::get('/products/edit/{product:productname}', 'App\Http\Controllers\ProductsController@edit')->name('products.edit');
        Route::patch('/products/update/{product:productname}', 'App\Http\Controllers\ProductsController@update')->name('products.update');

        Route::get('/viewUsers', 'App\Http\Controllers\ViewUsersController@index')->name('viewUsers');  
        Route::patch('/viewUsers', 'App\Http\Controllers\ViewUsersController@edit')->name('viewUsers');  
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/products', 'App\Http\Controllers\ProductsController@index')->name('products.index'); 
    
    Route::get('/products/show/{product:productname}', 'App\Http\Controllers\ProductsController@show')->name('products.show'); 

    Route::get('/myCart', 'App\Http\Controllers\CartsController@index')->name('carts.index'); 
    Route::get('/myCart/add/{product:productname}', 'App\Http\Controllers\CartsController@add')->name('carts.add'); 
    Route::get('/myCart/remove/{id}', 'App\Http\Controllers\CartsController@remove')->name('carts.remove'); 
    Route::post('/myCart/update/{rowId}/{product:productname}', 'App\Http\Controllers\CartsController@update')->name('carts.update'); 

    Route::get('/checkout', 'App\Http\Controllers\CheckoutsController@index')->name('checkout.index'); 
    Route::get('/checkout/confirm', 'App\Http\Controllers\CheckoutsController@confirm')->name('checkout.confirm'); 
    
    Route::get('/profiles/edit/{user:username}', 'App\Http\Controllers\ProfilesController@edit')->name('profiles.edit');
    Route::patch('/profiles/update/{user:username}', 'App\Http\Controllers\ProfilesController@update')->name('profiles.update');
    Route::get('/purchaseHistory/{user:username}', 'App\Http\Controllers\PurchaseHistoryController@index')->name('purchaseHistory');

});