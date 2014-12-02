<?php

class UserController extends BaseController {
	public function __construct() {
		// $this->beforeFilter('csrf', array("on" => "post"));
	}

	public function qqLogin()
	{
		return View::make('user.qq_login');
	}

	public static function makeUserData($section, $uid = '')
	{
		$is_owner = false;
		if ($uid == '')
		{
			$uid = Auth::user()->id;
			$is_owner = true;
		}

		$data = array('is_owner' => $is_owner, 'user' => FrontUser::find($uid), 'section' => $section);
		return array('data' => $data);
	}

	public function userIndex($uid = '')
	{
		$data = self::makeUserData('timeline', $uid);
		if (!$data['data']['is_owner'])
		{
			if ($data['data']['user']->hasRoleType('authorship'))
			{
				$data['data']['section'] = 'column';
			} else {
				$data['data']['section'] = 'follows';
			}
		}

		return View::make('user.index', $data);
	}

	public function userMsg()
	{
		$data = self::makeUserData('message');
		return View::make('user.index', $data);
	}

	public function userMsgList($uid)
	{
		$receiver_info = FrontUser::find($uid);
		$data = self::makeUserData('message_content');
		if (!$receiver_info)
		{
			return Redirect::route('u_index');
		}

		// check if post new message
		if (Request::isMethod('post'))
		{
			$msg_content = trim(Input::get('message'));
			if (!$msg_content)
			{
				return Redirect::route('message', array('uid' => $uid))->with('msg', '纸条内容不能为空');
			}

			$msg = new UserMessage;
			$msg->receiver_id = $uid;
			$msg->sender_id = $data['data']['user']->id;
			$msg->content = $msg_content;
			$msg->save();
			return Redirect::route('u_msg_list', array('uid' => $uid))->with('msg', '传送成功');
		}

		// update status of msg which send to owner to readed
		$data['data']['user']->markReadMsg($receiver_info);
		$data['data']['receiver'] = $receiver_info;
		return View::make('user.index', $data);
	}

	public function userFollows($uid = '')
	{
		$data = self::makeUserData('follows', $uid);
		return View::make('user.index', $data);
	}

	public function userMark()
	{
		$data = self::makeUserData('mark');
		return View::make('user.index', $data);
	}

	public function userSetting()
	{
		$user_info = FrontUser::find(Auth::user()->id);
		return View::make('user.setting', array('user' => $user_info, 'is_owner' => true));
	}

	public function forgetPwd()
	{
		if (Auth::check())
		{
			return Redirect::route('index');
		}

		return View::make('user.forget_pwd');
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::route("index");
	}

	public function thirdLogin($platform)
	{
		if (Request::isMethod('post'))
		{
			switch ($platform) {
				case 'qq':
					$open_id = Input::get('openId', '');
					$token = Input::get('accessToken', '');

					if (!$open_id || !$token)
					{
						return Response::json(array('status' => 500, 'msg' => 'error'));
					}

					// check user account
					$content = '';
					$url = 'https://graph.qq.com/user/get_user_info?access_token=' . $token . '&oauth_consumer_key=101152239' . '&openid=' . $open_id . '&format=json';

					try {
						$content = file_get_contents($url);
						$content = json_decode($content, true);
					} catch (Exception $e) {
						return Response::json(array('status' => 500, 'msg' => 'error'));
					}

					if (!$content || !isset($content['ret']) || $content['ret'] != 0)
					{
						return Response::json(array('status' => 500, 'msg' => 'error'));
					}

					// check user exist or not
					$user = User::where('open_id', '=', $open_id)
								->where('from', '=', 'qq')
								->first();

					if (!$user)
					{
						$user = new User;
						$user->from = 'qq';
						$user->login_id = md5('qq-' . $open_id);
						$user->open_id = $open_id;
						$user->password = Hash::make('1111');
					}

					// udpate or generate new user account
					$gender = 0;
					if ($content['gender'] == '男')
					{
						$gender = 1;
					} else if ($content['gender'] == '女') {
						$gender = 2;
					}
					$user->nick = $content['nickname'];
					$user->image = $content['figureurl_qq_2'];
					$user->gender = $gender;
					$user->save();

					// login
					Auth::login($user);
					break;
				case 'weibo':
					$open_id = Input::get('openId', '');
					$token = Input::get('access_token', '');

					if (!$open_id || !$token)
					{
						return Response::json(array('status' => 500, 'msg' => 'error'));
					}

					// check from weibo
					$content = '';
					$url = 'https://api.weibo.com/2/users/show.json?uid=' . $open_id . '&access_token=' . $token;

					try
					{
						$content = file_get_contents($url);
						$content = json_decode($content, true);
					} catch (Exception $e) {
						return Response::json(array('status' => 500, 'msg' => 'error'));
					}

					if (!$content || !isset($content['id']))
					{
						return Response::json(array('status' => 500, 'msg' => 'error'));
					}

					// check user exist or not
					$user = User::where('open_id', '=', $open_id)
								->where('from', '=', 'weibo')
								->first();

					if (!$user)
					{
						$user = new User;
						$user->from = 'weibo';
						$user->login_id = md5('weibo-' . $open_id);
						$user->open_id = $open_id;
						$user->password = Hash::make('1111');
					}

					$gender = 0;
					if ($content['gender'] == 'm')
					{
						$gender = 1;
					} else if ($content['gender'] == 'f') {
						$gender = 2;
					}
					$user->nick = $content['screen_name'];
					$user->image = $content['avatar_large'];
					$user->gender = $gender;
					$user->save();

					// login
					Auth::login($user);
					break;
				default:
					# code...
					break;
			}
			return Response::json(array('status' => 200, 'msg' => 'OK'));
		}
		return View::make('user.login_' . $platform);
	}
}
