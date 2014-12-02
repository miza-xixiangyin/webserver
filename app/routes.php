<?php
Route::get('/make_short_card', array('uses' => 'ShortController@make'));

// home page
Route::get("/",  				array('as' => 'index', 		'uses' => 'HomeController@index'));

// post love
Route::get('/post',				array('as' => 'post',		'uses' => 'ContentController@post'));

// meet in xixiang
Route::get('/date',				array('as' => 'date',		'uses' => 'DateController@index'));

// store
Route::get('/store',			array('as' => 'store',		'uses' => 'StoreController@index'));

// user profile page
Route::get('/profile/{uid?}',	array('as' => 'u_index',	'uses' => 'UserController@userIndex', 	'before' => 'user.check'));
Route::get('/u/follows/{uid?}',	array('as' => 'u_follows',	'uses' => 'UserController@userFollows', 'before' => 'user.check'));
Route::get('/u/column/{uid?}',	array('as' => 'u_column',	'uses' => 'UserController@userColumn', 	'before' => 'user.check'));
Route::get('/u/mark',			array('as' => 'u_mark',		'uses' => 'UserController@userMark', 	'before' => 'auth.login'));
Route::get('/u/message',		array('as' => 'u_msg',		'uses' => 'UserController@userMsg',		'before' => 'auth.login'));
Route::any('/u/message/{uid}',	array('as' => 'u_msg_list',	'uses' => 'UserController@userMsgList',	'before' => 'auth.login'));
Route::get('/u/setting',		array('as' => 'u_setting',	'uses' => 'UserController@userSetting', 'before' => 'auth.login'));

// user api
Route::group(array('prefix' => '/op', 'before' => 'auth.api'), function ()
{
	Route::post('page/mark', 		array('as' => 'api_page_mark', 		'uses' => 'APIController@pageMark'));
	Route::post('user/post', 		array('as' => 'api_user_post', 		'uses' => 'APIController@userPost'));
	Route::post('user/talk', 		array('as' => 'api_user_talk', 		'uses' => 'APIController@userTalk'));
	Route::post('user/image', 		array('as' => 'api_user_image', 	'uses' => 'APIController@userImage'));
	Route::post('user/info', 		array('as' => 'api_user_info', 		'uses' => 'APIController@userInfo'));
	Route::post('user/pwd', 		array('as' => 'api_user_pwd', 		'uses' => 'APIController@userpwd'));
	Route::post('user/follow',		array('as' => 'api_user_follow', 	'uses' => 'APIController@userFollow'));
	Route::post('user/msg',			array('as' => 'api_user_msg', 		'uses' => 'APIController@userMsg'));
	Route::post('auth/check',		array('as' => 'api_auth_check',		'uses' => 'APIController@authCheck'));
	Route::post('verse/post',		array('as' => 'verse_post',			'uses' => 'APIController@versePost'));
	Route::get('auth/box',			array('as' => 'api_auth_box',		'uses' => 'APIController@authBox'));
});

// user logout
Route::get("/logout",  			array('as' => 'logout', 		'uses' => 'UserController@doLogout'));
// forget password
Route::get('/forgetpwd',		array('as' => 'forget_pwd',		'uses' => 'UserController@forgetPwd'));
Route::any('/auth/{platform}',	array('as' => 'third_login',	'uses' => 'UserController@thirdLogin'));
Route::get('/qq_login', 		array('as' => 'qq_login',		'uses' => 'UserController@qqLogin'));

// company info
Route::group(array('prefix' => '/info'), function()
{
	Route::get('about',			array('as' => 'about', 			'uses' => 'InfoController@index'));
	Route::get('contact',		array('as' => 'contact', 		'uses' => 'InfoController@index'));
	Route::get('join',			array('as' => 'join', 			'uses' => 'InfoController@index'));
	Route::get('help',			array('as' => 'help', 			'uses' => 'InfoController@index'));
	Route::get('items',			array('as' => 'items', 			'uses' => 'InfoController@index'));
});

// content page
Route::any('/page_admin/{id}',	array('as' => 'page_admin', 	'uses' => 'ContentController@contentAdmin', 'before' => 'admin_user'));
Route::any('/{model}/{id?}', 	array('as' => 'page_content', 	'uses' => 'ContentController@pageContent'))->where(array('id' => '[0-9]+'));
?>