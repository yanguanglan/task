<?php

class UsercashesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($user_id)
	{
		//
		$usercashe = Usercash::where('user_id', $user_id)->get();

		return Response::json(array('errorno'=>'0', 'errormsg'=>'加载数据列表成功', 'data'=>$usercashe->toArray(), 'totalCount'=>count($usercashe)));

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
		$user_id = Input::get('uid');
		$userbank_id = Input::get('userBankId');
		$cashCoins = Input::get('cashCoins');

		#获得用户账户金额
		$usercashe = new Usercash;
		$usercashe->user_id = $user_id;
		$usercashe->userbank_id = $userbank_id;
		$usercashe->cashCoins = $cashCoins;
		$usercashe->save();

		return Response::json(array('errorno'=>'0', 'errormsg'=>'提现提交成功', 'data'=>$usercashe->toArray(), 'totalCount'=>count($usercashe)));
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