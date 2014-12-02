@extends('layouts.master')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))

<section id="banner_wrap">
	<div id="banner">
		<ul class="bjqs">
			@foreach ($home_banner as $item)
			<li>
				<a href="{{$item['link']}}"><img src="/uploads/columns/o/{{$item['pic']}}" title="{{$item['text_1']}}"></a>
			</li>
			@endforeach
		</ul>
	</div>
</section>

<div class="ym-wrapper" id="index_content">
	<div class="ym-wbox">
		<h3 class="title lw">恋语微言</h3>
		<div class="ym-grid ym-equalize">
			<div class="ym-g66 ym-gl">
				<div class="ym-gbox-left">
					<a href="{{{ $home_content['love_1']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['love_1']['pic'] }}}">
					</a>
				</div>
			</div>
			<div class="ym-g33 ym-gr">
				<div class="ym-gbox-right">
					<a href="{{{ $home_content['love_2']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['love_2']['pic'] }}}">
					</a>
					<a href="{{{ $home_content['love_3']['link'] }}}" class="item last">
						<img src="/uploads/columns/o/{{{ $home_content['love_3']['pic'] }}}">
					</a>
				</div>
			</div>
		</div>
		<h3 class="title bl">乐活西厢</h3>
		<div class="ym-grid ym-equalize">
			<div class="ym-g66 ym-gl">
				<div class="ym-gbox-left">
					<a href="{{{ $home_content['live_1']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['live_1']['pic'] }}}">
					</a>
				</div>
			</div>
			<div class="ym-g33 ym-gr">
				<div class="ym-gbox-right">
					<a href="{{{ $home_content['live_2']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['live_2']['pic'] }}}">
					</a>
					<a href="{{{ $home_content['live_3']['link'] }}}" class="item last">
						<img src="/uploads/columns/o/{{{ $home_content['live_3']['pic'] }}}">
					</a>
				</div>
			</div>
		</div>
		<h3 class="title ix">相约西厢</h3>
		<div class="ym-grid ym-equalize">
			<div class="ym-g66 ym-gl">
				<div class="ym-gbox-left">
					<a href="{{{ $home_content['funny_1']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['funny_1']['pic'] }}}">
					</a>
				</div>
			</div>
			<div class="ym-g33 ym-gr">
				<div class="ym-gbox-right">
					<a href="{{{ $home_content['funny_2']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['funny_2']['pic'] }}}">
					</a>
					<a href="{{{ $home_content['funny_3']['link'] }}}" class="item last">
						<img src="/uploads/columns/o/{{{ $home_content['funny_3']['pic'] }}}">
					</a>
				</div>
			</div>
		</div>
		<h3 class="title fy">以爱为赠</h3>
		<div class="ym-grid ym-equalize">
			<div class="ym-g66 ym-gl">
				<div class="ym-gbox-left">
					<a href="{{{ $home_content['gift_1']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['gift_1']['pic'] }}}">
					</a>
				</div>
			</div>
			<div class="ym-g33 ym-gr">
				<div class="ym-gbox-right">
					<a href="{{{ $home_content['gift_2']['link'] }}}" class="item">
						<img src="/uploads/columns/o/{{{ $home_content['gift_2']['pic'] }}}">
					</a>
					<a href="{{{ $home_content['gift_3']['link'] }}}" class="item last">
						<img src="/uploads/columns/o/{{{ $home_content['gift_3']['pic'] }}}">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop