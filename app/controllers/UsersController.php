<?php

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
			$user->remember_token = md5(Auth::user()->id . $time());
			$user->save();
			return Response::json(array('errorno'=>'0', 
				                        'errormsg'=>'登陆成功',
				                        'data'=>$user->toArray(),
				                        'totalCount'=>$user->count,
			));
		}
		else
		{   
			return Response::json(array('errorno'=>'1001', 'errormsg'=>'登录失败', 'data'=>array(), 'totalCount'=>0));
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