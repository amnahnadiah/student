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

Route::get('/alamat', 'AlamatController@index')->name('alamat');
Route::get('/alamat-show/{id}', 'AlamatController@show');
Route::get('/alamat-show/{id}', 'AlamatController@show');
Route::get('/alamat-create', 'AlamatController@create');
Route::post('/alamat-create', 'AlamatController@store');
Route::get('/alamat-edit/{id}', 'AlamatController@edit');
Route::put('/alamat-update/{id}', 'AlamatController@update');
Route::delete('/alamat-destroy/{id}', 'AlamatController@destroy');

Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/teacher-show/{id}', 'TeacherController@show');
Route::get('/teacher-create', 'TeacherController@create');
Route::post('/teacher-create', 'TeacherController@store');
Route::get('/teacher-edit/{id}', 'TeacherController@edit');
Route::put('/teacher-update/{id}', 'TeacherController@update');
Route::delete('/teacher-destroy/{id}', 'TeacherController@destroy');

Route::get('/student', 'StudentController@index')->name('student');
Route::get('/student-show/{id}', 'StudentController@show');
Route::get('/student-create', 'StudentController@create');
Route::post('/student-create', 'StudentController@store');
Route::get('/student-edit/{id}', 'StudentController@edit');
Route::put('/student-update/{id}', 'StudentController@update');
Route::delete('/student-destroy/{id}', 'StudentController@destroy');

Route::get('/guardian', 'GuardianController@index')->name('guardian');
Route::get('/guardian-show/{id}', 'GuardianController@show');
Route::get('/guardian-create', 'GuardianController@create');
Route::post('/guardian-create', 'GuardianController@store');
Route::get('/guardian-edit/{id}', 'GuardianController@edit');
Route::put('/guardian-update/{id}', 'GuardianController@update');
Route::delete('/guardian-destroy/{id}', 'GuardianController@destroy');

Route::get('/school', 'SchoolController@index')->name('school');
Route::get('/school-show/{id}', 'SchoolController@show');
Route::get('/school-create', 'SchoolController@create');
Route::post('/school-create', 'SchoolController@store');
Route::get('/school-edit/{id}', 'SchoolController@edit');
Route::put('/school-update/{id}', 'SchoolController@update');
Route::delete('/school-destroy/{id}', 'SchoolController@destroy');

Route::get('/subject', 'SubjectController@index')->name('subject');
Route::get('/edulevel', 'EdulevelController@index')->name('edulevel');
Route::get('/room', 'RoomController@index')->name('room');

Route::resource('subjects','SubjectController');
Route::resource('edulevels','EdulevelController');
Route::resource('rooms','RoomController');
