<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/course/show', 'CourseController@show');
Route::get('/course/search', 'CourseController@search');
//Route::get('/', 'ClassController@index');
Route::get('/course', 'CourseController@index');
Route::get('/course/form_join', 'CourseController@form_join');