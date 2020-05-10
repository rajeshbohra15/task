@extends('layouts.app')
@section('content')
	<h1>Post</h1>

	@if(count($post)>0)
	@foreach($post as $posts)
		<img style="width:80px" src="/storage/cover_images/{{$posts->cover_image}}"></td>
		 <h3><a href="/post/{{$posts->id}}">{{$posts->title}}</a></h3>
		 <h5>Written on {{$posts->created_at}}</h5>

	@endforeach
	@else
		<p>No Blog Found</p>
	@endif
	
@endsection