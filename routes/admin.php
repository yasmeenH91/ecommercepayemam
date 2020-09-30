<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['namespace'=>'Dashboard','middleware'=>'auth:admin','prefix'=>'admin'],function (){

    Route::get('/','DashboardController@index')->name('admin.dashboard');
    Route::get('logout','LoginController@logout')->name('admin.logout');

    Route::group(['prefix'=>'settings'],function(){
        Route::get('shipping-method/{type}','SettingController@editShippingMethods')->name('edit.shipping.methods');
        Route::put('shipping-method/{id}','SettingController@updateShippingMethods')->name('update.shipping.methods');



    });
        Route::group(['prefix'=>'profile'],function(){
            Route::get('edit','ProfileController@editProfile')->name('edit.profile');
            Route::put('update','ProfileController@updateProfile')->name('update.profile');
        });


        Route::group(['prefix' => 'main_categories'], function () {
            Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
            Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
            Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');
            Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
            Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
            Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
//            Route::get('changeStatus/{id}','MainCategoriesController@changeStatus') -> name('admin.maincategories.status');
        });

        ################################## sub categories routes ######################################
//        Route::group(['prefix' => 'sub_categories'], function () {
//            Route::get('/','SubCategoriesController@index') -> name('admin.subcategories');
//            Route::get('create','SubCategoriesController@create') -> name('admin.subcategories.create');
//            Route::post('store','SubCategoriesController@store') -> name('admin.subcategories.store');
//            Route::get('edit/{id}','SubCategoriesController@edit') -> name('admin.subcategories.edit');
//            Route::post('update/{id}','SubCategoriesController@update') -> name('admin.subcategories.update');
//            Route::get('delete/{id}','SubCategoriesController@destroy') -> name('admin.subcategories.delete');
//        });

        ################################## end sub categories    #######################################


        ################################## brands routes ######################################
        Route::group(['prefix' => 'brands'], function () {
            Route::get('/','BrandsController@index') -> name('admin.brands');
            Route::get('create','BrandsController@create') -> name('admin.brands.create');
            Route::post('store','BrandsController@store') -> name('admin.brands.store');
            Route::get('edit/{id}','BrandsController@edit') -> name('admin.brands.edit');
            Route::post('update/{id}','BrandsController@update') -> name('admin.brands.update');
            Route::get('delete/{id}','BrandsController@destroy') -> name('admin.brands.delete');
        });
        ################################## end brands    #######################################

        ################################## Tags routes ######################################
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/','TagsController@index') -> name('admin.tags');
            Route::get('create','TagsController@create') -> name('admin.tags.create');
            Route::post('store','TagsController@store') -> name('admin.tags.store');
            Route::get('edit/{id}','TagsController@edit') -> name('admin.tags.edit');
            Route::post('update/{id}','TagsController@update') -> name('admin.tags.update');
            Route::get('delete/{id}','TagsController@destroy') -> name('admin.tags.delete');
        });
        ################################## end tags    #######################################

        ################################## Products routes ######################################
        Route::group(['prefix' => 'products'], function () {
            Route::get('/','ProductController@index') -> name('admin.products');
            Route::get('general-information','ProductsController@create') -> name('admin.products.general.create');
            Route::post('store-general-information','ProductsController@store') -> name('admin.products.general.store');
        });
        ################################## end Products    #######################################

    });


    Route::group(['namespace'=>'Dashboard','middleware'=>'guest:admin','prefix'=>'admin'],function (){

    Route::get('login','LoginController@login')->name('admin.login');
    Route::post('login','LoginController@postLogin')->name('admin.post.login');
    });


});
