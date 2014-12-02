<?php
$curr_hour = date('H');
$menus = Config::get('web_conf.main_menus');
?>
@extends('layouts.master')

@section('content')
<header id="top_hd">

	<div id="main_menu">
		<nav class="ym-hlist">
			<ul>
				@foreach ($menus as $key => $menu)
				<li class="p_menu">
					<a class="p_menu_text" {{ isset($menu['link']) ? 'href="'.$menu['link'].'"' : '' }}>{{ $menu['text'] }}</a>
					@if(isset($menu['children']))
						<ul class="sub_menu">
						@foreach ($menu['children'] as $sub_key => $sub_menu)
							<li class="sub_menu_item">
								<a href="{{ $sub_menu['link'] }}">{{ $sub_menu['text'] }}</a>
							</li>							
						@endforeach
						</ul>
					@endif
				</li>
				@endforeach
			</ul>
		</nav>
	</div>

	<nav class="ym-hlist">
		<ul class="top_menu">
			<li style="display:none;"><input class="ym-searchfield" type="search" placeholder="搜索" /></li>
			@if(!Auth::check())
				<li><a class="auth_tool" data-type="login">登陆</a></li>
				<li><a class="auth_tool" data-type="register">注册</a></li>
				<!-- <li><span id="qq_login"></span></li> -->
			@else
				<li><a href="{{ URL::route('u_index') }}">{{Auth::user()->user_nick()}}</a></li>
				<li><a href="{{ URL::route('u_setting') }}">设置</a></li>
				<li><a href="{{ URL::route('logout') }}">退出</a></li>
			@endif
		</ul>
	</nav>
</header>
<div class="custom_index">
	<div class="index_slide">
		<div class="slide slide_1 @if(2 < $curr_hour && $curr_hour < 11)active @endif">
			<img class="picture" src="/uploads/page/o/b2uzb8Z1vPRQjryBTppC.png" />
			<img class="logo" src="/images/index_icon_2.png">
			<img class="word" src="/images/index_icon_4.png">
			<a class="detail" href="/verse"></a>
		</div>
		<div class="slide slide_2 @if(11 <= $curr_hour && $curr_hour <= 15)active @endif">
			<img class="picture" src="/uploads/page/o/IuoDxOhhs8DlPhfVzlxZ.png" />
			<img class="logo" src="/images/index_icon_2.png">
			<img class="word" src="/images/index_icon_4.png">
			<a class="detail" href="/handmake/16"></a>
		</div>
		<div class="slide slide_3 @if(15 < $curr_hour || $curr_hour < 2)active @endif">
			<img class="picture" src="/uploads/page/o/84naMVfQBhlfc1YyVESk.png" />
			<img class="logo" src="/images/index_icon_2.png">
			<img class="word" src="/images/index_icon_4.png">
			<a class="detail" href="/cheer/3"></a>
		</div>
		<div class="index_list">
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
	<div class="index_footer">
		<div class="index_footer_icon"></div>
	</div>
</div>

@stop