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
    return view('welcome');
});
Route::get('plastic', 'ProductController@plasticList');
Route::post('plasticSave', 'ProductController@plasticSave');
Route::post('plasticDelete', 'ProductController@plasticDelete');

Route::get('plasticExport', 'ProductController@exportExcel');
