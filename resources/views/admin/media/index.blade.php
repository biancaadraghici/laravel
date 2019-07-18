@extends('layouts/admin')

@section('content')
    <h1>Media</h1>
    <form action="/delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" name="options"></th>
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
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
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
    </form>


@endsection