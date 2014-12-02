<?php

class ConPage extends Eloquent {

	protected $table = 'con_pages';

	public static $rules = array
	(
	);

	public function column()
	{
		return $this->belongsTo('ConColumn');
	}

	public function author()
	{
		return $this->belongsTo('FrontUser');
	}

	public function photos()
	{
		return $this->hasMany('ConMedia', 'page_id');
	}

	public function comments()
	{
		return $this->hasMany('ConComment', 'page_id')->orderBy('id', 'DESC');
	}

	public function marks()
	{
		return $this->belongsToMany('FrontUser', 'user_mark', 'page_id', 'user_id');
	}

	public function likes()
	{
		return $this->belongsToMany('FrontUser', 'user_like', 'page_id', 'user_id');
	}

	public function hasMarked()
	{
		if (!Auth::check())
		{
			return 0;
		}

		$mark = DB::table('user_mark')
					->where('page_id', '=', $this->id)
					->where('user_id', '=', Auth::user()->id)
					->count();

		return $mark;
	}

	public function hasLiked()
	{
		if (!Auth::check())
		{
			return 0;
		}

		$mark = DB::table('user_like')
					->where('page_id', '=', $this->id)
					->where('user_id', '=', Auth::user()->id)
					->count();

		return $mark;
	}

	public function date()
	{
		return $this->created_at;
	}

	public function getAuthorNameAttribute()
	{
		return $this->author->nick;
	}

	public function getColumnNameAttribute()
	{
		return $this->column->name;
	}

	public function getCommentsInfoAttribute()
	{
		return count($this->comments);
	}

	public function getPhotosInfoAttribute()
	{
		return count($this->photos);
	}
}