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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::post('home', 'HomeController@index');
Route::get('test', 'HomeController@test');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// create new product
Route::post('/create', 'HomeController@store');
// add to card
Route::post('addtocart', 'HomeController@AddToCart');
//show my  items
Route::get('cart', 'HomeController@getAllCartItems');
//delete item from shopping cart
Route::post('deletefromcart', 'HomeController@deleteCartItem');
// set quantity
Route::post('quantity', 'HomeController@setQuantity');
Route::get('paypal', 'PaypalPaymentController@prepareExpressCheckout');
Route::get('paypal/index', 'PaypalPaymentController@index');
//get products
Route::post('/prod', 'HomeController@getProducts');
Route::get('/prod', 'HomeController@getProducts');
//set currency
Route::post('/currency', 'HomeController@setCurrency');
Route::get('/currency', 'HomeController@setCurrency');
//show single product
Route::get('/product/{id}', 'HomeController@showProduct');
//edit product
Route::get('/product/edit/{id}', 'HomeController@edit');
//update product
Route::any('/product/update/{id}', 'HomeController@update');
// paypal
Route::any('paypal', 'HomeController@paypal');
Route::any('paypal/ok', 'BuyController@ok');
Route::any('paypal/error', 'BuyController@error');
//buy product
Route::any('buy', 'BuyController@buyItem');