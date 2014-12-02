<!doctype html>
<html lang="cn">
<head>
	<meta charset="utf-8"/>

	<title>{{ Lang::get('msg.page_title') }}</title>
	<meta name="description" content="{{ Lang::get('msg.page_desc') }}"/>
	<meta name="author" content="{{ Lang::get('msg.page_author') }}"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="renderer" content="webkit">
</head>
<body style="margin: 0; padding: 0;">
<div style="font-size: 14px; color:#2b2b2b; font-family: arial, 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', '宋体', Tahoma, Arial, Helvetica, STHeiti; margin: 0 auto; padding: 0; width: 100%; text-align: center; background: url(http://xixiangyin.cn/uploads/page/o/5jdrr01KiAczcoNYF50o.png);">
	<div style="background: #b58f79;display: block; width:100%; height: 30px; line-height:30px;"><a href="http://xixiangyin.cn" style="color:#fff; text-decoration: none; padding-left: 12px;">西厢印</a></div>
	@yield('content')
</div>
</body>
</html>