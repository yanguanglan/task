<?php

class Merchant extends \Eloquent {
	protected $fillable = array();

	protected $table = 'merchants';

	public function tasks()
	{
		return $this->HasMany('task');
	}
}