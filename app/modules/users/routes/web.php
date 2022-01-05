<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::namespace('Users\Http\Controllers\User')->group(function (){


    Route::group(['middleware' => 'web' , 'as' => 'users.'],function (){

        Config::set('auth.defines','buyer');

        //Begin Vendor Auth

        Route::prefix(buildPrefix('users','login'))->group(function (){
            Route::get('/','UserController@Login')->name('Login');

            Route::post('/','UserController@submitLogin')->name('submitLogin');
        });
        //End Vendor Auth

        Route::group(['middleware' => 'buyer:buyer','prefix'=> 'user'], function (){

            Route::get('Home', 'UserController@Home')->name('home');

            Route::get('logout', 'UserController@logout')->name('logout');

//            //Begin Categories Routes
//            Route::resource('categories','CategoryController');
//            Route::get('delete-category/{id}','CategoryController@destroy');



        });

    });


});

//Route::namespace('Users\Http\Controllers\User')->group(function () {
//
//    Route::group(['middleware' => 'web' , 'as' => 'users.'],function (){
//
//        //Change default guard ('web') to admin guard
//        Config::set('auth.defines','buyer');
//
//        //Begin Buyer Auth
//
//        Route::prefix(buildPrefix('users','login'))->group(function (){
//
//            Route::get('/','UserController@Login')->name('Login');
//
//            Route::post('/','UserController@submitLogin')->name('submitLogin');
//        });
//        //Begin Buyer Auth
//
//        Route::group(['middleware' => 'buyer:buyer','prefix'=> 'user'], function (){
//
//            Route::get('home','UserController@home')->name('home');
//
//        });
//
//
//
//        });
//
//
//
//
//
//});
