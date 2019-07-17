@extends('layouts.admin')

@section('content')

        <h1>Edit Account</h1>

<div class="col-sm-3">
    <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->name : 'http://placehold.it/400x400'}}">
</div>
<div class="col-sm-9">


{!! Form::open(['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true])!!}


    <div class="form-group">

        {!!Form::label('name','Name:')!!}
        {!!Form::text('name', old('name', $user->name), ['class'=>'form-control'])!!}

    </div>

    <div class="form-group">

        {!!Form::label('email','Email:')!!}
        {!!Form::text('email', old('email', $user->email), ['class'=>'form-control'])!!}
        
    </div>

    <div class="form-group">

        {!!Form::label('is_active','Status:')!!}
        {!!Form::select('is_active', array(1=>'Active', 0=>'Inactive'), old('is_active', $user->is_active), ['class'=>'form-control'])!!}

    </div>

    <div class="form-group">

        {!!Form::label('role_id','Role:')!!}
        {!!Form::select('role_id', $roles ,old('role_id', $user->role_id), ['class'=>'form-control'])!!}

    </div>

    <div class="form-group">

        {!!Form::label('photo_id','Photo:')!!}
        {!!Form::file('photo_id' ,null, ['class'=>'form-control'])!!}

    </div>

    <div class="form-group">

        {!!Form::label('password','Password:')!!}
        {!!Form::password('password', ['class'=>'form-control'])!!}

    </div>


    <div class="form-group">

        {!! Form::submit('Update User', ['class'=>'btn btn-primary'])!!}

    </div>

{!! Form::close() !!}

{!! Form::open(['method'=> 'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
    <div class="form-group">

        {!! Form::submit('Delete User', ['class'=>'btn btn-warning'])!!}
    
    </div>
{!! Form::close() !!}
@include('includes/form_err')
</div>



@endsection