<?php

class FrontRole extends Eloquent {

	protected $table = 'roles';

	public static $rules = array
	(
		'role' => 'required|unique:roles',
		'role_type' => 'required',
		'desc' => 'required',
	);

	public function users()
	{
		return $this->belongsToMany('FrontUser', 'user_role', 'user_id', 'role_id');
	}

	public static function getAuthorshipUser($role, $page)
	{
		$route_name = Route::currentRouteName();
		$cache_conf = Config::get('web_conf.cache_authorship_user');
		$cache_name = $cache_conf['name'] . $role;
		$column 	= $page->column;

		if (Cache::has($cache_name))
		{
			return Cache::get($cache_name);
		}

		$authorship = array();
		$users = self::where('role', $role)
			->first()
			->users()
			->get();

		foreach ($users as $user) {
			$index_page = $user->index_page($page->column_id);
			if (!$index_page) continue;

			$user->link = route($route_name, array('model' => $column->name, 'id' => $index_page->id));
			$authorship[] = $user;
		}

		// Cache::put($cache_name, $authorship, 1);

		return $authorship;
	}
}