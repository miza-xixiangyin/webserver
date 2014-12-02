@extends('layouts.master')
@section('extral_css', 'live')

@section('content')
<div id="main">
	@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))
	<div class="content" id="batter_life">
		<div class="block">
			<h3 class="title yq">怡情</h3>
			<div id="banner">
				<a href="{{{ $live_content['live_1']['link'] }}}">
					<img src="/uploads/columns/o/{{{ $live_content['live_1']['pic'] }}}">
				</a>
			</div>
			<div id="bl_desc">
				{{ $live_content['live_1']['text_1'] }}
			</div>
		</div>
		<div class="block">
			<h3 class="title sq">拾趣</h3>
			<div class="column">
				<div class="c_item">
					<a class="item" href="{{{ $live_content['live_2']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_2']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_2']['text_1'] }}
						</p>
					</a>
				</div>
				<div class="c_item">
					<a class="item" href="{{{ $live_content['live_3']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_3']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_3']['text_1'] }}
						</p>
					</a>
				</div>
			</div>
		</div>
		<div class="block">
			<h3 class="title hd">活动</h3>
			<div class="column column_jy">
				<div class="c_item">
					<a class="item" href="{{{ $live_content['live_4']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_4']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_4']['text_1'] }}
						</p>
					</a>
				</div>
				<div class="c_item">
					<a class="item" href="{{{ $live_content['live_5']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_5']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_5']['text_1'] }}
						</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop