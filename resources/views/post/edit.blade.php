@extends('layouts.app')
@section('content')
    <h1>Create new post</h1>
    {!! Form::open(['action' => ['BlogController@update',$post->id],'method' => 'POST', 'enctype'=>'multipart/form-data'])!!}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title"  class="form-control" value="{{$post->title}}">
                   <!--  <span id="state_name"></span> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" id="ckeditor" rows="3">{{$post->description}}</textarea>
                </div>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                
               {{Form::file('cover_image')}}
            </div>
        </div>
        <div class="card-footer">
        	{{Form::hidden('_method','PUT')}}
          <button type="submit" class="btn btn-primary" >Save</button>
        	
          
        </div>
    {{Form::close()}}
@endsection