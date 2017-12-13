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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

#Login

Route::post('login','App\AppLoginController@login');

#Default Data
Route::get('get_country','App\AppDefaultController@getCountry');
Route::get('get_state/{country_id}','App\AppDefaultController@getState');
Route::get('get_zipcode/{state_id}','App\AppDefaultController@getZipcode');
Route::get('get_role','App\AppDefaultController@getRole');
Route::get('get_payment_terms','App\AppDefaultController@getPaymentTerms');

#User
Route::get('add_user/{user_id}','App\AppUserController@addUserDetails');
Route::post('add_user','App\AppUserController@addUser');
