<?php
$assets_server = Config::get('web_conf.assets_server');
$assets = array(
	'common' 	=> Config::get('xx_assets.common_assets', array()),
	'page'		=> Config::get('xx_assets.' . Route::currentRouteName(), array())
);

$jsfiles	='';
$cssfiles	='';

foreach ($assets as $key => $rows)
{
	foreach ($rows as $type => $row)
	{
		if ($type == 'css')
		{
			foreach ($row as $file)
			{
				$cssfiles .= '<link rel="stylesheet" type="text/css" href="' . $assets_server . '/css/framework/' . $file. '">';
			}
		}
		elseif ($type == 'js')
		{
			foreach ($row as $file)
			{
				$jsfiles .= '<script type="text/javascript" src="' . $assets_server . '/js/' . $file . '"></script>';
			}
		}
	}
}
?>
<!doctype html>
<html lang="cn">
<head>
	<meta charset="utf-8"/>

	<title>{{ Lang::get('msg.page_title') }}</title>
	<meta name="description" content="{{ Lang::get('msg.page_desc') }}"/>
	<meta name="author" content="{{ Lang::get('msg.page_author') }}"/>

	<link rel="shortcut icon" href="favicon.ico" />

	<!-- mobile viewport optimisation -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="renderer" content="webkit">
	<meta property="qc:admins" content="25505551141167116636" />
	<meta property="wb:webmaster" content="a830fd03d1d339be" />

	<!-- stylesheets -->
	{{ $cssfiles }}

	<!--[if lte IE 7]>
	<link rel="stylesheet" href="{{ $assets_server }}/css/framework/iehacks.min.css" type="text/css"/>
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="{{ $assets_server }}/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
@yield('content')
@include('layouts._footer')
</body>
<script type="text/javascript">
	window.xx_g = {
		auth: '{{ Auth::check() }}'
	};
</script>
{{ $jsfiles }}
@yield('extral')
<script type="text/javascript" src="http://tajs.qq.com/stats?sId=37255552" charset="UTF-8"></script>

</html>