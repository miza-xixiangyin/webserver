@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => ''))
<div class="user_wrap">
	@include('user._user_header', $data)
	@include('user._user_' . $data['section'], $data)
</div>
@stop