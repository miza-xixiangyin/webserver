<?php

return array(

	'title' => '文章图片',

	'single' => '图片',

	'model' => 'ConMedia',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'page_id',
		'page_info',
		'image_show',
		'source' => array(
			'output' => '/uploads/page/o/(:value)'
		),
		'text',
		'link',
		'created_at',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'page' => array(
			'type' => 'relationship',
			'name_field' => 'title',
		),
		'text',
		'link'
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'page' => array(
			'type' => 'relationship',
			'name_field' => 'title',
		),
		'text' => array(
			'type' => 'text',
		),
		'link' => array(
			'type' => 'text',
		),
		'source' => array(
			'type' => 'image',
			'location' => public_path() . '/uploads/page/o/',
			'naming' => 'random',
			'length' => 20,
			'size_limit' => 2,
			'sizes' => array(
				// cut with width=320, the height will auto scall
				// array(320, 0, 'auto', public_path() . '/uploads/page/p/', 100),
				array(120, 120, 'crop', public_path() . '/uploads/page/w-120/', 100),
			)
		)
	),

	'query_filter' => function($query)
	{
		$query->whereCategory('page');
	},
);