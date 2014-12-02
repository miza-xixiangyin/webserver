<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yahoo! CloudKV Service">
    <title>xixiangyin</title>
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <style type="text/css">
    body {
        width: 320px;
        background: #eee;
    }
    .nav_bar {
    	background: #870608;
    	height: 50px;
    	position: relative;

    }
    .logo {
    	display: inline-block;
    	height: 100%;
    	padding: 5px 0 0 10px;
    }
    .logo img {
    	display: block;
    	height: 40px;
    }
    .list,.content {
    	margin: 10px;
    }
    .content {
    	color: #333;
    }
    .content h2 {
    	font-size: 18px;
    	
    }
    .content img {
    	margin: 10px 0;
    }
    .content p {
        padding: 0 0 20px 0;
        font-size: 15px;
    }
    .list {
        padding: 10px 0 20px 0;
    }
    .item {
    	display: block;
    	border: 1px solid #ccc;
    	padding: 8px;
    	color: #333;
        background: #fff;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        margin: 0 0 20px 0;
    }
    .item .title {
        display: block;
        font-size: 16px;
        font-weight: bold;
    }
    .time {
        color: #bbb;
        margin: 4px 0;
        display: block;
    }
    .item .cover {
    	display: inline-block;
        background-size: cover;
        width: 100%;
        height: 120px;
        background-repeat: no-repeat;
        background-position: center;
    }
    .all {
    	position: absolute;
    	height: 100%;
    	right: 10px;
    	top: 0;
    	line-height: 50px;
    	font-size: 18px;
    	color: #fff;
        font-weight: bold;
    }

    </style>
</head>
<body>
	<div class="nav_bar">
		<a class="logo" href="/m/weixin"><img src="/images/weixin_logo.png"></a>
		{{ isset($content) ? '<a class="all" href="/m/weixin">所有文章</a>' : '' }}
	</div>
	@yield('content')
</body>
</html>