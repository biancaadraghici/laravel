@extends('layouts/admin')


@section('content')

             
            @if(count($comments)>0)
                
                <h1>Comments</h1>

                <table class="table" >
                    <thead>
                        <tr>
                        <th style="text-align:center;" scope="col">Comment ID</th>
                        <th style="text-align:center;" scope="col">Post ID</th>
                        <th style="text-align:center;" scope="col">View Post</th>
                        <th style="text-align:center;" scope="col">Author</th>
                        <th style="text-align:center;" scope="col">Email</th>
                        <th style="text-align:center;" scope="col">Body</th>
                        <th style="text-align:center;" scope="col">Created At</th>
                        <th style="text-align:center;" scope="col">Updated At</th>
                        </tr>
                    </thead>
                    @foreach($comments as $comment)
                    <tbody style="text-align:center;">
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->post_id}}</td>
                            <td><a href="{{route('admin.post',$comment->post->id)}}">{{$comment->post->title}} by {{$comment->post->user->name}}</a></td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->body}}</td>
                            <td>{{$comment->created_at->diffForHumans()}}</td>
                            <td>{{$comment->updated_at->diffForHumans()}}</td>
                            <td>
                                @if($comment->is_active==1)
                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                            {!! Form::submit('Refuse', ['class'=>'btn btn-warning btn-sm']) !!}
                                    </div>

                                {!! Form::close() !!}
                                @elseif($comment->is_active==0)
                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="form-group">
                                            {!! Form::submit('Approve', ['class'=>'btn btn-success btn-sm']) !!}
                                    </div>
                        
                                {!! Form::close() !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                                
                                    <div class="form-group">
                                            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                                    </div>
                    
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            @else
                <h1 class="text-center">There are no comments at this moment</h1>
            @endif
        

            @if(count($replies)>0)
                
            <h1>Replies</h1>

            <table class="table">
                <thead>
                    <tr>
                    <th style="text-align:center;" scope="col">Reply ID</th>
                    <th style="text-align:center;" scope="col">Comment ID</th>
                    <th style="text-align:center;" scope="col">View Post</th>
                    <th style="text-align:center;" scope="col">Author</th>
                    <th style="text-align:center;" scope="col">Email</th>
                    <th style="text-align:center;" scope="col">Body</th>
                    <th style="text-align:center;" scope="col">Created At</th>
                    <th style="text-align:center;" scope="col">Updated At</th>
                    </tr>
                </thead>
                @foreach($replies as $reply)
                <tbody style="text-align:center;">
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td>{{$reply->comment_id}}</td>
                        <td><a href="{{route('admin.post',$reply->comment->post->id)}}">{{$reply->comment->post->title}} by {{$reply->comment->post->user->name}}</a></td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{$reply->body}}</td>
                        <td>{{$reply->created_at->diffForHumans()}}</td>
                        <td>{{$reply->updated_at->diffForHumans()}}</td>
                        <td>
                            @if($reply->is_active==1)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                        {!! Form::submit('Refuse', ['class'=>'btn btn-warning btn-sm']) !!}
                                </div>

                            {!! Form::close() !!}
                            @elseif($reply->is_active==0)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                        {!! Form::submit('Approve', ['class'=>'btn btn-success btn-sm']) !!}
                                </div>
                    
                            {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                            
                                <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                                </div>
                
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @else
            <h1 class="text-center">There are no replies at this moment</h1>
        @endif



@endsection