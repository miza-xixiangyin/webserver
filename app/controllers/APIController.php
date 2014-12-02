<?php

class APIController extends BaseController {

	public function pageMark()
	{
		$page_id = Input::get('page');
		$type = Input::get('type');
		$page_info = ConPage::find($page_id);
		$new_count = 0;

		if (!$page_info)
		{
			return Response::json(array('status' => 404, 'msg' => 'page not found'));
		}

		if ($type == 'mark')
		{
			// saving new mark
			$page_info->marks()->sync(array(Auth::user()->id));
			$new_count = $page_info->marks()->count();
		} else if ($type == 'like')
		{
			// saving new like
			$page_info->likes()->sync(array(Auth::user()->id));
			$new_count = $page_info->likes()->count();
		} else
		{
			return Response::json(array('status' => 404, 'msg' => 'page not found'));
		}

		// return latest users number
		$respone = array('status' => 200, 'msg' => 'OK');
		$respone[$type] = $new_count;
		return Response::json($respone);
	}

	public function userPost()
	{
		$content = Input::get('content', '');
		$msg = '';
		if ($content == '')
		{
			$msg = '内容不能为空,点击添加';
		}
		else
		{
			$post = new UserPost;
			$post->user_id = Auth::user()->id;
			$post->content = $content;
			$post->save();
			$msg = '添加成功，点击继续添加';
		}

		echo '<p class="love_respone">'.$msg.'</p>';
	}

	public function userTalk()
	{
		$line_content = Input::get('content');
		$talk = new UserTalk();
		$talk->user_id = Auth::user()->id;
		$talk->content = $line_content;
		$talk->save();

		return Response::json(array('status' => 200, 'msg' => 'OK', 'talk' => $line_content));
	}

	// update user basic info
	public function userInfo()
	{
		$user = Auth::user();
		$user->nick = Input::get('nick', '');
		$user->gender = intval(Input::get('gender', 0));
		$user->phone = Input::get('phone', '');
		$user->save();
		echo '更新成功';
	}

	// update user pwd
	public function userPwd()
	{
		$old_pwd = trim(Input::get('o_pwd', ''));
		$new_pwd = trim(Input::get('n_pwd', ''));
		$rep_pwd = trim(Input::get('n_pwd_r', ''));

		if (!$old_pwd)
		{
			echo '密码不正确';
			return;
		}

		if (strlen($new_pwd) < 6 || strlen($rep_pwd) < 6)
		{
			echo '新密码不能小于6个字符';
			return;
		}

		if ($new_pwd != $rep_pwd)
		{
			echo '两次密码不一致';
			return;
		}

		$user = Auth::user();
		if (!Hash::check($old_pwd, $user->password))
		{
			echo '密码不正确';
			return;
		}

		// update passowd
		$user->password = Hash::make($new_pwd);
		$user->save();
		echo '密码更新成功';
	}

	//remove follow
	public function userFollow()
	{
		$user_id = Input::get('user_id', 0);
		$type = Input::get('type', 'remove');
		$curr_follows = UserFollow::where('user_id', '=', $user_id)->where('follower_id', '=', Auth::user()->id);

		if ($type == 'remove')
		{
			if ($curr_follows->count() > 0)
			{
				$curr_follows->delete();
			}
		} else {
			if ($curr_follows->count() == 0)
			{
				$new_follow = new UserFollow;
				$new_follow->user_id = $user_id;
				$new_follow->follower_id = Auth::user()->id;
				$new_follow->save();
			}
		}

		return Response::json(array('status' => 200, 'msg' => 'OK', 'type' => $type));
	}

	// upload user image
	public function userImage()
	{
		$file = Input::file('image');
		$input = array('image' => $file);
		$rules = array(
			'image' => 'image'
		);
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{
			echo '不是图片';
			return;
		}

		// size
		$max_size = 2000 * 1024;
		if ($file->getClientSize() > $max_size)
		{
			echo '图片大于2M';
			return;
		}

		// upload to server
		$path = public_path() . '/uploads/user';
		$file_name = md5(time() . rand(9999,999999)) . '.' . $file->getClientOriginalExtension();
		Image::make($file)->save($path . '/o/' . $file_name);

		// resize image
		Image::make($path . '/o/' . $file_name)->fit(120)->save($path . '/w-120/' . $file_name);
		Image::make($path . '/o/' . $file_name)->fit(50)->save($path . '/w-50/' . $file_name);

		// update user image in db
		$user = FrontUser::find(Auth::user()->id);
		$user->image = $file_name;
		$user->save();

		echo '<image src="/uploads/user/w-120/' . $file_name . '" />';
	}

	public function authBox()
	{
		$redirect = Input::get('redirect', URL::route('index'));
		return View::make('api.auth_box', array(
			// 'type' => Input::get('type', 'login'),
			'type' => 'login',
			'redirect' => $redirect));
	}

	public function authCheck()
	{
		$type 	= trim(Input::get('type'));
		$res 	= array('status' => 401, 'msg' => '');
		$data 	= array(
			'email' 	=> trim(Input::get('uname')),
			'password' 	=> trim(Input::get('pwd')),
			'from'		=> 'internal'
		);

		if ($type == 'login')
		{
			if (Auth::attempt($data, true))
			{
				$res['status'] = 200;
				$res['msg'] = 'OK';
			}
			else
			{
				$res['msg'] = '用户名跟密码不正确';
			}
		}
		else {
			$rules = array(
				"email" 	=> "required|email|unique:users",
				"password"	=> "required|min:6|same:cpassword",
				"cpassword" => "required|min:6"
			);

			$data['cpassword'] = trim(Input::get('pwd_r'));
			$validator = Validator::make($data, $rules);

			if ($validator->passes()) {
				$user = new User;
				$user->email = $data['email'];
				$user->login_id = md5($user->email);
				$user->password = Hash::make($data['password']);
				$user->save();

				Auth::attempt(array('email' => $data['email'], 'password' => $data['password']), true);
				$res['status'] = 200;
				$res['msg'] = 'OK';
			}
			else
			{
				$messages = $validator->messages();
				if ($messages->has('email'))
				{
					$res['msg'] = '邮箱不能为空或者已经存在';
				} else if ($messages->has('password')) {
					$res['msg'] = '密码不能为空或两次密码不一致';
				}
			}
		}

		return Response::json($res);
	}

	public function userMsg()
	{
		$res = array('status' => '200', 'msg' => 'OK');
		$uid = Input::get('user', 0);
		$content = Input::get('content', '');

		if (!$content || !FrontUser::find($uid))
		{
			$res['status'] = 500;
			$res['msg'] = '信息不完整';
			return Response::json($res);
		}

		$msg = new UserMessage;
		$msg->receiver_id = $uid;
		$msg->sender_id = Auth::user()->id;
		$msg->content = $content;
		$msg->save();

		return Response::json($res);
	}

	public function versePost()
	{
		$verse 		= trim(Input::get('verse'));
		$content 	= trim(Input::get('content'));
		$phone 		= trim(Input::get('phone'));
		$email 		= trim(Input::get('email'));
		$type 		= trim(Input::get('send_type'));
		$send_to 	= '';
		$res 		= array('status' => 500, 'msg' => array());

		if (!file_exists(public_path() . $verse))
		{
			$res['msg'][] = '* 诗歌不存在';
		}

		if ($content == '')
		{
			$res['msg'][] = '* 留言不能为空';
		}

		if ($type == 'email')
		{
			if (!$email)
			{
				$res['msg'][] = '* 请填写者电子邮箱';
			} else if (!preg_match("/^(?:[a-z\d]+[_\-\+\.]?)*[a-z\d]+@(?:([a-z\d]+\-?)*[a-z\d]+\.)+([a-z]{2,})+$/i", $email))
			{
				$res['msg'][] = '* 邮箱格式不正确';
			}
		} else {
			if (!$phone)
			{
				$res['msg'][] = '* 请填写手机号码';
			} else if (!preg_match("/(^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$)|(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/", $phone))
			{
				$res['msg'][] = '* 手机号格式不正确';
			}
		}

		if (count($res['msg']) > 0)
		{
			return Response::json($res);
		}

		if ($type == 'email')
		{
			$send_to = $email;
			$content = str_replace("\n", '<br />', $content);
			Mail::send('mail.verse', array('verse' => $verse, 'content' => $content), function ($message) use ($email){
				$message->to($email)->subject('你的朋友从西厢印给你发来一首诗');
			});
		} else {
			$send_to = $phone;
		}

		$log = new UserSending;
		$log->user_id = Auth::user()->id;
		$log->send_type = $type;
		$log->send_to = $send_to;
		$log->msg = $content;
		$log->content = $verse;
		$log->save();

		$res['status'] = 200;
		$res['msg'] = '发送成功';
		return Response::json($res);
	}
}