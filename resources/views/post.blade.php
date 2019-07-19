@extends('layouts/blog-post')


@section('content')

    
    <h3>Category : {{$post->category->category_name}}</h3>
    <!-- Title -->
    <h1><b>{{$post->title}}</b></h1>
        
    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->user->created_at->diffForHumans()}}</p>
    {{-- <p><span class="glyphicon glyphicon-time"></span> Updated {{$post->user->updated_at->diffForHumans()}}</p> --}}

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"> {!!$post->body!!}</p>

    <hr>
    @if(Session::has('comment_message'))
    <div class="alert alert-success" role="alert">
        {{session('comment_message')}}
    </div>
    @endif
    <!-- Blog Comments -->
     @if(Auth::check()) {{-- you can comment only if you are logged in --}}
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::textarea('body', null,['class'=>'form-control','rows'=>3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>

        {!! Form::close() !!}
        {{-- <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> --}}
    </div>
    @endif
    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments)>0)
        @foreach($comments as $comment)
        <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt=""> {{-- src with photo :: {{$comment->photo}}--}}
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->updated_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}
                        <!-- Nested Comment -->
                        @if(count($comment->replies)>0 )
                            @foreach($comment->replies as $reply)
                            
                                <div class="media" style="margin-top:30px;">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="http://placehold.it/34x34" alt="">
                                    </a>
                                    
                                    <div class="media-body">
                                        <h5 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h5>
                                        {{$reply->body}}
                                    </div>
                                </div>
                                
                            @endforeach 
                        @endif
                        <!-- End Nested Comment -->
                        <!-- Reply function -->
                        <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/34x34" alt="">
                                </a>
                                
                                <div class="media-body">
                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <div class="form-group">
                                            {!! Form::text('body', null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                        </div>
                        
                                        {!! Form::close() !!}
                                </div>
                        <!-- End Reply function -->
                </div>
        </div>
        @endforeach
    @endif 
    
            
            
      
    


   
@endsection

@section('scripts')


@stop