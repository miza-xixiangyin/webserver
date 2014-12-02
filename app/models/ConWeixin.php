<?php

class ConWeixin extends Eloquent {

	protected $table = 'con_weixin';

	public static $rules = array
	(
		'title' => 'required',
		'pic' => 'required|image',
		'content' => 'required',
	);
}