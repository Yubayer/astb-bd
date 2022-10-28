<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

// Socialite controller
Route::namespace('Socialite')->group(function() {
    Route::get('login/google', 'GoogleController@redirectToProvider')->name('google-login');
    Route::get('login/google/callback', 'GoogleController@handleProviderCallback')->name('google-callback');
});


Route::get('/', 'HomeController@index')->name('home');
Route::namespace('Collection')->name('collection.')->group(function(){
    Route::get('/collection/{handle}', 'CollectionController@index')->name('index');
});

Route::namespace('Product')->name('product.')->group(function(){
    Route::get('/product/{handle}', 'ProductController@index')->name('index');
});

Route::namespace('Cart')->name('cart.')->group(function(){
    Route::get('/cart', 'CartController@index')->name('index');
    Route::post('/cart-add', 'CartController@add')->name('add');
    Route::post('/cart-update', 'CartController@update')->name('update');
    Route::post('/cart-delete', 'CartController@delete')->name('delete');
    Route::get('/cart/checkout', 'CartController@checkout')->name('checkout')->middleware(['auth']);
});


//admin controller manage
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['admin', 'auth'])->group(function () {
    Route::get('/', 'AdminController@index')->name('index');

    Route::prefix('product')->namespace("Product")->name('product.')->group(function(){
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/create-new', 'ProductController@createNew')->name('create-new');
        Route::get('/edit/{handle}', 'ProductController@edit')->name('edit');
        Route::post('/update', 'ProductController@update')->name('update');
        Route::get('/delete/{id}', 'ProductController@delete')->name('delete');
    });

    Route::prefix('collection')->namespace("Collection")->name('collection.')->group(function(){
        Route::get('/', 'CollectionController@index')->name('index');
        Route::get('/create', 'CollectionController@create')->name('create');
        Route::post('/create-new', 'CollectionController@createNew')->name('create-new');
        Route::post('/delete', 'CollectionController@delete')->name('delete');
    });

    Route::prefix('profile')->namespace("Profile")->name('profile.')->group(function(){
        Route::get('/', 'ProfileController@index')->name('index');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::post('/update', 'ProfileController@update')->name('update');
        Route::post('/update-image', 'ProfileController@updateImage')->name('update-image');
    });

    Route::prefix('settings')->namespace("Settings")->name('settings.')->group(function(){
        Route::get('/', 'SettingsController@index')->name('index');
        Route::post('/update-shop-name', 'SettingsController@updaeShopName')->name('update-shop-name');
    });
});

//user controller manage
Route::prefix('user')->namespace('User')->name('user.')->middleware(['user','auth'])->group(function () {
    Route::get('/', 'UserController@index')->name('index');
});

//testing controller
Route::get('/test', 'Test\TestController@test')->middleware('role');
