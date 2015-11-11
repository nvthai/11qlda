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
/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
   'auth' => 'Auth\AuthController',
   'password' => 'Auth\PasswordController',
]);*/
//Route::resource('titles','TitleController@index');




// classes/
Route::get('/classes/index.php', function () {
	return View('classes.index');
});

Route::post('/classes/index.php', function () {
	return View('classes.index');
});

Route::get('/classes/addClass.php', function () {
	return View('classes.addClass');
});
Route::post('/classes/addClass.php', function () {
	return View('classes.addClass');
});


Route::get('/classes/changeClass.php', function () {
	return View('classes.changeClass');
});
Route::post('/classes/changeClass.php', function () {
	return View('classes.changeClass');
});

Route::get('/classes/Classes.php', function () {
	return View('classes.Classes');
});

Route::post('/classes/Classes.php', function () {
    return View('classes.Classes');
});

Route::get('/classes/editClassController.php', function () {
	return View('classes.editClassController');
});
Route::post('/classes/editClassController.php', function () {
	return View('classes.editClassController');
});

Route::get('/classes/editClassView.php', function () {
	return View('classes.editClassView');
});

Route::post('/classes/editClassView.php', function () {
	return View('classes.editClassView');
});

// setup/
Route::get('/setup/teacherClass.php', function () {
	return View('setup.teacherClass');
});
Route::post('/setup/teacherClass.php', function () {
	return View('setup.teacherClass');
});
Route::get('/setup/addClassController.php', function () {
	return View('setup.addClassController');
});

Route::get('/setup/class.php', function () {
	return View('setup.class');
});
Route::post('/setup/class.php', function () {
	return View('setup.class');
});