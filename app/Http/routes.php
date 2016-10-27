<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');
Route::get('product/{id}', 'PagesController@show');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//Authenticated Access only
Route::group(['middleware' => 'auth'], function () {
    //Show Two Factor Auth Code
    Route::get('auth/tfa', 'Auth\AuthController@getTfa');
    //Show Dashboard
    Route::get('/dashboard', 'DashboardController@index');
    //Customer Relationship Management
    Route::get('/dashboard/crm', 'DashboardController@crm');
    Route::get('/dashboard/crm/{uid}/{pid}', 'DashboardController@thread');

    Route::group(['middleware' => 'customer'], function () {
        //Show cart
        Route::get('cart', 'PagesController@cart');
        //Add to cart
        Route::any('cart/add/{id}', 'PagesController@add');
        //Remove from cart
        Route::any('cart/remove/{id}', 'PagesController@remove');
        //Message the seller
        Route::post('message/{pid}', 'PagesController@addMessage');

        //Payment Gateway
        Route::post('pay','PaymentController@create');
        Route::get('pay/{id}','PaymentController@index');
    });

    Route::group(['middleware' => 'seller'], function () {
        //Add a new Product
        Route::get('/dashboard/sell', 'DashboardController@create');
        //Insert Product into db
        Route::post('/dashboard/sell', 'DashboardController@insert');
        //Message the customer
        Route::post('message/{rid}/{pid}', 'DashboardController@addMessage');
    });
});

