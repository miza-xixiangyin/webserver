<?php

return array(

	'title' => '评论',

	'single' => '评论',

	'model' => 'ConComment',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'page_id',
		'page_info',
		'author_info',
		'replay_info',
		'content',
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
		'author' => array(
			'type' => 'relationship',
			'name_field' => 'email',
		),
		'replay' => array(
			'type' => 'relationship',
			'name_field' => 'email',
		),
		'content'
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'page' => array(
			'type' => 'relationship',
			'name_field' => 'title',
		),
		'author' => array(
			'type' => 'relationship',
			'name_field' => 'email',
		),
		'replay' => array(
			'type' => 'relationship',
			'name_field' => 'email',
		),
		'content' => array(
			'type' => 'textarea',
		),
	),

);