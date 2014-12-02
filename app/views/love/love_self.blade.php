@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="ym-wrapper nav_bar">
	<div class="ym-wbox">
		<a>恋语微言/解语</a>
		<span>-</span>
		<a>善己</a>
	</div>
</div>
<div class="banner_desc">
	<div class="ym-wrapper">
		<div class="ym-box">
			<div class="ym-column ym-cl love_desc">
				<div class="ym-col1">
					<div class="ym-cbox">
						<p class="love_content">
						06年在舍友的床头偶尔发现一本名为《通俗歌曲》的杂志，在那一期附赠的一张鲜货CD合集上，第一次听到便利商店、新裤子、果味vc、左小祖咒、后海大鲨鱼等一些北京本土的摇滚新生力量，这些混杂着青春荷尔蒙，浪漫花粉气息和颓废味道的空气波一下子把我击中了，从此一入音乐深似海。附赠的一张鲜货CD合集上，第一次听到便利商店、新裤子、果味vc、左小祖咒、后海大鲨鱼等一些北京本土的摇滚.<br />
						2010年源于一首muse的《Unintended》偶入SongTaste，按图索骥地开始聆听一堆精选集，在那里混迹的日子基本确立了我现在的音乐品味。后来开始不满足于牛人的推荐，自己开始主动地勤奋听歌，在豆瓣音乐上写一些感性的音乐体验文字，作为阶段性的沉淀开始制作一些精选集，邀同好共享。目前极其迷恋后摇，症状基本可以确诊为“后摇幻听障碍” ，你呢，是否敢和我在音乐中疯一次。
						</p>
					</div>
				</div>
				<div class="ym-col3">
					<div class="ym-cbox ym-contain-oh">
						<div class="editor">
							<img class="page_icon" src="/uploads/page/o/z5mIme7his0wZTRtlV3l.png">
							<p>编辑/制作/DJ：Leon</p>
						</div>
					</div>
				</div>
			</div>
			<div class="ym-contain-oh">
				<div class="user_info">
					<div class="user_desc">
						leon 凉老师<br />
						<span class="user_title">播音 DJ</span>
					</div>
					<div class="user_image">
						<img src="/uploads/page/o/uKCZQXKZk4EWb9ynFV0B.png">
						<a class="other_link">查看往期作品 ></a>
					</div>
				</div>
			</div>
			<div class="ym-contain-oh">
				
			</div>
		</div>
	</div>
</div>
<div class="player_container">
	<div class="ym-wrapper">
		<div class="ym-box">
			<div class="player_box">
				<span id="xx_player" data-source="/js/Jplayer/test_mp3.mp3"></span>
				<div class="player_bg"></div>
				<a class="player_tools">
					<span class="player_status player_btn jp-play"></span>
				</a>
			</div>
		</div>
	</div>
	<div class="tool_bar">
		<div class="ym-wrapper">
			<div class="ym-box">
				<a>评论</a>
				<a>分享</a>
				<a>转发</a>
				<a>收藏</a>
				<a>寄给TA</a>
			</div>
		</div>
	</div>
</div>
<div class="ym-wrapper">
	<div class="ym-box">
		<div style="line-height: 28px; margin: 24px 0 100px 210px;">
			<h4 style="color:#262626; font-size: 16px;">电台名：【梦前碎语-大海】</h4>
			<p>主播：Leon凉老师</p>
			<p style="font-size:12px; margin-top:36px;">
			一次旅行，一次很彻底的放逐，这绝不是小清新的忸怩作态和无病呻吟，<br />
			我始终能想起咸腥的海水和刷刷作响的海浪，<br />
			一艘大船，它要带我回家。。。
			</p>
		</div>
	</div>
</div>
@stop