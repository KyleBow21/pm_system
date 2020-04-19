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

// TODO: Tie up all routes to at least the projects and assignments pages
// ! Auth must be implemented
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// ? Maps the default RESTful actions to each controller
Route::resource('projects', 'ProjectController');
// Route::get('projects/create', 'ProjectController@create')->name('projects.create');
// Route::get('projects/{id}', 'ProjectController@show')->name('projects.show');
Route::resource('modules', 'ModuleController');
Route::resource('assignments', 'AssignmentController');
// Route::resource('marks', 'MarkController');
