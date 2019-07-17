@extends('layouts.admin')


@section('content')
    
    <div class="container">
            <h1 style="text-align:center;">Create Post</h1>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store'])!!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null,['class'=>'form-control']) !!}
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
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>6]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @include('includes/form_err')
@endsection