@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="ym-grid" style="display: none;">
			<div class="ym-gbox single_nav">
				<a>西厢解语</a>
				<span>></span>
				<a>亲子</a>
			</div>
		</div>
		<div class="page_wrap">{{ $page_content['content'] }}</div>
		@include('layouts._page_fixed_tools', array('role' => 'family_user', 'page_config' => $page_content))
	</div>
</div>

@stop