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
Route::filter('auth', function()
{
    if (!Auth::check())
    {
        return Redirect::to('auth/login');
    }
});

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// // Authentication routes...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// // Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'messages', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('new', ['as' => 'messages.new', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{username}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{username}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

 //    Route::get('/{username}', function($username)
	// {
	// 	return View::make('chats')->with('username',$username);
	// });

	Route::post('sendMessage', array('uses' => 'MessagesController@sendMessage'));
	Route::post('isTyping', array('uses' => 'MessagesController@isTyping'));
	Route::post('notTyping', array('uses' => 'MessagesController@notTyping'));
	Route::post('retrieveChatMessages', array('uses' => 'MessagesController@retrieveChatMessages'));
	Route::post('retrieveTypingStatus', array('uses' => 'MessagesController@retrieveTypingStatus'));
});

Route::group(['prefix' => 'classes', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'classes', 'uses' => 'ClassesController@index']);

    Route::post('/upload',['as' => 'classes.upload', 'uses' => 'ClassesController@upload']);
    Route::get('/download', ['as' => 'classes.download', 'uses' => 'ClassesController@download']);
    Route::post('/', ['as' => 'classes', 'uses' => 'ClassesController@addClass']);
    // update calss
    // LH 15-11-15
    Route::post('/update', ['as' => 'classes.update', 'uses' => 'ClassesController@updateClass']);
    //Route::post('/add',['as' => 'classes', 'uses' => 'ClassesController@addClass']);
    Route::post('/upload',['as' => 'classes', 'uses' => 'ClassesController@upload']);

});

Route::get('contact', 
  ['as' => 'contact', 'uses' => 'ContactController@create']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'ContactController@store']);