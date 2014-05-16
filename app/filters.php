<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});

Route::filter('auth.api', function()
{
	if (!Request::input('remember_token')) {
		return Response::json(array('errorno'=>'1002', 
				                        'errormsg'=>'非法请求',
				                        'data'=>array(),
				                        'totalCount'=>0,
		));
	} else {
		$user = User::where('remember_token', Request::input('remember_token'))->first();
		if (!$user)
		{
			return Response::json(array('errorno'=>'1002', 
				                        'errormsg'=>'非法请求',
				                        'data'=>array(),
				                        'totalCount'=>0,
		));
		}
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

//手机注册 发送验证码
function sendPhoneCode($phone,$content){
	$res_code_arr = array('0'=>'发送成功','-1'=>'用户名或密码错误','-2'=>'发送短信余额不足','-6'=>'参数有误','-7'=>'权限受限','-8'=>'Ip失败','-11'=>'内部数据库错误');
	$name ="3SDK-EMY-0130-OESPR";
	$pwd  ="zchlodVYrx";
	$msg  =rawurlencode($content);
	$res = file_get_contents('http://sdkhttp.eucp.b2m.cn/sdkproxy/sendsms.action?cdkey='.$name.'&password='.$pwd.'&phone='.$phone.'&message='.$msg);
	$xml = simplexml_load_string(trim($res));
	$res = (int)$xml->error;
	return $res == 0 ? true : false;
}
