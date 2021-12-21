<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\PostController@index')->name('post.index');
Route::get('/dashboard', 'App\Http\Controllers\PostController@dashboard')->name('dashboard.index');
Route::get('autor/{id}', 'App\Http\Controllers\PostController@indexAutor')->name('post.index-autor');

Route::prefix('post')->group(function() {
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::get('show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');
    Route::get('edit/{id}', 'App\Http\Controllers\PostController@edit')->middleware('auth')->name('post.edit');
    Route::post('update/{id}', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::post('store/{postarAgora?}', 'App\Http\Controllers\PostController@store')->name('post.store');
    Route::post('image-upload', 'App\Http\Controllers\PostController@imageUpload')->name('post.image-upload');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
