<?php
$follows = $user->follows();
$follow_list = $follows->get();
?>
<div class="user_follows">
	<h4 class="user_f_title">您已关注：{{ $follows->count() }} 人</h4>
	<ul class="ym-contain-oh user_f_list">
		@foreach($follow_list as $follow)
		<li class="user_f_item">
			<a class="user_f_text" href="{{ URL::route('u_index', array('uid' => $follow->user_id)) }}">
				<img class="cover" src="{{ $follow->owner->user_image() }}">
				<span class="nick">{{ $follow->owner->nick }}</span>
				<span class="vocation">{{ $follow->owner->vocation }}</span>
				<span class="follows_num">粉丝数：{{ $follow->owner->followers()->count() }}</span>
				<span class="remove" data-id="{{ $follow->user_id }}">×</span>
			</a>
		</li>
		@endforeach
	</ul>
</div>