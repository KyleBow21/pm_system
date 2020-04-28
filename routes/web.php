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

Auth::routes(['verify' => true]);

Route::get('/profile', 'UserController@index')->name('users.profile');
Route::get('/', 'UserController@index')->name('home');

// ? Maps the default RESTful actions to each controller
Route::resource('projects', 'ProjectController');
// Route::get('projects/create', 'ProjectController@create')->name('projects.create');
// Route::get('projects/{id}', 'ProjectController@show')->name('projects.show');
Route::resource('modules', 'ModuleController');
Route::resource('assignments', 'AssignmentController');
Route::resource('users', 'UserController');
Route::resource('marks', 'MarksController');
Route::resource('marking-forms', 'MarkingFormController');