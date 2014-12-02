<?php
$msgs = $user->messages();
?>
<div class="user_timeline user_send">
	<ul class="ut_list">
		@foreach($msgs as $msg)
		<li class="ut_item {{ $msg['type'] }} {{ $msg['unread'] > 0 ? 'unread' : '' }}" data-user="{{ $msg['user_info']->id }}">
			<a class="ut_block" href="{{ URL::route('u_msg_list', array('uid' => $msg['user_info']->id)) }}">
				<div class="ut_info">
					<span class="ut_nick">{{ $msg['user_info']->nick }}</span>
					<span class="ut_date">{{ $msg['items'][0]->created_at }}</span>
				</div>
				<div class="ut_content">
					<p>
						{{ $msg['items'][0]->content }}
					</p>
				</div>
			</a>
			<a class="ut_image" href="{{ URL::route('u_index', array('uid' => $msg['user_info']->id)) }}"><img class="ut_src" src="{{ $msg['user_info']->user_image() }}"></a>
		</li>
		@endforeach
	</ul>
</div>