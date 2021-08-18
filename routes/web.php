<?php

use Illuminate\Support\Facades\Route;

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
        Route::get('/products/attributes', 'App\Http\Controllers\ProductsController@showAttributes')->name('products.attributes');
        Route::post('/products/attributes', 'App\Http\Controllers\ProductsController@attributes')->name('products.attributes');
        Route::get('/products/attributesStock/{product:productname}', 'App\Http\Controllers\ProductsController@editAttributesStock')->name('products.attributesStock');
        Route::patch('/products/attributesStock', 'App\Http\Controllers\ProductsController@attributesStockUpdate')->name('products.attributesStockUpdate');


        Route::get('/fccfUpdates/edit/{updatename}', 'App\Http\Controllers\FccfUpdatesController@edit')->name('fccfUpdates.edit');
        Route::patch('/fccfUpdates/update/{updatename}', 'App\Http\Controllers\FccfUpdatesController@update')->name('fccfUpdates.update'); 
        Route::get('/fccfUpdates/add', 'App\Http\Controllers\FccfUpdatesController@add')->name('fccfUpdates.add'); 
        Route::post('/fccfUpdates', 'App\Http\Controllers\FccfUpdatesController@store')->name('fccfUpdates.store');
        Route::delete('/fccfUpdates', 'App\Http\Controllers\FccfUpdatesController@delete')->name('fccfUpdates.delete');

        Route::get('/techUpdates/edit/{techname}', 'App\Http\Controllers\TechUpdatesController@edit')->name('techUpdates.edit');
        Route::patch('/techUpdates/update/{techname}', 'App\Http\Controllers\TechUpdatesController@update')->name('techUpdates.update'); 
        Route::get('/techUpdates/add', 'App\Http\Controllers\TechUpdatesController@add')->name('techUpdates.add'); 
        Route::post('/techUpdates', 'App\Http\Controllers\TechUpdatesController@store')->name('techUpdates.store');
        Route::delete('/techUpdates', 'App\Http\Controllers\TechUpdatesController@delete')->name('techUpdates.delete');

        
        
        Route::get('/viewUsers', 'App\Http\Controllers\ViewUsersController@index')->name('viewUsers');  
        Route::patch('/viewUsers', 'App\Http\Controllers\ViewUsersController@edit')->name('viewUsers');  
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/menuTest', 'App\Http\Controllers\ProductsController@menuTest')->name('menuTest');  //test homepage frontend
    Route::get('/productTest', 'App\Http\Controllers\ProductsController@productTest')->name('productTest'); //test products index frontend

    
    Route::get('/products', 'App\Http\Controllers\ProductsController@index')->name('products.index'); 
    Route::get('/products/show/{product:productname}', 'App\Http\Controllers\ProductsController@show')->name('products.show'); 

    Route::get('/updates', 'App\Http\Controllers\UpdatesController@index')->name('updates'); 


    Route::get('/fccfUpdates', 'App\Http\Controllers\FccfUpdatesController@index')->name('fccfUpdates.index'); 
    Route::get('/fccfUpdates/show/{updatename}', 'App\Http\Controllers\FccfUpdatesController@show')->name('fccfUpdates.show');
    
    Route::get('/techUpdates', 'App\Http\Controllers\TechUpdatesController@index')->name('techUpdates.index'); 
    Route::get('/techUpdates/show/{techname}', 'App\Http\Controllers\TechUpdatesController@show')->name('techUpdates.show');


    Route::get('/myCart', 'App\Http\Controllers\CartsController@index')->name('carts.index'); 
    Route::get('/myCart/add/{product:productname}', 'App\Http\Controllers\CartsController@add')->name('carts.add'); 
    Route::get('/myCart/remove/{id}', 'App\Http\Controllers\CartsController@remove')->name('carts.remove'); 
    Route::post('/myCart/update/{rowId}/{product:productname}', 'App\Http\Controllers\CartsController@update')->name('carts.update'); 
    Route::get('/myCart', 'App\Http\Controllers\CartsController@index')->name('carts.index'); 

    Route::get('/cartTest', 'App\Http\Controllers\CartsController@cartTest')->name('cartTest'); //test carts index frontend
    Route::get('/checkoutTest', 'App\Http\Controllers\CheckoutsController@checkoutTest')->name('checkoutTest');  //Checkout frontend 
    Route::get('/checkoutComplete', 'App\Http\Controllers\CheckoutsController@checkoutComplete')->name('checkout.complete'); 



    Route::get('/checkout', 'App\Http\Controllers\CheckoutsController@index')->name('checkout.index'); 
    Route::get('/checkout/confirm', 'App\Http\Controllers\CheckoutsController@confirm')->name('checkout.confirm'); 

    Route::get('/profiles', 'App\Http\Controllers\ProfilesController@index')->name('profiles.index');
    Route::get('/profiles/edit/{user:username}', 'App\Http\Controllers\ProfilesController@edit')->name('profiles.edit');
    Route::patch('/profiles/update/{user:username}', 'App\Http\Controllers\ProfilesController@update')->name('profiles.update');
    Route::get('/profiles/editAddress/{user:username}', 'App\Http\Controllers\ProfilesController@editAddress')->name('profiles.editAddress');
    Route::patch('/profiles/updateAddress/{user:username}', 'App\Http\Controllers\ProfilesController@updateAddress')->name('profiles.updateAddress');

    Route::get('/purchaseHistory/{user:username}', 'App\Http\Controllers\PurchaseHistoryController@index')->name('purchaseHistory');
    Route::get('/purchaseHistoryTest/{user:username}', 'App\Http\Controllers\PurchaseHistoryController@indexTest')->name('purchaseHistoryTest');



});