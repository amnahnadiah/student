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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile-show/{id}', 'ProfileController@show');
Route::get('/profile-create', 'ProfileController@create');
Route::post('/profile-create', 'ProfileController@store');
Route::get('/profile-edit/{id}', 'ProfileController@edit');
Route::put('/profile-update/{id}', 'ProfileController@update');
Route::delete('/profile-destroy/{id}', 'ProfileController@destroy');

Route::resource('subjects','SubjectsController');

