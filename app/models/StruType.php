<?php

class StruType extends Eloquent {

	protected $table = 'stru_types';

	public static $rules = array
	(
		'name' => 'required|unique:stru_types',
		'desc' => 'required',
		'need_pic' => 'required',
		'need_text' => 'required',
		'need_text_extral_1' => 'required',
		'need_text_extral_2' => 'required',
		'need_link' => 'required',
	);

	public function cloumns()
	{
		return $this->hasMany('StruColumn');
	}

	public function getPicConfAttribute()
	{
		if ($this->need_pic) {
			return $this->pic_width . ' × ' . $this->pic_height;
		}
		return 0;
	}

	public static function makeEditConf($type_id)
	{
		$conf = StruType::find($type_id);
		
		$edit_conf = array(
			'title' => $conf->name,
			'single' => '内容',
			'model' => 'StruColumn',
			'rules' => array(),
			'columns' => array(
				'id',
			),
			'filters' => array(
				'id'
			),
			'edit_fields' => array(
				'type_id' => array(
					'value' => $type_id,
					'editable' => false,
					'visible' => false
				)
			),
			'action_permissions' => array(
				'delete' => false,
				'create' => false
			),
			'sort' => array(
				'field' => 'id',
				'direction' => 'asc',
			)
		);

		if ($conf->need_order)
		{
			$edit_conf['columns']['order'] = array(
				'title' => '排序'
			);
			$edit_conf['edit_fields']['order'] = array(
				'title' => '排序',
				'type' => 'number'
			);
			$edit_conf['sort']['field'] = 'order';
		}

		if ($conf->need_name)
		{
			$edit_conf['rules']['name'] =  'required';
			$edit_conf['columns']['name'] = array(
				'title' => '名称'
			);
			$edit_conf['filters']['name'] = array(
				'title' => '名称'
			);
			$edit_conf['edit_fields']['name'] = array(
				'title' => '名称',
				'type' => 'text'
			);
		}

		if ($conf->need_pic)
		{
			$edit_conf['rules']['pic'] = 'required';
			$edit_conf['columns']['pic'] = array(
				'title' => '图片',
				'output' => '<img src="/uploads/columns/o/(:value)" height="100" />'
			);
			$edit_conf['columns']['pic_conf'] = array(
				'title' => '图片尺寸'
			);

			// pic resize
			$size 		= array();
			$size_limit = '';
			// $column_id 	= Request::segment(3);
			// $column_conf= '';
			// if ($column_id) {
			// 	$column_conf = StruColumn::find($column_id);
			// }
			// if ($column_conf && ($column_conf->pic_height || $column_conf->pic_width)) {
			// 	$size = array($column_conf->pic_width, $column_conf->pic_height, 'crop', public_path() . '/uploads/columns/product/', 100);
			// 	$size_limit = $column_conf->pic_width . ' × ' . $column_conf->pic_height;
			// } else if ($conf->pic_height || $conf->pic_width) {
			// 	$size = array($conf->pic_width, $conf->pic_height, 'crop', public_path() . '/uploads/columns/product/', 100);
			// 	$size_limit = $conf->pic_width . ' × ' . $conf->pic_height;
			// }

			$edit_conf['edit_fields']['pic'] = array(
				'title' => '图片',
				'type' => 'image',
				'location' => public_path() . '/uploads/columns/o/',
				'naming' => 'random',
				'length' => 20,
				'size_limit' => 2,
				// 'sizes' => array($size)
				// 'sizes' => array(
					// cut with width=320, the height will auto scall
					// array(980, 466, 'crop', public_path() . '/uploads/columns/product/', 100),
					// array(120, 120, 'crop', public_path() . '/uploads/columns/w-120/', 100),
				// )
			 );
		}

		if ($conf->need_link)
		{
			$edit_conf['rules']['link'] = 'required';
			$edit_conf['columns']['link'] = array(
				'title' => '连接'
			);

			$edit_conf['edit_fields']['link'] = array(
				'title' => '连接',
				'type' => 'text'
			);
		}

		if ($conf->need_text)
		{
			$edit_conf['rules']['text'] = 'required';
			$edit_conf['columns']['text'] = array(
				'title' => '标题'
			);

			$edit_conf['filters']['text'] = array(
				'title' => '标题'
			);

			$edit_conf['edit_fields']['text'] = array(
				'title' => '标题',
				'type' => 'text'
			);
		}

		if ($conf->need_text_extral_1)
		{
			$edit_conf['rules']['text_extral_1'] = 'required';
			$edit_conf['columns']['text_extral_1'] = array(
				'title' => '副标题-1'
			);

			$edit_conf['filters']['text_extral_1'] = array(
				'title' => '副标题-1'
			);

			$edit_conf['edit_fields']['text_extral_1'] = array(
				'title' => '副标题-1',
				'type' => 'text'
			);
		}

		if ($conf->need_text_extral_2)
		{
			$edit_conf['rules']['text_extral_2'] = 'required';
			$edit_conf['columns']['text_extral_2'] = array(
				'title' => '副标题-2'
			);

			$edit_conf['filters']['text_extral_2'] = array(
				'title' => '副标题-2'
			);

			$edit_conf['edit_fields']['text_extral_2'] = array(
				'title' => '副标题-2',
				'type' => 'text'
			);
		}
		return $edit_conf;
	}
}