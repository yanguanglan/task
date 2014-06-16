<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($type = null)
	{
		//
		if($type) {
			$tasks = Task::all()->paginate(20);
		}
		else {
			$tasks = Task::where('type', $type)->paginate(20);
		}

		return Response::json(array('errorno'=>'0', 'errormsg'=>'加载数据列表成功', 'data'=>$tasks->toArray(), 'totalCount'=>count($tasks)));
	}

	#商家下面的任务
	public function merchanttask($merchant_id)
	{
		$tasks = Task::where('merchant_id', $merchant_id)->paginate(20);
		return Response::json(array('errorno'=>'0', 'errormsg'=>'加载数据列表成功', 'data'=>$tasks->toArray(), 'totalCount'=>count($tasks)));
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
		$task = Task::find($id);
		return Response::json(array('errorno'=>'0', 'errormsg'=>'加载数据成功', 'data'=>$task->toArray(), 'totalCount'=>1));
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