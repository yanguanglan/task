<?php
use Faker\Factory as Faker;
class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$list = User::All();
		return Response::json(array(
	        'data' => $list->toArray(),
	        'totalCount'=> $list->count()
		));
	}

	public function postLogin()
	{
		$user = array(
			'phone'    => Input::get('phone'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($user)) 
		{	
			$user = User::find(Auth::user()->id);
			$user->remember_token = md5(Auth::user()->id . time());
			$user->save();
			return Response::json(array('errorno'=>'0', 
				                        'errormsg'=>'登陆成功',
				                        'data'=>$user->toArray(),
				                        'totalCount'=>1,
			));
		}
		else
		{   
			return Response::json(array('errorno'=>'1001', 'errormsg'=>'登录失败', 'data'=>array(), 'totalCount'=>0));
		}
	}

	public function getSmscode($phone)
	{
		$faker = Faker::create();
		$code = $faker->randomNumber(6);
		$content = "验证码为 $code 请在页面中输入已完成操作。退订回复TD【我要联赢】";
		
		if(sendPhoneCode($phone, $content))
		{
			$smscode = new Smscode;
			$smscode->phone = $phone;
			$smscode->smscode = $code;
			$smscode->save();

			return Response::json(array('errorno'=>'0', 'errormsg'=>'验证码发送成功', 'data'=>array('expiration_date'=>'60'), 'totalCount'=>1));

		} else {
			return Response::json(array('errorno'=>'1003', 'errormsg'=>'验证码发送失败', 'data'=>array(), 'totalCount'=>0));
		}

	}

	public function postRegister()
	{

		$validation = Validator::make(
			Input::all(),
			array(
					'phone' => 'required|unique:users,phone',
					'password' => 'required',	
					'smscode' => 'required',			)		
			);

		if ($validation->passes())
		{
				$phone = Input::get('phone');
				$password = Input::get('password');
				$smscode = Input::get('smscode');
				$rand = rand(0,1);
				if($rand) {
					$time = time() - 3600;
					$time = date('Y-m-d H:i:s', $time);
					#删除过期验证码
					Smscode::where('created_at', '<', $time)->delete();
				}

				$code = Smscode::where('phone', $phone)->where('smscode', $smscode)->first();

				if($code) {
					Smscode::find($code->id)->delete();
					$user = new User;
					$user->phone = $phone;
					$user->password= Hash::make($password);
					$user->name = '';
					$user->nickname = '';
					$user->avatar = '';
					$user->email = '';
					$user->surplus_coin_num = 0;
					$user->cash_coin_num = 0;
					$user->weixin = '';
					$user->sinaweibo = '';
					$user->tencentweibo = '';
					$user->qq = '';
					$user->qqzone = '';
					$user->douban = '';
					$user->renren = '';
					$user->save();

					return Response::json(array('errorno'=>'0', 'errormsg'=>'注册成功', 'data'=>$user->toArray(), 'totalCount'=>1));
				} else {
					#验证码不正确
					return Response::json(array('errorno'=>'1004', 'errormsg'=>'验证码错误', 'data'=>array(), 'totalCount'=>0));
				}
		} 
		else
		{
			return Response::json(array('errorno'=>'1004', 'errormsg'=>'手机号码已被注册', 'data'=>array(), 'totalCount'=>0));
		}

	}

	public function postPassword()
	{

				$phone = Input::get('phone');
				$password = Input::get('password');
				$smscode = Input::get('smscode');
				$rand = rand(0,1);
				if($rand) {
					$time = time() - 3600;
					$time = date('Y-m-d H:i:s', $time);
					#删除过期验证码
					Smscode::where('created_at', '<', $time)->delete();
				}

				$code = Smscode::where('phone', $phone)->where('smscode', $smscode)->first();

				if($code) {
					Smscode::find($code->id)->delete();
					$user = User::where('phone', $phone)->first();
					if($user) 
					{
						$user->password= Hash::make($password);
						$user->save();
						return Response::json(array('errorno'=>'0', 'errormsg'=>'修改密码成功', 'data'=>$user->toArray(), 'totalCount'=>1));
				    }
				    else
				    {
				    	return Response::json(array('errorno'=>'1005', 'errormsg'=>'手机号码不存在', 'data'=>array(), 'totalCount'=>0));
				    }
					
				} else {
					#验证码不正确
					return Response::json(array('errorno'=>'1005', 'errormsg'=>'验证码错误', 'data'=>array(), 'totalCount'=>0));
				}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}