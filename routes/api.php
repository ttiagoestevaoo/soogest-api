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

    Route::post('details', 'API\UserController@details');
    Route::get('/projects','API\ProjectController@index')->name('projects');
    Route::post('/projects','API\ProjectController@store');
    Route::get('/projects/{project}','API\ProjectController@show');
    Route::put('/projects/{project}','API\ProjectController@update');
    Route::delete('/projects/{project}','API\ProjectController@destroy');
    Route::get('/tasks','API\TaskController@index')->name('tasks');
    Route::post('/tasks','API\TaskController@store');
    Route::get('/tasks/{task}','API\TaskController@show');
    Route::put('/tasks/{task}','API\TaskController@update');
    Route::delete('/tasks/{task}','API\TaskController@destroy');
    Route::get('details', 'API\UserController@details');

});

Route::get("/",function(){
  return  json_encode([
    1,2,3]);

});
