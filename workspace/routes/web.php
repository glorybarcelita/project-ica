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

Route::resource('users','UserController')->except(['delete','show1']);
Route::resource('courses','CourseController');
Route::resource('subjects','SubjectController');
Route::resource('syllabus','SyllabusController');
Route::resource('learningresources','LearningResourcesConroller');
Route::resource('subjecttopic','SubjectTopicController');
Route::resource('dashboard','DashboardController');

