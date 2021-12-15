<?php

use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('post')->group(function() {
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::get('show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');
    Route::post('store/{postarAgora?}', 'App\Http\Controllers\PostController@store')->name('post.store');
    Route::post('image-upload', 'App\Http\Controllers\PostController@imageUpload')->name('post.image-upload');
});