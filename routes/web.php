<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'back', 'namespace' => 'App\Http\Controllers'], function(){

    Route::get('/',             'UsersController@index');
    Route::get('/user/index',        'UsersController@index');
    Route::post('/user/login',       'UsersController@login');

});

Route::group(['prefix' => 'back', 'namespace' => 'App\Http\Controllers', 'middleware' => 'App\Http\Middleware\AuthMiddleware'], function(){


    Route::get('/user/create',       'UsersController@create');
    Route::post('/user/save',        'UsersController@save');
    Route::get('/user/loginOut',     'UsersController@loginOut');

    Route::get('/customer/lists',    'CustomerController@lists');
    Route::get('/customer/create',   'CustomerController@create');
    Route::post('/customer/save',    'CustomerController@save');
    Route::post('/customer/remove',  'CustomerController@remove');
    Route::get('/customer/edit',    'CustomerController@edit');
    Route::get('/customer/show',    'CustomerController@show');

});



