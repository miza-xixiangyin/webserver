<?php

class ConMedia extends Eloquent {

	protected $table = 'con_medias';

	public static $rules = array
	(
	);

	public function page()
	{
		return $this->belongsTo('ConPage');
	}

	public function getPageInfoAttribute()
	{
		return isset($this->page->title) ? $this->page->title : '';
	}

	public function getImageShowAttribute()
	{
		return '<img src="/uploads/page/w-120/'.$this->source.'" height="120" />';
	}
}