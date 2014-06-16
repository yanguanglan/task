<?php

class Task extends \Eloquent {
	protected $fillable = array();
	protected $table = 'tasks';

	public function merchant()
	{
		return $this->belongsTo('Merchant');
	}
}