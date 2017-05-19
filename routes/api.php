<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('accessLevels', 'accessLevelController');
Route::resource('shops', 'shopController');
Route::resource('accounts', 'accountController');
Route::resource('openingHours', 'openingHourController');
Route::resource('products', 'productController');
Route::resource('items', 'itemController');
Route::resource('visitStatistics', 'visitStatisticController');
Route::put('visitStatistics/{id}', 'visitStatisticController@update');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
