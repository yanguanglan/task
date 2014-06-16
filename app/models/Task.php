<?php

class Task extends \Eloquent {
	protected $fillable = array();

	public function merchant()
	{
		return $this->hasOne('Merchant');
	}
}