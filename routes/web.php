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

// TODO: This will most likely be changed to re-direct to login.
Route::get('/', function () {
    return view('home');
});

// TODO: Tie up all routes to at least the projects and assignments pages
// ! Auth must be implemented
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// TODO: Change the names of the controllers to match the naming conventions
// ? Maps the default RESTful actions to each controller
Route::resource('projects', 'ProjectController');
Route::get('projects/create', 'ProjectController@create')->name('create.blade.php');
Route::resource('modules', 'ModuleController');
Route::resource('assignments', 'AssignmentController');
Route::resource('marks', 'MarkController');
