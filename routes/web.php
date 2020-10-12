<?php

use Illuminate\Support\Facades\Route;
$url = 'App\Http\Controllers';

Route::get('/', function () {
    return view('home');
});

Route::get('product/{slug}', $url."\ProductController@showProduct");
Route::get('product', $url."\ProductController@showallProduct");
Route::get('action/edit/{id}', $url."\ProductController@editProduct");
Route::post('addproduct', $url."\ProductController@addProduct");
Route::get('action', function () {
    $edit = false;
    return view('action', compact('edit'));
});
Route::post('action/update', $url."\ProductController@update");
Route::delete('product/delete/{product:product_slug}', $url."\ProductController@delete");