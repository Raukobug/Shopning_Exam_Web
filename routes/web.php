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

Route::get('/Logout', 'accountController@logout')->name('logout');

//Wares
Route::get('/wares', 'itemController@webIndex')->name('item')->middleware('auth');
Route::get('/wares/create', 'itemController@createView')->name('item')->middleware('auth');
Route::post('wares/create', 'itemController@create')->name('item')->middleware('auth');

Route::get('/wares/edit/{id}', 'itemController@edit', function ($id) {
	
})->name('item')->middleware('auth');

Route::post('/wares/edit/{id}', 'itemController@updateFromView', function ($id) {
	
})->name('item')->middleware('auth');

Route::get('/wares/{id}/removeItem', 'itemController@removeItem', function ($id) {
	
})->name('item')->middleware('auth');

//Shops
Route::get('/shops', 'shopController@webIndex')->name('shops')->middleware('auth');
Route::get('/shops/create', 'shopController@createView')->name('shops')->middleware('auth');
Route::post('shops/create', 'shopController@create')->name('shops')->middleware('auth');

Route::get('/shops/edit/{id}', 'shopController@edit', function ($id) {
	
})->name('shops')->middleware('auth');

Route::get('/shops/active/{id}', 'shopController@setShop', function ($id) {
	
})->name('shops')->middleware('auth');

Route::post('/shops/edit/{id}', 'shopController@updateFromView', function ($id) {
	
})->name('shops')->middleware('auth');

Route::get('/shops/{id}/removeShop', 'shopController@removeShop', function ($id) {
	
})->name('shops')->middleware('auth');

//Users

Route::get('/users', 'accountController@webIndex')->name('users')->middleware('auth');

Route::get('/users/edit/{id}', 'accountController@edit', function ($id) {
	
})->name('users')->middleware('auth');

Route::post('/users/edit/{id}', 'accountController@updateFromView', function ($id) {
	
})->name('users')->middleware('auth');

Route::get('/users/{id}/removeUser', 'accountController@removeUser', function ($id) {
	
})->name('users')->middleware('auth');