<?php

return array(

	'title' => '页面管理',

	'single' => '页面',

	'model' => 'ConPage',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'column_name',
		'author_id',
		'author_name',
		'title',
		'weight',
		'comments_info',
		'photos_info',
		'created_at',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'title',
		'column' => array(
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'author' => array(
			'type' => 'relationship',
			'name_field' => 'nick',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'title' => array(
			'type' => 'text',
		),
		'column' => array(
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'author' => array(
			'type' => 'relationship',
			'name_field' => 'nick',
		),
		'weight' => array(
			'type' => 'number'
		)
	),

);