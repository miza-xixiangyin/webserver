@extends('layouts.master')
@section('content')
@include('layouts._menu', array('curr_section' => 'loving'))

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content">
		<div class="page_wrap">
			{{ $page_content['content'] }}
		</div>
		@include('layouts._comment', array('page' => $page_content))
		@include('layouts._verse_fixed_tools', array('role' => 'verse_user', 'page_config' => $page_content))
	</div>
</div>
@stop
@section('extral')
<script type="text/javascript" src="{{ Config::get('web_conf.assets_server') }}/js/jquery.form.min.js"></script>
<script type="text/javascript" src="{{ Config::get('web_conf.assets_server') }}/js/verse.js"></script>
@stop