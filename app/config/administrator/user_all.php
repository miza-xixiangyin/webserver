<?php

return array(

	'title' => '所有用户',

	'single' => '用户',

	'model' => 'FrontUser',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'image' => array(
			'output' => '<img src="/uploads/user/w-50/(:value)" />'
		),
		'email' => array(
			'title' => '用户名称',
		),
		'user_name',
		'roles_list' => array(
			'title' => '角色',
			// 'relationship' => 'roles',
			// 'select' => "GROUP_CONCAT((:table).role)"
		),
		'nick' => array(
			'title' => '昵称'
		),
		'nick' => array(
			'title' => '昵称'
		),
		'vocation' => array(
			'title' => '职业'
		),
		// 'created_at',
		// 'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'email',
		'roles' => array(
			'title' => '角色',
			'type' => 'relationship',
			'name_field' => 'desc',
			// 'options_filter' => function($query)
			// {
			// 	$query->where('role_type', '=', 'user');
			// }
		),
		'nick' => array(
			'title' => '昵称'
		),
		'vocation' => array(
			'title' => '职业'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'email' => array(
			'type' => 'text',
		),
		'roles' => array(
			'title' => '角色',
			'type' => 'relationship',
			'name_field' => 'desc',
			'options_filter' => function($query)
			{
				// $query->where('role_type', '=', 'user');
			}
		),
		'user_name',
		'nick' => array(
			'title' => '昵称'
		),
		'vocation' => array(
			'title' => '职业'
		),
		'image' => array(
			'type' => 'image',
			'location' => public_path() . '/uploads/user/o/',
			'naming' => 'random',
			'length' => 20,
			'size_limit' => 2,
			'sizes' => array(
				// cut with width=320, the height will auto scall
				// array(320, 0, 'auto', public_path() . '/uploads/user/p/', 100),
				array(120, 120, 'crop', public_path() . '/uploads/user/w-120/', 100),
				array(50, 50, 'crop', public_path() . '/uploads/user/w-50/', 100)
			)
		)
	),

	'query_filter' => function($query) {
		// return FrontRole::find(1)->users();
	}
);