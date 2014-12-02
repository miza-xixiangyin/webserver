@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => 'loving'))

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
			<form action="{{ URL::route('api_user_post') }}" method="post" class="post_form">
				<img class="love_img" src="/images/love_post_banner.png" />
				<img class="love_img love_verse" src="/images/love_post_verse.png" />
				<div class="ym-grid love-box">
					<div class="ym-gbox">
						<p class="love_desc">
							此刻的你是什么模样，期予着与怎样的Ta来日相逢。<br />
							写下你的“此刻”发送至<span class="love_hl">西厢印</span>，让我们为你寄达，给未来的你与Ta。
						</p>
						<div class="love_content">
							<textarea name="content"></textarea>
						</div>
					</div>
				</div>
			</form>
			<div class="ym-grid love_tools">
				<div class="ym-gbox">
					<button class="love_btn" type="submit">发&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;送</button>
					<p class="love_msg"></p>
				</div>
			</div>
		</div>
	</div>
</div>
@stop