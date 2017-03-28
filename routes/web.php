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

Auth::routes();

Route::get('/', function () {
    return view('layouts.app');
});



Route::group(['middleware' => 'auth'], function() {
	Route::get('/authtest', function() { return 'aasdfsdf';});



	Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
		Route::resource('adjustments','AdjustmentsController',['as' => 'admin']);
		Route::get('adjustments/addMarker/{id}',['as' => 'adjustments.addMarker', 'uses' => 'AdjustmentsController@addMarker']);
		Route::post('adjustments/addMarkerPost/{id}',['as' => 'adjustments.addMarkerPost', 'uses' => 'AdjustmentsController@addMarkerPost']);
	});
});

