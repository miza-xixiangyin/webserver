@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<div class="ym-wrapper" id="index_content">
	<div class="ym-wbox">
		<div id="banner">
			<img src="/uploads/columns/o/{{{ $love_banner['pic'] }}}">
		</div>
		<h3 class="title ly">恋语</h3>
		<div class="block ym-grid">
			<div class="ym-g50 ym-gl">
				<div class="ym-gbox">
					<a class="item" href="{{{ $love_content['lw_1']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $love_content['lw_1']['pic'] }}}">
						<p class="desc">{{{ $love_content['lw_1']['text_1'] }}}</p>
					</a>
				</div>
			</div>
			<div class="ym-g50 ym-gr">
				<div class="ym-gbox">
					<a class="item" href="{{{ $love_content['lw_2']['link'] }}}">
						<img src="/uploads/columns/o/{{{ $love_content['lw_2']['pic'] }}}">
						<p class="desc">{{{ $love_content['lw_2']['text_1'] }}}</p>
					</a>
				</div>
			</div>
		</div>
		<h3 class="title jy">解语</h3>
		<div class="block ym-grid">
			<div class="ym-gbox jy-block">
				<div class="ym-grid">
					<div class="ym-g33 ym-gl">
						<div class="ym-gbox">
							<a class="item first" href="{{{ $love_content['lw_3']['link'] }}}">
								<img src="/uploads/columns/o/{{{ $love_content['lw_3']['pic'] }}}">
								<p class="desc">{{{ $love_content['lw_3']['text_1'] }}}</p>
							</a>
						</div>
					</div>
					<div class="ym-g33 ym-gl">
						<div class="ym-gbox">
							<a class="item" href="{{{ $love_content['lw_4']['link'] }}}">
								<img src="/uploads/columns/o/{{{ $love_content['lw_4']['pic'] }}}">
								<p class="desc">{{{ $love_content['lw_4']['text_1'] }}}</p>
							</a>
						</div>
					</div>
					<div class="ym-g33 ym-gr">
						<div class="ym-gbox last">
							<a class="item" href="{{{ $love_content['lw_5']['link'] }}}">
								<img src="/uploads/columns/o/{{{ $love_content['lw_5']['pic'] }}}">
								<p class="desc">{{{ $love_content['lw_5']['text_1'] }}}</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop