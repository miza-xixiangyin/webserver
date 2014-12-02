@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="ym-wrapper">
	<div class="ym-wbox page_cheer" id="page_content">
		<div class="ym-grid">
			<div class="ym-gbox single_nav">
				<a href="{{ route('live') }}">乐活西厢</a>
				<span>-</span>
				<span>怡情</span>
			</div>
		</div>
		<div class="page_wrap">{{ $page_content['content'] }}</div>
		@include('layouts._page_fixed_tools', array('role' => 'cheer_user', 'page_config' => $page_content))
	</div>
</div>

@stop