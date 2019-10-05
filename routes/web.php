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

Route::get('/', 'pagescontroller@index' );



Route::get('/About', 'pagescontroller@About' );



Route::get('/Serves', 'pagescontroller@serves' );

// posts routes

Route::get('/posts','postscontroller@index')->name('posts.index');

Route::get('/posts/create','postscontroller@create')->name('posts.create');
Route::post('/posts','postscontroller@store')->name('posts.store');

Route::get('/posts/{id}','postscontroller@show')->name('posts.show');

Route::get('/posts/{id}/edit','postscontroller@edit')->name('posts.edit');
Route::put('/posts/{id}','postscontroller@update')->name('posts.update');
Route::delete('/posts/{id}','postscontroller@destroy')->name('posts.destroy');




Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
?>