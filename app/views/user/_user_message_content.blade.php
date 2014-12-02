<?php
	$msgs = $user->userMessages($receiver);
	$owner_url = URL::route('u_index', array('uid' => $user->id));
	$owner_image = $user->user_image();

	$receiver_url = URL::route('u_index', array('uid' => $receiver->id));
	$receiver_image = $receiver->user_image();
?>
<div class="user_message">
	<h4 class="title">与 <a href="{{ $receiver_url }}">{{ $receiver->nick }}</a> 的纸条</h4>
	<form action="" method="post" class="user_msg_form">
		<textarea name="message" class="msg_box" placeholder="写纸条"></textarea>
		<button class="ut_send" type="submit">送纸条</button>
		<p class="msg">
			{{ Session::get('msg') }}
		</p>
	</form>
</div>
<div class="user_timeline user_send user_send_content">
	<ul class="ut_list">
		@foreach($msgs as $msg)
		<li class="ut_item">
			<div class="ut_block">
				<span class="ut_date">{{ $msg->created_at }}</span>
				<div class="ut_content">
					<p>
						{{ str_replace("\n", '<br />', $msg->content) }}
					</p>
				</div>
			</a>
			@if($msg->sender_id == $user->id)
			<a class="ut_image ut_image_right" href="{{ $owner_url }}"><img class="ut_src" src="{{ $owner_image }}"></a>
			@else
			<a class="ut_image" href="{{ $receiver_url }}"><img class="ut_src" src="{{ $receiver_image }}"></a>
			@endif
		</li>
		@endforeach
	</ul>
</div>