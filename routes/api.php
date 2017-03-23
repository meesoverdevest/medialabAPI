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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('protectedTest','API\RegisterController@protectedTest');

});

Route::resource('adjustments', 'API\AdjustmentsController');

Route::post('register', ['as' => 'api.register', 'uses' => 'API\RegisterController@register']);
Route::post('login', ['as' => 'api.login', 'uses' => 'API\LoginController@login']);
