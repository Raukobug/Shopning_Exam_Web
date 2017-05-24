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
Route::get('/wares', 'ItemController@webIndex')->name('item')->middleware('auth');
Route::get('/wares/create', 'ItemController@createView')->name('item')->middleware('auth');
Route::post('wares/create', 'ItemController@create')->name('item')->middleware('auth');

Route::get('/wares/edit/{id}', 'ItemController@edit', function ($id) {
	
})->name('item')->middleware('auth');;

Route::post('/wares/edit/{id}', 'ItemController@updateFromView', function ($id) {
	
})->name('item')->middleware('auth');;

Route::get('/wares/{id}/removeItem', 'ItemController@removeItem', function ($id) {
	
})->name('item')->middleware('auth');;