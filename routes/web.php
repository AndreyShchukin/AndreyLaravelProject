<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index')->name('posts');
Route::post('/posts/add', 'PostController@store')->name('/posts/add')->middleware('auth');
Route::get('send', 'MailController@send');
Route::get('posts/{id}', 'PostController@show')->name('post_id');
