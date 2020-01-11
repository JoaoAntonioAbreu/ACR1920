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
Route::get('/movies/create', 'MovieController@create')->name('movies.create');

Route::get('/movies', 'MovieController@index')->name('movies.index');

Route::get('/movies/{movie}/edit', 'MovieController@edit')->name('movies.edit');


Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');
Route::post('/movies/store', 'MovieController@store')->name('movies.store');
Route::patch('/movies/{movie}', 'MovieController@update')->name('movies.update');
Route::delete('/movies/{movie}', 'MovieController@destroy')->name('movies.destroy');



//Comments
Route::post('/reviews/{movies_id}',['uses'=>'ReviewController@store', 'as'=>'reviews.store']);

Auth::routes();
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');



Route::get('/contact', 'PageController@getContact')->name('get.contact');
Route::post('/contact', 'PageController@postContact')->name('post.contact');


Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware'=> ['auth','admin']], function(){})
