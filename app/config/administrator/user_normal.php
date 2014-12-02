<?php

return array(

	'title' => '普通用户',

	'single' => '普通用户',

	'model' => 'FrontUser',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'email' => array(
			'title' => '用户名称',
		),
		// 'roles_list' => array(
			// 'title' => '角色',
			// 'relationship' => 'roles',
			// 'select' => "GROUP_CONCAT((:table).role)"
		// ),
		// 'nick' => array(
		// 	'title' => '昵称'
		// ),
		'nick' => array(
			'title' => '昵称'
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
		// 'roles' => array(
		// 	'title' => '角色',
		// 	'type' => 'relationship',
		// 	'name_field' => 'desc',
		// 	'options_filter' => function($query)
		// 	{
		// 		$query->where('role_type', '=', 'user');
		// 	}
		// ),
		'nick' => array(
			'title' => '昵称'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'email' => array(
			'type' => 'text',
		),
		// 'roles' => array(
		// 	'title' => '角色',
		// 	'type' => 'relationship',
		// 	'name_field' => 'desc',
		// 	'editable' => false,
		// 	'editable' => function () {
		// 		return Auth::user()->hasRole('admin_role') || Auth::user()->hasRole('root');
		// 	},
		// 	'options_filter' => function($query)
		// 	{
		// 		$query->where('role_type', '=', 'user');
		// 	}
		// ),
		'nick' => array(
			'title' => '昵称'
		),
	),

);