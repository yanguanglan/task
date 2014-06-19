<?php

class Usertask extends \Eloquent {
	protected $table = 'user_task';
	protected $fillable = array();

	public function users()
	{
		return $this->hasMany('User');
	}

	public function tasks()
	{
		return $this->hasMany('Task');
	}
}