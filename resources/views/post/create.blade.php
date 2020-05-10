@extends('layouts.app')
@section('content')
    <h1>Create new post</h1>
    <form method="post" action="{{url('post')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Name">
                   <!--  <span id="state_name"></span> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" id="ckeditor" rows="3" placeholder="Description ..."></textarea>
                </div>
            </div>
           
        </div>
         <div class="col-md-6">
                <div class="form-group">
                    
                   {{Form::file('cover_image')}}
                </div>
            </div>
        <div class="card-footer">
                  <button type="submit" class="btn btn-primary" >Save</button>
                  
                </div>
    </form>
@endsection