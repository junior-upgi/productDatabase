<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    if (starts_with(Request::root(), 'http://'))
    {
        $domain = substr (Request::root(), 7); // $domain is now 'www.example.com'
    }
    return $domain;
});

Route::get('login', 'Auth\LoginController@show');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth', 'prefix' => 'plastic'], function() {
    Route::get('/', function () { return redirect('plastic/list'); });
    Route::get('list', 'ProductController@plasticList');
    Route::post('save', 'ProductController@plasticSave');
    Route::post('delete', 'ProductController@plasticDelete');
    Route::get('export', 'ProductController@exportExcel');
});

