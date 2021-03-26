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

Route::get('/subject', 'SubjectController@index')->name('subject');
Route::get('/subject-show/{id}', 'SubjectController@show');
Route::get('/subject-create', 'SubjectController@create');
Route::post('/subject-create', 'SubjectController@store');
Route::get('/subject-edit/{id}', 'SubjectController@edit');
Route::put('/subject-update/{id}', 'SubjectController@update');
Route::delete('/subject-destroy/{id}', 'SubjectController@destroy');

Route::get('/edulevel', 'EdulevelController@index')->name('edulevel');
Route::get('/edulevel-show/{id}', 'EdulevelController@show');
Route::get('/edulevel-create', 'EdulevelController@create');
Route::post('/edulevel-create', 'EdulevelController@store');
Route::get('/edulevel-edit/{id}', 'EdulevelController@edit');
Route::put('/edulevel-update/{id}', 'EdulevelController@update');
Route::delete('/edulevel-destroy/{id}', 'EdulevelController@destroy');

Route::get('/room', 'RoomController@index')->name('room');
Route::get('/room-show/{id}', 'RoomController@show');
Route::get('/room-create', 'RoomController@create');
Route::post('/room-create', 'RoomController@store');
Route::get('/room-edit/{id}', 'RoomController@edit');
Route::put('/room-update/{id}', 'RoomController@update');
Route::delete('/room-destroy/{id}', 'RoomController@destroy');


