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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home' , 'PageController@home');

Route::get('/contact', 'PageController@contact');
Route::get('pages/profile', 'PageController@profile');

Route::resource('posts', 'PostController');
Auth::routes();

Route::get('pages/profile', 'HomeController@index');
Route::get('posts/{id}/like', 'PostController@postlike');





