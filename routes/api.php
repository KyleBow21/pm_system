<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// * We will most likely have to mess about with the API's for something.
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Example of a route we could use to store the choices of a student
Route::post('projects/submit', 'ProjectController@submitChoices')->name('api.projects.submit')->middleware('auth:api');