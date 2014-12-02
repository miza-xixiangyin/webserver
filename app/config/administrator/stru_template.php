<?php

return array(

	'title' => '模板',

	'single' => '模板',

	'model' => 'StruTemplate',

	'form_width' => 1000,

	'permission'=> function()
	{
		return Auth::user()->hasRole('root');
	},

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'title',
		'pic' => array(
			'output' => '<img src="/uploads/template/w-120/(:value)" height="120" />'
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'title',
		'desc'
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'pic' => array(
			'title' => '图片',
			'type' => 'image',
			'location' => public_path() . '/uploads/template/o/',
			'naming' => 'random',
			'length' => 20,
			'size_limit' => 2,
			'sizes' => array(
				// cut with width=320, the height will auto scall
				array(120, 120, 'crop', public_path() . '/uploads/template/w-120/', 100),
			)
		),
		'title' => array(
			'type' => 'text',
		),
		'desc' => array(
			'type' => 'text',
		),
	),

);