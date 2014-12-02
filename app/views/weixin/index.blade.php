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
    img {
    	display: block;
    	width: 60px;
    	margin: 0 auto;
    }
    table {
    	border: 1px solid #ccc;
    	width: 100%;
    }
    td, th {
    	border: 1px solid #ccc;
    	padding: 8px;
    }
    .center {
    	text-align: center;
    }
    .success {
    	text-align: center;
    	color: red;
    	margin: 10px 0;
    }
    </style>
</head>
<body>
	<div id="nav">
		<span id="user">{{Auth::user()->email}}</span>
		<a id="list" href="/m/admin">文章列表</a>
		<a id="new" href="/m/admin/new">添加新内容</a>
	</div>
	<div style="margin: 40px;">
	@if(Session::has('success'))
	<div class="success">{{ Session::get('success') }}</div>
	@endif
	<table>
		<tr>
			<th>图片</th>
			<th>标题</th>
			<th>全文</th>
			<th>删除</th>
		</tr>
		@foreach ($data as $row)
		<tr>
			<td class="center"><img src="/uploads/{{ $row->pic }}"></td>
			<td>{{ $row->title }}</td>
			<td>{{ $row->content }}</td>
			<td class="center"><a href="/m/admin/remove/{{ $row->id }}">删除</a></td>
		</tr>
		@endforeach
		
	</table>
	</div>
</body>
</html>