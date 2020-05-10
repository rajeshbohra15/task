@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/post/create" class="btn btn-primary">Create Blog</a>
                    <br><br>
                    <h3>Blog Posts</h3>
                    @if(count($post)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                         @foreach($post as $posts)
                        <tr>
                            <td>{{$posts->title}}</td>
                            <td><a href="/post/{{$posts->id}}/edit" class="btn btn-primary">Edit</a></td> 
                            <td>
                                {!! Form::open(['action'=>['BlogController@destroy',$posts->id],'method'=>'POST']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                    {{Form::button('Delete',['class'=>'btn btn-danger','type' =>'submit'])}}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                         
                        

                    @endforeach
                    @else
                        <p>No Blog Found</p>
                    @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
