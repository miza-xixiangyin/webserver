@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="ym-grid">
			<div class="ym-gbox single_nav">
				<a>以爱为赠</a>
				<span>></span>
				<a>{{ $page_content['title'] }}</a>
			</div>
		</div>
		<div class="page_wrap">{{ $page_content['content'] }}</div>
		@include('layouts._page_fixed_tools', array('role' => '', 'page_config' => $page_content))
	</div>
</div>

@stop