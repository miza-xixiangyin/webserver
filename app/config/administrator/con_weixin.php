<?php

return array(

	'title' => '微信内容管理',

	'single' => '微信',

	'model' => 'ConWeixin',

	'form_width' => 427,

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'pic' => array(
			'title' => '图片',
			'output' => '<img src="/uploads/weixin/w-120/(:value)" height="120" />'
		),
		'title' => array(
			'title' => '标题',
		),
		'created_at',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'title' => array(
			'title' => '标题',
		),
		'content' => array(
			'title' => '内容'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'pic' => array(
			'title' => '图片',
			'type' => 'image',
			'location' => public_path() . '/uploads/weixin/o/',
			'naming' => 'random',
			'length' => 20,
			'size_limit' => 2,
			'sizes' => array(
				// cut with width=320, the height will auto scall
				array(320, 0, 'auto', public_path() . '/uploads/weixin/p/', 100),
				array(120, 120, 'crop', public_path() . '/uploads/weixin/w-120/', 100),
			)
		),
		'title' => array(
			'title' => '标题',
			'type' => 'text',
		),
		'content' => array(
			'title' => '标题',
			'type' => 'wysiwyg',
		),
	),

);