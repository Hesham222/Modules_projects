<?php

Route::namespace('Vendors\Http\Controllers\Vendor')->group(function (){


    Route::group(['middleware' => 'web' , 'as' => 'vendors.'],function (){

        Config::set('auth.defines','vendor');

        //Begin Admin Auth

        Route::prefix(buildPrefix('vendors','login'))->group(function (){
            Route::get('/','VendorController@Login')->name('Login');

            Route::post('/','VendorController@submitLogin')->name('submitLogin');
        });
        //End Admin Auth

        Route::group(['middleware' => 'vendor:vendor','prefix'=> 'vendor'], function (){

            Route::get('dashboard', 'VendorController@dashboard')->name('dashboard');

            Route::get('logout', 'VendorController@logout')->name('logout');


        });

        });


});

