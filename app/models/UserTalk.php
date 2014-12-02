<?php

class UserTalk extends Eloquent {

	protected $table = 'user_talks';

	public static $rules = array
	(
	);

	public function user()
	{
		return $this->belongsTo('FrontUser', 'user_id');
	}
}