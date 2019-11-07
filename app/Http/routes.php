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

// Route::get('/', function () {
//     return view('shopping.shopping');
// });
Route::get('/','ShoppingController@index');
Route::any('Productdetail','ShoppingController@sview');
Route::any('Productbuy','ShoppingController@buynow');
Route::any('addtocart','ShoppingController@addcart');
Route::any('cart','ShoppingController@carts');
Route::any('addtocarts','ShoppingController@addtocarts');
Route::any('removefromcart','ShoppingController@removefromcart');
Route::any('removeproducts','ShoppingController@removedproducts');
Route::any('continueshopping','ShoppingController@continueshop');
Route::any('placeorders','ShoppingController@placeorder');
Route::any('cashpayment','ShoppingController@cashpayment');
Route::any('cardpayment','ShoppingController@cardpayment');
Route::any('viewcart','ShoppingController@viewcart');
Route::any('loginuser','ShoppingController@loginuser');
Route::any('loginusers','ShoppingController@loginusers');
Route::any('register','ShoppingController@register');
Route::any('registerusers','ShoppingController@registerusers');
Route::any('logout','ShoppingController@logout');
Route::any('purchasedproducts','ShoppingController@purchasedproducts');
Route::any('purchased','ShoppingController@purchase');