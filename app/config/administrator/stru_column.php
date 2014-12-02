<?php

return array(

	'title' => '版块列表',

	'single' => '版块',

	'model' => 'StruColumn',

	'permission'=> function()
	{
		return Auth::user()->hasRole('root');
	},

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'order',
		'type_id',
		'type_name' => array(
			'title' => '类别',
			'relationship' => 'type',
			'select' => "(:table).name",
		),
		'name',
		'text',
		'text_extral_1' => array('title' => 'text 2'),
		'text_extral_2' => array('title' => 'text 3'),
		'pic_template',
		'pic_conf',
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
		'type' => array(
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'name',
		'text',
		'link',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'type' => array(
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'name' => array(
			'type' => 'text',
		),
		'text' => array(
			'type' => 'text',
		),
		'link' => array(
			'type' => 'text',
		),
		'order' => array(
			'type' => 'number',
		),
		'text_extral_1' => array(
			'type' => 'text',
		),
		'text_extral_2' => array(
			'type' => 'text',
		),
		
		'pic' => array(
			'title' => '图片',
			'type' => 'image',
			'location' => public_path() . '/uploads/columns/o/',
			'naming' => 'random',
			'length' => 20,
			'size_limit' => 2,
			'sizes' => array(
				// cut with width=320, the height will auto scall
				// array(320, 0, 'auto', public_path() . '/uploads/columns/product/', 100),
				// array(120, 120, 'crop', public_path() . '/uploads/columns/w-120/', 100),
			)
		),
		'pic_width' => array(
			'type' => 'number',
		),
		'pic_height' => array(
			'type' => 'number',
		),
	),

	'sort' => array(
		'field' => 'type_id',
		'direction' => 'asc',
	),

	// 'query_filter'=> function($query)
	// {
	// 	 $query->whereTypeId('2');
	// }
);