<?php

class Task extends \Eloquent {
	protected $fillable = array();

	public function merchant()
	{
		$this->hasOne('Merchant');
	}
}