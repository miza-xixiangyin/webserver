<?php

return array(

	'title' => '文章分类',

	'single' => '类别',

	'model' => 'ConColumn',

	'permission'=> function()
	{
		return Auth::user()->hasRole('root');
	},

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name',
		'desc',
		'created_at',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name',
		'desc',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'type' => 'text',
		),
		'desc' => array(
			'type' => 'textarea',
		),
	),
);