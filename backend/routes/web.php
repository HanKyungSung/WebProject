<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/test', function () {
    return view('layouts/app2');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create-post', 'PostController@store');

Route::get('/create-post-form', 'PostController@create');

Route::get('/post/{post}/show', 'PostController@show');

Route::post('/create-comment', 'CommentController@store');

Route::get('/user/{user}/settings', 'UserController@edit');

Route::post('/user/{user}/settings/update');

Route::get('/user/{user}/posts', 'UserController@index');