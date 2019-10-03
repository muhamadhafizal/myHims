<?php

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

Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route for Stock
Route::get('/Stock/createStock/', 'ChicController@createStock')->name('createStock');
Route::post('/Stock/createStock/', 'ChicController@storeStock')->name('storeStock');
Route::get('/Stock/viewStock/', 'ChicController@showStock')->name('viewStock');




//Route for Cost
Route::get('/Cost/createCOst/', 'ChicController@createCost')->name('createCost');
Route::post('/Cost/createCost/', 'ChicController@storeCost')->name('storeCost');
Route::get('/Cost/viewCOst/', 'ChicController@showCost')->name('viewCost');


//Route for Product
Route::get('/Product/createProduct/', 'ChicController@createProduct')->name('createProduct');
Route::post('/Product/createProduct/', 'ChicController@storeProduct')->name('storeProduct');
Route::get('/Product/viewProduct/', 'ChicController@showProduct')->name('viewProduct');


//Route for optimizer
Route::get('/Optimizer/optimizer/', 'ChicController@optimizer')->name('optimizer');