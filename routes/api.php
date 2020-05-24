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

Route::post('register', 'AuthLoginController@register')->name("api.register");;
Route::post('login', 'AuthLoginController@login')->name("api.login");;

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('details', 'API\UserController@details');

});

Route::get("/",function(){
  return  [
    1,2,3
]});
