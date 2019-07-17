@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))
        <p class="alert alert-danger">{{session('deleted_user')}}</p>
    @elseif(Session::has('updated_user'))
        <p class="alert alert-success">{{session('updated_user')}}</p>
    @elseif(Session::has('created_post'))
        <p class="alert alert-success">{{session('created_post')}}</p>
    @endif

    <h1>Posts</h1>

    <table class="table" >
        <thead>
            <tr>
              <th style="text-align:center;" scope="col">ID</th>
              <th style="text-align:center;" scope="col">Photo</th>
              <th style="text-align:center;" scope="col">Owner</th>
              <th style="text-align:center;" scope="col">Category</th>
              <th style="text-align:center;" scope="col">Title</th>
              <th style="text-align:center;" scope="col">Body</th>
              <th style="text-align:center;" scope="col">Created</th>
              <th style="text-align:center;" scope="col">Updated</th>
            </tr>
        </thead>
        <tbody style="text-align:center;">
             
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img style="margin-left:auto; margin-right:auto;" class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->name : 'http://placehold.it/50x50'}}"></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->category_name : 'Uncategorized'}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection