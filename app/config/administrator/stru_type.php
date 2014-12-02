<?php

return array(

	'title' => '版块结构类别',

	'single' => '类别',

	'model' => 'StruType',

	'permission'=> function()
	{
		return Auth::user()->hasRole('root');
	},

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'tag_name',
		'name',
		'allow_num' => array('title' => 'num'),
		'need_order' => array('title' => 'order'),
		'need_name' => array('title' => 'name'),
		'pic_conf' => array('title' => 'pic(W × H)'),
		'need_text' => array('title' => 'text 1'),
		'need_text_extral_1' => array('title' => 'text 2'),
		'need_text_extral_2' => array('title' => 'text 3'),
		'need_link' => array('title' => 'link'),
		'created_at' => array('title' => 'created'),
		'updated_at' => array('title' => 'updated'),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'tag_name',
		'name',
		'desc'
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'tag_name' => array(
			'type' => 'text',
		),
		'name' => array(
			'type' => 'text',
		),
		'need_order' => array(
			'type' => 'bool',
		),
		'need_name' => array(
			'type' => 'bool',
		),
		'need_text' => array(
			'type' => 'bool',
		),
		'need_text_extral_1' => array(
			'type' => 'bool',
		),
		'need_text_extral_2' => array(
			'type' => 'bool',
		),
		'need_link' => array(
			'type' => 'bool',
		),
		'need_pic' => array(
			'type' => 'bool',
		),
		'pic_width' => array(
			'type' => 'number',
		),
		'pic_height' => array(
			'type' => 'number',
		),
		'allow_num' => array(
			'type' => 'number'
		),
		'desc' => array(
			'type' => 'textarea',
		),
	),

);