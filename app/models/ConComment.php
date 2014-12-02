<?php

class ConComment extends Eloquent {

	protected $table = 'con_comments';

	public static $rules = array
	(
	);

	public function author()
	{
		return $this->belongsTo('FrontUser', 'user_id');
	}

	public function page()
	{
		return $this->belongsTo('ConPage');
	}

	public function replay()
	{
		return $this->belongsTo('ConPage');
	}

	public function getPageInfoAttribute()
	{
		return isset($this->page->title) ? $this->page->title : '';
	}

	public function getAuthorInfoAttribute()
	{
		return isset($this->author->email) ? $this->author->email : '';
	}

	public function getReplayInfoAttribute()
	{
		return isset($this->replay->email) ? $this->replay->email : '';
	}
}