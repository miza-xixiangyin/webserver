<?php

class UserFollow extends Eloquent {

	protected $table = 'user_follows';

	public static $rules = array
	(
	);

	public function owner()
	{
		return $this->belongsTo('FrontUser', 'user_id');
	}

	public function follower()
	{
		return $this->belongsTo('FrontUser', 'follower_id');
	}
}