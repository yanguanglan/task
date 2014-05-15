<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('users', 'UsersController');
Route::resource('tasks', 'TasksController');
Route::resource('Merchants', 'MerchantsController');
Route::resource('Userbanks', 'UserbanksController');
Route::resource('Usercashes', 'UsercashesController');
Route::resource('Usertasks', 'UsertasksController');

Route::group(array('prefix' => 'api'), function()
{
});