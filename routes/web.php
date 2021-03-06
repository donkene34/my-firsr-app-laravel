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
    return view('welcome');
});

// route authentification
Auth::routes();

// acceuil
Route::get('/home', 'HomeController@index')->name('home');

// routes profil
Route::get('/profiles/{username}', 'ProfileController@show')->name('profiles.show');
Route::get('/profiles/{username}/edit','ProfileController@edit')->name('profiles.edit');
Route::patch('/profiles/{username}','ProfileController@update')->name('profiles.update');

// routes posts
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}','PostController@show')->name('posts.show');
