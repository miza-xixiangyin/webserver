<?php

class FrontUser extends Eloquent {

	protected $table = 'users';

	public static $rules = array
	(
		'email' => 'required|unique:users',
	);

	public function roles()
	{
		return $this->belongsToMany('FrontRole', 'user_role', 'role_id', 'user_id');
	}

	public function hasRoleType($role_type)
	{
		return in_array($role_type, array_fetch($this->roles->toArray(), 'role_type'));
	}

	public function markPages()
	{
		return $this->belongsToMany('ConPage', 'user_mark', 'user_id', 'page_id');
	}

	public function index_page($column = '')
	{
		$page = ConPage::where('author_id', $this->id);
		$page = $column ? $page->where('column_id', $column) : $page;
		$page = $page->orderBy('weight', 'DESC')->first();

		return $page;
	}

	public function pages()
	{
		return $this->hasMany('ConPage', 'author_id');
	}

	public function talks()
	{
		return $this->hasMany('UserTalk', 'user_id')->orderBy('id', 'DESC');
	}

	// list users that you follow
	public function follows()
	{
		return $this->hasMany('UserFollow', 'follower_id')->orderBy('id', 'DESC');
	}

	// list users that follow you
	public function followers()
	{
		return $this->belongsToMany('FrontUser', 'user_follows', 'user_id', 'follower_id');
	}

	// check user wheather you follow or not
	public function isFollowedByOwner()
	{
		if (!Auth::check())
		{
			return null;
		}

		$follow = UserFollow::where('user_id', '=', $this->id)
					->where('follower_id', '=', Auth::user()->id)
					->first();

		return $follow;
	}

	public function sendings()
	{
		return $this->hasMany('UserSending', 'user_id')->orderBy('id', 'DESC');
	}

	public function messages()
	{
		$msgs_groups = array();
		$msgs = DB::table('user_msg')
					->where('receiver_id', '=', $this->id)
					->orWhere('sender_id', '=', $this->id)
					->orderBy('id', 'DESC')->get();

		foreach ($msgs as $msg)
		{
			$uid = $msg->receiver_id;
			$type = 'sender';

			if ($msg->receiver_id == $this->id)
			{
				$uid = $msg->sender_id;
				$type = 'receiver';
			}

			if (!isset($msgs_groups[$uid]))
			{
				$msgs_groups[$uid] = array(
					'type' => $type,
					'unread' => 0,
					'user_info' => FrontUser::find($uid),
					'items' => array()
				);
			}

			// mark unread msg
			if ($msg->status == 0 && $msg->receiver_id == $this->id)
			{
				$msgs_groups[$uid]['unread'] += 1;
			}

			$msgs_groups[$uid]['items'][] = $msg;
		}

		return $msgs_groups;
	}

	public function userMessages($receiver)
	{
		$receiver_id = $receiver->id;
		$msgs = DB::table('user_msg')
					->where(function($query) use ($receiver_id)
					{
						$query->where('receiver_id', '=', $this->id)
							  ->where('sender_id', '=', $receiver_id);
					})
					->orWhere(function($query) use ($receiver_id)
					{
						$query->where('sender_id', '=', $this->id)
							  ->where('receiver_id', '=', $receiver_id);
					})
					->orderBy('id', 'DESC')
					->get();

		return $msgs;
	}

	public function markReadMsg($receiver)
	{
		UserMessage::where('receiver_id', '=', $this->id)
						->where('sender_id', '=', $receiver->id)
						->update(array('status' => 1));
	}

	// get all page that you follows
	public function follow_pages()
	{
		$follows = $this->follows()->get();
		$follows_ids = array();

		if ($follows->count() == 0)
		{
			return array();
		}

		foreach ($follows as $follow)
		{
			$follows_ids[] = $follow->user_id;
		}

		return ConPage::whereIn('author_id', $follows_ids)->get();
	}

	public function curr_talk()
	{
		$talk = $this->talks->first();
		return $talk ? $talk->content : '';
	}

	public function is_owner()
	{
		return (Auth::check() && Auth::user()->id == $this->id);
	}

	public function user_image()
	{
		$image = $this->image;
		$path = '/uploads/user/w-120/';
		$image_parse = parse_url($image);

		if (parse_url($image, PHP_URL_SCHEME))
		{
			return $image;
		}

		if ($image && file_exists(public_path() . $path . $image))
		{
			return $path . $image;
		}

		return '/images/default_cover.png';
	}

	public function user_nick()
	{
		$nick = $this->nick;
		return $nick ? $nick : $this->email;
	}

	public function getRolesListAttribute()
	{
		$roles = array();

		foreach ($this->roles as $role) {
			$roles[] = $role->desc;
		}
		return implode(',', $roles);
	}

	public function ok()
	{
		return true;
	}
}