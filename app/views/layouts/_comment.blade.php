<?php
$comments = $page->comments();
$marks = $page->marks();
$likes = $page->likes();
$comments_list = $comments->get();
?>
<div class="content_extends" data-pageid="{{ $page->id }}">
	<div class="ym-contain-oh">
		<div class="con_tools">
			<a class="con_tool con_op" data-type="comment">评论({{ $comments->count() }})</a>
			<a class="con_tool" data-type="share" target="_blank" href="http://service.weibo.com/share/share.php?title={{ $page->title }}&url={{ Request::url() }}">分享</a>
			<a class="con_tool  con_op {{ $page->hasMarked() ? 'con_done' : '' }}" data-type="mark">收藏(<span class="con_count">{{ $marks->count() }}</span>)</a>
			<a class="con_tool  con_op {{ $page->hasLiked() ? 'con_done' : '' }}" data-type="like">赞(<span class="con_count">{{ $likes->count() }}</span>)</a>
		</div>
	</div>
	<div class="con_post_comment">
		<form class="con_post_form" action="" method="POST">
			<h3 class="con_post_title">发表评论</h3>
			<textarea class="con_post_box" name="comment"></textarea>
			<div class="ym-contain-oh con_post_btn">
				<button class="con_post_submit" type="submit">评论</button>
				<p class="con_post_msg"></p>
			</div>
		</form>
	</div>
	<ul class="con_comments">
		@foreach ($comments_list as $comment)
		<li class="ym-column ym-cl">
			<div class="ym-col1">
				<div class="ym-cbox">
					<a class="con_com_user" href="{{ URL::route('u_index', array('uid' => $comment->author->id)) }}">{{ $comment->author->nick }}</a>
					{{ $comment->content }}
				</div>
			</div>
			<div class="ym-col3">
				<div class="ym-cbox">
					<img class="con_user_cover" src="{{ $comment->author->user_image() }}" />
				</div>
			</div>
		</li>
		@endforeach
	</ul>
</div>