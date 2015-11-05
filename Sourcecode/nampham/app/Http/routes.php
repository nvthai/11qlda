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

Route::get('/', function () {
    return View::make('home');
});

Route::get('/about', function () {
    return View::make('about');
});

Route::get('/joinclass', function () {
    return View::make('joinclass');
});

Route::post('/joinclass', function()
{
	$data = Input::all();
	$rules = array(
		'id' => 'required'
	);

	$validator = Validator::make($data, $rules);

	if($validator->fails()) {
    	return Redirect::to('joinclass')->withErrors($validator)->withInput();
	}

	DB::table('class')->insert(
			array('ID' => 1 , 'Name' => "vietnam", 
				'Owner_ID' => "1", 'Teacher_ID' => "1"	)
		);
	return 'You have joined successfully';
 });


//Route::get('/', 'JoinclassController@home');
//Route::get('/create', 'JoinclassController@create');
//Route::get('/edit', 'JoinclassController@edit');
//Route::get('/delete', 'JoinclassController@delete');
