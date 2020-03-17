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
    return view('welcome');
});

// TODO: Tie up all routes to at least the projects and assignments pages
// ! Auth must be implemented
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
