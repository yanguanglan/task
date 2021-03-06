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
	#领取任务
	public function gettask()
	{
		$user_id = Input::get('user_id');
		$task_id = Input::get('task_id');

		$find = Usertask::where('user_id', $user_id)->where('task_id', $task_id)->get();
		if(isset($find[0])) {
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
	#转发统计
	public function sharecount()
	{
		$user_id = Input::get('user_id');
		$task_id = Input::get('task_id');
		$channel = Input::get('channel');
		$status = Input::get('status');
		$identity = Input::get('identity');
		$coin_num = Input::get('coin_num');
			#转发统计
			$sharecount = new Sharecount;
			$sharecount->user_id = $user_id;
			$sharecount->task_id = $task_id;
			$sharecount->channel = $channel;
			$sharecount->status = $status;
			$sharecount->identity = $identity;
			$sharecount->save();
		//收入明细
		if($status == 1) {
			$accountdetail = new Accountdetail;
			$accountdetail->user_id = $user_id;
			$accountdetail->type = 1;
			$accountdetail->typeId = 0;
			$accountdetail->comeinCoins = $coin_num;
			$accountdetail->save();
	    }

		return Response::json(array('errorno'=>'0', 'errormsg'=>'领取任务成功', 'data'=>$sharecount->toArray(), 'totalCount'=>1));
	}

	public function posttasklink()
	{	
		$task_id = Input::get('task_id');
		$user_id = Input::get('user_id');
		$data = array('url'=>'http://www.51lianying.cn/index.php/microWeb/index?pageid=8015');
		return Response::json(array('errorno'=>'0', 'errormsg'=>'获取转发连接成功', 'data'=>$data, 'totalCount'=>1));
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