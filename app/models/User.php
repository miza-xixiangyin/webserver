<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public static $rules = array
	(
		'email' => 'required|email|unique:users',
	);

	public function roles()
	{
		return $this->belongsToMany('FrontRole', 'user_role', 'role_id', 'user_id');
	}

	public function hasRole($role)
	{
		return in_array($role, array_fetch($this->roles->toArray(), 'role'));
	}

	public function user_nick()
	{
		$nick = $this->nick;
		return $nick ? $nick : $this->email;
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
