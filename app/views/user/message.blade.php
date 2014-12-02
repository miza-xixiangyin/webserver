@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => ''))
<div class="user_wrap">
	@include('user._user_header', array('user' => $user, 'section' => 'send'))
	@include('user._user_message', array('user' => $user, 'receiver' => $receiver))
</div>
@stop

@section('extral')
<script type="text/javascript">
$(document).ready(function() {
	$('.user_msg_form').submit(function(event) {
		var msg =  $(this).find('.user_msg_form').val();
		if ($.trim(msg) == '') {
			$(this).find('.msg').text('纸条内容不能为空');
			event.preventDefault();
		}
	});
});
</script>
@stop