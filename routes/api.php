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
//User login and register
Route::post('register', 'AuthLoginController@register')->name("api.register");;
Route::post('login', 'AuthLoginController@login')->name("api.login");;

Route::group(['middleware' => 'auth:api'], function(){

   //Tasks
    Route::get('/tasks','TaskController@index')->name('tasks');
    Route::post('/tasks','TaskController@store');
    Route::get('/tasks/{task}','TaskController@show');
    Route::put('/tasks/{task}','TaskController@update');
    Route::delete('/tasks/{task}','TaskController@destroy');
    
    //Projetcs
    Route::get('/projects','ProjectController@index')->name('projects');
    Route::post('/projects','ProjectController@store');
    Route::get('/projects/{project}','ProjectController@show');
    Route::put('/projects/{project}','ProjectController@update');
    Route::delete('/projects/{project}','ProjectController@destroy');
    
    //User logout and details
    Route::get('/user', 'UserController@show');
    Route::post('logout','AuthLoginController@logout')->name("api.logout");


});

Route::get("/",function(){
  return  json_encode("Bem vindo a API do Soogest");

});
