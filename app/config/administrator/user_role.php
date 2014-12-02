<?php

return array(

	'title' => '用户角色',

	'single' => '角色',

	'model' => 'FrontRole',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'role_type' => array(
			'title' => '角色类别'
		),
		'role' => array(
			'title' => '角色名称',
		),
		'desc' => array(
			'title' => '描述',
		),
		'created_at',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'role' => array(
			'title' => '角色'
		),
		'role_type' => array(
			'type' => 'enum',
			'title' => '角色类别',
			'options' => array(
				'admin' => 'admin',
				'authorship' => 'authorship',
				'user' => 'user'
			)
		)
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'role' => array(
			'title' => '角色名称',
			'type' => 'text'
		),
		'role_type' => array(
			'type' => 'enum',
			'title' => '角色类别',
			'options' => array(
				'admin' => 'admin',
				'authorship' => 'authorship',
				'user' => 'user'
			)
		),
		'desc' => array(
			'title' => '角色描述',
			'type' => 'textarea',
		),
	),

);