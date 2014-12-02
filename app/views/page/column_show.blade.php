@extends('layouts.master')
@section('extral_css', 'live')

@section('content')
<div id="main">
	@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))
	<div class="content" id="hand_show">
		
	</div>
</div>
@stop