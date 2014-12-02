@extends('layouts.master')
@section('extral_css', 'live')

@section('content')

@include('layouts._menu', array('curr_section' => ''))

<div class="ym-wrapper">
	<div class="ym-wbox" id="page_content" contenteditable="true" data-page={{ $page_content['id'] }}>
		{{ $page_content['content'] }}
	</div>
	<button id="page_content_sub" style="display: block; margin: 20px auto; background: #5eb95e; color: #fff; border: none; padding: 6px 40px; font-size: 20px;">submit</button>
</div>
@stop