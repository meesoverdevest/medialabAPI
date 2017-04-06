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
		// Adjustments
		Route::resource('adjustments','AdjustmentsController',['as' => 'admin']);
		Route::get('adjustments/addMarker/{id}',['as' => 'admin.adjustments.addMarker', 'uses' => 'AdjustmentsController@addMarker']);
		Route::get('adjustments/updateMarker/{id}',['as' => 'admin.adjustments.updateMarker', 'uses' => 'AdjustmentsController@updateMarker']);
		Route::post('adjustments/addMarkerPost/{id}',['as' => 'admin.adjustments.addMarkerPost', 'uses' => 'AdjustmentsController@addMarkerPost']);
		Route::post('adjustments/updateMarkerPost/{id}',['as' => 'admin.adjustments.updateMarkerPost', 'uses' => 'AdjustmentsController@updateMarkerPost']);

		// Neighbourhoods
		Route::resource('neighbourhoods','NeighbourhoodController',['as' => 'admin']);

	});
});

