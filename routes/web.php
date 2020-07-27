<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', 'AdminController@loginAdmin');

Route::post('/admin', 'AdminController@postLoginAdmin');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::prefix('role')->group(function() {
        Route::get('/index', [
            'as' => 'role.index',
            'uses' => 'AdminRoleController@index'
        ]);

        Route::get('/create', [
            'as' => 'role.create',
            'uses' => 'AdminRoleController@create'
        ]);


    });
    //User
    Route::prefix('user')->group(function(){
        Route::get('/index', [
            'as' => 'user.index',
            'uses' => 'AdminUserController@index'
        ]);

        Route::get('/create', [
            'as'=> 'user.create',
            'uses' => 'AdminUserController@create'
        ]);

        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'AdminUserController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'AdminUserController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'user.update',
            'uses' => 'AdminUserController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'AdminUserController@delete'
        ]);


    });
    //Slider

    Route::prefix('slider')->group(function() {
        Route::get('/index', [
            'as' => 'slider.index',
            'uses' => 'AdminSliderController@index'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'AdminSliderController@create'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'AdminSliderController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSliderController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete'
        ]);

    });

    //Setting

    Route::prefix('setting')->group(function() {
        Route::get('/index', [
            'as' => 'setting.index',
            'uses' => 'SettingController@index'
        ]);

        Route::get('/create', [
            'as' => 'setting.create',
            'uses' => 'SettingController@create'
        ]);

        Route::post('/store', [
            'as' => 'setting.store',
            'uses' => 'SettingController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'setting.edit',
            'uses' => 'SettingController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'setting.update',
            'uses' => 'SettingController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'setting.delete',
            'uses' => 'SettingController@delete'
        ]);

    });

    //Product
    Route::prefix('products')->group(function () {
        Route::get('/index', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);

         Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);

    });

    Route::prefix('categories')->group(function () {
        Route::get('/create', [
            'as' => 'categories.create', // route name
            'uses' => 'CategoryController@create'
        ]);
        Route::get('/', [
            'as'   => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
        //Route::get('/index','CategoryController@index');
        Route::post('/store', [
            'as'   => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);

        Route::post('/update/{id}', [
            'as'   => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);


        Route::get('/delete/{id}', [
            'as'    => 'categories.delete',
            'uses' => 'CategoryController@destroy'
        ]);
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'MenuController@index'
        ]);

        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);

        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
        ]);

        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
    });
});
