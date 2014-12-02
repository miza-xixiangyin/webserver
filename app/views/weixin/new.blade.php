<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yahoo! CloudKV Service">
    <title>xixiangyin</title>
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <style type="text/css">
    #nav {
    	height: 50px;
    	line-height: 50px;
    	color: #fff;
    	background: #b58f79;
    	position: relative;
    	padding: 0 20px;
    }
    #user {
    	font-weight: lighter;
    }
    #new, #list{
    	position: absolute;
    	height: 50px;
    	right: 20px;
    	top: 0;
    	color: #fff;
    }
    #list {
		right: 120px;
    }
    .input {
		display: block;
		width: 400px;
		margin: 0px auto;
		border: 1px solid #bbb;
		background: #ddd;
		box-shadow: 1px 1px 1px rgba(0,0,0,0.1) inset;
		border-radius: 3px;
		padding: 6px 10px;
    }
    .submit {
    	display: block;
    	border: none;
    	background: #b58f79;
    	width: 300px;
    	margin: 20px auto;
    	padding: 6px 10px;
    	color: #fff;
    }
    .msg,.success {
    	width: 400px;
    	margin: 20px auto 4px auto;
    	color: red;
    }
    .success {
    	color: #000;
    }
    </style>
</head>
<body>
	<div id="nav">
		<span id="user">{{Auth::user()->email}}</span>
		<a id="list" href="/m/admin">文章列表</a>
		<a id="new" href="/m/admin/new">添加新内容</a>
	</div>
	@if(Session::has('success'))
	<div class="success">{{ Session::get('success') }}</div>
	@endif
	{{ Form::open(array('url' => '/m/admin/new', 'files' => true)) }}
	<div class="msg">
		{{ $errors->first('title') }}
	</div>
	{{ Form::text('title', null, array('class'=>'input', 'placeholder'=>'微信标题')) }}
	<div class="msg">
		{{ $errors->first('image') }}
	</div>
	{{ Form::file('image', array('class' => 'input')) }}
	<div class="msg">
		{{ $errors->first('content') }}
	</div>
	{{ Form::textarea('content', null, array('class'=>'input', 'placeholder'=>'微信内容')) }}
	{{Form::submit('Submit', array('class' => 'submit'))}}
	{{ Form::close() }}
</body>
</html>