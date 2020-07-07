<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('posts');

Route::get('posts/{id}', 'PostController@show')->name('post_id');

Route::post('posts/{id}/addComment', 'CommentController@store')->name('add_comment');

Route::post('/posts/{post_id}/like', 'PostController@like')->name('like');

Route::post('/posts/addPost', 'PostController@store')->name('/posts/add')->middleware('auth');

Route::get('/posts/sorted_by', 'PostController@index')->name('sorted');


