<?php

class Merchant extends \Eloquent {
	protected $fillable = array();

	public function task()
	{
		$this->hasMany('Task');
	}
}