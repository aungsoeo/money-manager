<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/home', function(){
    if (Auth::user()->type == "ADMIN") {
        return redirect('/admin/dashboard');
    }
    return redirect('/user/dashboard');
});
      
Route::group(['prefix' => 'auth'], function(){
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
    
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('dashboard', 'UsersController@dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('dashboard', 'Admin\DashboardController@dashboard');
    
    //users
    Route::get('users', 'Admin\UsersController@index');
    
    //Category
    Route::get('category', 'Admin\CategoriesController@index');
    Route::get('add/category', 'Admin\CategoriesController@add');
    Route::post('add/category', 'Admin\CategoriesController@addPost');
});
