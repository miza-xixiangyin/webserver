<?php
$profile_url = URL::route('u_index', array('uid' => $user->id));
$is_authorship = $user->hasRoleType('authorship');
?>
<div class="user_header"></div>
<div class="user_profile">
	<div class="user_image_wrap">
		<div class="user_image">
			<div class="preview">
				<img src="{{ $user->user_image() }}">
			</div>
			@if($is_owner)
			<span class="update_image">更改头像</span>
			<form name="photo" class="user_image_form" enctype="multipart/form-data" action="{{ URL::route('api_user_image') }}" method="post">
				<input type="file" name="image" class="image_file">
			</form>
			@endif
		</div>
	</div>
	<h4 class="user_nick">{{ $user->nick }}</h4>
	<div class="user_line">
		<p class="user_line_con">
			<span class="user_line_text">{{ $user->curr_talk() }}</span>
			@if($is_owner)
			<span class="user_line_tool line_update"></span>
			@endif
		</p>
	</div>
	@if(!$is_owner)
	<div class="user_social">
		<div class="wrap">
			@if($is_authorship)
				@if($user->isFollowedByOwner())
				<div class="follow done" data-id="{{ $user->id }}"><span class="icon">√</span>取消关注</div>
				@else
				<div class="follow" data-id="{{ $user->id }}"><span class="icon">+</span>关注</div>
				@endif
			@endif
			<div class="send_msg user_toggle_msg_box" data-id="{{ $user->id }}">
				传纸条
			</div>
		</div>
	</div>
	<div class="user_msg_box" style="display: none;">
		<textarea placeholder="纸条内容"></textarea>
		<div class="msg_tools">
			<button class="btn submit">提交</button>
			<button class="btn cancel user_toggle_msg_box">取消</button>
			<p class="msg"></p>
		</div>
	</div>
	@endif
	<div class="user_menu">
		<ul class="um_list">
			@if($is_owner)
			<li class="um_item {{ $section == 'timeline' ? 'um_active' : '' }}">
				<a class="um_link um_timeline" href="{{ URL::route('u_index', array('uid' => $user->id)) }}">动态</a>
			</li>
			@endif
			@if($is_authorship)
			<li class="um_item {{ $section == 'column' ? 'um_active' : '' }}">
				<a class="um_link um_column" href="{{ URL::route('u_column', array('uid' => $user->id)) }}">查看专栏</a>
			</li>
			@endif
			@if($is_owner)
			<li class="um_item {{ ($section == 'message' || $section == 'message_content') ? 'um_active' : '' }}">
				<a class="um_link um_send" href="{{ URL::route('u_msg') }}">传纸条</a>
			</li>
			@endif
			<li class="um_item {{ $section == 'follows' ? 'um_active' : '' }}">
				<a class="um_link um_follow" href="{{ URL::route('u_follows', array('uid' => $user->id)) }}">关注</a>
			</li>
			@if($is_owner)
			<li class="um_item {{ $section == 'mark' ? 'um_active' : '' }}">
				<a class="um_link um_like" href="{{ URL::route('u_mark') }}">收藏</a>
			</li>
			@endif
		</ul>
	</div>
</div>