@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => ''))
<div class="user_wrap">
	@include('user._user_header', array('user' => $user, 'section' => $section, 'is_owner' => $is_owner))
	@include('user._user_' . $section, array('user' => $user))
</div>
@stop