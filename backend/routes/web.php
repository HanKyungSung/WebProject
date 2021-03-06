<?php

use Illuminate\Support\Facades\Auth;
use App\User;
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

Route::get('/post/{post}/delete', 'PostController@destroy');

Route::get('/post/{post}/edit', 'PostController@edit');

Route::put('/post/{post}/update', 'PostController@update');

Route::get('/comment/{comment}/delete', 'CommentController@destroy');

Route::get('/comment/{comment}/edit', 'CommentController@edit');

Route::put('/comment/{comment}/update', 'CommentController@update');

Route::post('/create-comment', 'CommentController@store');

Route::get('/user/{user}/settings', 'UserController@edit');

Route::post('/user/{user}/settings/update');

// Route::get('/user/{user}/posts', 'UserController@index');

Route::get('/mypage', 'UserController@index');


Route::get('/test2',function() {
    $user = \Auth::user();
    dd($user->posts());
});