@extends('layouts.master')

@section('content')
<div class="forget_pwd">
	<div class="header">
		<div class="ym-wrapper">
			<div class="ym-wbox">
				<a href="{{ URL::route('index') }}" class="logo">
					<img src="/images/logo_t.png">
				</a>
			</div>
		</div>
	</div>
	<div class="ym-wrapper body">
		<div class="ym-wbox">
			<h2 class="title">找回密码</h2>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox">
						<label for="register_mail">登陆邮箱</label>
					</div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox">
						<input id="register_mail" />
					</div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox">
						<button type="submit">提交</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop