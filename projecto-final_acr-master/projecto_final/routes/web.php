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

Route::get('/','MovieController@index');
Route::get('/movieshow/{movie}','MovieController@show');



Route::get('/moviecreate','MovieController@create');
Route::post('/moviecreate/store','MovieController@store');


Route::resource('movie.reviews','ReviewController');




Auth::routes();
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

Route::get('/home', 'HomeController@index')->name('home');


