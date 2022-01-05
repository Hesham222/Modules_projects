<?php

Route::namespace('Vendors\Http\Controllers\Vendor')->group(function (){


    Route::group(['middleware' => 'web' , 'as' => 'vendors.'],function (){

        Config::set('auth.defines','vendor');

        //Begin Vendor Auth

        Route::prefix(buildPrefix('vendors','login'))->group(function (){
            Route::get('/','VendorController@Login')->name('Login');

            Route::post('/','VendorController@submitLogin')->name('submitLogin');
        });
        //End Vendor Auth

        Route::group(['middleware' => 'vendor:vendor','prefix'=> 'vendor'], function (){

            Route::get('dashboard', 'VendorController@dashboard')->name('dashboard');

            Route::get('logout', 'VendorController@logout')->name('logout');

            //Begin Categories Routes
            Route::resource('categories','CategoryController');
            Route::get('delete-category/{id}','CategoryController@destroy');
            //End Categories Routes

            //Begin Products Routes
            Route::resource('products','ProductController');
            Route::get('delete-product/{id}','ProductController@destroy');





        });

        });


});

