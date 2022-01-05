<?php

Route::namespace('Users\Http\Controllers\User')->group(function () {

    Route::group(['middleware' => 'web' , 'as' => 'users.'],function (){

        //Change default guard ('web') to admin guard
        Config::set('auth.defines','buyer');

        //Begin Buyer Auth

        Route::prefix(buildPrefix('users','login'))->group(function (){

            Route::get('/','UserController@Login')->name('Login');

            Route::post('/','UserController@submitLogin')->name('submitLogin');
        });
        //Begin Buyer Auth

        Route::group(['middleware' => 'buyer:buyer','prefix'=> 'user'], function (){

            Route::get('home','UserController@home');

        });



        });





});
