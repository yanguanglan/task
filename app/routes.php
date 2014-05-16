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

Route::group(array('prefix' => 'v1'), function()
{
	#登陆
	Route::post('login', 'UsersController@postLogin');
	#发送验证码
	Route::get('smscode/{phone}', 'UsersController@getSmscode');
	#注册
	Route::post('register', 'UsersController@postRegister');
	#修改密码
	Route::post('password', 'UsersController@postPassword');
	
	Route::group(array('before' => 'auth.api'), function()
	{	

		Route::resource('users', 'UsersController');
		Route::resource('tasks', 'TasksController');
		Route::resource('Merchants', 'MerchantsController');
		Route::resource('Userbanks', 'UserbanksController');
		Route::resource('Usercashes', 'UsercashesController');
		Route::resource('Usertasks', 'UsertasksController');
    });
});