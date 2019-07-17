@extends('layouts/admin')

@section('content')
    <h1>Media</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td>{{$photo->name}}</td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>
                <td>{!! Form::open(['method'=> 'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                    <div class="form-group">

                        {!! Form::submit('Delete Photo', ['class'=>'btn btn-warning'])!!}
                    
                    </div>
                {!! Form::close() !!}</td>

            </tr>
            @endforeach
        </tbody>
    </table>



@endsection