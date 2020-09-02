<?php

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
    return view('layout');
});

//create and store
Route::get('posts/create','PostController@create')->name('posts.create');
Route::post('posts/store','PostController@store')->name('posts.store');


//display all posts
Route::get('posts/posts','PostController@posts')->name('posts');
//show one post
Route::get('posts/show/{id}','PostController@show')->name('posts.show');


//edit and update
Route::get('posts/edit/{id}','PostController@edit')->name('posts.edit');
Route::post('posts/update/{id}','PostController@update')->name('posts.update');

//delete
Route::get('posts/delete/{id}','PostController@delete')->name('posts.delete');