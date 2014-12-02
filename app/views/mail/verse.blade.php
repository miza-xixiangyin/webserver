@extends('layouts.master_mail')

@section('content')
<div style="margin: 0 30px; padding-bottom: 30px;">
	<h1 style="margin: 30px 0; font-size: 24px; padding: 0; font-weight: lighter;">你的好友从<a href="http://www.xixiangyin.cn" style="color:#b58f79;text-decoration: none;padding:0 4px;">西厢印</a>寄来的一张明信片</h1>
	<img alt="这是一首写给你的诗" style="background: #eaeaea; padding: 10px; display: block; margin: 0 auto; max-width: 800px;" src="{{ Config::get('web_conf.assets_server') }}/{{ $verse }}">
	<div style="margin: 10px auto 60px auto; width: 800px; padding: 0; font-size: 16px; line-height: 22px;">
		{{ $content }}
	</div>
	<p style="margin: 20px 0;line-height:26px; padding: 0;color: #aaa;">
	<a href="http://www.xixiangyin.cn"><img src="http://www.xixiangyin.cn/images/logo_t.png" style="display: block; margin: 10px auto;"></a>
	谁在为你写诗？<br />
	点击 <a href="http://www.xixiangyin.cn">www.xixiangyin.com</a>，走进诗样的世界，寻找情缘，邂逅浪漫。<br />
	相约西厢，也许TA正切切等地<br />

	</p>
</div>
@stop