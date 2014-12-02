@extends('layouts.master')

@section('content')
<div class="ym-wrapper">
<div id="login_wrap" class="{{ Session::get('section') }}">
	<div id="login_nav">
		<h1 id="login_logo">西厢印</h1>
		<ul class="ym-grid">
			<li class="ym-g33 ym-gl">
				<a class="ym-gbox for_login" data-tab="for_login">登陆</a>
			</li>
			<li class="ym-g33 ym-gl">
				<a class="ym-gbox for_register" data-tab="for_register">注册</a>
			</li>
			<li class="ym-g33 ym-gr">
				<a class="ym-gbox" href="/">查看</a>
			</li>
		</ul>
	</div>
	<div id="login_form">
		<div class="ym-grid">
			<div class="ym-g60 ym-gl">
				<div id="for_login" class="ym-gbox">
					{{ Form::open(array('route' => 'login', 'class' => 'ym-form')) }}
					<div class="ym-fbox">
						@if (Session::has('flash_error'))
							<div class="error">{{ Session::get('flash_error') }}</div>
						@endif
						{{ Form::text('email', Input::old('email'), array('class'=>'ym-fbox-text input', 'placeholder'=>'邮箱')) }}
						{{ Form::password('password', array('class'=>'ym-fbox-text input', 'placeholder'=>'密 码')) }}
						<button type="submit" class="ym-fbox-button submit">登陆</button>
						<div class="ym-contain-oh">
							<a class="forget">忘记密码？</a>
						</div>
					</div>
					{{ Form::close() }}
				</div>
				<div id="for_register" class="ym-gbox">
					<span class="title">使用常用邮箱注册</span>
					{{ Form::open(array('route' => 'register', 'class' => 'ym-form')) }}
					<div class="ym-fbox">
						<div class="error">{{ $errors->first('email') }}</div>
						{{ Form::text('email', Input::old('email'), array('class'=>'ym-fbox-text input', 'placeholder'=>'邮箱')) }}
						<div class="error">{{ $errors->first('password') }}</div>
						{{ Form::password('password', array('class'=>'ym-fbox-text input', 'placeholder'=>'密 码')) }}
						{{ Form::password('cpassword', array('class'=>'ym-fbox-text input', 'placeholder'=>'再次输入密码')) }}
						<button type="submit" class="ym-fbox-button submit">注册</button>
					</div>
					{{ Form::close() }}
				</div>
			</div>
			<div class="ym-g40 ym-gr">
				<div id="other_login" class="ym-gbox">
					<span class="title">使用社交账户登陆</span>
					<a class="weibo"></a>
					<a class="qq"></a>
					<a class="renren"></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop
