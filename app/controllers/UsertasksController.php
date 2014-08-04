<?php

class UsertasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($user_id, $status = 0)
	{
		$usertask = Usertask::where('user_id', $user_id)->where('status', $status)->join('tasks', function($join)
        {
            $join->on('user_task.task_id', '=', 'tasks.id');
        })->paginate(20);

		return Response::json(array('errorno'=>'0', 'errormsg'=>'加载数据列表成功', 'data'=>$usertask->toArray(), 'totalCount'=>count($usertask)));
	}

	public function gettask()
	{
		$user_id = Input::get('user_id');
		$task_id = Input::get('task_id');

		$find = Usertask::where('user_id', $user_id)->where('task_id', $task_id)->get();

		if(isset($find[0]->id)) {
			return Response::json(array('errorno'=>'2001', 'errormsg'=>'已经领取过任务', 'data'=>array(), 'totalCount'=>0));
		} 
		else
		{
			#领取任务
			$usertask = new Usertask;
			$usertask->user_id = $user_id;
			$usertask->task_id = $task_id;
			$usertask->status = 0;
			$usertask->process = 1;
			$usertask->save();
		}

		return Response::json(array('errorno'=>'0', 'errormsg'=>'领取任务成功', 'data'=>$usertask->toArray(), 'totalCount'=>1));
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