<?php
return array(
	'main_menus' => array(
		'index' => array('link' => '/', 'text' => '首页'),
		'loving' => array('text' => '恋语微言', 'children' => array(
			'verse' => array('link' => '/verse', 'text' => '恋语'),
			'post' => array('link' => '/post', 'text' => '情缘'),
			'date' => array('link' => '/date', 'text' => '约会')
		)),
		'live' => array('text' => '乐活西厢', 'children' => array(
			'handmake' => array('link' => '/handmake', 'text' => '手作'),
			'dress' => array('link' => '/dress', 'text' => '乐活'),
			'cheer' => array('link' => '/cheer', 'text' => '怡情'),
			'salon' => array('link' => '/salon', 'text' => '沙龙')
		)),
		// 'meet' => array('link' => '/meet', 'text' => '相约西厢'),
		'store' => array('link' => '/store', 'text' => '以爱为赠')
	),

	'assets_server' => 'http://115.28.131.23:' . $_SERVER['SERVER_PORT'],
	'path_column' => __DIR__.'/../public/uploads/columns/o',

	'path_page' => '/uploads/page/o',

	'path_weixin' => __DIR__.'/../public/uploads/pages/o',

	'cache_page_conf' => array(
		'name' => 'page_conf',
		'expire' => 1 // minutes
	),
	'cache_authorship_user' => array(
		'name' => 'authorship_user',
		'expire' => 1
	),
	'cache_page_column_conf' => array(
		'name' => 'page_column_conf',
		'expire' => 1
	),
);