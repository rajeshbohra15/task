@extends('layouts.app')
@section('content')
	<a href="/post" class="btn btn-primary">Go Back</a>
	<div>
		
	<h1>{{$post->title}}</h1>
	<img style="width:80px" src="/storage/cover_images/{{$post->cover_image}}"></td>
	<div>
		{{strip_tags($post->description)}}
	</div>
	<hr>
	<h5>Written on{{$post->created_at}}</h5>
	<hr>
	<a href="/post/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
	{!! Form::open(['action'=>['BlogController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::button('Delete',['class'=>'btn btn-danger ','type' =>'submit'])}}
    {!! Form::close() !!}
	</div>
	
@endsection