<?php

use Illuminate\Support\Facades\Route;
$url = 'App\Http\Controllers';

Route::get('/', function () {
    return view('home');
});

Route::get('product/{slug}', $url."\ProductController@showProduct");
Route::get('product', $url."\ProductController@showallProduct");
Route::get('action/{id}', $url."\ProductController@editProduct");
Route::post('action/update', $url."\ProductController@update");