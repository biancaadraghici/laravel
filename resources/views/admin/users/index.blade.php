@extends('layouts.admin')
@section('content')

    @if(Session::has('deleted_user'))
        <p class="alert alert-danger">{{session('deleted_user')}}</p>
    @elseif(Session::has('updated_user'))
        <p class="alert alert-success">{{session('updated_user')}}</p>
    @elseif(Session::has('created_user'))
        <p class="alert alert-success">{{session('created_user')}}</p>
    @endif



    <h1>Users</h1>

    <table class="table" >
        <thead>
            <tr>
              <th style="text-align:center;" scope="col">ID</th>
              <th style="text-align:center;" scope="col">Photo</th>
              <th style="text-align:center;" scope="col">Role</th>
              <th style="text-align:center;" scope="col">Status</th>
              <th style="text-align:center;" scope="col">Name</th>
              <th style="text-align:center;" scope="col">Email</th>
              <th style="text-align:center;" scope="col">Created</th>
              <th style="text-align:center;" scope="col">Updated</th>
            </tr>
        </thead>
        <tbody style="text-align:center;">
             
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img style="margin-left:auto; margin-right:auto;" class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->name : 'http://placehold.it/50x50'}}"></td>
                        <td>{{$user->role->name}}</td>
                        <td>@if($user->is_active==1){{"Active"}}@else {{"Inactive"}} @endif</td> {{-- {{$user->is_active==1 ? 'Active' : 'Not Active'}} --}}
                        <td><a href="{{route('admin-user-edit',$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

  
@endsection