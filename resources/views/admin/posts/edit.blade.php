@extends('layouts.admin')


@section('content')
<div class="jumbotron">
        <h2 style="text-align:center;">Edit Post</h2>
</div>
<div class="col-sm-3">
        <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->name : 'http://placehold.it/400x400'}}">
</div>

<div class="col-sm-9">

        


        {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id]])!!}

        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', old('title', $post->title),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id', array(''=>'Options')+ $categories, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','What is on your mind?') !!}
            {!! Form::textarea('body', old('body', $post->body), ['class'=>'form-control', 'rows'=>6]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=> 'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
        <div class="form-group">

            {!! Form::submit('Delete Post', ['class'=>'btn btn-warning'])!!}
        
        </div>
        {!! Form::close() !!}

</div>
@include('includes/form_err')


    
@endsection