<?php

class Merchant extends \Eloquent {
	protected $fillable = array();

	public function task()
	{
		return $this->hasMany('Task');
	}
}