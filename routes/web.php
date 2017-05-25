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

// Route::get('/', function () {
    // return view('home');
// });

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Logout', 'AccountController@logout')->name('logout');

//Wares
Route::get('/wares', 'ItemController@webIndex')->name('item')->middleware('auth');
Route::get('/wares/create', 'ItemController@createView')->name('item')->middleware('auth');
Route::post('wares/create', 'ItemController@create')->name('item')->middleware('auth');

Route::get('/wares/edit/{id}', 'ItemController@edit', function ($id) {
	
})->name('item')->middleware('auth');

Route::post('/wares/edit/{id}', 'ItemController@updateFromView', function ($id) {
	
})->name('item')->middleware('auth');

Route::get('/wares/{id}/removeItem', 'ItemController@removeItem', function ($id) {
	
})->name('item')->middleware('auth');

//Shops
Route::get('/shops', 'ShopController@webIndex')->name('shops')->middleware('auth');
Route::get('/shops/create', 'ShopController@createView')->name('shops')->middleware('auth');
Route::post('shops/create', 'ShopController@create')->name('shops')->middleware('auth');

Route::get('/shops/edit/{id}', 'ShopController@edit', function ($id) {
	
})->name('shops')->middleware('auth');

Route::get('/shops/active/{id}', 'ShopController@setShop', function ($id) {
	
})->name('shops')->middleware('auth');

Route::post('/shops/edit/{id}', 'ShopController@updateFromView', function ($id) {
	
})->name('shops')->middleware('auth');

Route::get('/shops/{id}/removeShop', 'ShopController@removeShop', function ($id) {
	
})->name('shops')->middleware('auth');

//Users

Route::get('/users', 'AccountController@webIndex')->name('users')->middleware('auth');

Route::get('/users/edit/{id}', 'AccountController@edit', function ($id) {
	
})->name('users')->middleware('auth');

Route::post('/users/edit/{id}', 'AccountController@updateFromView', function ($id) {
	
})->name('users')->middleware('auth');

Route::get('/users/{id}/removeUser', 'AccountController@removeUser', function ($id) {
	
})->name('users')->middleware('auth');