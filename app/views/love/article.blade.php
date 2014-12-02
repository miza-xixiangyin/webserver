@extends('layouts.master')
@section('extral_css', 'wording')

@section('content')
@include('layouts._menu', array('curr_section' => '', 'menus' => $main_menu))
<div class="ym-wrapper" id="under_content">
	<div class="ym-wbox">
		<div id="banner">
			<img src="/uploads/columns/o/{{{ $love_understand_banner['pic'] }}}">
		</div>
		<ul class="list">
			@foreach ($love_understand_content as $story)
			<li class="ym-column ym-cl">
				<div class="ym-col1">
					<div class="ym-cbox">
						<h4 class="un_title">{{{ $story['text_1'] }}}</h4>
						<span class="un_author">文/{{{ $story['text_2'] }}}</span>
						<p class="un_intro">{{ $story['text_3'] }}</p>
						<a class="un_link" href="{{{ $story['link'] }}}">查看全部</a>
					</div>
				</div>
				<div class="ym-col3">
					<div class="ym-cbox">
						<img class="un_cover" src="/uploads/columns/o/{{{ $story['pic'] }}}">
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>
@stop