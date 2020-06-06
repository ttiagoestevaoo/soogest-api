<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::post('register', 'AuthLoginController@register')->name("api.register");
Route::post('login', 'AuthLoginController@login')->name("api.login");

Route::group(['middleware' => ['auth:api']], function(){

    Route::post('logout','AuthLoginController@logout')->name("api.logout");
    Route::get('/projects','ProjectController@index')->name('projects');
    Route::post('/projects','ProjectController@store');
    Route::get('/projects/{project}','ProjectController@show');
    Route::put('/projects/{project}','ProjectController@update');
    Route::delete('/projects/{project}','ProjectController@destroy');
    Route::get('/user', 'UserController@show');

});

Route::get("/",function(){
  return  json_encode([
    1,2,3]);

});
