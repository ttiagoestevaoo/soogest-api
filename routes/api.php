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

Route::get('', function(){

    return [
        'name' => "Emerson",
        'gênero' => "Não definido"
    ];

});
