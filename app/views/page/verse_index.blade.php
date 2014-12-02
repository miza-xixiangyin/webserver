@extends('layouts.master')
@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))
<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="ym-grid" style="display: none;">
			<div class="ym-gbox single_nav">
				<a>恋语</a>
				<span>-</span>
				<a>原创自由诗</a>
			</div>
		</div>
		{{ $page_content['content'] }}
		@include('layouts._page_fixed_tools', array('role' => 'verse_user', 'page_config' => $page_content))
	</div>
</div>

@stop