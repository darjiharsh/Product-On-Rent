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

//admin side

//product
Route::resource('product','ProductController');

//category
Route::resource('category','CategoryController');

//sub category
Route::resource('subcategory','SubCategoryController');

//vendor
Route::resource('vendor','VendorController');

//offer
Route::resource('offer','OfferController');

//user side

Route::get('userr','UserSideController@index' );
Route::get('booking/{id}{cost}{qty}','UserSideController@booking' );
Route::post('bookinfo/{id}','UserSideController@bookinfo' );
Route::get('addtocart/{id}','UserSideController@addtocart');
Route::get('cartremove/{id}','UserSideController@cartremove');
Route::post('cartupdate/{id}','UserSideController@cartupdate');
