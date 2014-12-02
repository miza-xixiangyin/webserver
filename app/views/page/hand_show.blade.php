@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="page_banner">
	<div class="ym-wrapper">
		<div class="ym-wbox ym-contain-oh">
			<img src="/images/title_hand.png">
		</div>
	</div>
</div>

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="ym-grid" style="display:none;">
			<div class="ym-gbox single_nav">
				<a>以爱为赠</a>
				<span>></span>
				<a>{{ $page_content['title'] }}</a>
			</div>
		</div>
		<div class="page_wrap">
			{{ $page_content['content'] }}
		</div>
		@include('layouts._comment', array('page_id' => $page_content['id']))
		@include('layouts._page_fixed_tools', array('role' => 'handmade_user', 'page_config' => $page_content))
	</div>
</div>

@stop