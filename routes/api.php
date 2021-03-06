<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('Trader','WelcomeController@getTrader');
Route::get('Producer','WelcomeController@getProducer');
Route::get('Transformer','WelcomeController@getTransformer');
Route::get('Provider','WelcomeController@getProvider');
Route::post('register','UserController@store');
Route::post('setAdresse','UserController@setAdresse');




