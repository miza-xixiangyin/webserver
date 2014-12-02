@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="ym-wrapper" id="live_content">
	<div class="ym-wbox">
		<h3 class="title yq">怡情</h3>
		<div class="ym-grid" id="bl_yq">
			<div class="ym-gbox">
				<a href="{{{ $live_content['live_1']['link'] }}}">
					<img src="/uploads/columns/o/{{{ $live_content['live_1']['pic'] }}}">
				</a>
				<div id="bl_desc">
					{{ $live_content['live_1']['text_1'] }}
				</div>
			</div>
		</div>
		<h3 class="title sq">拾趣</h3>
		<div class="ym-grid">
			<div class="ym-g50 ym-gl">
				<div class="ym-gbox">
					<a class="item" href="{{{ $live_content['live_2']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_2']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_2']['text_1'] }}
						</p>
					</a>
				</div>
			</div>
			<div class="ym-g50 ym-gr">
				<div class="ym-gbox">
					<a class="item" href="{{{ $live_content['live_3']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_3']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_3']['text_1'] }}
						</p>
					</a>
				</div>
			</div>
		</div>
		<h3 class="title hd">活动</h3>
		<div class="ym-grid">
			<div class="ym-g50 ym-gl">
				<div class="ym-gbox">
					<a class="item" href="{{{ $live_content['live_4']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $live_content['live_4']['pic'] }}}">
						<p class="desc">
							{{ $live_content['live_4']['text_1'] }}
						</p>
					</a>
				</div>
			</div>
			<div class="ym-g50 ym-gr">
				<div class="ym-gbox">
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