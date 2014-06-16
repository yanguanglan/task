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
		#修改密码 {password, newpassword} remember_token
		Route::post('repassword', 'UsersController@postRepassword');

		#更新个人信息 {除去avatar, phone, password之外的字段} remember_token
		Route::post('profile', 'UsersController@postProfile');
 
		#退出登陆 remember_token
		Route::post('logout', 'UsersController@postLogout');
		
		#更新头像 {avatar} remember_token
		Route::post('avatar', 'UsersController@postAvatar');

		#用户添加银行卡/支付宝 更新 删除
		#列表
		Route::get('userbanklist/{user_id}', 'UserbanksController@index');
		#添加
		Route::post('userbankadd', 'UserbanksController@store');
		#显示
		Route::get('userbankshow/{id}', 'UserbanksController@show');
		#更新
		Route::post('userbankupdate/{id}', 'UserbanksController@update');
		#删除
		Route::post('userbankdel/{id}', 'UserbanksController@destroy');
		#提现列表
		Route::get('usercasheslist/{user_id}', 'UsercashesController@index');
		#提现
		Route::post('usercashesadd', 'UsercashesController@store');

		#任务列表
		Route::get('tasklist', 'TasksController@index');
		#任务详情
		Route::get('taskshow/{id}', 'TasksController@show');
		#商家下的任务
		#Route::get('merchanttask/{merchant_id}', 'TasksController@merchanttask');
		#用户任务列表
		Route::get('usertasklist/{user_id}', 'UsertasksController@index');

		Route::resource('users', 'UsersController');
		Route::resource('tasks', 'TasksController');
		Route::resource('Merchants', 'MerchantsController');
		Route::resource('Usercashes', 'UsercashesController');
		Route::resource('Usertasks', 'UsertasksController');
    });
});