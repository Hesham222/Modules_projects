<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;


Route::namespace('Admins\Http\Controllers\Admin')->group(function (){
        Route::group(['middleware' => 'web' , 'as' => 'admins.'],function (){

            //Change default guard ('web') to admin guard
            Config::set('auth.defines','admin');

            //Begin Admin Auth
            Route::prefix(buildPrefix('admins','login'))->group(function (){
                Route::get('/','AdminController@Login')->name('Login');

                Route::post('/','AdminController@submitLogin')->name('submitLogin');
            });
            //End Admin Auth


            Route::group(['middleware' => 'admin:admin','prefix'=> 'admin'], function (){

                Route::get('Dashboard', 'AdminController@dashboard')->name('dashboard');

                Route::get('logout', 'AdminController@logout')->name('logout');

                //Begin Admin Settings
                Route::get('settings','AdminController@settings')->name('settings');
                Route::post('check-current-pwd','AdminController@checkCurrentPassword')->name('check-password');
                Route::post('update-password','AdminController@updateCurrentPassword')->name('update_password');
                Route::get('admin-details','AdminController@adminDetails')->name('adminDetails');
                Route::post('update-admin-details','AdminController@updateAdminDetails')->name('updateAdminDetails');
                //End Admin Settings


                //Begin Areas Routes
                Route::get('areas','AreaController@areas')->name('areas');
                //End Areas Routes

                //Begin Vendors Routes
                Route::get('vendors','VendorController@vendors')->name('vendors');
                Route::get('add-vendor','VendorController@addVendors')->name('add_vendors');
                Route::post('store-vendor','VendorController@storeVendors')->name('store-vendor');
                Route::get('edit-vendor/{id}','VendorController@editVendors')->name('edit-vendor');
                Route::post('update-vendor/{id}','VendorController@updateVendors')->name('update-vendor');
                Route::get('delete-vendor/{id}','VendorController@deleteVendor');
                //End Vendors Routes


            });




        });

});

//    Route::prefix(buildPrefix('admins','login'))->namespace('Admins\Http\Controllers\Admin')->group(function (){
//        Route::get('/','AdminController@index');
//    });
