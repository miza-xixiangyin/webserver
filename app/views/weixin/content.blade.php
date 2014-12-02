@extends('weixin.master')
@section('content')
    <div class="content">
    	<h2>{{$content->title}}</h2>
    	<span class="time">{{$content->time}}</span>
    	<img src="/uploads/{{$content->pic}}">
    	<p>{{ $content->content }}</p>
    </div>
@stop