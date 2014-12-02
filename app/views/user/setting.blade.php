@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => ''))
<div class="user_wrap">
	@include('user._user_header', array('user' => $user, 'section' => ''))
	@include('user._user_setting', array('user' => $user))
</div>
@stop