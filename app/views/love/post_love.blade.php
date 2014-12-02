@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="love_wrap">
	<div class="ym-wrapper love_logo">
		<div class="ym-wbox"></div>
	</div>
	<div class="page_banner">
		<div class="ym-wrapper">
			<div class="ym-wbox">
				<div class="player" id="">
					<span id="xx_player"></span>
					<a class="player_status jp-play"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<img class="love_img" src="/images/love_post_banner.png" />
			<img class="love_img love_verse" src="/images/love_post_verse.png" />
			<div class="ym-grid love-box">
				<div class="ym-gbox">
					<p class="love_desc">
						此刻的你是什么模样，期予着与怎样的Ta来日相逢。<br />
						写下你的“此刻”发送至<span class="love_hl">西厢印</span>，让我们为你寄达，给未来的你与Ta。
					</p>
					<div class="love_content">
						<textarea></textarea>
					</div>
				</div>
			</div>
			<div class="ym-grid love_tools">
				<div class="ym-gbox">
					<a class="love_btn">发&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;送</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop