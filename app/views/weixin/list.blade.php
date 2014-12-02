@extends('weixin.master')
@section('content')
    <div class="list">
    	@foreach ($data as $row)
    	<a class="item" href="/m/weixin/{{ $row->id }}">
    		<span class="title">{{ $row->title }}</span>
    		<span class="time">{{$row->time}}</span>
			<span class="cover" style="background-image: url(/uploads/{{ $row->pic }})"></span>
    	</a>
    	@endforeach
    </div>
@stop