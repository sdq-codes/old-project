<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'],function (){
    Route::get('',function (){
        return 'Welcome to Alaje Hub Api';
    });

    Route::post('/register','Auth\AuthController@register');
    Route::group(['prefix' => 'auth'],function (){
        Route::post('/login','Auth\AuthController@login');

    });

    Route::group(['middleware' => ['auth:api']],function (){
    });


});
