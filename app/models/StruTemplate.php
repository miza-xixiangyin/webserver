<?php

class StruTemplate extends Eloquent {

	protected $table = 'stru_templates';

	public static $rules = array
	(
		'title' => 'required',
		'desc' => 'required',
		'pic' => 'required',
	);
}