<?php
$pages = $user->follow_pages();
?>
<div class="user_timeline">
	<ul class="ut_list">
		@foreach($pages as $page)
		<li class="ut_item">
			<div class="ut_block">
				<div class="ut_info">
					<a class="ut_nick" href="{{ URL::route('u_index', array('uid' => $page->author->id)) }}">{{ $page->author->nick }}</a>
					<span class="ut_date">{{ $page->date() }}</span>
				</div>
				<div class="ut_content">
					<p>
						{{ $page->desc }}
					</p>
				</div>
				<div class="ut_tools">
					<div class="ut_tools_con">
						<a class="ut_tool" href="">评论</a>
						<a class="ut_tool" href="">分享</a>
						<a class="ut_tool" href="">转发</a>
						<a class="ut_tool" href="">收藏</a>
						<a class="ut_tool ut_like" href=""></a>
					</div>
				</div>
			</div>
			<a class="ut_image" href="{{ URL::route('u_index', array('uid' => $page->author->id)) }}"><img class="ut_src" src="{{ $page->author->user_image() }}"></a>
		</li>
		@endforeach
	</ul>
</div>