<?php
$menus = Config::get('web_conf.main_menus');
?>
<header id="top_hd">
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<nav class="ym-hlist">
				<ul class="top_menu">
					<li style="display:none;"><input class="ym-searchfield" type="search" placeholder="搜索" /></li>
					@if(!Auth::check())
						<li><a class="auth_tool" data-type="login">登陆</a></li>
						<li><a class="auth_tool" data-type="register">注册</a></li>
					@else
						<li><a href="{{ URL::route('u_index') }}">{{Auth::user()->user_nick()}}</a></li>
						<li><a href="{{ URL::route('u_setting') }}">设置</a></li>
						<li><a href="{{ URL::route('logout') }}">退出</a></li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
</header>
<div class="menu_wrap">
	<div class="ym-wrapper" id="main_menu">
		<div class="ym-wbox">
			<nav class="ym-hlist">
				<h1><a href="{{ URL::route('index') }}"></a></h1>
				<ul>
					@foreach ($menus as $key => $menu)
					<li class="p_menu @if($key == $curr_section) selected @endif">
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
	</div>
</div>