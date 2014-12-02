@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="page_banner">
	<div class="ym-wrapper">
		<div class="ym-wbox ym-contain-oh">
			<img src="/images/title_dress.png">
		</div>
	</div>
</div>

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="page_wrap">{{ $page_content['content'] }}</div>
		@include('layouts._page_fixed_tools', array('role' => 'dress_user', 'page_config' => $page_content))
	</div>
</div>

@stop