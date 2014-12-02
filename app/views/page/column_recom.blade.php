@extends('layouts.master')
@section('extral_css', 'live')

@section('content')

<div id="main">
	@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))
	<div class="content" id="column_list">
		<div class="recom_user">
			<div class="recom_user_info">
				<span class="recom_name"><a href="#"></a>爱永</span>
				<span class="recom_position">大学讲师、自由撰稿人</span>
			</div>
			<img src="/uploads/page/o/XDJ8LRGUoykzaQzm93rN.png">
		</div>
		<div class="recom_title recom_movie"></div>
		<ul class="recom_list">
			<li class="recom_item">
				<div class="cover">
					<img src="/uploads/page/o/GCAQvjAghtamcVNzJra1.png">
				</div>
				<div class="desc">
					<h4 class="title">『刺猬的优雅』</h4>
					<p class="time">2014-06-30</p>
					<p class="intro">
						看了法国小说《刺猬的优雅》改编的同名电影，突然觉得同时间的其他电影都不好看了。之前颇为期待
						『一页台北』和我生活中的台北相差甚远，虽然有诚品有全家有师大夜市有熟悉的台北场景，也有幽默
						浪漫与趣味元素，但却少了整个城市最重要的：人的灵魂。。。
					</p>
					<div class="tool_bar">
						<a class="tool">评论</a>
						<a class="tool">分享</a>
						<a class="tool">转发</a>
						<a class="tool">收藏</a>
						<a class="tool">寄给TA</a>
					</div>
				</div>
			</li>
			<li class="recom_item">
				<div class="cover">
					<img src="/uploads/page/o/GCAQvjAghtamcVNzJra1.png">
				</div>
				<div class="desc">
					<h4 class="title">『刺猬的优雅』</h4>
					<p class="time">2014-06-30</p>
					<p class="intro">
						看了法国小说《刺猬的优雅》改编的同名电影，突然觉得同时间的其他电影都不好看了。之前颇为期待
						『一页台北』和我生活中的台北相差甚远，虽然有诚品有全家有师大夜市有熟悉的台北场景，也有幽默
						浪漫与趣味元素，但却少了整个城市最重要的：人的灵魂。。。
					</p>
					<div class="tool_bar">
						<a class="tool">评论</a>
						<a class="tool">分享</a>
						<a class="tool">转发</a>
						<a class="tool">收藏</a>
						<a class="tool">寄给TA</a>
					</div>
				</div>
			</li>
			<li class="recom_item">
				<div class="cover">
					<img src="/uploads/page/o/GCAQvjAghtamcVNzJra1.png">
				</div>
				<div class="desc">
					<h4 class="title">『刺猬的优雅』</h4>
					<p class="time">2014-06-30</p>
					<p class="intro">
						看了法国小说《刺猬的优雅》改编的同名电影，突然觉得同时间的其他电影都不好看了。之前颇为期待
						『一页台北』和我生活中的台北相差甚远，虽然有诚品有全家有师大夜市有熟悉的台北场景，也有幽默
						浪漫与趣味元素，但却少了整个城市最重要的：人的灵魂。。。
					</p>
					<div class="tool_bar">
						<a class="tool">评论</a>
						<a class="tool">分享</a>
						<a class="tool">转发</a>
						<a class="tool">收藏</a>
						<a class="tool">寄给TA</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
@stop