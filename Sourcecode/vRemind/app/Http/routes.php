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
    elseif (Auth::user()->role == null) {
        return Redirect::to('/role_picker');
    }
});

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// // Chose role routes...

//Route::post('join/{role?}',['as' => 'role.selected', 'uses' => 'ClassesController@saveRole']);

Route::group(['prefix' => 'messages', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('new', ['as' => 'messages.new', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{username}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{username}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

 //    Route::get('/{username}', function($username)
    // {
    //  return View::make('chats')->with('username',$username);
    // });

    Route::post('sendMessage', array('uses' => 'MessagesController@sendMessage'));
    Route::post('isTyping', array('uses' => 'MessagesController@isTyping'));
    Route::post('notTyping', array('uses' => 'MessagesController@notTyping'));
    Route::post('retrieveChatMessages', array('uses' => 'MessagesController@retrieveChatMessages'));
    Route::post('retrieveTypingStatus', array('uses' => 'MessagesController@retrieveTypingStatus'));
});


Route::group(['prefix' => 'classes', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'classes', 'uses' => 'ClassesController@index']);
    Route::get('/{id}', ['as' => 'classes', 'uses' => 'ClassesController@show']);
    Route::post('/upload',['as' => 'classes.upload', 'uses' => 'ClassesController@upload']);
    Route::get('/download', ['as' => 'classes.download', 'uses' => 'ClassesController@download']);
    // update class
    // LH 15-11-15
    Route::post('/', ['as' => 'classes', 'uses' => 'ClassesController@addClass']);
    Route::put('/{id}', ['as' => 'classes.update', 'uses' => 'ClassesController@updateClass']);
    Route::post('/upload',['as' => 'classes', 'uses' => 'ClassesController@send_annoucement']);
    Route::post('/deleteAccount',['as' => 'classes', 'uses' => 'ClassesController@deleteAccount']);


    //join
    //Nam 
    Route::post('/joinclass',['as' => 'classes.joinclass', 'uses' => 'ClassesController@joinClass']);
    Route::post('/delete',['as' => 'classes.delete', 'uses' => 'ClassesController@deleteClass']);
    Route::post('/remove',['as' => 'classes.remove', 'uses' => 'ClassesController@removeParticipant']);

    
});






//Setting

Route::group(['prefix' => 'settings', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'settings', 'uses' => 'ClassesController@opensetting']);
    Route::get('/notification', ['as' => 'settings.notifi', 'uses' => 'ClassesController@opennotifica']);
    Route::get('/chat', ['as' => 'settings.chat', 'uses' => 'ClassesController@openchat']);
    Route::get('/widget', ['as' => 'settings.widget', 'uses' => 'ClassesController@openwidget']);
    Route::get('/print', ['as' => 'settings.print', 'uses' => 'ClassesController@openprint']);

});



//09-12-15

Route::any('/role_picker', 'ClassesController@themMotUserMoi');
Route::post('/addRole',"ClassesController@saveRole");
Route::post('/','HomeController@dangky');

 Route::get('contact', 
  ['as' => 'contact', 'uses' => 'ContactController@create']);
 Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'ContactController@store']);