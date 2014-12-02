@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => 'store'))

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="page_wrap">
			{{ $page_content['content'] }}
		</div>
		@include('layouts._comment', array('page' => $page_content))
		@include('layouts._page_fixed_tools', array('role' => '', 'page_config' => $page_content))
	</div>
</div>

@stop