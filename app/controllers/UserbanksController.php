<?php

class UserbanksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//input
		$user_id = Input::get('uid');
		$type = Input::get('type');
		$userName = Input::get('userName');
		$idCard = Input::get('idCard', '');
		$province = Input::get('province', '');
		$city = Input::get('city', '');
		$bankName = Input::get('bankName', '');
		$depositBank = Input::get('depositBank', '');
		$cardNum = Input::get('cardNum');

		//添加数据
		$userbank = new Userbank();
		$userbank->user_id = $user_id;
		$userbank->type = $type;
		$userbank->userName = $userName;
		$userbank->idCard = $idCard;
		$userbank->province = $province;
		$userbank->city = $city;
		$userbank->bankName = $bankName;
		$userbank->depositBank = $depositBank;
		$userbank->cardNum = $cardNum;
		$userbank->save();

		return Response::json(array('errorno'=>'0', 'errormsg'=>'添加成功', 'data'=>$userbank->toArray(), 'totalCount'=>1));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//获取数据
		$userbank = Userbank::find($id);
		return Response::json(array('errorno'=>'0', 'errormsg'=>'加载数据成功', 'data'=>$userbank->toArray(), 'totalCount'=>1));
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
		//更新数据
		//input
		$userName = Input::get('userName');
		$idCard = Input::get('idCard', '');
		$province = Input::get('province', '');
		$city = Input::get('city', '');
		$bankName = Input::get('bankName', '');
		$depositBank = Input::get('depositBank', '');
		$cardNum = Input::get('cardNum');

		//更新数据
		$userbank = Userbank::find($id);
		$userbank->userName = $userName;
		$userbank->idCard = $idCard;
		$userbank->province = $province;
		$userbank->city = $city;
		$userbank->bankName = $bankName;
		$userbank->depositBank = $depositBank;
		$userbank->cardNum = $cardNum;
		$userbank->save();

		return Response::json(array('errorno'=>'0', 'errormsg'=>'更新成功', 'data'=>$userbank->toArray(), 'totalCount'=>1));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//删除数据
		Userbank::find($id)->delete();

		return Response::json(array('errorno'=>'0', 'errormsg'=>'删除成功', 'data'=>array(), 'totalCount'=>1));
	}

}