<?php

class UserSending extends Eloquent {

	protected $table = 'user_sending_logs';

	public static $rules = array
	(
	);

	public function sender()
	{
		return $this->belongsTo('FrontUser', 'user_id');
	}
}