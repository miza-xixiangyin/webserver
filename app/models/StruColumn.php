<?php

class StruColumn extends Eloquent {

	protected $table = 'stru_columns';

	public static $rules = array
	(
		// 'name' => 'required|unique:stru_columns',
		// 'desc' => 'required',
		// 'need_pic' => 'required',
		// 'need_title' => 'required',
		// 'need_link' => 'required',
	);

	public function type()
	{
		return $this->belongsTo('StruType');
	}

	public function getPicConfAttribute()
	{
		if ($this->pic_width || $this->pic_width) {
			return $this->pic_width . ' × ' . $this->pic_height;
		} else {
			return $this->type->pic_width . ' × ' . $this->type->pic_height;
		}
	}

	public function getPicTemplateAttribute()
	{
		return $this->pic ? '<img src="/uploads/columns/o/'.$this->pic.'" width="100" />' : '-/-';
	}
}